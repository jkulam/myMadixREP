<?php
session_start();
if(!isset($_SESSION['TOKEN']))
{
	header('location:../index.php');
	exit;
}
include('wsdls.php');
include('Bapi.php');
try {
$Bapi=new Bapi();
$Bapi->bapiCall($bapiname['registration_list']);
$BapiImport= new BapiImport();
$BapiImport->setImport('TOKEN',$_SESSION['TOKEN']);
$BapiImport->setImport('ACTION','SORT');
$Receive= new Receive();
$Receive->getResult();
$ResponseTable= new ResponseTable();
$rp=$ResponseTable->getTable('TREGLIST');
}
catch(Exception $e) {
 $msg='Message:- ' .$e->getMessage();
 header('location:../html/registrationlist.php?error='.$msg);
  exit;
}
//var_export($r);
//exit;

$table_as=$rp;
$_SESSION['table_reg_list']=$table_as;

$Bapi->bapiCall($bapiname['dropdown']);
$Receive= new Receive();
$Receive->getResult();
$ResponseTable= new ResponseTable();
$drp=$ResponseTable->getTable('TDROPDOWN');
$json_de=$drp;


//var_dump($json_de);
foreach($json_de as $keys=>$values)
{
	$options[$values['TYPE']]="<option value=''></option>";
	
}
foreach($json_de as $keys=>$values)
{
	$options[$values['TYPE']].="<option value='".$values['VALUE']."'>".$values['TEXT']."</option>";
	
}
$_SESSION['options']=$options;
header('location:../html/registrationlist.php');