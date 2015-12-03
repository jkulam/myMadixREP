<?php
session_start();
if(!isset($_SESSION['TOKEN']))
{
	header('location:../index.php');
	exit;
}
include('wsdls.php');
include('Bapi.php');
$cust_id=$_REQUEST['id'];
$data=file_get_contents('../data/stockreport.json');
$json=json_decode($data,true);
if(isset($json[$cust_id]))
	{ 
	$jsondata=$json[$cust_id][0];
try {
$Bapi=new Bapi();
$Bapi->bapiCall($bapiname['stockreport']);
$BapiImport= new BapiImport();
$BapiImport->setImport('I_PLANT',$jsondata['I_PLANT']);
$BapiImport->setImport('I_MRP_AREA',$jsondata['I_MRP_AREA']);
$BapiImport->setImport('I_STORAGE',$jsondata['I_STORAGE']);
$Receive= new Receive();
$Receive->getResult();
$ResponseTable= new ResponseTable();
$rp=$ResponseTable->getTable('T_STATUS');
$array_str[]=array('MATNR'=>'Material','MAKTX'=>'Description','UNRES'=>'On hand','RSRVS'=>'Reserved','OPENS'=>'Incoming PO','AVAIL'=>'Available');
foreach($rp as $values){
  unset($values['MTART']);
  unset($values['WERKS']);
  unset($values['LGORT']);
  unset($values['BERID']);
  unset($values['KUNNR']);
  unset($values['EISBE']);
  unset($values['STATS']);
  unset($values['BSTMI']);
  unset($values['EINDT']);
  unset($values['KIT']);
  unset($values['PRICE']);
  unset($values['TOTVAL']);
$array_str[]=$values;
}
}
catch(Exception $e) {
  $msg='Message: ' .$e->getMessage();
  }


 $output = fopen("php://output",'w') or die("Can't open php://output");
header("Content-Type:application/csv"); 
header("Content-Disposition:attachment;filename=Stockreport.csv"); 

foreach($array_str as $product) {
    fputcsv($output, $product);
}

fclose($output) or die("Can't close php://output");
}
?>
