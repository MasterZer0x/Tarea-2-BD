<?php include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

$opciones = array('cost'=>12);

$pwd_hashed = password_hash($_POST['password'], PASSWORD_BCRYPT, $opciones);



$sql = "UPDATE usuario SET "
    . "nombre='". $_POST['nombre'] . "', "
    . "apellido='". $_POST['apellido'] . "', "
    . "correo='". $_POST['email'] . "', "
    . "contraseña='". $pwd_hashed . "', "
    . "pais=". $_POST['pais'] . ""
    . " WHERE id=". $_POST['id'];


// TODO: VINCULAR DROPDOWN DE PAISES CON ID'S DE BD.
// TODO: LIMITAR MODIFICACION SI YA EXISTE EL CORREO
// TODO: CREAR ESTILO MOSTRANDO EL RESULTADO DE LA CREACION.

$ejecucion = pg_query($dbconn, $sql);
echo "Usuario Modificado correctamente." . " -" . "<a href='form.html' style='text-decoration:none;color:#ff0099;'> Volver al inicio o Volver a usuarios o Crear otro </a>";



?>

