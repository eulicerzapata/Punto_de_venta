<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"><?php echo $titulo; ?></h2>

            <?php if (isset($validation)) { ?>
                <div class='alert alert-danger'>
                    <?php echo $validation->listErrors(); ?>
                </div>

            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>usuarios/actualiza_password" autocomplete="off">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="nombre">Nombre de usuario</label>
                            <input class="form-control" id="usuario" name="usuario" type="text" value="<?php echo $usuario['usuario']; ?>" disabled>
                        </div>

                        <div class="col-12 col-sm-6 mb-3">
                            <label for="nombre">Nombre </label>
                            <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $usuario['nombre']; ?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label for="password">Contraseña</label>
                            <input class="form-control" id="password" name="password" type="password" require autofocus>
                        </div>

                        <div class="col-12 col-sm-6 mb-3">
                            <label for="repassword">Confirma contraseña </label>
                            <input class="form-control" id="repassword" name="repassword" type="password" require autofocus>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <a href="<?php echo base_url(); ?>usuarios" class="btn btn-primary">Regresar</a>
                    <button type="submit" class="btn btn-success">Guardar</button>



                </div>
            </form>
            <?php if (isset($mensaje)) { ?>
                <div class='alert alert-success'>
                    <?php echo $mensaje; ?>
                </div>
            <?php } ?>
        </div>


    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    </body>

    </html>