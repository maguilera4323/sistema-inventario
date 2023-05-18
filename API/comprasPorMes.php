<?php
include "../config/conexionAPI.php";

//la variable valor_mes se utiliza para contabilizar datos para los 12 meses del año
//la variable valor_arreglo para guardar estos datos en los arreglos para el grafico(siempre que existan datos)
$valor_mes=1;
$valor_arreglo=0;
$labels=array();
$cantidades=array();

$labels=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre',
'Octubre','Noviembre','Diciembre'];

while($valor_mes<13){
	$query="SELECT count(MONTH(fech_compra)) as contar_compras FROM compras where (MONTH(fech_compra))=$valor_mes";
	$resultado=mysqli_query($conexion,$query);

	while($fila=mysqli_fetch_array($resultado)){
		if($fila['contar_compras']>0){
			$cantidades[$valor_arreglo]=$fila['contar_compras'];
			$nombre_mes[$valor_arreglo]=$labels[$valor_mes-1];
			$valor_arreglo++;
		}
	}
	$valor_mes++;
}

$respuesta=[
	"cantidades"=>$cantidades,
	"mes"=>$nombre_mes,
];

echo json_encode($respuesta);

	