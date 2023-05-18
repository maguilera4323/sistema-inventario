<?php
//verifica si hay sesiones iniciadas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//llamado al archivo de funciones para obtener los datos de la tabla
include("./modelos/DatosTablas/obtenerDatosInventario.php"); 
?>

<div class="container-encabezado">
<h3 style=""><i class="fas fa-warehouse"></i> &nbsp; INVENTARIO </h3>

<div class="container-menu" style="">
    <h5><i class="fas fa-home"></i>&nbsp; 
    <a href="<?php echo SERVERURL?>home/"> Home </a>
    / 
    <a href="<?php echo SERVERURL?>inventario/"> Inventario </a></h5>
</div>
<hr>

<div class="botones-proveedores">
	<button type="submit" class="btn btn-danger mx-auto btn-lg"><i class="fas fa-file-pdf"></i> &nbsp;Descargar PDF</button>
    <button type="submit" class="btn btn-success mx-auto btn-lg"><i class="fas fa-file-excel"></i> &nbsp;Descargar Excel</button>
    <a href="<?php echo SERVERURL?>moviinventario/">
    <button type="submit" class="btn btn-dark mx-auto btn-lg"><i class="fas fa-dolly"></i> &nbsp;Ver Movimientos de Inventario</button>
    </a>
</div>
<br>
<div class="table-responsive-md">
    <table id="datos-usuario" class="table text-center table-striped datos-usuario">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Ver Más</th>
            </tr>
        </thead>
        <tbody>
			<?php
            //se hace una instancia a la clase
                $datos=new obtenerDatosInventario();
                $resultado=$datos->datosInventario();
                foreach ($resultado as $fila){
            ?>
            <tr>
                <td><?php echo $fila['nom_insumo']; ?></td>
                <td><?php echo $fila['cant_existencia']; ?></td>
                <td><i class="fas fa-exclamation-circle" style="color:black; justify-items:center;"></i></td>
            </tr>


            <?php
                    }
            ?>
        </tbody>

    </table>

</div>

