<?php


  $dbhost='mysql01.cardivem.hospedagemdesites.ws';
  $dbusername='cardivem';
  $dbuserpass='xbn12we@';
  $dbname = 'cardivem';

  mysql_connect($dbhost, $dbusername, $dbuserpass) or print (mysql_error());
  mysql_select_db($dbname) or print(mysql_error());

  $imagens = array();
  $imagens_thumb = array();

  $sql = 'SELECT * FROM imagens';
  $resultado = mysql_query($sql);

  $i = 0;
  while($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){
    $imagens[$i]= $linha;
    $i++;
  }
  echo json_encode($imagens);
?>
