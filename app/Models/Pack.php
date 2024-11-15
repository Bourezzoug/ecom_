<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    protected $fillable = ['name','price','quantity'];
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('name','like', "%$term%");
        });
    }
    public function variations() {
        return $this->hasMany(Variation::class);
    }
}
