<?php
define('FPDF_FONTPATH', '../../font/');
require('../../fpdf.php');
require ('InvoicePDF.class.php');
$pdf = new InvoicePDF();
$pdf->Output();
