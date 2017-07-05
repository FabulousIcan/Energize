<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnergySupply extends Model
{
    //
    protected $fillable = [
        'user_id', 'energy_capacity', 'price', 
    ];


     public function user(){
    	return $this->belongsTo('App\User');
    }
    public function energySupply(){
    	return $this->hasMany('App\Comment');
    }
}
