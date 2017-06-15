<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table='tasks';

    protected $fillable=[
        'id',
        'description',
        'status',
        'priority',
        'remarks',
        'assigned_to',
        'assigned_by',
        's_did'
    ];

    public function users(){
        return $this->belongsTo('users','user_id');
    }
}
