<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery_Person extends Model
{
    use HasFactory;
    protected $table = 'delivery_persons';
    protected $fillable = ['vendor_id'];
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
