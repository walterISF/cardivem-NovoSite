<?php
require 'config.php';

if(isset($_GET['senha'])){


$senha = $_GET['senha'];

mysql_connect($dbhost, $dbusername, $dbuserpass) or print (mysql_error());
mysql_select_db($dbname) or print(mysql_error());

$sql = "SELECT senha FROM usuario";
$query = mysql_query($sql) or die(error());

$resultado = mysql_fetch_assoc($query);

if($senha == $resultado['senha'])
  echo json_encode('correta');
else
  echo json_encode('errada');



//$resultado = mysql_fetch_array($query);
//echo $resultado = mysql_result($sql,0,"senha");

$response = array("success" => true);
}
?>
