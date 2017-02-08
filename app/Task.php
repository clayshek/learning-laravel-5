<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //below is custom stuff added during tutorial

    public static function incomplete()
    {
        return static::where('completed', 0)->get();
    }
}
