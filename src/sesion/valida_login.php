<?php include '..\db_config.php';?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["pwd"];

        // Config de encriptacion
        $opciones = array('cost'=>12);

        echo "<br>Loging... </br>";

        // Preparamos y hacemos la query a la base de datos.
        $sql = 'SELECT usuario.correo, usuario.contraseña FROM usuario WHERE usuario.correo = $1';
        $result = pg_query_params($dbconn, $sql, array($email));
        
        if( pg_num_rows($result) > 0 ) {
            $row = pg_fetch_assoc($result);
            if (password_verify($password, $row["contraseña"])){
                echo 'Login exitoso';
            } else {
                echo "Contraseña Incorrecta";
            }
        } else {
            echo "Correo no registrado";
        }}
    
?>