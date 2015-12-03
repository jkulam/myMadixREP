<?php
session_start();

include('wsdls.php');
include('Bapi.php');
try{
	$Bapi=new Bapi();
$Bapi->bapiCall($bapiname['dropdown']);

$Receive= new Receive();
$Receive->getResult();
$ResponseTable= new ResponseTable();
$rp=$ResponseTable->getTable('TDROPDOWN');

}
catch(Exception $e) {
 echo $msg='Message:- ' .$e->getMessage();
  exit;
}
//print_r($r);
$json_en=json_encode($rp);
$json_de=json_decode($json_en,true);
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
header('location:../html/registration.php');