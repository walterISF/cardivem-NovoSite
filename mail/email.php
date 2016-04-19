<?php
/* Check for empty fields
if(empty($_GET['nome'])  		||
   empty($_GET['sobrenome']) ||
   empty($_GET['email']) 		||
   empty($_GET['telefone']) 	||
   empty($_GET['mensagem'])	||
   !filter_var($_GET['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
  echo "<script>console.log('nãofuncionou');</script>";
	return false;
   }
   echo "<script>console.log('funcionou');</script>";*/
   $nome = $_GET['nome'];
   $sobrenome = $_GET['sobrenome'];
   $telefone = $_GET['telefone'];
   $email = $_GET['email'];
   $mensagem = $_GET['mensagem'];

   echo $nome,$sobrenome,$telefone,$email,$mensagem;
   $assunto = 'Contato site';

   //Envio de email para grupo netglobe


   $email_destino = 'Web e Ponto <wisf_94@hotmail.com>';

   $message  = utf8_decode( '
   <!doctype html>
   <html>
   <head>
   <meta charset="utf-8" />
   </head>

   <body>
                 <h2 style="padding-left:220px;;font-family: arial">Dados do Cliente</h2>

               <table id="email" width="600px" cellspacing="0" style="font-family:arial">
                 <tr>
                     <td style="background-color: #EBEBEB;padding-top: 10px;padding-bottom: 10px;">
                         <b>Nome: '.$nome.'</b>
                     </td>
                 </tr>
                 <tr>
                     <td style="padding-top: 10px;padding-bottom: 10px;">
                         Sobrenome: '.$sobrenome.'
                     </td>
                 </tr>
                 <tr>
                     <td style="background-color: #EBEBEB;padding-top: 10px;padding-bottom: 10px;">
                         Telefone : '.$telefone.'
                     </td>
                 </tr>
                 <tr>
                     <td style="padding-top: 10px;padding-bottom: 10px;">
                         <b>Email: '.$email.'</b>
                     </td>
                 </tr>
                 <tr>
                     <td style="background-color: #EBEBEB;padding-top: 10px;padding-bottom: 10px;">
                         Mensagem: '.$mensagem.'
                     </td>
                 </tr>
             </table><br><br>


   </body>
   </html>
     ' );

       //remetente
     $emailsender = $email;

   /* Verifica qual é o sistema operacional do servidor para ajustar o cabeçalho de forma correta. Não alterar */
     if(PHP_OS == "Linux") $quebra_linha = "\n"; //Se for Linux
     elseif(PHP_OS == "WINNT") $quebra_linha = "\r\n"; // Se for Windows
     else die("Este script não está preparado para funcionar com o sistema operacional de seu servidor");

     /* Montando o cabeçalho da mensagem */
     $headers = "MIME-Version: 1.1".$quebra_linha.
     "Content-type: text/html; charset=iso-8859-1".$quebra_linha .
     "From: ".$emailsender.$quebra_linha.
     "Reply-To: ".$emailsender.$quebra_linha;
     // Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
     echo'aqui fora';
     /* Enviando a mensagem */

     mail($email_destino, $assunto, $message, $headers);
     $str_msg = 'Sua mensagem foi enviada com sucesso!';
     echo $str_msg;

     return true;

   ?>
