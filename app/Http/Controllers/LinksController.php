<?php

namespace App\Http\Controllers;

use App\Models\Links;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $links = Links::get();
        return $links;
        //return response()->json( $links );
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        try {
            $link = new Links;
            $link->title = $request->title;
            $link->url = $request->url;
            $link->default_url = $request->default_url;
            $link->limit_clicks = $request->limit_clicks;

            if ( $link->save() ){
                return $link;
            }
        } catch (\Exception $e) {
            dd( 'status 500', "Erro >> {$e->getMessage()} << ao salvar link" , $e  ,$request->all());
            return ['status' => 500, 'msg' => "Erro >> {$e->getMessage()} << ao salvar link" , 'error' => $e  ];
        }


    }

    public function show(Request $request)
    {
        //
        if ( empty( $request->link ) ) {
            return ['status' => 200, 'msg' => 'Parâmetro não encontrado'];
        }

        try {
            $link = Links::findOrFail($request->link);

            return $link;

        } catch (\Exception $e) {
            return ['status' => 500, 'msg' => "Erro >> {$e->getMessage()} << ao exibir link {$request->link}" , 'error' => $e  ];
        }

    }

    public function edit(Request $request)
    {
        //

        if ( empty( $request->link ) ) {
            return ['status' => 200, 'msg' => 'Parâmetro não encontrado ao editar Link'];
        }

        try {
            $link = Links::findOrFail($request->link);
        } catch (\Exception $e) {

            $pos = mb_strpos( $e->getMessage() , "No query results for models" );

            if ( $e->getMessage() == "No query results for model [App\Models\Links] {$request->link}" ){
                return ['status' => 200, 'msg' => "Nenhum link encontrado para o parâmetro {$request->link}"];
            }
            return ['status' => 500, 'msg' => "Erro >> {$e->getMessage()} << ao exibir link {$request->link}" , 'error' => $e  ];
        }

        return $link;
        //

    }

    public function update(Request $request, Links $links)
    {
        //
        if ( empty( $request->id ) ) {
            return ['status' => 200, 'msg' => 'Parâmetro não encontrado'];
        }
        $link = Links::findOrFail($request->link);

        return $link;
        //
    }

    public function destroy(Request $request)
    {
        //
        if ( empty( $request->id ) ) {
            return ['status' => 200, 'msg' => 'Parâmetro não encontrado'];
        }

        try {
            //code...
            $link = Links::findOrFail($request->id);


            if ( $link->delete() ){
                return $link;
            }

        } catch (\Exception $e) {
            return ['status' => 500, 'msg' => "Erro >> {$e->getMessage()} << ao excluir link {$request->id}" , 'error' => $e  ];
        }
        //
    }
}
