<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redirections extends Model
{
    //
    public function links()
    {
        return $this->hasMany(Links::class, 'url', 'default_url');
    }

    public function getLinks()
    {
        return $this->links()->get();
    }

    public function getLimit()
    {
        return $this->links()->sum('limit_clicks');
    }

    public function getClick()
    {
        return $this->links()->sum('count_clicks');
    }
    //
}// Redirections
