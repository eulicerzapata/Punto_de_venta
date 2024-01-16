<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"><?php echo $titulo; ?></h2>
           
            <form method="POST" action="<?php echo base_url(); ?>/productos/actualizar" autocomplete="off">
                


                    <input type="hidden" id="id" name="id" value="<?php echo $producto['id']; ?> " />


                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <label>Código</label>
                                <input class="form-control" id="codigo" name="codigo" type="text"
                                 value="<?php echo $producto['codigo']; ?> " autofocus required>
                            </div>

                            <div class="col-12 col-sm-6 mb-3">
                                <label>Nombre </label>
                                <input class="form-control" id="nombre" name="nombre" type="text"
                                 value="<?php echo $producto['nombre']; ?> " autofocus required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <label>Unidad</label>
                                <select class="form-control" id="id_unidad" name="id_unidad" required>
                                    <!-- Opciones de la lista desplegable -->
                                    <option value="">--Seleccione unidad--</option>
                                    <?php foreach ($unidades as $unidad) { ?>
                                        <option value="<?php echo $unidad['id']; ?>"
                                         <?php if($unidad['id']== $producto['id_unidad']) {
                                            echo 'selected'; } ?>>
                                          
                                            <?php echo $unidad['nombre']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 mb-3">
                                <label>Categoria</label>
                                <select class="form-control" id="id_categoria" name="id_categoria" required>
                                    <!-- Opciones de la lista desplegable -->
                                    <option value="">--Seleccione categoria--</option>
                                    <?php foreach ($categorias as $categoria) { ?>
                                        <option value="<?php echo $categoria['id']; ?>"
                                        <?php if($categoria['id']== $producto['id_categoria']) {
                                            echo 'selected'; } ?>>
                                        
                                            <?php echo $categoria['nombre']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <label>Precio compra</label>
                                <input class="form-control" id="precio_compra" name="precio_compra"
                                 type="text" value="<?php echo $producto['precio_compra']; ?> " autofocus required>
                            </div>

                            <div class="col-12 col-sm-6 mb-3">
                                <label>Precio venta </label>
                                <input class="form-control" id="precio_venta" name="precio_venta"
                                 type="text" value="<?php echo $producto['precio_venta']; ?> " autofocus required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <label>stock minimo</label>
                                <input class="form-control" id="stock_minimo" name="stock_minimo"
                                 type="text" value="<?php echo $producto['stock_minimo']; ?> " autofocus required>
                            </div>

                            <div class="col-12 col-sm-6 mb-3">
                                <label>Es inventariable? </label>
                                <select id="inventariable" name="inventariable" class="form-control">
                                    <option value=" ">--Seleccione--</option>
                                    
                                    <option value="1"  
                                    <?php if($producto['inventariable']==1) {
                                            echo 'selected'; } ?>>
                                         Si</option>

                                    <option value="0" <?php if($producto['inventariable']==0) {
                                            echo 'selected'; } ?> >
                                        No</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <label>Existencias</label>
                                <input class="form-control" id="existencias" name="existencias" type="text"
                                 value="<?php echo $producto['existencias']; ?> " autofocus required>

                            </div>
                        </div>
                    </div>




                    <div class="mb-3">
                        <a href="<?php echo base_url(); ?>productos" class="btn btn-primary">Regresar</a>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
            </form>
        </div>


    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    </body>

    </html>