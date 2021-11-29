<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $fillable = [
        'department_name'
    ];

    public function products()
    {
        return $this->hasMany('App\product');
    }
}
