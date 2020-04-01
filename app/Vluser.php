<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vluser extends Model
{
    protected $fillable = [
        'firstname', 'lastname','surname', 'email', 'password',
        'gender', 'usercode', 'phone', 'passport', 'description', 'avatar'
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
        $user->password = bcrypt($fields['password']);
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
