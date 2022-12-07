<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
    protected $fillable = ['name', 'p_iva', 'slug', 'address', 'image'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
