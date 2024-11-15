<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $fillable = ['product_id', 'pack_id', 'quantity'];
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('product_id','like', "%$term%");
        });
    }
    public function packs() {
        return $this->belongsTo(Pack::class);
    }
    public function products() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
