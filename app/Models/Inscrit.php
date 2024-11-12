<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscrit extends Model
{
    protected $fillable = ['email'];
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('email','like', "%$term%");
        });
    }
}
