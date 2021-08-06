<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redirections
{
    //
    public static function get()
    {
        return app('db')->select("SELECT * FROM redirections");
    }
}
