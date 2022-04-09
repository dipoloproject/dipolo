<?php

//echo ($rubros);
/*echo ("<pre>");
var_dump($rubros);
//echo ($rubros);
echo ("</pre>");
exit;*/
/*
foreach($rubros as $rubro) {
    echo $rubro->nombreRubro;
}*/

//exit;

?>

@include ('templates/header')
@include ('templates/barra')
@include ('templates/navegacion')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Subrubros
        <!-- <small></small> -->
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div> <!-- class="box-header"-->
              <!-- <h3 class="box-title">Sección de administración de Productos</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Estado</th>
                  <!-- <th>Descripción</th> -->
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        /*try {

                          $productos = Producto::all(); //la variable guarda un arreglo de objetos (registros o filas del resultSet)


                            // $sql = "SELECT idCategoria, idProducto, nombreProducto, precio, peso, color, descripcion FROM Productos";
                            // $resultado = $db->query($sql);
                        } catch (Exception $e) {
                            $error = $e->getMessage();
                            echo $error;
                        }*/
                        //$rubros = Rubro::allTopLevel(); //la variable guarda un arreglo de objetos (registros o filas del resultSet)
                        //debuguear($productos);
                        foreach( $subrubros as $subrubro ): ?>
                                <tr>
                                    <td> <?php echo $subrubro->nombreRubro; ?> </td>

                                    <!-- Muesta Activo o Inactivo en VERDE o ROJO respectivamente -->
                                    <?php echo show_activo_inactivo($subrubro->estadoRubro); ?>

                                    <!-- Botones de ACCIONES: Crear Subrubro/Ver Subrubros/Editar/Eliminar -->
                                    <td>
                                      <div class="box-create-info-edit-delete">
                                        <div>
                                            <a  href="{{route('rubros.crear', $subrubro->idRubro)}}" 
                                                class="btn btn-xs bg-green margin"
                                                title="Crear subrubro">
                                                    <i class="fa fa-sitemap" ></i>
                                            </a>
                                        </div>
                                        <div>
                                            <a  href="{{route('rubros.subrubros', $subrubro->idRubro)}}" 
                                                class="btn btn-xs bg-orange margin"
                                                title="Subrubros">
                                                    <i class="fa fa-info-circle" ></i>
                                            </a>
                                        </div>
                                        <div>
                                            <a  href="{{route('rubros.actualizar', $subrubro->idRubro)}}" 
                                                class="btn btn-xs bg-blue margin"
                                                title="Editar">
                                                    <i class="fa fa-pencil" ></i>
                                            </a>
                                        </div>
                                        <div>
                                            <form action="{{route('rubros.eliminar', $subrubro->idRubro)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-xs bg-red margin borrar-registro" title="Eliminar">
                                                    <i class="fa fa-trash" ></i>
                                                </button>
                                            </form>
                                        </div>
                                      </div>
                                    </td>
                                </tr>
                        <?php endforeach; ?>

                
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->

  
  
  @include ('templates/footer')
  
  <?php 
    //  Se muestra un mensaje de alerta al redireccionar a esta vista (luego de crear un rubro)
      showAlert_rubros( session('creacion_rubro') );    // funcion declarada y definida en app/Helpers/Helpers.php
  ?>
  

