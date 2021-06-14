<?php include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
include '../../../include/navbar.html';

$opciones = array('cost'=>12);

$sql = "SELECT max(id) FROM usuario";
$result = pg_query_params($dbconn, $sql, array());
$last_id = pg_fetch_result($result, 0);

$pwd_hashed = password_hash($_POST['password'], PASSWORD_BCRYPT, $opciones);


$sql = "INSERT INTO usuario (id, nombre, apellido, correo, contraseña, pais, fecha_registro) VALUES ("
    . $last_id + 1 . ",'"
    . $_POST['usuario'] . "','"
    . $_POST['apellido'] . "','"
    . $_POST['email'] . "','"
    . $pwd_hashed . "',"
    . $_POST['pais'] . ",'"
    . date('Y-m-d H:i:s')
    . "')";

// TODO: VINCULAR DROPDOWN DE PAISES CON ID'S DE BD.

$sql = "SELECT * FROM usuario WHERE correo='".$_POST['email']."'";
$result = pg_query_params($dbconn, $sql, array());
$num_rows = pg_num_rows($result);

// OBTENER PAISES Y SUS RESPECTIVAS ID'S
$sqlPAIS = "SELECT * FROM pais ORDER BY cod_pais ASC";
$resultPAIS = pg_query_params($dbconn, $sqlPAIS, array());


echo"<html>";
echo"   <body>";

echo '<div class="container-fluid">';
echo '<div class="row p-3">';
echo '<div class="col">';
echo '<div class="container shadow-lg rounded m-auto p-5">';


echo '<div class="pt-xl-3 pb-xl-5">';

$text = "";
if ($num_rows == 0) // Si no hay correos registrados
{
    $ejecucion = pg_query($dbconn, $sql);
    if($ejecucion)
    {
        echo '<h2 class="text-center text-success">Usuario Creado correctamente.</h2>';
        $text = "Crear otro usuario";
    } else{
        echo '<h2 class="text-center text-danger">Hubo un error al crear este usuario.</h2>';
        $text = "Volver a intentar";
    }
} else {
    echo '<h2 class="text-center text-warning">Ya existe un usuario con este correo.</h2>';
    $text = "Volver a intentar";
}

echo '</div>';

echo "<div class='d-flex justify-content-around text-center'>";
echo "<a href='/admin/users/create.html' role='button' class='btn btn-primary mx-3 btn-lg'>".$text."</a>";
echo "<a href='/admin/users/all.html' role='button' class='btn btn-primary mx-3 btn-lg'>Volver a usuarios</a>";
echo "<a href='/' role='button' class='btn btn-primary mx-3 btn-lg'>Volver al inicio</a>";

echo "</div>";
echo '</div>';
echo '</div>';

echo "</div>";
echo '</div>';

echo"   </body>";




?>

