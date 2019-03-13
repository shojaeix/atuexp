<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exp extends Model
{
    protected $fillable = [ 'email' ];

    protected $attributes = [
        'last_complete_step' => 0,
        'email' => null,
        'data' => '{}',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    function setData($key, $value){}

    function data($key){}

    function answers(){
        return $this->hasMany(\App\Exp\Answer::class);
    }
}
