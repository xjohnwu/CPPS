<?php
require_once('cpps.php');
function executeQuery($sql)
{
	$res = mysql_query($sql);
	if (!$res)
		die(db_error_msg.$sql.mysql_error());
	return $res;
}
?>