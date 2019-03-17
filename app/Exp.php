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

    function setData(string $key, $value){
        $data = $this->getAttribute('data');

        $data[$key] = $value;

        $this->setAttribute('data', $data);
    }

    function hasData(string $key) : bool {
        return isset($this->getAttribute('data')[$key]);
    }

    function data($key, $default = null){
        $data = $this->getAttribute('data');

        return ((isset($data[$key])) ? $data[$key] : $default);
    }

    function answers(){
        return $this->hasMany(\App\Exp\Answer::class);
    }

    function getStatusAttribute(){
        return ($this->getAttribute('last_complete_step') == 4) ? 'complete' : 'pending';
    }
}
