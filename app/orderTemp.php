<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderTemp extends Model
{
   protected $fillable=[
       'product_id','pname','image','quantity','price','total','user_id'
   ];

    public function user()
    {
        return  $this -> belongsTo('App\user');
    }
}
