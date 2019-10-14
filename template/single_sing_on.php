<?php
/*
  Carlos Servín R.
  15/08/2019 Legal Tracking
  Updated: 19/08/2019

  Configuration: https://afterlogic.com/docs/webmail-pro-8/developers-guide/integration-via-single-sign-on
  You can enable it by setting AllowPostLogin to true in data/settings/modules/Core.config.json

  ...
  "AllowPostLogin": [
        true,
        "bool"
    ],
    ...

$sEmail="carlos.servin@legaltracking.mx";
$sPassword="password"; //El password aqui debe de venir en formato simple buscar un algoritmo reversible para encriptar
*/


$sEmail=$_POST['user'];
$sPassword=$_POST['password'];
$sLogin=$sEmail;

//include '/var/www/webmail/system/autoload.php';
include_once '../webmail/system/autoload.php';
\Aurora\System\Api::Init(true);
//header('Location: http://85.25.203.137/webmail/?sso&hash='.\Aurora\System\Api::GenerateSsoToken($sEmail, $sPassword, $sLogin));

$aData = \Aurora\System\Api::GetModuleDecorator('Core')->Login($sEmail, $sPassword);
if (isset($aData['AuthToken'])){
    $sAuthToken = $aData['AuthToken'];
    setcookie('AuthToken', $sAuthToken, time()+3600, "/");
    \Aurora\System\Api::Location('mailbox.php');
    echo  "Entra";
}else{
  echo "Se sale del login, posible contraseña usuario o incorreta ";
}

?>
