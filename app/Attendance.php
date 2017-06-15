<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table='attendance';

    protected $fillable=[
        'id',
        'date',
        'user_id',
        'punch_in',
        'punch_out',
        'status'
    ];
    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
}
