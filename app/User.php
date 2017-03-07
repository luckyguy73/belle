<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Task;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function social()
    {
        return $this->hasMany(UserSocial::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function hasSocialLinked($service)
    {
        return (bool) $this->social->where('service', $service)->count();
    }

    public function blogs()
    {
        return $this->hasMany('App\Blog');
    }
}
