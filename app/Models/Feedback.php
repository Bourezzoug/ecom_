<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['full_name','profession','feedback'];
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('full_name','like', "%$term%");
        });
    }
}
