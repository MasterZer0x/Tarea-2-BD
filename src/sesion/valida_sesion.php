<?php include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';?>
<?php session_start(); ?>
<?php

   if(isset($_SESSION["rango"])  && $_SESSION["rango"] == "user" ){
      if (($_SERVER["REQUEST_URI"] == "/sesion/log-in.html" ||  $_SERVER["REQUEST_URI"] == "/sesion/sign-up.html" || $_SERVER["REQUEST_URI"] == "/admin/users/all.html") ){
         echo "<script type='text/javascript'>document.location='/';</script>";
      }

   }
  
   if(isset($_SESSION["rango"]) && $_SESSION["rango"] == "admin"){
      if (($_SERVER["REQUEST_URI"] == "/sesion/log-in.html" || $_SERVER["REQUEST_URI"] == "/sesion/sign-up.html"))
         echo "<script type='text/javascript'>document.location='/';</script>";
   }

   if(!isset($_SESSION['email'])){
      if ($_SERVER["REQUEST_URI"] == "/admin/users/all.html" || $_SERVER["REQUEST_URI"] == "/user/wallet.html" || $_SERVER["REQUEST_URI"] == "/user/profile.html" )
         echo "<script type='text/javascript'>document.location='/';</script>";
   }
/*
   if(!isset($_SESSION['email'])){
      if ($_SERVER["REQUEST_URI"] != "/" && $_SERVER["REQUEST_URI"] != "/sesion/sign-up.html" && $_SERVER["REQUEST_URI"] != "/sesion/log-in.html" )
         echo "<script type='text/javascript'>document.location='/';</script>";
   }

   
    
 Este archivo debe usarse para comprobar si existe una sesión válida 
   Considerar qué pasa cuando la sesión es válida/inválida para cada página:
   - Página principal
   - Mi perfil
   - Mi billetera
   - Administración de usuarios y todo el CRUD
   - Iniciar Sesión
   - Registrarse
*/

/*
   Sesiones validas para usuarios no logeados:
      -Principal
      -Iniciar Sesion

   Sesiones validas para cualquier usuario logeado:
      -Principal
      -Perfil
      -Billetera
   
   Sesiones validas para admins logeados:
      -Principal
      -Perfil
      -Billetera
      -CRUD
      
*/
?>