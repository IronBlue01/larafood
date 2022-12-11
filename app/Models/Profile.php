<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $fillable = ['name', 'description'];

    public function search($request)
    {
        $profiles = $this->where(function ($query) use ($request) {
            if ($request->filter) {
                $query->where('name', $request->filter)
                    ->orWhere('description', 'LIKE', "%{$request->filter}%");
            }
        })
        ->paginate();

        return $profiles;
    }
}
