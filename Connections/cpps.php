<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cpps = "db413934014.db.1and1.com";
//$hostname_cpps = "localhost";
$database_cpps = "cpps";
$username_cpps = "dbo413934014";
$password_cpps = "Password1";
$cpps = mysql_connect($hostname_cpps, $username_cpps, $password_cpps);
if(!$cpps) die("mysql error:".mysql_error());
mysql_select_db($database_cpps,$cpps);
?>