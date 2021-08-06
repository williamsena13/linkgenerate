<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    //
    public static function get()
    {
        return app('db')->select("SELECT * FROM links");
    }
    public function create()
    {

    }
}
