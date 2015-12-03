<?php
error_reporting(1);
include_once('../../html/pdf_orderlist.php');
require('mc_table.php');
// Load data

function LoadData($file)
{
	// Read file lines
	
	
	$datas = explode('end', trim($file));

	foreach($datas as $line)
	{
		$line = substr($line, 0, -3);
		$line_br=str_replace("<br>","\r\n",explode('$@$',trim($line)));
		$data[] = str_replace("&nbsp;"," ",$line_br);
	}
	return $data;
}
$hed=explode('end',$heds);
$line = substr($hed[0], 0, -3);
$header=explode('$@$',$line);

$data=LoadData($bdy);

//$header = array('Bill-To','Ship-To/Ship-To Location','PO #','Order/Quote/Plant','Planned/Est. Arr Shipping','Status');

$pdf = new PDF_MC_Table();
$pdf->SetWidths(array(40, 70, 40, 50, 55, 25));
$pdf->AddPage('L');
$pdf->SetFont('Arial','','');
$pdf->Image('../../images/madix-logo300.png',10,12,50,0,'','');

$pdf->SetTopMargin(35);

$pdf->Row($header);
foreach($data as $row)
	$pdf->Rows($row);

$pdf->Output();
header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="Order_list.pdf"');
?>