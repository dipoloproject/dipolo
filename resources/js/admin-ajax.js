$(document).ready(function() {
    
    // LOGIN  ////////////////////////////////////////////////////////////////////////////////////////////////
    /*Esta funcion se ejecutará cuando se haga CLICK sobre el boton submit del formulario
    con id= login-admin, es decir, cuando se intente iniciar sesión como administrador*/
    $('#login-admin').on('submit', function(e) {//al hacer click en el submit del formulario con id=login-admin, se ejecuta function
        e.preventDefault();                     //evita que se abra el archivo indicado en action del formulario con id=login-admin

        var datos = $(this).serializeArray();   //asigna a la variable el valor de los valores ingresados en los inputs del formulario con id=login-admin
        
        $.ajax({
            type: $(this).attr('method'),   //TIPO DE REQUEST: se lee el metodo del formuario con id=login-admin
            data: datos,                    //se indica los datos que se quieren enviar a ajax
            url: $(this).attr('action'),   //a donde se van a enviar, en este caso, se indica lo que indica action
            //dataType: 'text',               //se indica el tipo de datos. No se utilizará ya que daba errores
            success: function(data) {       //cuando la llamada sea exitosa, el archivo definido en action devuelve TRUE o FALSE
                
                if( data == true) {     //Mostrará notificacion de INICIO DE SESIÓN EXITOSO
                    Swal.fire({
                        //title: '¡BIENVENIDO!',
                        //text:'Iniciaste sesión con ÉXITO',
                        icon: 'success',            //muestra animacion de tilde
                        showConfirmButton: false,   //NO muestra boton de confirmar
                        timer: 2000,                //tiempo que permanece visible la notificación
                        html: '<p class="sweetalert2-html-wellcomeText">¡Bienvenido!</p> <p class="sweetalert2-html-actionText">Iniciaste sesión con éxito</p>',
                        //La propiedad html reemplaza a las propiedades: title y text
                        //Las clases están definidas en el archivo admin/css/admin.css
                    });

                    //Redirigir al archivo admin-area.php
                    setTimeout( function() {
                        window.location.href = 'admin-area.php';
                    }, 2000);// Se esperará cierto tiempo antes de ejecutarse


                } else {        ////Mostrará notificacion de INICIO DE SESIÓN FALLIDO
                    Swal.fire({
                        icon: 'error',            //muestra animacion de tilde
                        showConfirmButton: false,   //NO muestra boton de confirmar
                        timer: 2000,                //tiempo que permanece visible la notificación
                        html: '<p class="sweetalert2-html-errorText">¡ERROR!</p> <p class="sweetalert2-html-actionText">El usuario y/o contraseña son INCORRECTOS</p>',
                        //La propiedad html reemplaza a las propiedades: title y text
                        //Las clases están definidas en el archivo admin/css/admin.css
                    });

                }// ./if-else
                /*Luego de definir la notificacion Swal.fire, se utilizó .catch(swal.noop)
                que es un controlador de rechazo de promesa y se usa
                para que NO aparezca en la consola del navegador
                el error "uncaught (in promise) overlay sweetalert2".
                Este error NO afectaba el funcionamiento del sitio web. Esto pudo omitirse
                al haber cargado otros archivos js y css */

            }// ./success
        })// ./$.ajax
    }); // ./#login-admin
        

    // PRODUCTO  ////////////////////////////////////////////////////////////////////////////////////////////////
    /*Esta funcion se ejecutará cuando se haga CLICK sobre el boton submit del formulario
    con id= crear-producto, es decir, cuando se intente crear un producto*/
    $('#crear-producto').on('submit', function(e) {//al hacer click en el submit del formulario con id=crear-producto, se ejecuta function
        e.preventDefault();                     //evita que se abra el archivo indicado en action del formulario con id=login-admin

        var datos = $(this).serializeArray();   //asigna a la variable el valor de los valores ingresados en los inputs del formulario con id=login-admin
        
        $.ajax({
            type: $(this).attr('method'),   //TIPO DE REQUEST: se lee el metodo del formuario con id=login-admin
            data: datos,                    //se indica los datos que se quieren enviar a ajax
            url: $(this).attr('action'),   //a donde se van a enviar, en este caso, se indica lo que indica action
            //dataType: 'text',               //se indica el tipo de datos. No se utilizará ya que daba errores
            success: function(data) {       //cuando la llamada sea exitosa, el archivo definido en action devuelve TRUE o FALSE
                
                if( data == true) {     //Mostrará notificacion de INICIO DE SESIÓN EXITOSO
                    Swal.fire({
                        //title: '¡BIENVENIDO!',
                        //text:'Iniciaste sesión con ÉXITO',
                        icon: 'success',            //muestra animacion de tilde
                        showConfirmButton: false,   //NO muestra boton de confirmar
                        timer: 2000,                //tiempo que permanece visible la notificación
                        html: '<p class="sweetalert2-html-wellcomeText">¡Inserción EXITOSA!</p> <p class="sweetalert2-html-actionText">Creaste un producto con éxito</p>',
                        //La propiedad html reemplaza a las propiedades: title y text
                        //Las clases están definidas en el archivo admin/css/admin.css
                    });

                    //Redirigir al archivo admin-area.php
                    setTimeout( function() {
                        window.location.href = 'crear-producto.php';
                    }, 2000);// Se esperará cierto tiempo antes de ejecutarse


                } else {        ////Mostrará notificacion de INICIO DE SESIÓN FALLIDO
                    Swal.fire({
                        icon: 'error',            //muestra animacion de tilde
                        showConfirmButton: false,   //NO muestra boton de confirmar
                        timer: 2000,                //tiempo que permanece visible la notificación
                        html: '<p class="sweetalert2-html-errorText">¡Inserción ERRÓNEA!</p> <p class="sweetalert2-html-actionText">NO se pudo crear el producto</p>',
                        //La propiedad html reemplaza a las propiedades: title y text
                        //Las clases están definidas en el archivo admin/css/admin.css
                    });

                }// ./if-else
                /*Luego de definir la notificacion Swal.fire, se utilizó .catch(swal.noop)
                que es un controlador de rechazo de promesa y se usa
                para que NO aparezca en la consola del navegador
                el error "uncaught (in promise) overlay sweetalert2".
                Este error NO afectaba el funcionamiento del sitio web. Esto pudo omitirse
                al haber cargado otros archivos js y css */

            }// ./success
        })// ./$.ajax
    }); // ./#crear-producto



});// ./$('document')


