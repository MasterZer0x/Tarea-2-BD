<?php
    session_start();
/* Este archivo debe manejar la lógica de cerrar una sesión */
    if (isset($_SESSION["email"])){
        session_unset();
        session_destroy();
        echo "<script type='text/javascript'>document.location='/index.html';</script>";
    }
    
?>