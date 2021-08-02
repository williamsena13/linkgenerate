<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('app');
        dd('index');
    }

    public function posts()
    {
        $posts = [
            [
                'id' => 0,
                'title' => 'Titulo do primeiro',
                'content' => 1
            ],
            [
                'id' => 2,
                'title' => 'Titulo do Segundp',
                'content' => 2
            ]
        ];
        //dd($posts );
        return  $posts ;
    }

}
