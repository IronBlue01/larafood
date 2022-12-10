<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;
    
    protected $table = 'plans';
    protected $fillable = ['name','url','price','description'];


    public function search($filter = null)
    {
        $results = $this
                        ->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate(1);

        return $results;
    }

    public function details(): HasMany
    {
        return $this->hasMany(DetailPlan::class);
    }

}
