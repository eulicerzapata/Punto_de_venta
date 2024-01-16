<?php
$id_compra = uniqid();
?>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">


            <form method="POST" action="<?php echo base_url(); ?>/compras/guarda" autocomplete="off">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-4 mb-3">
                            <input type="hidden" id="id_producto" name="id_producto" />
                            <label for="nombre">Codigo</label>

                            <input class="form-control" id="codigo" name="codigo" type="text" placeholder="Escribe el codigo y  enter" onkeyup="buscarProducto(event, this, this.value)" autofocus>
                            <label for="codigo" id="resultado_error" style="color: red"></label>
                        </div>

                        <div class="col-12 col-sm-4 mb-3">
                            <label for="nombre">Nombre del producto </label>
                            <input class="form-control" id="nombre" name="nombre" type="text" disabled>
                        </div>

                        <div class="col-12 col-sm-4 mb-3">
                            <label for="cantidad">Cantidad</label>
                            <input class="form-control" id="cantidad" name="cantidad" type="text" autofocus>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-4 mb-3">
                            <label for="precio_compra">Precio de compra</label>
                            <input class="form-control" id="precio_compra" name="precio_compra" type="text" disabled>
                        </div>

                        <div class="col-12 col-sm-4 mb-3">
                            <label for="Subtotal">Subtotal</label>
                            <input class="form-control" id="Subtotal" name="Subtotal" type="text" disabled>
                        </div>

                        <div class="col-12 col-sm-4 mb-3">
                            <label><br>&nbsp;</label>
                            <button id="agregar_producto" name="agregar_producto" type="button" 
                            class="btn btn-primary" onclick="agregarProducto(id_producto.value, cantidad.value,
                             '<?php echo $id_compra; ?>' )" 
                            >Agregar Producto</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <table id="tablaProductos" class="table table-hover 
                    table-striped table-sm table-responsive tablaProductos" width="100%">

                        <thead class="thead-dark">
                            <th>#</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th width="1%"></th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6 offset-md-6">
                        <label style="font-weight: bold; font-size: 30px; text-align:center;">
                            total $:</label>
                        <input type="text" id="total" name="total" size="7" readonly="true" value="0.00" style="font-weight: bold; font-size: 30px; text-align:center;" />
                        <button type="button" id="completa_compra" class="btn btn-success">Completar compra</button>
                    </div>
                </div>

            </form>
        </div>


    </main>

    <script>
        $(document).ready(function() {

        });

        function buscarProducto(e, tagCodigo, codigo) {
            var enterKey = 13;

            if (codigo != '') {
                if (e.which == enterKey) {
                    $.ajax({
                        url: '<?php echo base_url(); ?> productos/buscarPorCodigo/' + codigo,
                        dataType: 'json',
                        success: function(resultado) {
                            if (resultado == 0) {
                                $(tagCodigo).val('');
                            } else {
                                $(tagCodigo).removeClass('has-error');

                                $("#resultado_error").html(resultado.error);
                                if (resultado.existe) {
                                    $("#id_producto").val(resultado.datos.id);
                                    $("#nombre").val(resultado.datos.nombre);
                                    $("#cantidad").val(1);
                                    $("#precio_compra").val(resultado.datos.precio_compra);
                                    $("#Subtotal").val(resultado.datos.precio_compra);
                                    $("#cantidad").focus();
                                } else {
                                    $("#id_producto").val('');
                                    $("#nombre").val('');
                                    $("#cantidad").val('');
                                    $("#precio_compra").val('');
                                    $("#Subtotal").val('');

                                }
                            }
                        }
                    })
                }
            }
        }


        function agregarProducto(id_producto, cantidad, id_compra) {


            if (id_producto != null && id_producto !=0 && cantidad > 0) {
                $.ajax({
                    url: '<?php echo base_url(); ?>TemporalCompra/inserta/'+ id_producto + "/" +
                        cantidad + "/" + id_compra,

                    success: function(resultado) {
                        if (resultado == 0) {

                        } else {
                            /*

                            $("#resultado_error").html(resultado.error);

                            if (resultado.existe) {
                                $("#id_producto").val(resultado.datos.id);
                                $("#nombre").val(resultado.datos.nombre);
                                $("#cantidad").val(1);
                                $("#precio_compra").val(resultado.datos.precio_compra);
                                $("#Subtotal").val(resultado.datos.precio_compra);
                                $("#cantidad").focus();
                            } else {
                                $("#id_producto").val('');
                                $("#nombre").val('');
                                $("#cantidad").val('');
                                $("#precio_compra").val('');
                                $("#Subtotal").val('');

                            } */
                        }
                    }
                });
            }
        }

        

    </script>



    </body>

    </html>