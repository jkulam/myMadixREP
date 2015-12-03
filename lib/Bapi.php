<?php

global $rfc,$fce;
class Bapi
{
function bapiCall($bapiName)
	{
		global $rfc,$fce;
		$login=$_SESSION['sap_login'];
		$rfc = saprfc_open ($login);
		$fce = saprfc_function_discover($rfc,$bapiName);
if (!$fce) { echo "Discovering interface of function module failed"; exit; }
	}
}
class BapiCheck
{
function bapiChecks($bapiName)
	{
	global $rfc,$fce;
	

$fce = saprfc_function_discover($rfc,$bapiName);
if (! $fce ) { //echo "Discovering interface of function module failed"; 
	exit; }
$rfc_rc = saprfc_call_and_receive ($fce);
if ($rfc_rc != SAPRFC_OK) { if ($rfc == SAPRFC_EXCEPTION ) echo ("Exception raised: ".saprfc_exception($fce)); else echo (saprfc_error($fce)); exit; }
	}
}

class BapiImport 
{
	
	function setImport($fieldName,$value)
	{
		global $rfc,$fce;
saprfc_import($fce,$fieldName,$value);
}
	}
	
class BapiTable 
{
	function setTable($fieldName,$value)
	{	
	global $rfc,$fce;
saprfc_table_init ($fce,$fieldName);

saprfc_table_append ($fce,$fieldName, $value);
	


	}
}







class ResponseTable 
{
	function getTable($fieldName)
	{
		global $rfc,$fce;
		$SalesOrder="";
			$rowsag = saprfc_table_rows($fce,$fieldName);
	
       
	 for ($i=1;$i<=$rowsag;$i++){
	 $SalesOrder[]= saprfc_table_read ($fce,$fieldName,$i);
	//var_dump($SalesOrder);
	 } 
	 return $SalesOrder;
	}
}
class ResponseExport
{
	function export($fieldName)
	{
		global $rfc,$fce;
		$rowsag = saprfc_export($fce,$fieldName);
		return $rowsag;
	}
}
class Receive
{
	function getResult()
	{
		global $rfc,$fce;
		$rfc_rc = saprfc_call_and_receive ($fce);
// var_dump($rfc_rc);
if ($rfc_rc != SAPRFC_OK) { 
	if ($rfc == SAPRFC_EXCEPTION ) 
		echo ("Exception raised KK: ".saprfc_exception($fce));
	else 
		echo ("Error in rfc call KK: ".saprfc_error($fce)); 
	exit;
	 }
   }
}


class MultiBapi
{
function multiBapiCall($bapiName)
	{
		global $rfc,$fce;
		$fce = saprfc_function_discover($rfc,$bapiName);
if (!$fce) { echo "Discovering interface of function module failed"; exit; }
	}
}

class CommitBapi
{
	function bapiCommit($bapiName)
	{
		global $rfc,$fce;
		$fce = saprfc_function_discover($rfc,$bapiName);
if (!$fce) { echo "Discovering interface of function module failed"; exit; }

$rfc_rc = saprfc_call_and_receive ($fce);
// var_dump($rfc_rc);
if ($rfc_rc != SAPRFC_OK) { if ($rfc == SAPRFC_EXCEPTION ) echo ("Exception raised: ".saprfc_exception($fce)); else echo (saprfc_error($fce)); exit; }

	}
}
?>