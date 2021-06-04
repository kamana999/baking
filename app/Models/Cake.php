<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;
    
    protected $fillable = ['vendor_id', 'category_id', 'image','title','description','weight','layer','flavour','price','discount_price','parent_id'];

    // public function vendor(){

    //     return $this->belongsToMany('App\Models\User');
    // }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function vendor(){
        return $this->belongsTo('App\Models\Vendor');
    }
    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
}
