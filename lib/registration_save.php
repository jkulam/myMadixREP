<?php
session_start();
if(!isset($_SESSION['TOKEN']))
{
	header('location:../index.php');
	exit;
}
include('wsdls.php');
include('Bapi.php');

$action=$_REQUEST['action'];
$Mandt=$_REQUEST['Mandt'];
$Status=$_REQUEST['Status'];
$Guid=$_REQUEST['Guid'];
$Title=$_REQUEST["Title"];
$Firstname=$_REQUEST["Firstname"];
$Lastname=$_REQUEST['Lastname'];
$Kunnr=$_REQUEST['Kunnr'];
$Parvw=$_REQUEST['Parvw'];
$Jobtitle=$_REQUEST['Jobtitle'];
$TelNumber=$_REQUEST['TelNumber'];
$TelExtens=$_REQUEST['TelExtens'];
$Cellphone=$_REQUEST['Cellphone'];
$FaxNumber=$_REQUEST['FaxNumber'];
$Email=$_REQUEST['Email'];
$Companyname=$_REQUEST["Companyname"];
$Street=$_REQUEST["Street"];
$City=$_REQUEST["City"];
$State=$_REQUEST["State"];
$Postalcode=$_REQUEST["Postalcode"];
$Country=$_REQUEST["Country"];
$Region=$_REQUEST["Region"];
$Companyurl=$_REQUEST["Companyurl"];
$Companytype=$_REQUEST["Companytype"];
$Customertype=$_REQUEST["Customertype"];
$Stores=$_REQUEST["Stores"];
$Newstores=$_REQUEST["Newstores"];
$Focus=$_REQUEST["Focus"];
$Interestproduct=$_REQUEST["Interestproduct"];
$Installservice=$_REQUEST["Installservice"];
$Howlearn=$_REQUEST["Howlearn"];
$Logonid=$_REQUEST["Logonid"];
$Initpassword=$_REQUEST["Initpassword"];
$Expirydate=$_REQUEST["Expirydate"];
$Ernam=$_REQUEST["Ernam"];
$Crdate=$_REQUEST["Crdate"];
$Crtime=$_REQUEST["Crtime"];
$Chdate=$_REQUEST["Chdate"];
$Chtime=$_REQUEST["Chtime"];
$Lockflag=$_REQUEST["Lockflag"];
$Internal=$_REQUEST["Internal"];
$Maillist=$_REQUEST["Maillist"];
$Maxday=$_REQUEST["Maxday"];
$Maxorder=$_REQUEST["Maxorder"];

try {
	$Bapi=new Bapi();
	$BapiImport= new BapiImport();
	$Receive= new Receive();
	$ResponseExport= new ResponseExport();
if($action=='RESETPW')
{
$Bapi->bapiCall($bapiname['change_password']);
$BapiImport->setImport('TOKEN',$_SESSION['TOKEN']);
$BapiImport->setImport('ACTION',$action);
$BapiImport->setImport('GUID',trim($Guid));
$Receive->getResult();
}
else
{
	
	$ICUSTOMER = array("MANDT"=>$Mandt,"GUID"=>$Guid,"STATUS"=>$Status,"TITLE"=>$Title,"FIRSTNAME"=>$Firstname,"LASTNAME"=>$Lastname,"KUNNR"=>$Kunnr,"PARVW"=>$Parvw,"JOBTITLE"=>$Jobtitle,"TEL_NUMBER"=>$TelNumber,"TEL_EXTENS"=>$TelExtens,"CELLPHONE"=>$Cellphone,"FAX_NUMBER"=>$FaxNumber,"EMAIL"=>$Email,"COMPANYNAME"=>$Companyname,"STREET"=>$Street,"CITY"=>$City,"STATE"=>$State,"POSTALCODE"=>$Postalcode,"COUNTRY"=>$Country,"REGION"=>$Region,"COMPANYURL"=>$Companyurl,"COMPANYTYPE"=>$Companytype,"CUSTOMERTYPE"=>$Customertype,"STORES"=>$Stores,"NEWSTORES"=>$Newstores,"FOCUS"=>$Focus,"INTERESTPRODUCT"=>$Interestproduct,"INSTALLSERVICE"=>$Installservice,"HOWLEARN"=>$Howlearn,"LOGONID"=>$Logonid,"INITPASSWORD"=>$Initpassword,"EXPIRYDATE"=>$Expirydate,"ERNAM"=>$Ernam,"CRDATE"=>$Crdate,"CRTIME"=>$Crtime,"CHDATE"=>$Chdate,"CHTIME"=>$Chtime,"LOCKFLAG"=>$Lockflag,"INTERNAL"=>$Internal,"MAILLIST"=>$Maillist,"MAXDAY"=>$Maxday,"MAXORDER"=>$Maxorder);
	
$Bapi->bapiCall($bapiname['registration_approval']);
$BapiImport->setImport('TOKEN',$_SESSION['TOKEN']);
$BapiImport->setImport('ACTION',$action);
$BapiImport->setImport('IGUID',$Guid);
$BapiImport->setImport('ICUSTOMER',$ICUSTOMER);
$Receive->getResult();
}
$rp=$ResponseExport->export('RETURN');
}
catch(Exception $e) {
 echo $msg='Message:- ' .$e->getMessage();
  exit;
}
echo $rp['TYPE'];

echo '@'.$rp['MESSAGE'];

//exit;
//echo $json_en=json_encode($rp);
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