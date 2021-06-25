<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    public function country(){
        // return $this->hasOne('App\Models\Country','id','country_id');
        return $this->belongsTo('App\Models\Country');
    }
    public function state(){
        return $this->belongsTo('App\Models\State');
    }
    public function district(){
        return $this->belongsTo('App\Models\District');
    }
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function cake(){
        
        return $this->hasMany(Cake::class, 'vendor_id');
    }
    public function order(){
        
        return $this->hasMany(Order::class, 'vendor_id');
    }
}
