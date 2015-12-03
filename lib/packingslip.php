<?php
session_start();
if(!isset($_SESSION['TOKEN']))
{
	header('location:../index.php');
	exit;
}
function moveElementInArray($array, $toMove, $targetIndex) {
    if (is_int($toMove)) {
        $tmp = array_splice($array, $toMove, 1);
        array_splice($array, $targetIndex, 0, $tmp);
        $output = $array;
    }
    elseif (is_string($toMove)) {
        $indexToMove = array_search($toMove, array_keys($array));
        $itemToMove = $array[$toMove];
        array_splice($array, $indexToMove, 1);
        $i = 0;
        $output = Array();
        foreach($array as $key => $item) {
            if ($i == $targetIndex) {
                $output[$toMove] = $itemToMove;
            }
            $output[$key] = $item;
            $i++;
        }
    }
    return $output;
}
$po=trim($_REQUEST['po']);
include('wsdls.php');
include('Bapi.php');
$Bapi=new Bapi();
$Bapi->bapiCall($bapiname['orders']);
$BapiImport= new BapiImport();
$BapiImport->setImport('TOKEN',$_SESSION['TOKEN']);
$BapiImport->setImport('ACTION','PACKINGBYPO');
$BapiImport->setImport('ACTION_KEY',$po);
$Receive= new Receive();
$Receive->getResult();
$ResponseTable= new ResponseTable();
$rp=$ResponseTable->getTable('TTEXT');

//echo 'E387B1F6E77CB2F197B300219BA1B6E0=='.$_SESSION['TOKEN'];


//$rp=$_SESSION['Ttext'];
//var_dump($rp);
$json_en=json_encode($rp);
$table_as=json_decode($json_en,true);
//var_dump($table_as);
if(!empty($table_as))
{
$i=0;
foreach($table_as as $keys=>$values)
{
	if($values['TYPE']=='PACKING')
	{
		$hr=$po;
	
		if($i==0)
		{
			$hr='PO Number';
			
		}
		$addpo=$hr.','.$values['TDLINE'];
		//$addpo=str_replace('"','',$addpo);
		//$addpo=str_replace('.','',$addpo);
		$array=str_getcsv($addpo);
	//	$dd[]=$array;
        $att=moveElementInArray($array, 15, 6);
		 $att=moveElementInArray($att, 0, 8);
		//$addpo=implode($att,',');

		$asd[]=$att;
		$i++;
	}
}
//var_dump($dd);
//exit;
}
else
{
	echo 'NO RECORDS FOUND';
}

$output = fopen("php://output",'w') or die("Can't open php://output");
header("Content-Type:application/csv"); 
header("Content-Disposition:attachment;filename=Packingslip.csv"); 
if(!empty($table_as))
{
foreach($asd as $product) {
    fputcsv($output, $product);
}
}
fclose($output) or die("Can't close php://output");

?>