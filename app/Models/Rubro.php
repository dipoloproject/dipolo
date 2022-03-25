<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

//use Illuminate\Http\Request;

class Rubro extends Model
{
    use HasFactory;


    public static function Buscar() {
        $rubros = DB::select('CALL sp_rubros_buscar()');
        //log::info(json_encode($rubros));
        //var_dump(response()->json($rubros)) ;
        //exit;
        return $rubros;
        
        /*echo ("<pre>");
        var_dump($rubros);
        echo ("</pre>");
        exit;*/

        /*return response()->json([
                                'idRubro'=> $rubros->idRubro,
                                'nombreRubro'=> $rubros->nombreRubro
        ]);*/
    }

    public static function Dame($id) {
        /*$argumento= [
            $request->$id
        ];*/

        //$id= intval($id);
        //var_dump($id);
        //exit;

        $rubro = DB::select('CALL sp_rubros_dame(?)', $id);
        //log::info(json_encode($rubro));
        //var_dump(response()->json($rubro));
        //exit;
        //return response()->json($rubro);

        //var_dump($rubro);
        //exit;
        return $rubro;
    }



    public static function alta($argumentos) {
        
        $mensaje = DB::select('CALL sp_rubros_alta( ?, ?, ?, ?, ?, ?, ? )', $argumentos);
        
        return $mensaje[0];
    }


////////////////////////////////////////////////////////
    public static function arrayTree() {
        $array= [];
                
        //Consultar la BD con el query
        $resultado= DB::select('CALL sp_rubros_ordenadosXpadre()');
        


        $menus = array(
            'items'=> array(),
            'parents'=> array()
        );


        //Iterar los resultados (para obtenerlos a todos y no solo al ultimo que se trae)
        foreach( $resultado as $items) {
            $menus['items'][$items->idRubro] = $items;

            if($items->idRubroPadre == NULL) {
                $menus['parents'][0] [] = $items->idRubro;
            }
            $menus['parents'][$items->idRubroPadre] [] = $items->idRubro;


            // $array[$row->idRubro] ['nombreRubro']= $row->nombreRubro; 
            // $array[$row->idRubro] ['idRubroPadre']= $row->idRubroPadre; 
            //$array[$row->idRubro] ['esPadre']= $row->esPadre; 
        }
        echo ("<br><br>");
        //$rubros= $resultado[0];
        /*echo ("<pre>");
        var_dump($menus);
        echo ("</pre>");
        exit;*/

        //retornar los resultados
        //return $array;
        return $resultado;
    }



}
