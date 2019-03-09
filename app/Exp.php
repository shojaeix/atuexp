<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exp extends Model
{
    protected $fillable = [ 'email' ];

    protected $attributes = [
        'last_complete_step' => 0,
        'email' => null,
    ];
}
