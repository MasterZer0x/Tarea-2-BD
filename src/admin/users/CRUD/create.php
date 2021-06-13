<?php include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

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
// TODO: LIMITAR CREACION SI YA EXISTE EL CORREO
// TODO: CREAR ESTILO MOSTRANDO EL RESULTADO DE LA CREACION.

$ejecucion = pg_query($dbconn, $sql);

echo "Usuario Creado correctamente." . " -" . "<a href='form.html' style='text-decoration:none;color:#ff0099;'> Volver al inicio o Volver a usuarios o Crear otro </a>";



?>

