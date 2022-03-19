<?php

namespace App\Http\Controllers;

use App\Models\Rubro;

//use Illuminate\Http\Request;

//importar el modelo Rubro (tiene que estar creado primero)

class RubroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rubros= Rubro::Buscar();

        /*echo ("<pre>");
        var_dump($rubros);
        echo ("</pre>");
        exit;*/

        //Aqui se pone el resultado del Store Procedure
        //$rubros= 'todos los rubros se muestran aqui';
        return view( 'rubros.index', compact('rubros') );
        //['rubros'=>$rubros] es equivalente a compact('rubros') 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *//*
    public function store(Request $request)
    {
        //
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function actualizar($id)
    {
        //  SE RECUPERA EL RUBRO QUE SE DESEA ACTUALIZAR
        $argumento= [intval($id)];
        $array_respuesta= Rubro::Dame($argumento);
        $rubro= $array_respuesta[0];
                
        

        

        /*echo ("<pre>");
        var_dump($array);
        echo ("</pre>");
        exit;*/
                
        //Aqui se pone el resultado del Store Procedure pasandole $id (para que nos devuelva un objeto Rubro)
        //$rubros= 'todos los rubros se muestran aqui';
        return view( 'rubros.actualizar', compact('rubro') );
        //['rubros'=>$rubros] es equivalente a compact('rubros') 
    }






    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *//*
    public function update(Request $request, $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
