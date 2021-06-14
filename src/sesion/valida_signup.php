<?php include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';?>

<?php
    $opciones = array('cost'=>12);
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $nombre = $_POST["name"];
        $apellido = $_POST["surname"];
        $pwd = $_POST["pwd"];
        $pwd2 = $_POST["pwd2"];
        $pais = intval($_POST["country"]); 
        $rango = "user";
        $fecha_registro = date('Y-m-d 00:00:00');

        $complete = false;

        if ($pwd == $pwd2){
            $pwd_hashed = password_hash($pwd, PASSWORD_BCRYPT, $opciones);

            $sqlcount = "SELECT COUNT(*)+1 as nextid FROM usuario";
            $result = pg_query_params($dbconn, $sqlcount, array());
            $row = pg_fetch_array($result);
            $nextId = $row["nextid"];

            if ($apellido != ""){
                $sql = "INSERT INTO usuario (id, nombre, apellido, correo, contraseña, pais, rango, fecha_registro) VALUES ($1, $2, $3, $4, $5, $6, $7, $8)";
                pg_query_params($dbconn, $sql, array($nextId, $nombre, $apellido, $email, $pwd_hashed, $pais, $rango, $fecha_registro));
                $complete = true;
            } else if ($apellido == ""){
                $sql = "INSERT INTO usuario (id, nombre, correo, contraseña, pais, rango, fecha_registro) VALUES ($1, $2, $3, $4, $5, $6, $7";
                pg_query_params($dbconn, $sql, array($nextId, $nombre, $email, $pwd_hashed, $pais, $rango, $fecha_registro));
                $complete = true;
            }
            if ($complete){
                session_start();

                $sql = "SELECT nombre FROM pais WHERE cod_pais=".$pais;
                $result = pg_query_params($dbconn, $sql, array());
                $nombre_pais = pg_fetch_result($result, 0);
                
		$_SESSION["id"] = $nextId;
                $_SESSION["email"] = $email;
                $_SESSION["nombre"] = $nombre;
                $_SESSION["apellido"] = $apellido;
                $_SESSION["pais"] = $nombre_pais;
                $_SESSION["fecha_registro"] = $fecha_registro;
                $_SESSION["rango"] = $rango;

                echo "<script type='text/javascript'>document.location='/user/profile.html';</script>";
            }

            
        } else{
            echo "<script type='text/javascript'>document.location='/sesion/sign-up.html';</script>";
        }
    }
/* Este archivo debe validar los datos de registro y manejar la lógica de crear un usuario desde el formulario de registro */
    
?>

