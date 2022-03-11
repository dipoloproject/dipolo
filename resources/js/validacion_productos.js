$(document).ready(function() {
/*
    const formulario = document.getElementById('form_crear-usuario');
    const inputs = document.querySelectorAll('#form_crear-usuario .form-control');   /*se guardan todos los campos con
                                                                                class= form-control del formulario
                                                                                con id= crear-usuario en el array inputs*/
  /*  
    // Expresiones Regulares//////////////////////////////////////////////////////////////////////
    const expresionesRegulares = {                                                              //
        alfanumerico: /^[a-zA-Z0-9\_\-]{1,16}$/, // Letras, numeros, guion y guion_bajo         //
        alfabetico: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.       //
        password: /^.{4,12}$/, // 4 a 12 digitos.  MODIFICAR                                    //
        email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,                              //
        numerico: /^\d{1,14}$/ // 1 a 14 numeros.                                               //
    }/////////////////////////////////////////////////////////////////////////////////////////////
    
    var camposCorrectos = {
        idRol: false,
        nombresUsuario: false,
        apellidosUsuario: false, 
        usuario: false, 
        password: false, 
        email: false    
    }
    
    // const testFlag = {
    //     nombresUsuario: true,
    //     apellidosUsuario: false, 
    //     usuario: false, 
    //     password: false, 
    //     email: false
    // }
    
    /*Esta funcion evalua el tipo de input y segun eso se evaluara      ////////////////////////////////////
     que cumpla con la expresion regular que corresponda*/                                                // 
    /*
     const validarFormulario = (e)=>{                                                                      //
        switch (e.target.name) {                                                                          //
            case "idRol":                                                                                 //
                validarCampo(expresionesRegulares.numerico, e.target.value, 'idRol');                     //
                break;                                                                                    //
            case "nombresUsuario":                                                                        //
                validarCampo(expresionesRegulares.alfabetico, e.target.value, 'nombresUsuario');          //
                break;                                                                                    //
            case "apellidosUsuario":                                                                      //
                validarCampo(expresionesRegulares.alfabetico, e.target.value, 'apellidosUsuario');        //
                break;                                                                                    //
            case "usuario":                                                                               //
                validarCampo(expresionesRegulares.alfanumerico, e.target.value, 'usuario');               //
                break;                                                                                    //
            case "password":                                                                              //
                validarCampo(expresionesRegulares.password, e.target.value, 'password');                  //
                break;                                                                                    //
            case "email":                                                                                 //
                validarCampo(expresionesRegulares.email, e.target.value, 'email');                        //
                break;                                                                                    //
            /*case "observacionesUsuario":                                                                //
                validarCampo(expresionesRegulares.alfabetico, e.target.value, 'observacionesUsuario');;   //
                break;*/                                                                                  //
 /*       }                                                                                                 //
    }                                                                                                     //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    //////////////////////////////////////////////////////////////////////////////////////
    /* A cada campo (input) del formulario se le aplica la funcion validarFormulario    //
    cada vez que se escriba dentro del campo o cuando se hace click fuera de él */      //
    /*inputs.forEach( (input)=>{                                                          //
        input.addEventListener('keyup', validarFormulario);                             //
        input.addEventListener('blur', validarFormulario);                              //
    });                                                                                 //
    //////////////////////////////////////////////////////////////////////////////////////
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*Si lo que se escribio dentro del input cumple con la expresion regular,                                                           //
     el campo/input correspondiente sera correcto/true */                                                                               //
    /*const validarCampo = (tipo_expresionReg, inputValue, campo)=>{                                                                      //
        if( tipo_expresionReg.test( inputValue ) ) {                                                                                    //
            document.getElementById(`div_${campo}`).classList.remove('has-error');//se quita el color rojo al input y al field          //
            document.getElementById(`${campo}`).classList.remove('textField_incorrecto');//se quita el color rojo al texto en el input  //
            camposCorrectos[campo] = true;                                                                                              //
        } else {                                                                                                                        //
            document.getElementById(`div_${campo}`).classList.add('has-error');//se agrega el color rojo al input y al field            //
            document.getElementById(`${campo}`).classList.add('textField_incorrecto');//se agrega el color rojo al texto en el input    //
            camposCorrectos[campo] = false;                                                                                             //
        }                                                                                                                               //
    }                                                                                                                                   //
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    var mensaje_activo = false;     //variable global que indica que el mensaje "Campo obligatorio" esta o no visible       //
    //console.log(mensaje_activo);
    */
    
    //                                           //
    /* Cada vez que se haga click en "Crear Usuario" se ejectuta lo siguiente */                                            //
    $('#form_crear-producto').on('submit', function(e) {                                                                            //
        e.preventDefault();
                                                                                                         //
        /*if( !camposCorrectos.idRol ||                                                                                       //
            !camposCorrectos.nombresUsuario || !camposCorrectos.apellidosUsuario ||                                         //
            !camposCorrectos.usuario || !camposCorrectos.password || !camposCorrectos.email )                               //
        {//si existe algun campo que NO este correcto, se evaluara donde mostrar el mensaje de "Campo Obligatorio"          //
            testcamposBool(camposCorrectos);    //se testea que cada campo/input contenga un dato correcto                  //
        }//si todos los campos tienen datos ingresados correctamente, se hace la INSERCION                                  //
        else {//Se envian los datos del formulario y se espera una INSERCION exitosa o un ERROR de INSERCION                                                                                                              //*/
            var datos = $(this).serializeArray();   //asigna a la variable el valor de los valores ingresados en los inputs del formulario con id=login-admin
            
            $.ajax({
                type: $(this).attr('method'),   //TIPO DE REQUEST: se lee el metodo del formuario con id=login-admin
                data: datos,                    //se indica los datos que se quieren enviar a ajax
                url: $(this).attr('action'),   //a donde se van a enviar, en este caso, se indica lo que indica action
                //dataType: 'text',               //se indica el tipo de datos. No se utilizará ya que daba errores
                success: function(data) {       //cuando la llamada sea exitosa, el archivo definido en action devuelve TRUE o FALSE
                    
                    if( data == true) {     //Mostrará notificacion de INSERCION EXITOSA
                        Swal.fire({
                            //title: '¡BIENVENIDO!',
                            //text:'Iniciaste sesión con ÉXITO',
                            icon: 'success',            //muestra animacion de tilde
                            showConfirmButton: false,   //NO muestra boton de confirmar
                            timer: 3000,                //tiempo que permanece visible la notificación
                            html: '<p class="sweetalert2-html-wellcomeText">¡Operacion EXITOSA!</p> <p class="sweetalert2-html-actionText">Creaste un nuevo producto</p>',
                            //La propiedad html reemplaza a las propiedades: title y text
                            //Las clases están definidas en el archivo admin/css/admin.css
                        });
    
                        //Redirigir al archivo admin-area.php
                        setTimeout( function() {
                            window.location.href = 'crear-producto.php'; //luego de redirigir, se actualiza
                        }, 3000);// Se esperará cierto tiempo antes de ejecutarse
    
    
                    } else {        ////Mostrará notificacion de OPERACION FALLIDA
                        Swal.fire({
                            icon: 'error',            //muestra animacion de tilde
                            showConfirmButton: false,   //NO muestra boton de confirmar
                            timer: 2000,                //tiempo que permanece visible la notificación
                            html: '<p class="sweetalert2-html-errorText">¡ERROR!</p> <p class="sweetalert2-html-actionText">NO se pudo realizar la operación</p>',
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

        //}// FIN if-else                                                                                                                   //
    })                                                                                                                      //
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*
    function testcamposBool(camposBool) {
        if( !mensaje_activo )      //camposCorrectos[nombresUsuario]
        {   // Si el mensaje "Dato Obligatorio" NO esta visible, entonces...
            if(!camposCorrectos.idRol)
            {   //el dato en el campo NO es correcto
                mostrarError('idRol');     //se muestra "Dato Obligatorio" en campo correspondiente
            }
            if(!camposCorrectos.nombresUsuario)
            {   //el dato en el campo NO es correcto
                mostrarError('nombresUsuario');     //se muestra "Dato Obligatorio" en campo correspondiente
            }
            if(!camposCorrectos.apellidosUsuario)                     
            {   //el dato en el campo NO es correcto
                mostrarError('apellidosUsuario');     //se muestra "Dato Obligatorio" en campo correspondiente
            }
            if(!camposCorrectos.usuario)                     
            {   //el dato en el campo NO es correcto
                mostrarError('usuario');     //se muestra "Dato Obligatorio" en campo correspondiente
            }
            if(!camposCorrectos.password)                    
            {   //el dato en el campo NO es correcto
                mostrarError('password');     //se muestra "Dato Obligatorio" en campo correspondiente
            }
            if(!camposCorrectos.email)                     
            {   //el dato en el campo NO es correcto
                mostrarError('email');     //se muestra "Dato Obligatorio" en campo correspondiente
            }
            //return;
        }// FIN if(!mensaje_activo)
    }*/
    /*
    function mostrarError(field) {
        const error = document.createElement('small');  //crea un parrafo (contendra el mensaje de error)
        const div_padre = document.getElementById(`mensaje-error_${field}`);
        
        error.textContent = 'Este campo es obligatorio';
        error.classList.add('error');               //se le asigna una clase para darle estilo CSS
        div_padre.classList.add('aparece');               //se le asigna una clase para darle estilo CSS
        div_padre.appendChild(error);             /*se lo agrega como hijo. El padre seria el div contenedor
                                                        del campo con id=idRol*/
    /*    mensaje_activo = true;      //se indica que el mensaje "Campo Obligatorio" está visible
        
        // Timer
        setTimeout(() => {      //pasado los milisegundos establecidos, se elimina el parrafo creado
            div_padre.classList.remove('aparece');
            div_padre.classList.add('no-visible');
            error.remove();     //se elimina el mensaje "Campo Obligatorio"
     
            mensaje_activo=false;   //se indica que el mensaje "Campo Obligatorio" NO está visible
        }, 3000);
    
    }// FIN mostrarError()*/
    
    });// ./$('document')
    