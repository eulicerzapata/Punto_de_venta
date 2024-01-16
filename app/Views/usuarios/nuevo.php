<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"><?php echo $titulo; ?></h2>

            <?php if (isset($validation)) { ?>
                <div class='alert alert-danger'>
                <?php echo validation_list_errors(); ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/usuarios/insertar" autocomplete="off">
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="usuario">Usuario</label>
                            <input class="form-control" id="usuario" name="usuario" type="text"
                            value="<?php echo set_value('usuario') ?>" autofocus required>
                        </div>

                        <div class="col-12 col-sm-6 mb-3">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text"
                            value="<?php echo set_value('nombre') ?>" autofocus required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="password">Contraseña</label>
                            <input class="form-control" id="password" name="password" type="password"
                            value="<?php echo set_value('password') ?>" required>
                        </div>

                        <div class="col-12 col-sm-6 mb-3">
                            <label for="repassword">Repite contraseña</label>
                            <input class="form-control" id="repassword" name="repassword" type="password"
                            value="<?php echo set_value('repassword') ?>"  required>
                        </div>
                    </div>

                    <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label>Caja</label>
                            <select class="form-control" id="id_caja" name="id_caja" required>
                                <!-- Opciones de la lista desplegable -->
                                <option value="">--Seleccione caja--</option>
                                <?php foreach ($cajas as $caja) { ?>
                                    <option value="<?php echo $caja['id']; ?>">
                                        <?php echo $caja['nombre']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6 mb-3">
                            <label>rol</label>
                            <select class="form-control" id="id_rol" name="id_rol" required>
                                <!-- Opciones de la lista desplegable -->
                                <option value="">--Seleccione rol--</option>
                                <?php foreach ($roles as $rol) { ?>
                                    <option value="<?php echo $rol['id']; ?>">
                                        <?php echo $rol['nombre']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                </div>


                </div>

                <div class="mb-3">
                    <a href="<?php echo base_url(); ?>usuarios" class="btn btn-primary">Regresar</a>
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