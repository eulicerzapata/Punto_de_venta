<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"><?php echo $titulo; ?></h2>
            <?php \Config\Services::validation()->listErrors(); ?>
            <form method="POST" action="<?php echo base_url(); ?>/clientes/actualizar" autocomplete="off">
                <php csrf_field(); ?>


                    <input type="hidden" id="id" name="id" value="<?php echo $cliente['id']; ?> " />


                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <label>nombre</label>
                                <input class="form-control" id="nombre" name="nombre" type="text"
                                 value="<?php echo $cliente['nombre']; ?> " autofocus required>
                            </div>

                            <div class="col-12 col-sm-6 mb-3">
                                <label>direccion </label>
                                <input class="form-control" id="direccion" name="direccion" type="text"
                                 value="<?php echo $cliente['direccion']; ?> " autofocus required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                                <label>telefono </label>
                                <input class="form-control" id="telefono" name="telefono" type="text"
                                 value="<?php echo $cliente['telefono']; ?> " autofocus required>
                            </div>

                            <div class="col-12 col-sm-6 mb-3">
                                <label>correo </label>
                                <input class="form-control" id="correo" name="correo" type="text"
                                 value="<?php echo $cliente['correo']; ?> " autofocus required>
                            </div>

                        </div>
                    </div>


            


                    <div class="mb-3">
                        <a href="<?php echo base_url(); ?>clientes" class="btn btn-primary">Regresar</a>
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