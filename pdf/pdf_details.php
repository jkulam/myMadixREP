<?php
error_reporting(0);
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    ob_start();
    include(dirname(__FILE__).'/../html/pdf_details.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once(dirname(__FILE__).'/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($_REQUEST['Order'].'.pdf');
		header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="'.$_REQUEST['Order'].'.pdf"');
        //
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
