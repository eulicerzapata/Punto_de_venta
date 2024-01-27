<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4"><?php echo $titulo; ?></h2>

            <form id="form-permisos" name="form_permisos" method="POST" action="<?php echo base_url() . 'roles/guardaPermisos'; ?>">

                <input type="hidden" name="id_rol" value="<?php echo $id_rol; ?>" />

                <?php foreach ($permisos as $permiso) { ?>
                    <input type="checkbox" value="<?php echo $permiso['id']; ?>" name="permisos[]"
                     <?php if (isset($asignado[$permiso['id']])) {
                         echo 'checked';
                         } ?> />
                    <label><?php echo $permiso['nombre']; ?> </label>
                    <br />
                <?php } ?>

                <button type="submit" class="btn btn-primary">Guardar</button>

            </form>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    </body>

    </html>

    <!-- Modal -->
    <div class="modal fade" id="modal-confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <p>¿Desea eliminar esta Categoria?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                    <a class="btn btn-danger btn-ok">Eliminar</a>
                </div>
            </div>
        </div>
    </div>