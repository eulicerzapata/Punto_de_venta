<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"><?php echo $titulo; ?></h2>

            <form method="POST" action="<?php echo base_url(); ?>usuarios/actualizar" autocomplete="off">



            <input type="hidden" id="id" name="id" value="<?php echo $usuario['id']; ?> " />


                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label>Usuario</label>
                            <input class="form-control" id="usuario" name="usuario" type="text"
                             value="<?php echo $usuario['usuario']; ?> " autofocus required>
                        </div>

                        <div class="col-12 col-sm-6 mb-3">
                            <label>Nombre </label>
                            <input class="form-control" id="nombre" name="nombre" type="text"
                             value="<?php echo $usuario['nombre']; ?> " autofocus required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label>Caja</label>
                            <select class="form-control" id="id_caja" name="id_caja" required>
                                <!-- Opciones de la lista desplegable -->
                                <option value="">--Seleccione Caja--</option>
                                <?php foreach ($cajas as $caja) { ?>
                                    <option value="<?php echo $caja['id']; ?>"
                                     <?php if ($caja['id'] == $usuario['id_caja']) {
                                         echo 'selected';
                                     } ?>>
                                        <?php echo $caja['nombre']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6 mb-3">
                            <label>Rol</label>
                            <select class="form-control" id="id_rol" name="id_rol" required>
                                <!-- Opciones de la lista desplegable -->
                                <option value="">--Seleccione rol--</option>
                                <?php foreach ($roles as $rol) { ?>
                                    <option value="<?php echo $rol['id']; ?>"
                                     <?php if ($rol['id'] == $usuario['id_rol']) {
                                              echo 'selected';
                                          } ?>>

                                        <?php echo $rol['nombre']; ?>
                                    </option>
                                <?php } ?>
                            </select>
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