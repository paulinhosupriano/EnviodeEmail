<?php
// carregar tudo.
require_once('app/load.php');

use Support\Mail;


// instanciar classe
$mail = (new Mail());

// configurar mensagem a ser enviada.
$body = "Configurações corretas.<br/>";

$body .= "<b>Host:</b> ". MAIL['host']."<br/>";
$body .= "<b>User:</b> ". MAIL['user']."<br/>";
$body .= "<b>Senha:</b> ". MAIL['passwd']."<br/>";
$body .= "<b>Porta:</b> ". MAIL['port']."<br/>";
$body .= "<b>Modo:</b> ". MAIL['mode']."<br/>";
$body .= "<b>nome de Quem:</b> ". MAIL['form_name']."<br/>";
$body .= "<b>E-mail de Quem:</b> ". MAIL['from_email']."<br/>";


// adicionar e-mail para envio.
$mail->add('Assunto do E-mail',$body, 'nome de quem está enviando' ,'email_para_quem_vai_receber@email.com');

// efetuar envio
$mail->send();


// verificar se foi sucesso ou error.
if(!$mail->error()){
	echo 'Mensagem enviada com sucesso.';
	exit(0);
}

echo 'Erro ao enviar a mensagem.';