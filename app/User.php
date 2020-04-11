<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'firstname', 'lastname','surname', 'email', 'password',
        'gender',  'phone', 'passport', 'description', 'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
       // $user->password = bcrypt($fields['password']);
        $user->password = md5($fields['password']);
        $user->save();

        return $user;
    }



    public  function edit($fields)
    {
        $this->fill($fields);
        $this->save();

        return $this;
    }
}
