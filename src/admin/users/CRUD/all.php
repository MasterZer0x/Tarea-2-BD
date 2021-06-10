<?php include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
$sql = "SELECT * FROM usuario ORDER BY id ASC";
$result = pg_query_params($dbconn, $sql, array());
?>
