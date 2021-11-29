<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'status','user_id'
    ];

    public function user()
    {
        return  $this->belongsTo('App\user');
    }
    public function products()
    {
        return  $this->belongsToMany('App\product');
    }
}
