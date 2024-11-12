<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','name','slug','price','quantity','typeQuantity','unityQuantity','description','main_image','alt','meta_description','gallery_images','extract','percentage'];


    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('name','like', "%$term%")
                ->orWhere('description','like', "%$term%");
        });
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
