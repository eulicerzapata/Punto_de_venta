<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <br />
            <div class="row">
                <div class="col-4">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                           <?php echo $total; ?> productos en total
                        </div>
                        <a class="card-footer text-white" href="<?php echo base_url() ?>productos">
                            ver detalles</a>
                    </div>
                </div>
            


            
                <div class="col-4">
                    <div class="card text-white bg-success">
                        <div class="card-body">$
                           <?php echo $totalVentas['total']; ?>  ventas del dia
                        </div>
                        <a class="card-footer text-white" href="<?php echo base_url() ?>ventas">
                            ver detalles</a>
                    </div>
                </div>
           

            
                <div class="col-4">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                           <?php echo $minimos; ?> productos en stock minimo
                        </div>
                        <a class="card-footer text-white" href="<?php echo base_url() ?>productos/mostrarMinimos">
                            ver detalles</a>
                    </div>
                </div>
            

            
                
            
                </div>



        </div>
    </main>