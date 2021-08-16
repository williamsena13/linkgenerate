<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Redirections extends Model
{
    //
    //public $limit_clicks;


    //public function __construct()
    //{
        //$this->limit_clicks = $this->getLimit();
        //$this->count_clicks = $this->getClick();
    //}

    public static function getIndex()
    {
        return

        Redirections::join('links','links.url', 'redirections.redirect_url')
        ->select(
            'redirections.id',
            'redirections.title',
            'redirections.redirect_url',
            'redirections.default_url',
            'redirections.status',
            'redirections.created_at',
            'redirections.updated_at',
            DB::raw('SUM(links.limit_clicks) as limit_clicks'),
            DB::raw('SUM(links.count_clicks) as count_clicks')
            //"sum('links.limit_clicks')"
        )
        ->groupBy(
            'redirections.id',
            'redirections.title',
            'redirections.redirect_url',
            'redirections.default_url',
            'redirections.status',
            'redirections.created_at',
            'redirections.updated_at',
        )
        ->get();
    }

    public function links()
    {
        return $this->hasMany(Links::class, 'url', 'redirect_url');
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
