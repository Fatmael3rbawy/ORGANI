<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact_us extends Model
{
    protected $fillable=[
        'name','email','message','user_id'
    ];

    public function user()
    {
        return  $this -> belongsTo('App\user');
    }
}
