<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{

    public function __construct(
        private readonly Plan $repository,
    ){}

    public function index()
    {
        $plans = $this->repository->latest()->paginate(1);

        return view('admin.pages.plans.index', [
            'plans' => $plans
        ]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

       return redirect()->route('plans.index');
    }

    public function show($url)
    {
            $plan = $this->repository->where('url', $url)->first();

            if(!$plan)
                redirect()->back();

            return view('admin.pages.plans.show',[
                'plan' => $plan
            ]);
    }

    public function destroy($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
            redirect()->back();

        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {

        $filters = $request->all();

        $plans = $this->repository->search($request->input('filter'));

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters
        ]);
    }
}
