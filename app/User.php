<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function departments()
    {
        return $this->hasMany(Department::class, 'user_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id');
    }
    public function attendance(){
        return $this->hasMany('App\Attendance','user_id');
    }
}
