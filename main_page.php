<html>
<head>
<meta charset="UTF-8"></meta>
<title><?php session_start(); print_r ($_SESSION['login_user']);?>-NC</title>
<style>
div {
    width: 50px;
    height: 50px;
    background: red;
    position: relative;
    animation: mymove 5s infinite;
}
@keyframes mymove {
    from {left: 100px;}
    to {left: 1050px;}
    0%   {background: red;}
    25%  {background: yellow;}
    50%  {background: blue;}
    75%  {background: green;}
    100% {background: red;}
}
p.bottom{
	text-align: center; bottom: 30px; left: 460px;
}
body{
	background-color: powderblue;
}
</style>
</head>
<body>
<h1 align="center">NEWS CENTRAL</h1>
<h2 align="center">Your daily dose of International News</h2>
<table>
<col width="100">
<col width="1050">
<col width="80">
<tr>
<td><p>Welcome <b><?php print_r ($_SESSION['login_user']);?></b>, </p></td>
<td colspan="10"><div></div></td>
<td><form action="logout.php" method="post" align="right"><input type="submit" name="logout" value="LOGOUT"></input></form></td>
</tr>
</table>
<i><b><p>Here is the list of all the latest news around the globe.</p></b></i><br>
<?php 
ini_set('max_execution_time', 300);
exec("python get_news.py"); 
$file=fopen("news.txt", "r");
while(!feof($file))
  {
  echo "<hr>" .mb_convert_encoding(fgets($file),"HTML-ENTITIES","UTF-8"). "<br>";
  }
fclose($file);
?>
<br>
<i><p>*You are all Up-To-Date for now, Thank You for using News Central.*</p></i><br>
<p class="bottom">©2018|Created and Maintained by Aaditya Vaidya|All Rights Reserved</p>
</body>
</html>