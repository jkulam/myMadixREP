<?php
session_start();
include('wsdls.php');
include('Bapi.php');
$Email=$_POST['email'];
$Oldpassword=$_POST['oldpassword'];
$Password=$_POST['password'];
$Confassword=$_POST['confpassword'];


try{
$Bapi=new Bapi();
$Bapi->bapiCall($bapiname['logon']);
$BapiImport= new BapiImport();
$Receive= new Receive();
$ResponseExport= new ResponseExport();
$BapiImport->setImport('ACTION','LOGON');
$BapiImport->setImport('EMAIL',trim($Email));
$BapiImport->setImport('PASSWORD',trim($Oldpassword));
$Receive->getResult();
$result=$ResponseExport->export('RETURN');
$token=$ResponseExport->export('TOKEN');
}
catch(Exception $e) {
 echo $msg='Message:- ' .$e->getMessage();
  exit;
}
if($result['TYPE']=='S'||$result['TYPE']=='C')
{

try{
	$Bapi->bapiCall($bapiname['change_password']);
	$BapiImport= new BapiImport();
$Receive= new Receive();
$ResponseExport= new ResponseExport();
	$BapiImport->setImport('ACTION','CHANGE');
$BapiImport->setImport('CONFIRM_PASSWD',trim($Confassword));

$BapiImport->setImport('NEW_PASSWD',trim($Password));
$BapiImport->setImport('OLD_PASSWD',trim($Oldpassword));
$BapiImport->setImport('TOKEN',trim($token));
$Receive->getResult();
$result=$ResponseExport->export('RETURN');
}
catch(Exception $e) {
 echo $msg='Message:- ' .$e->getMessage();
  exit;
}
if($result['TYPE']=='S')
{
echo "success";
}
else
{
	echo $result['MESSAGE'];
}
}
else
{
	echo $result['MESSAGE'];
}



?>