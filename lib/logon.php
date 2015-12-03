<?php
session_start();
include('wsdls.php');
include('Bapi.php');
$Email=$_POST['email'];
$Password=$_POST['password'];
try {
	$Bapi=new Bapi();
$Bapi->bapiCall($bapiname['logon']);
$BapiImport= new BapiImport();
$BapiImport->setImport('EMAIL',$Email);
$BapiImport->setImport('PASSWORD',$Password);
$BapiImport->setImport('ACTION','LOGON');
$Receive= new Receive();
$Receive->getResult();
$ResponseExport= new ResponseExport();
$result=$ResponseExport->export('RETURN');
//$result=$response_export->Return;
}
catch(Exception $e) {
 echo  $msg='Message:- ' .$e->getMessage();
  exit;
}
$_SESSION['PARVW']=$ResponseExport->export('PARVW');
if($result['TYPE']=='S')
{
$token=$ResponseExport->export('TOKEN');
$_SESSION['TOKEN']=$token;
$_SESSION['KUNNR']=$ResponseExport->export('KUNNR');

$_SESSION['screenwidth']=$_POST['screenwidth'];
if($_SESSION['PARVW']=='AD')
{
	echo "registration";
}
else
{
echo "success";
}
}
else
{
if($result['TYPE']=='C')
{
$_SESSION['initialPass']=$Email;
echo $result['TYPE'];
}
else{
	echo $result['MESSAGE'];
	}
}

?>