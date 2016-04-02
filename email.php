<?php

if(isset($_GET['email'])){ 

	
	$nome = $_GET['nome'];
	$sobrenome = $_GET['sobrenome']; 
	$telefone = $_GET['telefone'];
	$email = $_GET['email'];
	$mensagem = $_GET['mensagem'];


	$assunto = 'Contato site';

	//Envio de email para grupo netglobe

	$email_destino = 'walter.inacio@netglobe.com.br;josiane.santana@netglobe.com.br';
	//$email_destino = 'Web e Ponto <contato@webeponto.com.br>';

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
		else die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
		
		/* Montando o cabeçalho da mensagem */
		$headers = "MIME-Version: 1.1".$quebra_linha.
		"Content-type: text/html; charset=iso-8859-1".$quebra_linha .
		"From: ".$emailsender.$quebra_linha.
		"Reply-To: ".$emailsender.$quebra_linha;
		// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)
		
		/* Enviando a mensagem */
		//Verificando qual é o MTA que está instalado no servidor e efetuamos o ajuste colocando o paramentro -r caso seja Postfix
		if(!mail($email_destino, '[Contato] - '.$nome, $message, $headers ,"-r".$emailsender)){ // Se for Postfix
			$headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "não for Postfix"
		mail($email_destino, $assunto, $menssage, $headers);
		//$str_msg = 'Sua mensagem foi enviada com sucesso!'; 
		//echo $str_msg;
		}
}
?>