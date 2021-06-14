<?php include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
include '../../../include/navbar.html';

$opciones = array('cost'=>12);
$pwd_hashed = password_hash($_POST['password'], PASSWORD_BCRYPT, $opciones);

$sql = "UPDATE usuario SET "
    . "nombre='". $_POST['nombre'] . "', "
    . "apellido='". $_POST['apellido'] . "', "
    . "correo='". $_POST['email'] . "', "
    . "contraseña='". $pwd_hashed . "', "
    . "pais=". $_POST['pais'] . ""
    . " WHERE id=". $_POST['id'];



$sql2 = "SELECT * FROM usuario WHERE correo='".$_POST['email']."'";
$result = pg_query_params($dbconn, $sql2, array());
$num_rows = pg_num_rows($result);



echo"<html>";
echo"<body>";

echo '<div class="container-fluid">';
echo '<div class="row p-3">';
echo '<div class="col">';
echo '<div class="container shadow-lg rounded m-auto p-5">';


echo '<div class="pt-xl-3 pb-xl-5">';

if ($num_rows == 0) // Si no hay correos registrados
{
    $ejecucion = pg_query($dbconn, $sql);

    if ($ejecucion)
    {
        echo '<h2 class="text-center text-success">Usuario Modificado correctamente.</h2>';
    }
    else{
        echo '<h2 class="text-center text-danger">No se ha podido modificar al usuario.</h2>';
    }
    
} else {
    echo '<h2 class="text-center text-warning">Ya existe un usuario con el correo ingresado.</h2>';
}

echo '</div>';

echo '</div>';
echo '</div>';

echo "</div>";
echo '</div>';

echo"   </body>";





?>

