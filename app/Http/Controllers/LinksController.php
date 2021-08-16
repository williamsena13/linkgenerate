<?php

namespace App\Http\Controllers;

use App\Models\Links;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function index()
    {
        //
        return Links::get();
        //
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
            $link->url = $request->url;
            $link->input_url = $request->input_url;
            //$link->count_clicks = isset( $request->count_clicks ) ? $request->count_clicks : null;
            $link->limit_clicks = isset( $request->limit_clicks ) ? $request->limit_clicks : null;
            $link->expires = isset( $request->expires ) ? $request->expires : null;


            if ( $link->save() ){

                return [ 'status' => 200, 'msg' => "link saved successfully!", 'data' => $link];
            }
        } catch (\Exception $e) {
            dd( 'status 500', "Erro >> {$e->getMessage()} << ao salvar link" , $e  ,$request->all());
            return [ 'status' => 500 , 'msg' => "Erro >> {$e->getMessage()} << when saving link!", 'e' , $e ];
        }


    }

    public function show(Request $request)
    {
        //
        if ( empty( $request->link ) ) {
            return ['status' => 500, 'msg' => 'Parameter not found'];
        }

        try {
            $link = Links::findOrFail($request->link);

            return $link;

        } catch (\Exception $e) {
            return ['status' => 500, 'msg' => "Erro >> {$e->getMessage()} << when displaying link {$request->link}" , 'e' => $e  ];
        }

    }

    public function edit(Request $request)
    {
        //

        if ( empty( $request->link ) ) {
            return ['status' => 500, 'msg' => 'Parameter not found'];
        }

        try {
            $link = Links::findOrFail($request->link);
        } catch (\Exception $e) {

            $pos = mb_strpos( $e->getMessage() , "No query results for models" );

            if ( $e->getMessage() == "No query results for model [App\Models\Links] {$request->link}" ){
                return ['status' => 200, 'msg' => "No links found to the parameter {$request->link}"];
            }
            return ['status' => 500, 'msg' => "Erro >> {$e->getMessage()} << when displaying link {$request->link}" , 'e' => $e  ];
        }

        return $link;
        //

    }

    public function update(Request $request, Links $links)
    {
        //
        if ( empty( $request->id ) ) {
            return ['status' => 500, 'msg' => 'Parameter not found'];
        }
        $link = Links::findOrFail($request->link);

        $link->update($request);

        return $link;
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
            $link = Links::findOrFail($request->id);


            if ( $link->delete() ){
                return $link;
            }

        } catch (\Exception $e) {
            return ['status' => 500, 'msg' => "Erro >> {$e->getMessage()} << when deleting link {$request->id}" , 'e' => $e  ];
        }
        //
    }
}
