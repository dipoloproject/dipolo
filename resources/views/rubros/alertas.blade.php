<?php 

/*  Se evalúa si existe la variable  de sessión.
Esto se hace para que al actualizar la página, NO se muestre algun mensaje de error*/
if( session('creacion') != NULL ) {
    
    //  Se evalua la variable de sesion 'creacion' y se muestra el mensaje segun corrseponda
    if( session('creacion')=='OK' ) { 
        ?>
        <script>
            Swal.fire({
                        icon: 'success',            //muestra animacion de tilde
                        showConfirmButton: false,   //NO muestra boton de confirmar
                        timer: 3000,                //tiempo que permanece visible la notificación
                        html: '<p class="sweetalert2-html-wellcomeText">¡Operacion EXITOSA!</p> <p class="sweetalert2-html-actionText">Creaste un nuevo rubro</p>'
                    });
        </script>
        <?php    
    } else {
        ?>
        <script>
             //  Se mostrara en la alerta el mensaje de error que indique el sp_rubros_alta()
            var mensaje_error= '<?= session('creacion')?>';
            Swal.fire({
                        icon: 'error',            //muestra animacion de tilde
                        showConfirmButton: false,   //NO muestra boton de confirmar
                        timer: 3000,                //tiempo que permanece visible la notificación
                        html: '<p class="sweetalert2-html-errorText">¡ERROR!</p> <p class="sweetalert2-html-actionText">'+mensaje_error+'</p>'
                    });
        </script>
        <?php    
    }
}   // FIN if( session('creacion') != NULL )



?>