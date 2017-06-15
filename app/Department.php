<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table='departments';

    protected $fillable=[
        'id',
        'name',
        'user_id'
    ];

   public function users(){
       return $this->belongsTo('users','user_id');
   }

   public function subdepartments(){
       return $this->hasMany('subdepartments','d_id');
   }
}
