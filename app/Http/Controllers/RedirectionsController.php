<?php

namespace App\Http\Controllers;

use App\Models\Redirections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RedirectionsController extends Controller
{
    public function index()
    {
        //

        $valor = Redirections::getIndex();


        return $valor;
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


        } catch (\Exception $e) {
            return [ 'status' => 500 , 'msg' => $e->getMessage(), 'e' , $e , 'request_all' => $all];
        }

        try {
            $redirections->save();
        } catch(\Exception $e) {
            return [ 'status' => 500 ,'msg2' => "erro ao salvar", 'msg' => $e->getMessage(), 'e' , $e , 'redirections' => $redirections];
        }


        return ['status' => 200, 'obj' => $redirections , 'all' => $request->all(), 'request' => $request];


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

    public function edit(Request $request)
    {
        //
        if ( empty( $request->redirection ) ) {
            return ['status' => 500, 'msg' => 'Parameter not found'];
        }

        try {
            $redirection = Redirections::findOrFail($request->redirection);

            return $redirection;

        } catch (\Exception $e) {
            return ['status' => 500, 'msg' => "Erro >> {$e->getMessage()} << when displaying Redirection {$request->redirection}" , 'e' => $e  ];
        }
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
