<?php

namespace App\Http\Controllers;
use App\Models\Rubro;
use Illuminate\Http\Request;


class RubroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubros= Rubro::Buscar();
        
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

    // Solo mostrará la vista con el formulario a llenar
    public function crear($id)
    {
        //$idRubroPadre= [intval($id)];
        $idRubroPadre= $id;
        return view( 'rubros.crear', compact('idRubroPadre') );
    }

    public function alta(Request $request)
    {
        /*  Si se creará un rubro de nivel 1, entonces se tiene que 
        $request->idRubroPadre es 0,
        por lo que se le reasignara el valor NULL */
        if( $request->idRubroPadre == 0) {
            $request->idRubroPadre = NULL;
        }

        //Se recuperan los datos ingresados en el formulario para crear un Rubro
        $argumentos= [
                        $request->idRubroPadre,
                        $request->nombreRubro,
                        $request->descripcionRubro,
                        $request->ordenRubro,
                        $request->destacadoRubro,
                        $request->menuRubro,
                        $request->estadoRubro
                    ];

        $respuesta = Rubro::Alta($argumentos);

        //var_dump($respuesta->Mensaje); exit;
        if($respuesta->Mensaje == 'creacion_OK') {
            /*  Se redirecciona a otra vista (colocando el nombre de la vista)
                y se crea un mensaje de sesión llamado 'creacion_rubro' que contendrá la leyenda 'creacion_OK' */
            return redirect()->route('rubros.index')->with('creacion_rubro', $respuesta->Mensaje);

        } else {
            /*Se debe tener en cuenta si se está creando un Rubro o un Subrubto, de acuerdo a eso,
            idRubroPadre será NULL o distinto de NULL. En caso que sea NULL, hay que asignarle 0 */
            if( $request->idRubroPadre == NULL){    // Se esta creando un Rubro
                $id= 0;
            } else {                                // Se está creando un Subrubro
                $id= $request->idRubroPadre;
            }
            /*  Se redirecciona a otra vista (colocando el nombre de la vista)
            y se crea un mensaje de sesión llamado 'creacion_rubro' que contendrá la leyenda correspondiente */
            return redirect()->route('rubros.crear', ['id'=>$id] )->with('creacion_rubro', $respuesta->Mensaje)->withInput();
        }
    }


    
    public function editar($id)
    {
        //  SE RECUPERA EL RUBRO QUE SE DESEA ACTUALIZAR
        $argumento= [intval($id)];
        $array_respuesta= Rubro::Dame($argumento);
        $rubro= $array_respuesta[0];

        return view( 'rubros.editar', compact('rubro') );
        //['rubros'=>$rubros] es equivalente a compact('rubros') 
    }

    public function actualizar(Request $request)
    {
        //Se recuperan los datos ingresados en el formulario para crear un Rubro
        $argumentos= [
                        $request->idRubro,
                        $request->idRubroPadre,
                        $request->nombreRubro,
                        $request->descripcionRubro,
                        $request->ordenRubro,
                        $request->destacadoRubro,
                        $request->menuRubro,
                        $request->estadoRubro
                    ];

        $respuesta = Rubro::Actualizar($argumentos);

        if($respuesta->Mensaje == 'actualizacion_OK') {
            /*  Se redirecciona a otra vista (colocando el nombre de la vista)
                y se crea un mensaje de sesión llamado 'creacion_rubro' que contendrá la leyenda 'creacion_OK' */
            return redirect()->route('rubros.index')->with('actualizacion_rubro', $respuesta->Mensaje);

        } else {
            /*Se debe tener en cuenta si se está creando un Rubro o un Subrubto, de acuerdo a eso,
            idRubroPadre será NULL o distinto de NULL. En caso que sea NULL, hay que asignarle 0 */
            if( $request->idRubroPadre == NULL){    // Se esta creando un Rubro
                $id= 0;
            } else {                                // Se está creando un Subrubro
                $id= $request->idRubroPadre;
            }
            /*  Se redirecciona a otra vista (colocando el nombre de la vista)
            y se crea un mensaje de sesión llamado 'creacion_rubro' que contendrá la leyenda correspondiente */
            //return redirect()->route('rubros.editar')->with('actualizacion_rubro', $respuesta->Mensaje)->withInput();
            return redirect()->back()->withInput()->with('actualizacion_rubro', $respuesta->Mensaje);
        }
    }



    public function eliminar($id)
    {
        //  SE RECUPERA EL RUBRO QUE SE DESEA ACTUALIZAR
        $argumento= [intval($id)];
        $respuesta= Rubro::Eliminar($argumento);

        return redirect()->route('rubros.index')->with('eliminacion_rubro', $respuesta->Mensaje);
    }



    public function subrubros($id)
    {
        //  SE RECUPERA EL RUBRO QUE SE DESEA ACTUALIZAR
        $argumento= [intval($id)];
        $array_respuesta= Rubro::Subrubros($argumento);

        $subrubros= $array_respuesta;
        return view( 'rubros.subrubros', compact('subrubros') );
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
