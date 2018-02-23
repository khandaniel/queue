<?php

namespace App;

use App\Notifications\SendResetLink;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements CanResetPassword
{
    use Notifiable;
    use \Illuminate\Auth\Passwords\CanResetPassword;


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

    public function sendPasswordResetNotification($token) {
        $n = new SendResetLink($token);
        $n->sendLink($this);
    }

}
