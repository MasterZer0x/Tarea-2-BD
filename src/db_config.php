<?php
/* Detalles de la conexión */
$conn_string = "host=localhost port=5432 dbname=<nombre_db> user=postgres password=<contraseña>";
// Recuerde reemplazar "<contraseña>" por su contraseña y "<nombre_db>" por el nombre de su BD. No se incluyen los "<>".
// Establecemos una conexión con el servidor postgresSQL
$dbconn = pg_connect($conn_string);
// Revisamos el estado de la conexión en caso de errores.
if(!$dbconn) {
echo '<div class="alert alert-danger"><strong>Error:</strong> No se ha podido conectar con la base de datos.</div>';
}
/* Para incluir la configuración de este archivo en otro archivo .php utilice 
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
*/
?>