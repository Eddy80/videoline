<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vluservideos extends Model
{
    /*
    protected $fillable = [
        'firstname', 'lastname','surname', 'email', 'password',
        'gender',  'phone', 'passport', 'description', 'avatar'
    ];
*/


    public static function add($fields)
    {
        $uservideo = new static;
        $uservideo->fill($fields);
        $uservideo->save();

        return $uservideo;
    }



    public  function edit($fields)
    {
        $this->fill($fields);
        $this->save();

        return $this;
    }



}
