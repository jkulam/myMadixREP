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
$Bapi->bapiCall($bapiname['orders']);
$BapiImport= new BapiImport();
$BapiImport->setImport('TOKEN',$_SESSION['TOKEN']);
$BapiImport->setImport('ACTION','ORDERKLIST');
$Receive= new Receive();
$Receive->getResult();
$ResponseTable= new ResponseTable();
$rp=$ResponseTable->getTable('TORDERK');

//$ResponseExport= new ResponseExport();
//$rp=$ResponseExport->export('TORDERK');

}

//catch exception
catch(Exception $e) {
  $msg='Message: ' .$e->getMessage();
  if($_SESSION['screenwidth']<600)
{
	header('location:../html/morderlist.php?msg='.$msg);
}
else
{
header('location:../html/orderlist.php?msg='.$msg);
}
exit;
}

$table_as=$rp;
$_SESSION['table_as']=$table_as;
$Bapi->bapiCall($bapiname['dropdown']);
$Receive= new Receive();
$Receive->getResult();
$ResponseTable= new ResponseTable();
$drp=$ResponseTable->getTable('TDROPDOWN');
$json_dropdown=$drp;

foreach($json_dropdown as $keys=>$values)
{
	if($values['TYPE']='ORDSTATUS')
	{
	$options[$values['VALUE']]=$values['TEXT'];
	}
	
}

$_SESSION['options']=$options;
if($_SESSION['screenwidth']<600)
{
	header('location:../html/morderlist.php');
}
else
{
header('location:../html/orderlist.php');
}
?>