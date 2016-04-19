<?php
require 'config.php';

if(isset($_GET['senha'])){


$senha = $_GET['senha'];

mysql_connect($dbhost, $dbusername, $dbuserpass) or print (mysql_error());
mysql_select_db($dbname) or print(mysql_error());

$sql = "SELECT senha FROM usuario";
$query = mysql_query($sql) or die(error());

$resultado = mysql_fetch_assoc($query);

if($senha == $resultado['senha']){
  //session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
//$_SESSION["usuario"] = 'logado';

echo json_encode('correta');
}
else
  echo json_encode('errada');

//$resultado = mysql_fetch_array($query);
//echo $resultado = mysql_result($sql,0,"senha");

$response = array("success" => true);
}
if(isset($_GET['imagem'])){

$imagem = $_GET['imagem'];
$imagem_thumb = $_GET['imagem_thumb'];

mysql_connect($dbhost, $dbusername, $dbuserpass) or print (mysql_error());
mysql_select_db($dbname) or print(mysql_error());

$sql = 'INSERT INTO `imagens`(`imagem`, `imagem_thumb`) VALUES ('.$imagem.','.$imagem_thumb.')';
$resultado = mysql_query($sql);
mysql_close();


}


if(isset($_GET['receberImagens'])){

  $imagens = array();
  $imagens_thumb = array();

  mysql_connect($dbhost, $dbusername, $dbuserpass) or print (mysql_error());
  mysql_select_db($dbname) or print(mysql_error());

  $sql = 'SELECT * FROM imagens';
  $resultado = mysql_query($sql);

  $i = 0;
  while($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){
    $imagens[$i]= $linha;
    $i++;
  }
  echo json_encode($imagens);

}
?>
