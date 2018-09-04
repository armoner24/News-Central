<?php
include ("config.php");
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
$conn = mysql_connect($db_host, $db_user, $db_pass)
or die ("Could not connect to mysql because ".mysql_error());
$createdb = "create database $db_name";
mysql_query($createdb)
or die ("Could not create database because ".mysql_error());
mysql_select_db($db_name)
or die ("Could not select database because ".mysql_error());
$createtab = "create table $db_table (id smallint(5) NOT NULL auto_increment, firstname VARCHAR(30), lastname VARCHAR(30), email VARCHAR(50), gender VARCHAR(10), username VARCHAR(30), password VARCHAR(30), PRIMARY KEY (id), UNIQUE KEY username (username));";
mysql_query($createtab)
or die ("Could not create tables because ".mysql_error());
$url="register_r.html";
redirect($url);
?>