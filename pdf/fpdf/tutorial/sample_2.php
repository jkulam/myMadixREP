<?php
error_reporting(1);
require('../fpdf.php');
global $pdf;

//function hex2dec
//returns an associative array (keys: R,G,B) from
//a hex html code (e.g. #3FE5AA)
function hex2dec($couleur = "#000000"){
    $R = substr($couleur, 1, 2);
    $rouge = hexdec($R);
    $V = substr($couleur, 3, 2);
    $vert = hexdec($V);
    $B = substr($couleur, 5, 2);
    $bleu = hexdec($B);
    $tbl_couleur = array();
    $tbl_couleur['R']=$rouge;
    $tbl_couleur['G']=$vert;
    $tbl_couleur['B']=$bleu;
    return $tbl_couleur;
}

//conversion pixel -> millimeter in 72 dpi
function px2mm($px){
    return $px*25.4/72;
}

function txtentities($html){
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}
////////////////////////////////////
class PDF extends FPDF
{
	//variables of html parser
	var $B;
	var $I;
	var $U;
	var $HREF;
	var $fontList;
	var $issetfont;
	var $issetcolor;

	function PDF($orientation='P', $unit='mm', $format='A4')
	{
		//Call parent constructor
		$this->FPDF($orientation,$unit,$format);
		//Initialization
		$this->B=0;
		$this->I=0;
		$this->U=0;
		$this->HREF='';

		$this->tableborder=0;
		$this->tdbegin=false;
		$this->tdwidth=0;
		$this->tdheight=0;
		$this->tdalign="L";
		$this->tdbgcolor=false;

		$this->oldx=0;
		$this->oldy=0;

		$this->fontlist=array("arial","times","courier","helvetica","symbol");
		$this->issetfont=false;
		$this->issetcolor=false;
	}

	//////////////////////////////////////
	//html parser

	function WriteHTML($html)
	{
		$html=strip_tags($html,"<b><u><i><a><img><p><br><strong><em><font><tr><blockquote><hr><td><tr><table><sup>"); //remove all unsupported tags
		$html=str_replace("\n",'',$html); //replace carriage returns by spaces
		$html=str_replace("\t",'',$html); //replace carriage returns by spaces
		$a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE); //explodes the string
		foreach($a as $i=>$e)
		{
			if($i%2==0)
			{
				//Text
				if($this->HREF)
					$this->PutLink($this->HREF,$e);
				elseif($this->tdbegin) {
					if(trim($e)!='' && $e!="&nbsp;") {
						$this->Cell($this->tdwidth,$this->tdheight,$e,$this->tableborder,'',$this->tdalign,$this->tdbgcolor);
					}
					elseif($e=="&nbsp;") {
						$this->Cell($this->tdwidth,$this->tdheight,'',$this->tableborder,'',$this->tdalign,$this->tdbgcolor);
					}
				}
				else
					$this->Write(5,stripslashes(txtentities($e)));
			}
			else
			{
				//Tag
				if($e[0]=='/')
					$this->CloseTag(strtoupper(substr($e,1)));
				else
				{
					//Extract attributes
					$a2=explode(' ',$e);
					$tag=strtoupper(array_shift($a2));
					$attr=array();
					foreach($a2 as $v)
					{
						if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
							$attr[strtoupper($a3[1])]=$a3[2];
					}
					$this->OpenTag($tag,$attr);
				}
			}
		}
	}

	function OpenTag($tag, $attr)
	{
		//Opening tag
		switch($tag){

			case 'SUP':
				if( !empty($attr['SUP']) ) {    
					//Set current font to 6pt     
					$this->SetFont('','',6);
					//Start 125cm plus width of cell to the right of left margin         
					//Superscript "1" 
					$this->Cell(2,2,$attr['SUP'],0,0,'L');
				}
				break;

			case 'TABLE': // TABLE-BEGIN
				if( !empty($attr['BORDER']) ) $this->tableborder=$attr['BORDER'];
				else $this->tableborder=0;
				break;
			case 'TR': //TR-BEGIN
				break;
			case 'TD': // TD-BEGIN
				if( !empty($attr['WIDTH']) ) $this->tdwidth=($attr['WIDTH']/4);
				else $this->tdwidth=40; // Set to your own width if you need bigger fixed cells
				if( !empty($attr['HEIGHT']) ) $this->tdheight=($attr['HEIGHT']/6);
				else $this->tdheight=6; // Set to your own height if you need bigger fixed cells
				if( !empty($attr['ALIGN']) ) {
					$align=$attr['ALIGN'];        
					if($align=='LEFT') $this->tdalign='L';
					if($align=='CENTER') $this->tdalign='C';
					if($align=='RIGHT') $this->tdalign='R';
				}
				else $this->tdalign='L'; // Set to your own
				if( !empty($attr['BGCOLOR']) ) {
					$coul=hex2dec($attr['BGCOLOR']);
						$this->SetFillColor($coul['R'],$coul['G'],$coul['B']);
						$this->tdbgcolor=true;
					}
				$this->tdbegin=true;
				break;
			case 'HR':
				if( !empty($attr['WIDTH']) )
					$Width = $attr['WIDTH'];
				else
					$Width = $this->w - $this->lMargin-$this->rMargin;
				$x = $this->GetX();
				$y = $this->GetY();
				$this->SetLineWidth(0.2);
				$this->Line($x,$y,$x+$Width,$y);
				$this->SetLineWidth(0.2);
				$this->Ln(1);
				break;
			case 'STRONG':
				$this->SetStyle('B',true);
				break;
			case 'EM':
				$this->SetStyle('I',true);
				break;
			case 'B':
			case 'I':
			case 'U':
				$this->SetStyle($tag,true);
				break;
			case 'A':
				$this->HREF=$attr['HREF'];
				break;
			case 'IMG':
				if(isset($attr['SRC']) && (isset($attr['WIDTH']) || isset($attr['HEIGHT']))) {
					if(!isset($attr['WIDTH']))
						$attr['WIDTH'] = 0;
					if(!isset($attr['HEIGHT']))
						$attr['HEIGHT'] = 0;
					$this->Image($attr['SRC'], $this->GetX(), $this->GetY(), px2mm($attr['WIDTH']), px2mm($attr['HEIGHT']));
				}
				break;
			case 'BLOCKQUOTE':
			case 'BR':
				$this->Ln(5);
				break;
			case 'P':
				$this->Ln(10);
				break;
			case 'FONT':
				if (isset($attr['COLOR']) && $attr['COLOR']!='') {
					$coul=hex2dec($attr['COLOR']);
					$this->SetTextColor($coul['R'],$coul['G'],$coul['B']);
					$this->issetcolor=true;
				}
				if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist)) {
					$this->SetFont(strtolower($attr['FACE']));
					$this->issetfont=true;
				}
				if (isset($attr['FACE']) && in_array(strtolower($attr['FACE']), $this->fontlist) && isset($attr['SIZE']) && $attr['SIZE']!='') {
					$this->SetFont(strtolower($attr['FACE']),'',$attr['SIZE']);
					$this->issetfont=true;
				}
				break;
		}
	}

	function CloseTag($tag)
	{
		//Closing tag
		if($tag=='SUP') {
		}

		if($tag=='TD') { // TD-END
			$this->tdbegin=false;
			$this->tdwidth=0;
			$this->tdheight=0;
			$this->tdalign="L";
			$this->tdbgcolor=false;
		}
		if($tag=='TR') { // TR-END
			$this->Ln();
		}
		if($tag=='TABLE') { // TABLE-END
			//$this->Ln();
			$this->tableborder=0;
		}

		if($tag=='STRONG')
			$tag='B';
		if($tag=='EM')
			$tag='I';
		if($tag=='B' || $tag=='I' || $tag=='U')
			$this->SetStyle($tag,false);
		if($tag=='A')
			$this->HREF='';
		if($tag=='FONT'){
			if ($this->issetcolor==true) {
				$this->SetTextColor(0);
			}
			if ($this->issetfont) {
				$this->SetFont('arial');
				$this->issetfont=false;
			}
		}
	}

	function SetStyle($tag, $enable)
	{
		//Modify style and select corresponding font
		$this->$tag+=($enable ? 1 : -1);
		$style='';
		foreach(array('B','I','U') as $s) {
			if($this->$s>0)
				$style.=$s;
		}
		$this->SetFont('',$style);
	}

	function PutLink($URL, $txt)
	{
		//Put a hyperlink
		$this->SetTextColor(0,0,255);
		$this->SetStyle('U',true);
		$this->Write(5,$txt,$URL);
		$this->SetStyle('U',false);
		$this->SetTextColor(0);
	}
	
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
			$data[] = explode(';',trim($line));
		}
		return $data;
	}

	// Simple table
	function BasicHTML($header, $data)
	{
		$thead = '';
		$body = '';
		// Header
		foreach($header as $col)
		{
			/*for ($i=0; $i<6; $i++) //Avoid very lengthy texts
				$row[$i]=substr($row[$i],0,160);
			*/
			//$col = substr($col, 0, 12);
			echo $col = substr_replace($col, '<br>', 12, 0);
			echo "<br />";
			$thead .= '<td width="125" height="80">'.$col.'</td>';
		}
		exit;
		
		// Data
		/*foreach($data as $row)
		{
			$body .= '<tr>';
			foreach($row as $col)
			{
				$col = ($col == "") ? "&nbsp;" : $col;
				$body .= '<td width="20">'.$col.'</td>';
			}
			$body .= '</tr>';
		}*/
		
		$html = '<table border="1" cellpadding="0" cellspacing="0"><thead><tr>'.$thead.'</tr></thead><tbody>'.$body.'</tbody></table>';
		/*echo $html;
		exit;*/
		return $html;
	}

	// Simple table
	function BasicTable($header, $data)
	{
		global $pdf;
		// Header
		foreach($header as $col)
			$this->Cell(40,7,$col,1);
		$this->Cell(30,7,'Image',1);
		$this->Ln();
		// Data
		foreach($data as $row)
		{
			$image1 = "logo.png";
			//$image = $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78);
			if($row[0] == "")
			{
				$this->Cell(40,6,$row[0],1);
				$this->Cell(40,6,$row[0],1);
				$this->Cell(40,6,$row[0],1);
				$this->Cell(40,6,$row[0],1);
				//$this->Cell(30,6,$image,1);
			}
			else
			{
				foreach($row as $col)
					$this->Cell(40,21,$col,1);
				$this->Cell( 30, 21, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 30), 1, 0, 'L', false );
				//$pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78);
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
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		// Header
		$w = array(40, 35, 40, 45);
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
			}
			else
			{
				$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
				$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
				$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
				$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
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
//$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
$header = array('Bill-To','Ship-To/Ship-To Location','PO #','Order/Quote/Plant','Planned/Est. Arr Shipping','Status');
// Data loading
$data = $pdf->LoadData('data.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$html = $pdf->BasicHTML($header,$data);
$pdf->WriteHTML($html);
/*$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->AddPage();
$pdf->FancyTable($header,$data);*/
$pdf->Output();
?>