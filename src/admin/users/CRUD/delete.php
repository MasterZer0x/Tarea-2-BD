<?php  include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
include '../../../include/navbar.html';

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$pattern = "/.*=([0-9]+)/i";
preg_match($pattern, $actual_link, $re); 
$id = $re[1];

$plata = "SELECT * FROM usuario_tiene_moneda WHERE id_usuario =". $id;
$revisarplata = pg_query_params($dbconn, $plata,array());





if (pg_num_rows($revisarplata) != 0){
    $text = "Usuario contiene monedas en su cuenta. Primero se debe vaciar su monedero antes de eliminar.";
    $etiq = "danger";}
else{
    $sql = "DELETE FROM usuario WHERE id=".$id;
    $ejecucion = pg_query($dbconn, $sql);
    if ($ejecucion) // Si no hay correos registrados
    {
        $text = "Usuario Eliminado correctamente.";
        $etiq = "success";
    } else {
        $text = "Ha ocurrido un error al eliminar el usuario.";
        $etiq = "danger";
    }    
}



echo"<html>";
echo"   <body>";

echo '<div class="container-fluid">';
echo '<div class="row p-3">';
echo '<div class="col">';
echo '<div class="container shadow-lg rounded m-auto p-5">';


echo '<div class="pt-xl-3 pb-xl-5">';

echo '<h2 class="text-center text-'. $etiq .'">'. $text .'</h2>';


echo '</div>';

echo '</div>';
echo '</div>';

echo "</div>";
echo '</div>';

echo"   </body>";



















?>