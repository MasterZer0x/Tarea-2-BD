<?php  include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
include '../../../include/navbar.html';

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$pattern = "/.*=([0-9]+)/i";
preg_match($pattern, $actual_link, $re); 
$id = $re[1];

$sql = "DELETE FROM usuario WHERE id=".$id;

$ejecucion = pg_query($dbconn, $sql);



echo"<html>";
echo"   <body>";

echo '<div class="container-fluid">';
echo '<div class="row p-3">';
echo '<div class="col">';
echo '<div class="container shadow-lg rounded m-auto p-5">';


echo '<div class="pt-xl-3 pb-xl-5">';

if ($ejecucion) // Si no hay correos registrados
{
    echo '<h2 class="text-center text-success">Usuario Eliminado correctamente.</h2>';

} else {
    echo '<h2 class="text-center text-danger">No se ha podido eliminar al usuario.</h2>';
}

echo '</div>';

echo '</div>';
echo '</div>';

echo "</div>";
echo '</div>';

echo"   </body>";



















?>