<?php  

// La función ini_set () permite que un script anule temporalmente una configuración en el archivo de configuración de PHP  
ini_set('display_errors',1); // 
ini_set('display_startup_errors',1);  
// La función error_reporting puede aceptar los parámetros E_ERROR, E_WARNING, E_PARSE y E_NOTICE como operadores bit a bit 
 error_reporting(E_ERROR);  
 
 // Configuración de parámetros de conexión a la base de datos  
 $host="localhost"; 
 $usuario="root"; 
 $clave=""; 
 $bd="sistema_inventario"; 
 $puerto='3306';  
 
 $conexion = new mysqli($host,$usuario,$clave,$bd,$puerto); 
    if ($conexion->connect_errno) {     
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error; } 
   