<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel">
                    <div class="embed-responsive embed-responsive-4by3" style="margin-top: 30px;">
                        <iframe class="embed-resposive-item" src=" <?php echo base_url() . "/
productos/generaBarras"; ?>"></iframe>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pdfModalCompra">
                        Ampliar PDF
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal que contiene el PDF -->
    <div class="modal fade" id="pdfModalCompra" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Documento PDF</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- iframe que muestra el PDF -->
                    <iframe src=" <?php echo base_url() . "/productos/
generaBarras" ; ?>" width="100%" height="600px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    