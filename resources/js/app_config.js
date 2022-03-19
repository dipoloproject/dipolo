$(document).ready(function () {
    $('.sidebar-menu').tree()

    $('#registros').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'pageLength'  : 10,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,

      'ordering'   : false,             //se deshabilita el ordenamiento 
      //"order"       : [[0, "desc"]],  //se indica la columna sobre la cual se ordenan las filas 

      'language'   :  {
                        paginate: {
                                    next : 'Siguiente',
                                    previous: 'Anterior',
                                    last: 'Último',
                                    first: 'Primero'
                                  },
                        info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
                        emptyTable: 'No hay registros', 
                        infoEmpty: '0 registros', 
                        search: 'Buscar:'
                      }
    });
  
  })