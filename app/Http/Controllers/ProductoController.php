<?php

namespace App\Http\Controllers;

use App\Models\Rubro;
use App\Models\Producto;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos= Producto::Buscar();
        
        return view( 'productos.index', compact('productos') );
        //['rubros'=>$rubros] es equivalente a compact('rubros') 
    }


    public function crear()
    {
        $rubros= Rubro::Buscar();
        
        return view( 'productos.crear', compact('rubros'));
    }

    public function alta(Request $request)
    {
        echo("<br><br>");

        $request->idMarca= intval($request->idMarca); 
        echo("idMarca: "); var_dump($request->idMarca); echo("<br>");


        $request->idModelo= intval($request->idModelo); 
        echo("idModelo: "); var_dump($request->idModelo); echo("<br>");
        
        $request->idRubro= intval($request->idRubro); 
        echo("idRubro: "); var_dump($request->idRubro); echo("<br>");
        
        if($request->codigoProducto == NULL) { $request->codigoProducto = ""; }
        echo("codigoProducto: "); var_dump($request->codigoProducto); echo("<br>");

        echo("nombreProducto:".$request->nombreProducto."<br>");

        if($request->descripcionProducto == NULL) { $request->descripcionProducto = ""; }
        echo("descripcionProducto: "); var_dump($request->descripcionProducto); echo("<br>");

        echo("origenProducto:".$request->origenProducto."<br>");

        if($request->precioTachadoProducto == NULL) { $request->precioTachadoProducto = 0; }
        echo("precioTachadoProducto: "); var_dump($request->precioTachadoProducto); echo("<br>");
        
        if($request->precioVentaProducto == NULL) { $request->precioVentaProducto = 0; }
        echo("precioVentaProducto: "); var_dump($request->precioVentaProducto); echo("<br>");

        if($request->precioListaProducto == NULL) { $request->precioListaProducto = 0; }
        echo("precioListaProducto: "); var_dump($request->precioListaProducto); echo("<br>");

               
        echo("destacadoProducto:".$request->destacadoProducto."<br>");

        if($request->vistasProducto == NULL) { $request->vistasProducto = 0; }
        echo("vistasProducto: "); var_dump($request->vistasProducto); echo("<br>");

        echo("condicionProducto:".$request->condicionProducto."<br>");
        echo("estadoProducto:".$request->estadoProducto."<br><br>");

        //Se recuperan los datos ingresados en el formulario para crear un Rubro
        $argumentos= [
                        $request->idRubro,
                        $request->idModelo,
                        $request->idMarca,
                        $request->codigoProducto,
                        $request->nombreProducto,
                        $request->descripcionProducto,
                        $request->origenProducto,
                        $request->precioTachadoProducto,
                        $request->precioVentaProducto,
                        $request->precioListaProducto,
                        $request->destacadoProducto,
                        $request->vistasProducto,
                        $request->condicionProducto,
                        $request->estadoProducto
                    ];

        $respuesta = Producto::Alta($argumentos);

        //var_dump($respuesta->Mensaje); exit;
        if($respuesta->Mensaje == 'creacion_OK') {

            echo("La creacion fue todo un EXITO");exit;
            /*  Se redirecciona a otra vista (colocando el nombre de la vista)
                y se crea un mensaje de sesión llamado 'creacion_rubro' que contendrá la leyenda 'creacion_OK' */
            return redirect()->route('rubros.index')->with('creacion_rubro', $respuesta->Mensaje);

        } else {

            echo("La creacion FALLÓ");exit;
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
     */
    public function store(Request $request)
    {
        //
    }

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

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
