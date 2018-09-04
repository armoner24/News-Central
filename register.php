<?php 
include("config.php"); 
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
$link = mysql_connect($db_host, $db_user, $db_pass)
or die ("could not connect to mysql because ".mysql_error());
mysql_select_db($db_name)
or die ("could not select database because ".mysql_error());
$check = "select id from $db_table where username = '".$_POST['username']."';";
$qry = mysql_query($check) or die ("could not match data because ".mysql_error());
$num_rows = mysql_num_rows($qry); 
if ($num_rows != 0) { 
echo "sorry, the username $username is already taken.<br>";
echo "<a href=register.html>Try again</a>";
exit; 
} else {
$insert = mysql_query("insert into $db_table values ('NULL',
'".$_POST["firstname"]."',
'".$_POST["lastname"]."',
'".$_POST["email"]."',
'".$_POST["gender"]."',
'".$_POST["username"]."',
'".$_POST["password"]."')")
or die("could not insert data because ".mysql_error());
$url="login_r.html";
redirect($url);
}
?>