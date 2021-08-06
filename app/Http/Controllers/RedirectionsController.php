<?php

namespace App\Http\Controllers;

use App\Models\Redirections;
use Illuminate\Http\Request;

class RedirectionsController extends Controller
{
    public function index()
    {
        //
        return Redirections::get();
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        try {
            $redirections = new Redirections;
            $redirections->title = $request->title;
            $redirections->redirect_url = $request->redirect_url;
            $redirections->default_url = $request->default_url;

            $redirections->save();

            return $redirections;
        } catch (\Exception $e) {
            return [ 'status' => 500 , 'msg' => "Erro >> {$e->getMessage()} << when generating redirection!", 'e' , $e ];
        }



    }

    public function show(Request $request)
    {
        //
        if ( empty( $request->link ) ) {
            return ['status' => 500, 'msg' => 'Parameter not found'];
        }

        try {
            $link = Redirections::findOrFail($request->link);

            return $link;

        } catch (\Exception $e) {
            return ['status' => 500, 'msg' => "Erro >> {$e->getMessage()} << when displaying Redirection {$request->link}" , 'e' => $e  ];
        }
        //
    }

    public function edit(Redirections $redirections)
    {
        //
    }

    public function update(Request $request, Redirections $redirections)
    {
        //
    }


    public function destroy(Request $request)
    {
        //
        if ( empty( $request->id ) ) {
            return ['status' => 500, 'msg' => 'Parameter not found'];
        }

        try {
            //code...
            $redirection = Redirections::findOrFail($request->id);


            if ( $redirection->delete() ){
                return $redirection;
            }

        } catch (\Exception $e) {
            return ['status' => 500, 'msg' => "Erro >> {$e->getMessage()} << when deleting redirection {$request->id}" , 'e' => $e  ];
        }
        //
    }
}
