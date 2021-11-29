<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'product_name', 'image', 'description','price' , 'department_id'
    ];

    public function department()
    {
        return  $this -> belongsTo('App\department');
    }
    public function orders()
    {
        return  $this->belongsToMany('App\order');
    }
}
