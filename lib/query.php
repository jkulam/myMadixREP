<?php

session_start();
if (!isset($_SESSION['TOKEN'])) {
	header('Location: ../index.php');
	exit();
}

require('wsdls.php');
require('Bapi.php');

$part  = $_POST['part'];
$city  = $_POST['city'];
$zip   = $_POST['zip'];
$state = $_POST['state'];
$date  = $_POST['date'];
$store = $_POST['store'];

$part = strtoupper($part);

/*
	Input validations must be done here as follows:

	$response = array(
		"success" => false,
		"error"   => "Error message"
	);
*/

$response = array();
if (empty($response)) {
	try {
		$bapi = new Bapi();
		$bapi->bapiCall($bapiname['query']);

		$bapiImport = new BapiImport();
		$bapiImport->setImport('TOKEN',$_SESSION['TOKEN']);
		$bapiImport->setImport('MATNR',$part);
		$bapiImport->setImport('ORT01',$city);
		$bapiImport->setImport('REGIO',$state);
		$bapiImport->setImport('PSTLZ',$zip);
		$bapiImport->setImport('DATE',$date);
		$bapiImport->setImport('STORE',$store);

		$receive = new Receive();
		$receive->getResult();

		$responseTable = new ResponseTable();

		$results  = $responseTable->getTable('TLIST');
		$response = array(
			"success" => true,
			"data"   => $results
		);
	} catch(Exception $e) {
		$response = array(
			"success" => false,
			"error"   => $e->getMessage()
		);
	}
}

header("Content-Type: application/json");
echo json_encode($response);

?>