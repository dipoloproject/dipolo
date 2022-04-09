
$(document).ready(function() {
    const formulario = document.getElementById('form_crear-rubro');
    const inputs = document.querySelectorAll('#form_crear-rubro .form-control');   /*se guardan todos los campos con
                                                                                    class= form-control del formulario
                                                                                    con id= form_crear-rubro en el array inputs*/
    console.log("El codigo JavaScript carga CORRECTAMENTE");    // Mensaje de guia para saber que el script carga correctamente

    // Expresiones Regulares    //////////////////////////////////////////////////////////////////////
        const expresionesRegulares = {                                                              //
            alfanumerico: /^[a-zA-Z0-9\_\-]{1,16}$/, // Letras, numeros, guion y guion_bajo         //
            alfabetico: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.       //
            alfabetico_beta: /^[.a-zA-ZÀ-ÿ0-9\s\-]+|(^$)/, // Letras y espacios, pueden llevar acentos.     //
            password: /^.{4,12}$/, // 4 a 12 digitos.  MODIFICAR                                    //
            email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,                              //
            numerico: /^[0-9]+$/, // 1 a 14 numeros. // /^\d{1,14}$/                                 //
            //trash_field: /^[.\s]*$/, // Letras y espacios, pueden llevar acentos.
            empty_field: /^[\s]+|(^$)/, // Espacio y campo vacio.
        }                                                                                           //
        /*alfabeto_vacio: permite letras y numeros, NO permite espacio/s o campo vacio*/
        /*numerico: permite numeros, NO permite espacio/s o campo vacio*/
    //////////////////////////////////////////////////////////////////////////////////////////////////
        
    //  Variable que controlará que se hayan ingresado datos
    var camposCompletados = {
        nombreRubro: false,
        //descripcionRubro: false, 
        ordenRubro: false
    }    
    
    //  Variable que controlará que los campos ingresados sean válidos
    var camposValidos = {
        nombreRubro: false,
        //descripcionRubro: false, 
        ordenRubro: false
    }
                
    ////////////////////    Funcion 2  /////////////////////////////////////////////////////////////////////
    /*Esta funcion evalua el tipo de input y segun eso se evaluara      ////////////////////////////////////
    que cumpla con la expresion regular que corresponda*/                                                // 
    const validarFormulario = (e)=>{                                                                      //
        switch (e.target.name) {                                                                          //
            case "nombreRubro":                                                                        //
                validarCampo(expresionesRegulares.alfabetico_beta, e.target.value, 'nombreRubro');          //
                campoVacio(expresionesRegulares.empty_field, e.target.value, 'nombreRubro');
                break;                                                                                    //
            case "ordenRubro":                                                                               //
                validarCampo(expresionesRegulares.numerico, e.target.value, 'ordenRubro');               //
                //campoVacio(expresionesRegulares.trash_field, e.target.value, 'ordenRubro');
                break;                                                                                    //
        }                                                                                                 //
    }                                                                                                     //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
        
    ////////////////////    Funcion 1   //////////////////////////////////////////////////
    /* A cada campo (input) del formulario se le aplica la funcion validarFormulario    //
    cada vez que se escriba dentro del campo o cuando se hace click fuera de él */      //
    inputs.forEach( (input)=>{                                                          //
        input.addEventListener('keyup', validarFormulario);                             //
        //input.addEventListener('blur', validarFormulario);                            //
    });                                                                                 //
    //////////////////////////////////////////////////////////////////////////////////////
        
    ////////////////////    Funciones 3   ////////////////////////////////////////////////////////////////////
    /*  Evalua que el campo ingresado no contenga simbolos extraños o sea un campo vacio */
    const validarCampo = (tipo_expresionReg, inputValue, campo)=>{                                                                      //
        if( tipo_expresionReg.test( inputValue ) ) {                                                                                    //
            //document.getElementById(`div_${campo}`).classList.remove('has-error');//se quita el color rojo al input y al field          //
            //document.getElementById(`${campo}`).classList.remove('textField_incorrecto');//se quita el color rojo al texto en el input  //
            camposValidos[campo] = true;                                                                                              //
        } else {                                                                                                                        //
            //document.getElementById(`div_${campo}`).classList.add('has-error');//se agrega el color rojo al input y al field            //
            //document.getElementById(`${campo}`).classList.add('textField_incorrecto');//se agrega el color rojo al texto en el input    //
            camposValidos[campo] = false;                                                                                             //
        }                                                                                                                               //
    }
    /*  Evalua que el campo ingresado no contenga SOLAMENTE espacios */
    const campoVacio = (tipo_expresionReg, inputValue, campo)=>{                                                                      //
        if( tipo_expresionReg.test( inputValue ) ) {                                                                                    //
            //document.getElementById(`div_${campo}`).classList.remove('has-error');//se quita el color rojo al input y al field          //
            //document.getElementById(`${campo}`).classList.remove('textField_incorrecto');//se quita el color rojo al texto en el input  //
            camposCompletados[campo] = false;                                                                                              //
        } else {                                                                                                                        //
            //document.getElementById(`div_${campo}`).classList.add('has-error');//se agrega el color rojo al input y al field            //
            //document.getElementById(`${campo}`).classList.add('textField_incorrecto');//se agrega el color rojo al texto en el input    //
            camposCompletados[campo] = true;                                                                                             //
        }                                                                                                                               //
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    var mensaje_invalido_activo = false;     /*  variable global que indica que el
                                        mensaje "Campo obligatorio" esta o no visible    */
    var mensaje_incompleto_activo = false;
    //console.log(mensaje_activo);
    
    /*  Esto se ejecuta al hacer CLICK el boton Crear Rubro   */
    $('#form_crear-rubro').on('submit', function(e) {                                                                            //
        e.preventDefault();
                                                                                                        //
        if( !camposValidos.nombreRubro || !camposValidos.ordenRubro )                               //
        {//si existe algun campo que NO este correcto, se evaluara donde mostrar el mensaje de "Campo Obligatorio"          //
            testCamposValidos(camposValidos);    //se testea que cada campo/input contenga un dato correcto                  //
        }//si todos los campos tienen datos ingresados correctamente, se hace la INSERCION                                  //
        if( !camposCompletados.nombreRubro || !camposCompletados.ordenRubro )                               //
        {//si existe algun campo que NO este correcto, se evaluara donde mostrar el mensaje de "Campo Obligatorio"          //
            testCamposCompletados(camposCompletados);    //se testea que cada campo/input contenga un dato correcto                  //
        }//si todos los campos tienen datos ingresados correctamente, se hace la INSERCION                                  //
        else {//Se envian los datos del formulario y se espera una INSERCION exitosa o un ERROR de INSERCION                                                                                                              //
            this.submit();
        }// FIN if-else                                                                                                                   //
    })                                                                                                                      //
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    function testCamposValidos(camposBool) {
        if( !mensaje_invalido_activo )      //camposCorrectos[nombresUsuario]
        {   // Si el mensaje "Dato Obligatorio" NO esta visible, entonces...
            if(!camposValidos.nombreRubro)
            {   //el dato en el campo NO es correcto
                mostrarInvalidoError('nombreRubro');     //se muestra "Dato Obligatorio" en campo correspondiente
            }
            if(!camposValidos.ordenRubro)                     
            {   //el dato en el campo NO es correcto
                mostrarInvalidoError('ordenRubro');     //se muestra "Dato Obligatorio" en campo correspondiente
            }
        }
    }

    function testCamposCompletados(camposBool) {
        if( !mensaje_incompleto_activo )      //camposCorrectos[nombresUsuario]
        {   // Si el mensaje "Dato Obligatorio" NO esta visible, entonces...
            if(!camposCompletados.nombreRubro)
            {   //el dato en el campo NO es correcto
                mostrarIncompletoError('nombreRubro');     //se muestra "Dato Obligatorio" en campo correspondiente
            }
            if(!camposCompletados.ordenRubro)                     
            {   //el dato en el campo NO es correcto
                mostrarIncompletoError('ordenRubro');     //se muestra "Dato Obligatorio" en campo correspondiente
            }
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////
        
    function mostrarInvalidoError(field) {
        const error = document.createElement('small');  //crea un parrafo (contendra el mensaje de error)
        const div_padre = document.getElementById(`mensaje-error_${field}`);
        
        error.textContent = 'Dato inválido';
        error.classList.add('error');               //se le asigna una clase para darle estilo CSS
        div_padre.classList.add('aparece');               //se le asigna una clase para darle estilo CSS
        div_padre.appendChild(error);             /*se lo agrega como hijo. El padre seria el div contenedor
                                                        del campo con id=idRol*/
        mensaje_invalido_activo = true;      //se indica que el mensaje "Campo Obligatorio" está visible
        
        // Timer
        setTimeout(() => {      //pasado los milisegundos establecidos, se elimina el parrafo creado
            div_padre.classList.remove('aparece');
            div_padre.classList.add('no-visible');
            error.remove();     //se elimina el mensaje "Campo Obligatorio"
        
            mensaje_invalido_activo=false;   //se indica que el mensaje "Campo Obligatorio" NO está visible
        }, 2000);
    
    }// FIN mostrarInvalidoError()*/
        
    function mostrarIncompletoError(field) {
        const error = document.createElement('small');  //crea un parrafo (contendra el mensaje de error)
        const div_padre = document.getElementById(`mensaje-error_${field}`);
        
        error.textContent = 'Campo obligatorio';
        error.classList.add('error');               //se le asigna una clase para darle estilo CSS
        div_padre.classList.add('aparece');               //se le asigna una clase para darle estilo CSS
        div_padre.appendChild(error);             /*se lo agrega como hijo. El padre seria el div contenedor
                                                        del campo con id=idRol*/
        mensaje_incompleto_activo = true;      //se indica que el mensaje "Campo Obligatorio" está visible
        
        // Timer
        setTimeout(() => {      //pasado los milisegundos establecidos, se elimina el parrafo creado
            div_padre.classList.remove('aparece');
            div_padre.classList.add('no-visible');
            error.remove();     //se elimina el mensaje "Campo Obligatorio"
        
            mensaje_incompleto_activo=false;   //se indica que el mensaje "Campo Obligatorio" NO está visible
        }, 2000);
    
    }// FIN mostrarIncompletoError()*/

});// ./$('document')
        


