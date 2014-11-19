<?php
$subjectPrefix = '[Contato via Site]';
$emailTo = 'factorywebdesign.oficial@gmail.com';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name     = stripslashes(trim($_POST['n-nome']));
    $email    = stripslashes(trim($_POST['n-email']));
    $assunto  = stripslashes(trim($_POST['n-assunto']));
    $mensagem = stripslashes(trim($_POST['n-msg']));
    $pattern  = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';

    if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $assunto)) {
        die("Header injection detected");
    }

    $emailIsValid = preg_match('/^[^0-9][A-z0-9._%+-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', $email);

    if($name && $email && $emailIsValid && $assunto && $mensagem){
        $subject = "$subjectPrefix $assunto";
        $body = "Nome: $name <br /> Email: $email <br /> Telefone: $tel <br /> Mensagem: $mensagem";

        $headers  = 'MIME-Version: 1.1' . PHP_EOL;
        $headers .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;
        $headers .= "From: $name <$email>" . PHP_EOL;
        $headers .= "Return-Path: $emailTo" . PHP_EOL;
        $headers .= "Reply-To: $email" . PHP_EOL;
        $headers .= "X-Mailer: PHP/". phpversion() . PHP_EOL;

        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;

    } else {
        $hasError = true;
    }
}
    <?php endif; ?>

    <?php
        $ieVersion = preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches) ? floatval($matches[1]) : null;

        if($ieVersion < 9 && $ieVersion != null) {
            $jQueryVersion = '1.10.2';
        } else {
            $jQueryVersion = '2.0.3';
        }
?>
