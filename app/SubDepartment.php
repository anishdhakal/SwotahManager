<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubDepartment extends Model
{
    protected $table='subdepartments';

    protected $fillable=[
        'id',
        'name',
        'd_id',
        'user_id'
    ];

    public function departments(){
        return $this->belongsTo('departments','d_id');
    }
}
