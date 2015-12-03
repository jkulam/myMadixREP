<?php
include('wsdls.php');
include('Bapi.php');

$ICUSTOMER=array('MANDT'=>'','GUID'=>'','STATUS'=>'','TITLE'=>$_POST['title'],'FIRSTNAME'=>$_POST['firstname'],'LASTNAME'=>$_POST['lastname'],'KUNNR'=>$_POST['kunnr'],'PARVW'=>'','JOBTITLE'=>$_POST['jobtitle'],'TEL_NUMBER'=>$_POST['telnumber'],'TEL_EXTENS'=>'','CELLPHONE'=>$_POST['cellphone'],'FAX_NUMBER'=>$_POST['faxnumber'],'EMAIL'=>$_POST['email'],'COMPANYNAME'=>$_POST['companyname'],'STREET'=>$_POST['street'],'CITY'=>$_POST['city'],'STATE'=>$_POST['state'],'POSTALCODE'=>$_POST['postalcode'],'COUNTRY'=>$_POST['country'],'REGION'=>$_POST['region'],'COMPANYURL'=>$_POST['companyurl'],'COMPANYTYPE'=>$_POST['companytype'],'CUSTOMERTYPE'=>$_POST['customertype'],'STORES'=>'','NEWSTORES'=>'','FOCUS'=>'','INTERESTPRODUCT'=>'','INSTALLSERVICE'=>'','HOWLEARN'=>$_POST['howlearn'],'LOGONID'=>'','INITPASSWORD'=>'','EXPIRYDATE'=>'','ERNAM'=>'','CRDATE'=>'','CRTIME'=>'','CHDATE'=>'','CHTIME'=>'','LOCKFLAG'=>'','INTERNAL'=>'','MAILLIST'=>$_POST['maillist'],'MAXDAY'=>'','MAXORDER'=>'','PASSWORD'=>'');


try {
	$Bapi=new Bapi();
$Bapi->bapiCall($bapiname['registration_approval']);
$BapiImport= new BapiImport();
$BapiImport->setImport('ACTION','REGCHECK');
$BapiImport->setImport('ICUSTOMER',$ICUSTOMER);
$Receive= new Receive();
$Receive->getResult();

$ResponseExport= new ResponseExport();
$result=$ResponseExport->export('RETURN');
//var_dump($response_export);

}
catch(Exception $e) {
 echo $msg='Message:- ' .$e->getMessage();
  exit;
}
if($result['TYPE']=='E')
{
	echo $result['TYPE'].'@'.$result['MESSAGE'];
}
else
{
$BapiImport->setImport('ACTION','CREATE');
$BapiImport->setImport('ICUSTOMER',$ICUSTOMER);
$Receive->getResult();

$result=$ResponseExport->export('RETURN');
echo $result['TYPE'].'@'.$result['MESSAGE'];

}
?>