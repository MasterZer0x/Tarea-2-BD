<?php include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';?>
<?php include 'valida_sesion.php' ?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["pwd"];

        // Config de encriptacion
        $opciones = array('cost'=>12);

        // Preparamos y hacemos la query a la base de datos.
        $sql = 'SELECT usuario.correo, usuario.contraseña FROM usuario WHERE usuario.correo = $1';
        $result = pg_query_params($dbconn, $sql, array($email));
        
        if( pg_num_rows($result) > 0 ) {
            $row = pg_fetch_assoc($result);
            if (password_verify($password, $row["contraseña"])){
                
              
                $_SESSION["email"] = $email;
                
                $sql = "SELECT id,nombre,apellido,pais,fecha_registro,rango FROM usuario WHERE correo='".$email."'";
                $result = pg_query_params($dbconn, $sql, array());
                $row = pg_fetch_array($result);

                $sql = "SELECT nombre FROM pais WHERE cod_pais=".$row["pais"];
                $result = pg_query_params($dbconn, $sql, array());
                $nombre_pais = pg_fetch_result($result, 0);

		$_SESSION["id"] = $row["id"];
                $_SESSION["nombre"] = $row["nombre"];
                $_SESSION["apellido"] = $row["apellido"];
                $_SESSION["pais"] = $nombre_pais;
                $_SESSION["fecha_registro"] = $row["fecha_registro"];
                $_SESSION["rango"] = $row["rango"];

                
                echo "<script type='text/javascript'>document.location='/user/profile.html';</script>";

            } else {
                
                echo "<script type='text/javascript'>document.location='/sesion/log-in.html';</script>";
            }
        } else {
            echo "<script type='text/javascript'>document.location='/sesion/log-in.html';</script>";
        }}
    
?>