<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ["name","slug","description","user_id"];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
