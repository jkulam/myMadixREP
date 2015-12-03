<?php
session_start();
if(!isset($_SESSION['TOKEN']))
{
	header('location:../index.php');
	exit;
}
include('wsdls.php');
include('Bapi.php');
$row=urldecode($_POST['row']);
$action=trim($_POST['action']);
$json=json_decode($row,true);
//var_dump($json);
//exit;
$options=$_SESSION['options'];


try {
$Bapi=new Bapi();
$Bapi->bapiCall($bapiname['orders']);
$BapiImport= new BapiImport();
$BapiImport->setImport('TOKEN',$_SESSION['TOKEN']);
$BapiImport->setImport('ACTION',$action);
$BapiImport->setImport('ACTION_KEY',trim($json['VBELN']));
$BapiImport->setImport('QORDERK',$json);
$Receive= new Receive();
$Receive->getResult();
$ResponseExport= new ResponseExport();
$r['ORDERK']=$ResponseExport->export('ORDERK');
$rowsag = saprfc_table_rows($fce,'TTEXT');
for ($i=1;$i<=$rowsag;$i++){
$r['TTEXT'][]= saprfc_table_read ($fce,'TTEXT',$i);
}
$rowsag = saprfc_table_rows($fce,'TORDERP');
for ($i=1;$i<=$rowsag;$i++){
$r['TORDERP'][]= saprfc_table_read ($fce,'TORDERP',$i);
} 
$rowsag = saprfc_table_rows($fce,'TSHIPMENTK');
for ($i=1;$i<=$rowsag;$i++){
$r['TSHIPMENTK'][]= saprfc_table_read ($fce,'TSHIPMENTK',$i);
} 
$rowsag = saprfc_table_rows($fce,'TSHIPMENTP');
for ($i=1;$i<=$rowsag;$i++){
$r['TSHIPMENTP'][]= saprfc_table_read ($fce,'TSHIPMENTP',$i);
} 
}
catch(Exception $e) {
 echo  $msg='Message:- ' .$e->getMessage();
  exit;
}
$_SESSION['test_data']=$r;
if($action!='SHIPMENT')
{
echo json_encode($r).'$@$'.$options[$r['ORDERK']['STATUS']];
}
else
{
echo json_encode($r);
}

//$_SESSION['order_details']=$r;
//echo $json_de=json_encode($r);
?>