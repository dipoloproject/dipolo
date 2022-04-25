
  @include ('templates/header')
  @include ('templates/barra')
  @include ('templates/navegacion')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <h1>
            Crear Producto
            <small>Completa el formulario para crear un producto</small>
            </h1>
    </section>

    <div class="row">
            <div class="col-md-12">
                <!-- Main content -->
                <section class="content">
                        <!-- Default box -->
                        <div class="box box-success">
                            <!-- <div class="box-header with-border">
                            <h3 class="box-title">Formulario para la Creación de un Producto</h3>
                            </div> -->
                            <div class="box-body">
                                    <!-- form start -->
                                    <form role="form" name="form_crear-producto" id="form_crear-producto" method="post" action="{{route('productos.alta')}}"> <!--  enctype="multipart/form-data" -->
                                        <!-- Token de seguridad exigido por laravel -->
                                        @csrf
                                        <!-- FIN token -->
                                        <div class="box-body"><!-- contenedor de ambas columnas del formulario -->
                                                <div class="col-md-6 box-body"><!-- 1ra columna del formulario -->
                                                    <div class="form-group" id="div_idMarca">
                                                            <label for="idMarca" >Marca (QUITAR SELECTED)<span id="mensaje-error_idMarca" ></span></label>
                                                            <select class="form-control" name="idMarca" id="idMarca" >
                                                                <option value="" disabled>--Seleccionar Marca--</option><!-- opcion creada solo para visualizacion, su seleccion NO es valida -->
                                                                <option value="1" selected>Logitech</option>
                                                                <option value="2">Redragon</option>
                                                                <option value="3">EusoCase</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group" id="div_idModelo">
                                                            <label for="idMarca" >Modelo (QUITAR SELECTED)<span id="mensaje-error_idMarca" ></span></label>
                                                            <select class="form-control" name="idModelo" id="idModelo" >
                                                                <option value=""  disabled>--Seleccionar Modelo--</option><!-- opcion creada solo para visualizacion, su seleccion NO es valida -->
                                                                <option value="1" selected>modelo 1</option>
                                                                <option value="2">modelo 2</option>
                                                                <option value="3">modelo 3</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group" id="div_idRubro">
                                                            <label for="idMarca" >Rubro<span id="mensaje-error_idRubro" ></span></label>
                                                            <select class="form-control" name="idRubro" id="idRubro" required>
                                                            <option value="" selected disabled>--Seleccionar--</option>--><!-- opcion creada solo para visualizacion, su seleccion NO es valida -->
                                                                <?php mostrararbol(); ?><!-- mostrará los Rubros/Subrubros en estructura de árbol -->
                                                            </select>
                                                    </div>
                                                    <!-- <div class="form-group" id="div_idSubrubro">
                                                            <label for="idMarca" >Subrubro <<< <span id="mensaje-error_idSubrubro" ></span></label>
                                                            <select class="form-control" name="idSubrubro" id="idSubrubro" >
                                                                <option value="" selected disabled>--Seleccionar Subrubro--</option>
                                                                <option value="4">subrubro 4</option>
                                                                <option value="5">subrubro 5</option>
                                                                <option value="6">subrubro 6</option>
                                                            </select>
                                                    </div> -->
                                                    <div class="form-group">
                                                            <label for="nombreProducto">Nombre</label>
                                                            <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="Ingresar Nombre del Producto"
                                                                   required>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                            <label for="origen">Origen</label>
                                                            <input type="text" class="form-control" id="origen" name="origen" placeholder="Ingresar origen del producto">
                                                    </div> -->
                                                    <div class="form-group" id="div_origenProducto">
                                                        <label for="origenProducto" >Origen<span id="mensaje-error_origenProducto" ></span></label>
                                                        <select class="form-control" name="origenProducto" id="origenProducto" >
                                                                <option value="China" selected>China</option>
                                                                <option value="Taiwan">Taiwan</option>
                                                                <option value="Brasil">Brasil</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="codigoProducto">Codigo</label>
                                                            <input type="text" class="form-control" id="codigoProducto" name="codigoProducto"placeholder="Ingresar codigo"
                                                                   required>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                            <label for="condicion">Condicion</label>
                                                            <input type="text" class="form-control" id="condicion" name="condicion"placeholder="Ingresar condicion">
                                                    </div> -->
                                                    <div class="form-group" id="div_condicionProducto">
                                                        <label for="condicionProducto" >Condicion<span id="mensaje-error_condicionProducto" ></span></label>
                                                        <select class="form-control" name="condicionProducto" id="condicionProducto" >
                                                                <option value="N" selected>Nuevo</option>
                                                                <option value="U">Usado</option>
                                                        </select>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                            <label for="estadoProducto">Estado <<< </label>
                                                            <input type="text" class="form-control" id="estadoProducto" name="estadoProducto" placeholder="Ingresar estado del Producto">
                                                    </div> -->

                                                    <div class="form-group" id="div_estadoProducto">
                                                        <label for="estadoProducto" >Estado<span id="mensaje-error_estadoProducto" ></span></label>
                                                        <select class="form-control" name="estadoProducto" id="estadoProducto" >
                                                                <option value="A" selected>Activo</option>
                                                                <option value="I">Inactivo</option>
                                                        </select>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                            <label for="imagenProducto">Imagen del Producto</label>
                                                            <input type="file" id="imagenProducto[]" name="imagenProducto[]" multiple accept="image/*">

                                                            <p class="help-block">Example block-level help text here.</p>
                                                    </div> -->
                                                </div><!-- FIN 1ra columna del formulario -->
                                                
                                                <div class="col-md-6 box-body"><!-- 2da columna del formulario -->
                                                    
                                                        <div class="form-group">
                                                                <label for="descripcionProducto">Descripción</label>
                                                                <input type="text" class="form-control" id="descripcionProducto" name="descripcionProducto"placeholder="Ingresar Descripción">
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="precioTachadoProducto">Precio Tachado</label>
                                                                <input type="text" class="form-control" id="precioTachadoProducto" name="precioTachadoProducto" placeholder="Ingresar precio tachado del Producto">
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="precioListaProducto">Precio de Lista</label>
                                                                <input type="text" class="form-control" id="precioListaProducto" name="precioListaProducto" placeholder="Ingresar precio de lista del Producto">
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="rubroProducto">Precio de Venta</label>
                                                                <input type="text"  class="form-control" id="precioVentaProducto" name="precioVentaProducto" placeholder="Ingresar precio de venta del Producto">
                                                        </div>
                                                    
                                                    <!-- <div class="form-group">
                                                            <label for="destacadoProducto">Es destacado <<< </label>
                                                            <input type="text" class="form-control" id="destacadoProducto" name="destacadoProducto" placeholder="Ingresar Nombre del Producto">
                                                    </div> -->
                                                    <div class="form-group" id="div_destacadoProducto">
                                                        <label for="destacadoProducto" >Es destacado<span id="mensaje-error_destacadoProducto" ></span></label>
                                                        <select class="form-control" name="destacadoProducto" id="destacadoProducto" >
                                                                <option value="S" selected>Si</option>
                                                                <option value="N">No</option>
                                                                
                                                        </select>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                            <label for="ordenProducto">Orden</label>
                                                            <input type="text" class="form-control" id="ordenProducto" name="ordenProducto"placeholder="Ingresar Descripción">
                                                    </div> -->
                                                    <div class="form-group">
                                                            <label for="vistasProducto">Vistas</label>
                                                            <input type="text" class="form-control" id="vistasProducto" name="vistasProducto" placeholder="Ingresar vistas del Producto">
                                                    </div>
                                                    <!-- <div class="form-group">
                                                            <label for="stockProducto">Stock <<< </label>
                                                            <input type="text" class="form-control" id="stockProducto" name="stockProducto" placeholder="Ingresar stock del Producto">
                                                    </div> -->
                                                </div><!-- FIN 2da columna del formulario -->
                                        </div><!-- contenedor de ambas columnas del formulario -->
                                        
                                        <div class="box-footer">
                                                <button type="submit" class="btn btn-primary">Crear Producto</button>
                                                <input type="hidden" name="button-action-producto" value="crear"><!-- $_POST['crear-producto] indicara en el archivo de action si éste fue presionado-->
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
    showAlert_rubros( session('creacion_producto') );    // funcion declarada y definida en app/Helpers/Helpers.php
?>



<script>

</script>
