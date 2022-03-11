
const formulario = document.querySelector('#crear-usuario')     //seleccion del formulario con id=crear-usuario del archivo crear-usuario.php
const campo_idRol = document.querySelector('#crear-usuario_idRol');     //seleccion del div contenedor que sera padre del mensaje de error

//Se define un objeto donde cada elemento correspondera a un campo a completar
const userFields = {    //las keys del objeto tienen que coincidir con los id´s de los inputs/selects del formulario
    idRol: '',
    nombresUsuario: ''
} 

//Campos a llenar del formulario
const idRolField = document.querySelector('#idRol');
const nombresUsuarioField = document.querySelector('#nombresUsuario');

//Se caputa lo que se ingrese en cada campo y se lo guarda dentro del objeto userFields en el elemento que corresponda
idRolField.addEventListener('input', leerTexto);
nombresUsuarioField.addEventListener('input', leerTexto);

function leerTexto(e) { userFields[e.target.id] = e.target.value; }



//Cada vez que se presiona el input de tipo submit del formulario seleccionado...
formulario.addEventListener('submit', function(e) {
    e.preventDefault();     //se evita que redireccione a otra pagina o archivo

    const {idRol, nombresUsuario} = userFields;     /*todo lo que se haya ingresado en los campos del formulario seleciconado
                                                        se mapearán en las variables qeu se definan */

    if( idRol === '' ) {    //se evalua lo que haya en el campo id=idRol
        mostrarError('El Rol es obligatorio');
        return;
    }

})

function mostrarError(mensaje) {
    const error = document.createElement('p');  //crea un parrafo (contendra el mensaje de error)
    error.textContent = mensaje;                //se le asigna un contenido al parrafo
    error.classList.add('error');               //se le asigna una clase para darle estilo CSS

    campo_idRol.appendChild(error);             /*se lo agrega como hijo. El padre seria el div contenedor
                                                    del campo con id=idRol*/
    // Timer
    setTimeout(() => {      //pasado los milisegundos establecidos, se elimina el parrafo creado
        error.remove();
    }, 3000);

}


