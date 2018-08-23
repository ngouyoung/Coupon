<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable =["name","slug","description","home_url","image","user_id"];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
