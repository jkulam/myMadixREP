<?php
session_start();
if(!isset($_SESSION['TOKEN']))
{
	header('location:../index.php');
	exit;
}
include('wsdls.php');
include('Bapi.php');
ini_set("default_socket_timeout", 400);
$Iguid=$_REQUEST['Iguid'];
try{
$Bapi=new Bapi();
$Bapi->bapiCall($bapiname['registration_approval']);
$BapiImport= new BapiImport();
$BapiImport->setImport('TOKEN',$_SESSION['TOKEN']);
$BapiImport->setImport('IGUID',$Iguid);
$BapiImport->setImport('ACTION','READ');
$Receive= new Receive();
$Receive->getResult();
$ResponseExport= new ResponseExport();
$rp=$ResponseExport->export('OCUSTOMER');
foreach($rp as $keys=>$val)
{
	$rp[$keys]=mb_convert_encoding($val, "EUC-JP", "auto");
}
}
catch(Exception $e) {
 echo $msg='Message:- ' .$e->getMessage();
  exit;
}
//var_dump($rp);
//exit;
echo $json_en=json_encode($rp);
//$table_as=json_decode($json_en,true);
//$_SESSION['table_reg_list']=$table_as;
/*
$client = new SoapClient($wsdls['dropdown'],array("login" => "WSUSER", "password" =>"CONNECT" )); 
$r=$client->ZcotsDropdown();

$json_en=json_encode($r->Tdropdown);
$json_dropdown=json_decode($json_en,true);

/*foreach($json_dropdown['item'] as $keys=>$values)
{
	if($values['Type']='ORDSTATUS')
	{
	$options[$values['Value']]=$values['Text'];
	}
	
}
*/
//$_SESSION['options']=$options;
//header('location:../html/registrationlist.php');
?>