<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['visitor_id','status','total_price','session_id','email','first_name','family_name','address','phone_number','city','state_province','postal_code','products_cart','delivery_time','commentaire','call_time'];
    public function products() {
        return $this->hasMany(Product::class);
    }
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('total_price','like', "%$term%")
                ->orWhere('first_name','like', "%$term%")
                ->orWhere('family_name','like', "%$term%");
        });
    }
}
