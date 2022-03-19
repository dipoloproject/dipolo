<?php

/////////////////////////////////////////////////////////////////////
/*  DIRECTIVAS para poder utilizar las funciones:
                                                    mostrararbol()
                                                    buscarhijos()   */
    use Illuminate\Support\Facades\DB;
    use App\Models\Rubro;
/////////////////////////////////////////////////////////////////////

//  FUNCION PARA ACTIVAR UN OPCION EN ELEMENTOS DE TIPO SELECT     ///////////
    function option_active($value, $variable ) {
        if( $value == $variable) {
            return 'selected';
        } else {
            return '';
        }
    }
//////////////////////////////////////////////////////////////////////////////



//  FUNCION PARA MOSTRAR LOS RUBROS EN UN ESQUEMA DE ARBOL      ///////////////
    function mostrararbol() {
        $tabs= 1;
        $rubros = DB::select('CALL sp_rubros_buscarhuerfanos()');   //se obtienen los rubros de 1er nivel

        foreach($rubros as $rubro) {
            ?>
                <option value="<?php echo $rubro->idRubro; ?>">
            <?php
            echo ($rubro->nombreRubro);
            ?>
                </option>
            <?php

            $array= [];
            $array=[$rubro->idRubro];   //contiene el id de un padre
            
            buscarhijos($array, $tabs);            
        }
        
    }
//  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //  //
//  Esta funcion se complementa con la anterior para lograr el fin
    function buscarhijos($array, $tabs) {
        $i=0;
        $hijos = DB::select('CALL sp_rubros_buscarhijos(?)', $array);
        
        if( sizeof($hijos)>0 ) {
            foreach($hijos as $hijo) {
                echo ("<pre>"); 
                ?>
                    <option value="<?php echo $hijo->idRubro; ?>">
                <?php
                while($i<$tabs) {
                    ?> &nbsp;&nbsp;&nbsp;<?php
                    $i=$i+1;
                }
                
                echo ($hijo->nombreRubro);
                ?>
                    </option>
                <?php
                $array= [];
                $array=[$hijo->idRubro];   //contiene el id de un padre
                
                $tabs=$tabs+1;
                buscarhijos($array, $tabs);
            }//     FIN foreach($hijos as $hijo)
        } //    FIN if( sizeof($hijos)>0 )
    }//     FIN function buscarhijos($array, $tabs)
///////////////////////////////////////////////////////////////////////


?>