
  @include ('templates/header')
  @include ('templates/barra')
  @include ('templates/navegacion')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
            <h1>
            Crear Rubro
            <small>Completa el formulario para crear el rubro</small>
            </h1>
      </section>

      <div class="row">
            <div class="col-md-12">
                  <!-- Main content -->
                  <section class="content">
                        <!-- Default box -->
                        <div class="box box-danger">
                              <!-- <div class="box-header with-border">
                              <h3 class="box-title">Formulario para la Creación de un Producto</h3>
                              </div> -->
                                <div class="box-body">       
                                    <!-- form start -->
                                    <form role="form" name="form_crear-rubro" id="form_crear-rubro" method="post" action="{{route('rubros.alta')}}"> <!--  enctype="multipart/form-data" -->
                                        <!-- Token de seguridad exigido por laravel -->
                                            @csrf
                                        <!-- FIN token -->
                                        <div class="box-body"><!-- contenedor de ambas columnas del formulario -->
                                            <div class="col-md-6 box-body"><!-- 1ra columna del formulario -->
                                                    <!-- <div class="form-group" id="div_idRubroPadre">
                                                        <label for="idRubroPadre" >Rubro Padre</label><small class="pull-right" > (El rubro a crear será hijo del rubro padre)</small>
                                                        <select class="form-control" name="idRubroPadre" id="idRubroPadre" >
                                                        <option value="" selected disabled>--Seleccionar--</option>--><!-- opcion creada solo para visualizacion, su seleccion NO es valida -->
                                                                <!--<?php mostrararbol(); ?>
                                                        </select>
                                                    </div> -->
                                                    
                                                    <div><!-- Contiene el identificador del Rubro que será el padre -->
                                                        <input type="hidden" name="idRubroPadre" value="{{$idRubroPadre}}">
                                                    </div>

                                                    <div class="form-group" id="div_nombreRubro">
                                                        <label for="nombreRubro">Nombre</label>&nbsp;&nbsp;<b class="pull-right" id="mensaje-error_nombreRubro" ></b>
                                                        <input  type="text" class="form-control" id="nombreRubro" name="nombreRubro" placeholder="Ingresar Nombre del Rubro"
                                                                value="{{old('nombreRubro')}}"
                                                                required>
                                                    </div>
                                                    <div class="form-group" id="div_descripcionRubro">
                                                        <label for="descripcionRubro">Descripcion<span id="mensaje-error_descripcionRubro" ></span></label>
                                                        <input  type="text" class="form-control" id="descripcionRubro" name="descripcionRubro" placeholder="Ingresar una descripcion"
                                                        value="{{old('descripcionRubro')}}">
                                                    </div>
                                                    <div class="form-group" id="div_ordenRubro">
                                                        <label for="ordenRubro">Orden</label>&nbsp;&nbsp;<b class="pull-right" id="mensaje-error_ordenRubro" ></b>
                                                        <input  type="number" class="form-control" id="ordenRubro" name="ordenRubro"placeholder="Ingresar orden del rubro"
                                                        value="{{old('ordenRubro')}}"
                                                        required>
                                                        <small class="pull-right" >(Posición asignada en el menu desplegable)</small>
                                                    </div>
                                                    <div class="form-group" id="div_destacadoRubro">
                                                        <label for="destacadoRubro" >Es destacado<span id="mensaje-error_destacadoRubro" ></span></label>
                                                        <select class="form-control" name="destacadoRubro" id="destacadoRubro" >
                                                                <option value="S">Si</option>
                                                                <option value="N">No</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_menuRubro">
                                                        <label for="menuRubro" >Visible en barra de Menu<span id="mensaje-error_menuRubro" ></span></label>
                                                        <select class="form-control" name="menuRubro" id="menuRubro" >
                                                                <option value="S">Si</option>
                                                                <option value="N">No</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" id="div_estadoRubro">
                                                        <label for="estadoRubro" >Estado<span id="mensaje-error_estadoRubro" ></span></label>
                                                        <select class="form-control" name="estadoRubro" id="estadoRubro" >
                                                                <option value="A">Activo</option>
                                                                <option value="I">Inactivo</option>
                                                        </select>
                                                    </div>
                                            </div><!-- FIN 1ra columna del formulario -->
                                            
                                        </div><!-- contenedor de ambas columnas del formulario -->
                                          
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Crear Rubro</button>
                                            <input type="hidden" name="button-action-rubro" value="crear"><!-- $_POST['crear-producto] indicara en el archivo de action si éste fue presionado-->
                                        </div>
                                    </form>
                                </div> <!-- /.box-body -->

                        </div> <!-- /.box box-primary -->

                  </section> <!-- /.content -->
            </div><!-- /.col-md-12 -->

      </div><!-- /.row -->

</div>
<!-- /.content-wrapper -->

  @include ('templates/footer')


  <?php 
    //  Se muestra un mensaje de alerta luego de enviar el formulario (al intentar crear un rubro)
      showAlert_rubros( session('creacion_rubro') );    // funcion declarada y definida en app/Helpers/Helpers.php
  ?>



<script>

</script>
