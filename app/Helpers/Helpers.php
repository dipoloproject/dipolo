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

//  FUNCION PARA MOSTRAR ESTADO     ///////////
    function show_activo_inactivo($variable) {
        if( $variable=='A') {
            return '<td> <label  class="label label-success"> Activo </label> </td>';
        } else {
            return '<td> <label  class="label label-danger"> Inactivo </label> </td>';
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
//////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////
//  Funcion que muestra un alerta segun la operacion que se realice en RUBROS
    function showAlert_rubros($variable_session) {
        //  Luego de CREAR RUBRO
            /*  Se evalúa si existe la variable  de sessión.
            Esto se hace para que al actualizar la página, NO se muestre algun mensaje de error*/
            if( $variable_session != NULL ) {
                
                //  Se evalua la variable de sesion 'creacion' y se muestra el mensaje que corrseponda
                if( $variable_session=='creacion_OK' ) { 
                    ?>
                    <script>
                        Swal.fire({
                                    icon: 'success',            //muestra animacion de tilde
                                    showConfirmButton: false,   //NO muestra boton de confirmar
                                    timer: 2000,                //tiempo que permanece visible la notificación
                                    html: '<p class="sweetalert2-html-wellcomeText text-olive">¡Operacion EXITOSA!</p> <p class="sweetalert2-html-actionText">Creaste un nuevo rubro/subrubro</p>'
                                });
                    </script>
                    <?php    
                } else {
                    //  Se evalua la variable de sesion 'creacion' y se muestra el mensaje que corrseponda
                    if( $variable_session=='actualizacion_OK' ) { 
                        ?>
                        <script>
                            Swal.fire({
                                        icon: 'success',            //muestra animacion de tilde
                                        showConfirmButton: false,   //NO muestra boton de confirmar
                                        timer: 2000,                //tiempo que permanece visible la notificación
                                        html: '<p class="sweetalert2-html-wellcomeText text-olive">¡Operacion EXITOSA!</p> <p class="sweetalert2-html-actionText">Has actualizado el rubro/subrubro</p>'
                                    });
                        </script>
                        <?php    
                    } else {
                        //  Se evalua la variable de sesion 'eliminacion' y se muestra el mensaje segun corrseponda
                        if( $variable_session=='eliminacion_OK' ) {
                            ?>
                            <script>
                                Swal.fire({
                                            icon: 'success',            //muestra animacion de tilde
                                            showConfirmButton: false,   //NO muestra boton de confirmar
                                            timer: 2000,                //tiempo que permanece visible la notificación
                                            html: '<p class="sweetalert2-html-wellcomeText text-olive">¡Operacion EXITOSA!</p> <p class="sweetalert2-html-actionText">Rubro eliminado</p>'
                                        });
                            </script>
                            <?php   
                        } else {
                            //  Se evalua cualquier variable de sesion y se muestra el mensaje que corrseponda
                            ?>
                            
                            <!-- SCRIPT para mostrar notificacion de ERROR+MENSAJE -->
                            <script>
                                //  Se mostrara en la alerta el mensaje de error que indique el sp_rubros_alta()
                                var mensaje_error= '<?= $variable_session ?>';
                                Swal.fire({
                                            icon: 'error',            //muestra animacion de tilde
                                            showConfirmButton: false,   //NO muestra boton de confirmar
                                            timer: 3000,                //tiempo que permanece visible la notificación
                                            html: '<p class="sweetalert2-html-errorText">¡ERROR!</p> <p class="sweetalert2-html-actionText">'+mensaje_error+'</p>'
                                        });
                            </script>
                            <!-- FIN SCRIPT -->

                            <?php    
                        }   //  FIN if( session('eliminacion') != NULL ) + else (muestra notificacion de ERROR)
                    }       //  FIN if( session('actualizacion') != NULL )
                }           //  FIN if( session('creacion') != NULL )

            }   // FIN if( $variable_session != NULL )
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////



?>