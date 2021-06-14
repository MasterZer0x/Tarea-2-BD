<?php include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

$sql = "SELECT  moneda.sigla,
                moneda.nombre,
                usuario_tiene_moneda.balance,
                precio_moneda.valor,
                usuario_tiene_moneda.balance * precio_moneda.valor as total

FROM usuario_tiene_moneda
INNER JOIN usuario 
    ON usuario.id = usuario_tiene_moneda.id_usuario
INNER JOIN moneda 
    ON moneda.id = usuario_tiene_moneda.id_moneda
inner join precio_moneda
    on precio_moneda.id_moneda = usuario_tiene_moneda.id_moneda
INNER JOIN ( select precio_moneda.id_moneda, max(precio_moneda.fecha) as MaxDate
        from precio_moneda
        group by precio_moneda.id_moneda) valor_actual
    ON precio_moneda.id_moneda = valor_actual.id_moneda 
    AND precio_moneda.fecha = valor_actual.MaxDate
WHERE usuario.id=".$_SESSION['id'];

$result = pg_query_params($dbconn, $sql, array());

?>