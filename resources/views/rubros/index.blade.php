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
        Listado de Rubros
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
                  <!-- <th>Precio</th> -->
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
                        foreach( $rubros as $rubro ):
                        
                            if($rubro->idRubroPadre == NULL): ?>
                                <tr>
                                    <td> <?php echo $rubro->nombreRubro; ?> </td>

                                    <!-- Botones de ACCIONES: Crear Subrubro/Ver Subrubros/Editar/Eliminar -->
                                    <td class="box-create-info-edit-delete">
                                        <a  href="#" 
                                            class="btn btn-xs bg-green btn-flat margin"
                                            title="Crear subrubro">
                                                <i class="fa fa-sitemap" ></i>
                                        </a>
                                        <a  href="lista-subrubros.php?id=<?php echo $rubro->idRubro; ?>" 
                                            class="btn btn-xs bg-orange btn-flat margin"
                                            title="Subrubros">
                                                <i class="fa fa-info-circle" ></i>
                                        </a>
                                        <a  href="{{route('rubros.actualizar', $rubro->idRubro)}}" 
                                            class="btn btn-xs bg-blue btn-flat margin"
                                            title="Editar">
                                                <i class="fa fa-pencil" ></i>
                                        </a>
                                        <a  href="#" data-id="<?php echo $rubro->idRubro; ?>" data-tipo="rubro" 
                                            class="btn btn-xs bg-red btn-flat margin borrar-registro"
                                            title="Eliminar">
                                                <i class="fa fa-trash" ></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php endif; ?>
                        
                        <?php endforeach; ?>

                
                </tbody>
                <tfoot>
                <tr>
                    <th>Nombre</th>
                    <!-- <th>Precio</th> -->
                    <!-- <th>Descripción</th> -->
                    <th>Acciones</th>
                </tr>
                </tfoot>
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
  @include ('rubros.alertas')
  

