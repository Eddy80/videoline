<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vlcat extends Model
{
    //

    public  function edit($fields)
    {
        $this->fill($fields);
        $this->save();

        return $this;
    }
}
