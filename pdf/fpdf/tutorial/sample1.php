<?php
require('../fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
	$lines = file($file);
	$data = array();
	$datas = explode('end', trim($lines[0]));
	foreach($datas as $line)
	{
		$line = substr($line, 0, -1);
		$data[] = explode('$@$',trim($line));
	}
	return $data;
}

// Simple table
function BasicTable($header, $data)
{
	$colWidth = array(40, 70, 40, 50, 55, 25);
    // Header
    foreach($header as $k => $col)
        $this->Cell($colWidth[$k],7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
		if($row[0] == "")
		{
			$this->Cell(40,6,$row[0],1);
			$this->Cell(40,6,$row[0],1);
			$this->Cell(40,6,$row[0],1);
			$this->Cell(40,6,$row[0],1);
		}
		else
		{
			foreach($row as $k => $col)
				$this->Cell($colWidth[$k],6,$col,1);
		}
        $this->Ln();
    }
}

// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 35, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
		if($row[0] == "")
		{
			$this->Cell($w[0],6,$row[0],'LR');
			$this->Cell($w[1],6,$row[0],'LR');
			$this->Cell($w[2],6,$row[0],'LR');
			$this->Cell($w[3],6,$row[0],'LR');
		}
		else
		{
			$this->Cell($w[0],6,$row[0],'LR');
			$this->Cell($w[1],6,$row[1],'LR');
			$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
			$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		}
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(175,175,175);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 40, 45,30,30,30,30);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
		if($row[0] == "")
		{
			$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[1],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[2],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[3],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[4],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[5],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[6],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[7],6,$row[0],'LR',0,'L',$fill);
		}
		else
		{
			$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[1],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[2],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[3],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[4],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[5],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[6],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[7],6,$row[0],'LR',0,'L',$fill);
		}
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$header = array('Bill-To','Ship-To/Ship-To Location','PO #','Order/Quote/Plant','Planned/Est. Arr Shipping','Status');
// Data loading
$data = $pdf->LoadData('data.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage('L');
//$pdf->BasicTable($header,$data);
/*$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();*/
$pdf->FancyTable($header,$data);
$pdf->Output();
?>