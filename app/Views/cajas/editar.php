<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"><?php echo $titulo; ?></h2>

            <?php if (isset($validation)) { ?>
                <div class='alert alert-danger'>
                <?php echo validation_list_errors(); ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/cajas/actualizar" autocomplete="off">



                <input type="hidden" id="id" name="id" value="<?php echo $datos['id']; ?> " />


                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                            <label>Numero de caja</label>
                            <input class="form-control" id="numero_caja" name="numero_caja" type="text" value="<?php echo $datos['numero_caja']; ?> " autofocus required>
                        </div>

                        <div class="col-12 col-sm-6 mb-3">
                            <label>Nombre </label>
                            <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo $datos['nombre']; ?> " autofocus required>
                        </div>

                        
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        

                        <div class="col-12 col-sm-6 mb-3">
                            <label>Folio </label>
                            <input class="form-control" id="folio" name="folio" type="text" value="<?php echo $datos['folio']; ?> " autofocus required>
                        </div>
                    </div>
                </div>




                <div class="mb-3">
                    <a href="<?php echo base_url(); ?>cajas" class="btn btn-primary">Regresar</a>
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