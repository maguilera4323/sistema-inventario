<?php
//verifica si hay sesiones iniciadas
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include ("./modelos/DatosTablas/obtenerDatos.php");

?>

<title>Dashboard</title>

<div class="container-sm dashboard-contenedor">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <a href="<?php echo SERVERURL?>usuarios/">
                <div class="card-body">
                <?php
                //se hace una instancia a la clase
                    $datos=new obtenerDatosTablas();
                    $resultado=$datos->contarRegistros('usuarios');
                    foreach ($resultado as $fila){
                        $cantidad_usuarios=$fila['contar_registros'];
                    }
                ?>
                    <h3 class="card-title text-center"> <?php echo $cantidad_usuarios;?> </h3>
                    <h5 class="card-title text-center">Usuarios</h5>
                    <h5 class="card-title text-center">Registrados</h5>
                </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <a href="<?php echo SERVERURL?>boletos/">
                <div class="card-body">
                <?php
                //se hace una instancia a la clase
                    $datos=new obtenerDatosTablas();
                    $resultado=$datos->contarRegistros('insumos');
                    foreach ($resultado as $fila){
                        $cantidad_insumos=$fila['contar_registros'];
                    }
                ?>
                    <h3 class="card-title text-center"> <?php echo $cantidad_insumos;?> </h3>
                    <h5 class="card-title text-center">Insumos</h5>
                    <h5 class="card-title text-center">Registrados</h5>
                </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <a href="<?php echo SERVERURL?>sorteos/">
                <div class="card-body">
                <?php
                //se hace una instancia a la clase
                    $datos=new obtenerDatosTablas();
                    $resultado=$datos->contarRegistros('compras');
                    foreach ($resultado as $fila){
                        $cantidad_compras=$fila['contar_registros'];
                    }
                ?>
                    <h3 class="card-title text-center"> <?php echo $cantidad_compras;?> </h3>
                    <h5 class="card-title text-center">Compras</h5>
                    <h5 class="card-title text-center">Realizadas</h5>
                </div>
            </a>
            </div>
        </div>
    </div>
    <br>
    <br>
</div>




   

