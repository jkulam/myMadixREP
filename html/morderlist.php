<?php
session_start();
if(!isset($_SESSION['TOKEN']))
{
	header('location:../index.php');
	exit;
}
$options=$_SESSION['options'];
$table_as=$_SESSION['table_as'];
$labels_today="BILLTONAME,SHIPTONAME,ORT01,REGIO,BSTNK,VBELN,QUOTATION,WERKS_NAME,WADAT_L,VDATU_L,STATUS,SHIPMENTFLAG";
$exp=explode(',',$labels_today);
$pdfdata=NULL;

if(!empty($table_as))
{
foreach($table_as as $val_t=>$retur1)
	{
	$retur=$retur1;
		$data=array('reports'=>json_encode($retur1).'$@$'.$retur[$exp[11]]);
		if(empty($retur[$exp[6]]))
		{
			$exp6=trim($retur[$exp[6]]);
		}
		else
		{
			$exp6=trim($retur[$exp[6]]).'<br>';
		}
	$order_t=array('Bill-To/Ship-To/Location'=>trim($retur[$exp[0]]).'<br>'.trim($retur[$exp[1]]).'<br>'.trim($retur[$exp[2]]).'&nbsp;'.trim($retur[$exp[3]]),'PO #/Order/Quote/Plant'=>trim($retur[$exp[4]]).'<br>'.trim($retur[$exp[5]]).'<br>'.$exp6.trim($retur[$exp[7]]),'Est. Arr /Status/Plan Shipping'=>trim($retur[$exp[9]]).'<br>'.trim($options[$retur[$exp[10]]]).'<br>'.trim($retur[$exp[8]]));
	$pdfdata[]=$order_t;
	//unset($retur[$exp[0]],$retur[$exp[1]],$retur[$exp[2]],$retur[$exp[3]],$retur[$exp[4]]);
	//$today=$retur;
	//$tables = array_merge((array)$order_t, (array)$today);
	$table[]=array_merge((array)$order_t, (array)$data);
	}
	//var_dump($table);
//include "../lib/bapi.php";
/**/
$SalesOrder=$table;
$_SESSION['table_today']=$table;
$rowsag1=count($SalesOrder);
//var_dump($SalesOrder);
$cont=30;
if($rowsag1<30)
{
	$cont=$rowsag1;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Madix :: Orderlist</title>
    <meta name="viewport" content="width=380">
    <meta name="description" content="A complete admin panel theme">
    <meta name="author" content="theemio">

 		 <link class="theme-css" href="../css/utopia-white.css" rel="stylesheet">
		  <link href="../css/utopia-responsive.css" rel="stylesheet">
		   <!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="../css/ie.css" />
<![endif]-->
    <link href="../css/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="../css/weather.css" rel="stylesheet" type="text/css"/>
    <link href="../css/gallery/modal.css" rel="stylesheet">
    <link href="../css/validationEngine.jquery.css" rel="stylesheet" type="text/css">
    <link href="../css/chosen.css" media="screen" rel="stylesheet" type="text/css"/>
   
	<link rel="stylesheet" href="../css/website.css" type="text/css" media="screen"/>
	 <link href="../css/alerts.css" type="text/css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="../css/colortip-1.0-jquery.css"/>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css"/>
<link rel="stylesheet" href="../css/jquery.contextmenu.css">
<link rel="stylesheet" href="../css/datepicker.css">


	<link href="../css/styles.css" rel="stylesheet"/>
	<link href="../css/table_header.css" rel="stylesheet"/>
	<link href="../css/TableTools.css" rel="stylesheet"/>
	<link href="../css/demo_table.css" rel="stylesheet"/>
	 <link href="../css/jquery.feedBackBox.css" rel="stylesheet" type="text/css">
	 <link href="../css/twit_style.css" rel="stylesheet" type="text/css">
	  <link rel="stylesheet" href="../css/dragtable-default.css" type="text/css" />
	  <script type="text/javascript" src="../js/jquery.min.js"></script>
     <script type="text/javascript" src="../js/jquery.cookie.js"></script>
<script type="text/javascript" src="../js/colortip-1.0-jquery.js"></script>

           
			<script src="../js/jquery.contextmenu.js"></script>
                <script src="../js/dashboard.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/FixedHeader.js"></script>

        <script src="../js/jquery.feedBackBox.js"></script>
   
<script type="text/javascript" charset="utf-8" src="../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/table.dragtable.js"></script>

    <script>
        if($.cookie("css")) {
            $('link[href*="utopia-white.css"]').attr("href",$.cookie("css"));
            $('link[href*="utopia-dark.css"]').attr("href",$.cookie("css"));
        }
        $(document).ready(function() {
            $(".theme-changer a").live('click', function() {
                $('link[href*="utopia-white.css"]').attr("href",$(this).attr('rel'));
                $('link[href*="utopia-dark.css"]').attr("href",$(this).attr('rel'));
                $.cookie("css",$(this).attr('rel'), {expires: 365, path: '/'});
                $('.user-info').removeClass('user-active');
                $('.user-dropbox').hide();
            });
        });
		
    </script>
<style>
.table th, .table tbody td, .tab_lit {
	display:table-cell;
	font-size:10px !important;
	}

.table th:nth-child(4), .table  td:nth-child(4){

	
	width:20px;
	
	
	}
	#mailto
	{
	display:none;
	}
	input.search_int
	{
	width:60px !important;
	}
	.details-table th, .details-table td {
    display: table-cell;
	width:50%
}
#post,
.order_titles
{
display:none !important;
}
.order_titles_th
{
border:none;
}
#shipping_status
{
width:330px;
}
.table {
    width: 655px;
    margin-bottom: 0px;
	
}
</style>
    <!--[if IE 8]>
    <link href="css/ie8.css" rel="stylesheet">
    <![endif]-->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>

<body >
<div class="row-fluid">
<div class='span12' id='header' >
<div class='span2'><a href='http://www.madixinc.com/' ><img src="../images/madix-logo300.png"></a></div><div class='span5 your_title' style='margin-top:45px;'><h2 id='he1'>| Your sales orders</h2></div>
<a href='../lib/logout.php' style='right:30px;position:absolute;top:60px;'>Logout</a>
    </div>
	</div>
<?php 
if(empty($table_as))
{?>
<div style="text-align:center;padding-top:10px;"><h3>No records found</h3><img src='../images/search-icons.png'/></div>
	
<?php exit; }//var_dump($_SESSION['order_details']);
?>
   <div class="container-fluid">
    <div class="row-fluid">
	<div style='display:none;margin-left:auto;margin-right:auto;padding-top:150px;width:400px;text-align:center;' id='sq'><h3>Please wait while your sales orders are loading...</h3><br><img src='../images/466.gif'/></div>
        <!-- Body start -->
		
		<div id='o_det' ><a href='../pdf/pdf_details.php?Order=Order_details' target='_blank'>Create PDF <img src="../images/pdf.png"></a></div>
		<div  id='o_ship' ><a href='#' target='_blank' id='excel_link'>Create Packing Slip by PO <img src="../images/excel.png"></a>&nbsp;&nbsp;<a href='../pdf/pdf_details.php?Order=Shipment' target='_blank'>Create PDF <img src="../images/pdf.png"></a></div>
		<table class='order_i' style='display:none;'>
		 <tr class='odd-s'>
		 <td valign='top' align='right'>Order #:</td><td class='Order' valign='top' align='left'></td>
		 </tr>
		 <tr class='even-s'>
		 <td valign='top' align='right'>Quotation #:</td><td class='Quotation' valign='top' align='left'></td>
		 </tr>

		 <tr class='odd-s'>
		<td valign='top' align='right' >PO Number:&nbsp;</td><td class='PO_Number' valign='top' align='left'></td></tr>
		<tr>
		<td valign='top' align='right'>Status:&nbsp;</td><td class='Status' valign='top' align='left'></td></tr>
		
		 <tr class='even-s'>
		 <td valign='top' align='right'>BOL Comments:</td><td><textarea class='BOL_Comments' valign='top' align='left'></textarea></td>
		 </tr>
		 
		 <tr class='odd-s'><td valign='top' align='right'>Received Date:</td><td class='Received_Date' valign='top' align='left'></td>
		 </tr>
		 <tr class='even-s'>
		 <td valign='top' align='right'>Sch. Arrival Date:</td><td class='Sch_Arrival_Date' valign='top' align='left'></td>
		 </tr>
		 
		 <tr class='odd-s'><td valign='top' align='right'>Bill-To:</td><td class='Bill_To' valign='top' align='left'></td>
		 </tr>
		 <tr class='even-s'>
		 <td valign='top' align='right'>Ship-To:</td><td class='Ship_To' valign='top' align='left'></td>
		 </tr>

		 <tr class='odd-s'><td valign='top' align='right'>Sales Rep:</td><td class='Sales_Rep' valign='top' align='left'></td>
		 </tr>
		 <tr class='even-s'>
		 <td valign='top' align='right' style='width:180px'>Customer Service Rep:</td><td class='Customer_Service_Rep' valign='top' align='left'></td></tr>

		 </table>
		 <div  id='order_details' style='margin-top:30px;border:none;display:none;'>
		 
		 <table class='order_details_align form_order_details' cellpadding='5px' cellspacing='5px'><tr>
		 <td valign='top'>
		 <table class='order_details'>
		 <tr class='odd-s'><td valign='top' align='right'>Order #:</td><td class='Order' valign='top' align='left'></td>
		 <td style='background:#fff;'></td><td valign='top' align='right'>Quotation #:</td><td class='Quotation' valign='top' align='left'></td></tr>
		 <tr class='even-s'><td colspan='2'><table cellpadding='0' cellspacing='0'><tr><td valign='top' align='right' >PO Number:&nbsp;</td><td class='PO_Number' valign='top' align='left'></td></tr><tr><td valign='top' align='right'>Status:&nbsp;</td><td class='Status' valign='top' align='left'></td></tr></table></td>
		 <td style='background:#fff;'></td><td valign='top' align='right'>BOL Comments:</td><td><textarea class='BOL_Comments' valign='top' align='left'></textarea></td></tr>
		 
		 <tr class='odd-s'><td valign='top' align='right'>Received Date:</td><td class='Received_Date' valign='top' align='left'></td>
		 <td style='background:#fff;'></td><td valign='top' align='right'>Sch. Arrival Date:</td><td class='Sch_Arrival_Date' valign='top' align='left'></td></tr>
		 
		 <tr class='even-s'><td valign='top' align='right'>Bill-To:</td><td class='Bill_To' valign='top' align='left'></td><td style='background:#fff;'></td>
		 <td valign='top' align='right'>Ship-To:</td><td class='Ship_To' valign='top' align='left'></td></tr>
		 <tr class='odd-s'><td valign='top' align='right'>Sales Rep:</td><td class='Sales_Rep' valign='top' align='left'></td><td style='background:#fff;'></td>
		 <td valign='top' align='right' style='width:180px'>Customer Service Rep:</td><td class='Customer_Service_Rep' valign='top' align='left'></td></tr>
		 </table></td>
		
		 </tr>
		 <tr><td colspan='2' align='center'></td></tr></table>


 <div class="order_titles_th">
		 <div class='order_titles' onClick='order_lines("line_order")'></div>
		 </div>
		 <table class="details-table table-striped table-bordered" width="950" id='line_order'>
		 <thead>
		
			<tr>
			
			<th width="15%">Customer Part #/Part #</th>
			
			<th width="*%">Product Description/Finish Code/Qty</th>
			
			
			</tr>
			</thead>
			<tbody id='table_details'>
			</tbody>
		</table>
		<div class="span11" style='text-align:center;margin-top:15px;'>
		<input type='button' value='Back' class='btn' style='width:90px;' id='back_to_list'/>
		</div>
		 </div>
		 <!-----End order detailes----->


         <!-----End order ship----->
 <div  id='order_ship' style='margin-top:35px;border:none;display:none;'>
  <div class="order_titles_th">
		<div class='order_titles' onClick='order_lines("bol_order")'></div></div>
		 
		 <table  class="details-table table-striped table-bordered" id="bol_order" >
			<thead>
			
			<tr>
			<th>BOL #/Pro Number/</th>
			
			
			<th >Carrier/Trailer #</th>
			
			</tr>
			</thead>
			<tbody id='bol_ship'>
			</tbody>
			</table>
			<br>
<div id='shipping_status'><span >Shipping Status<br></span><span id='ship_status'></span></div>
			<br>
			<div class="order_titles_th">
		<div class='order_titles' onClick='order_lines("qty_order")'></div></div>
		<table  class="details-table table-striped table-bordered" id="qty_order" >
			<thead>
			 
			<tr>
			<th>Sales Order/Customer PN/Product</th>
			
			<th>Product Desc/Ext Weight/Qty</th>
			
			</tr>
			</thead>
			<tbody id='sale_ship'>
			</tbody>
			</table>
		<div class="span11" style='text-align:center;margin-top:15px;'>
		<input type='button' value='Back' class='btn' style='width:90px;' id='back_to_list_ship'/>
		</div>
		 </div>
		 <!-----End order ship----->
        <div  id='output' style='margin-top:20px;'>
                    
<?php require_once "table_top.php";?>
 <div id='table_today'>
                             <table  class="table table-striped table-bordered" id="example"  alt="Sales_orders" style='margin:0px auto;position:relative;'>
                                                       
<?php
$table_th="";
$table_td="";
$th_example="";

for($i=0;$i<$cont;$i++)
{
	$ej=$SalesOrder[$i];
	if($i==0) { 
?>
      <thead>
	<tr >
	<?php
$nth=1;
	foreach($ej as $inner=>$value)
	{
	if($inner!='reports')
		{
		?>
	 
        
	<th onclick="rowShort('<?php echo $inner;?>',this,'BAPIVBRKOUT','table_today','order_list')" alt="<?php echo $nth;?>"><div class="example_<?php  echo $inner?> cutz" alt="<?php  echo $inner?>"><?php if($inner!='reports'){echo $inner;}?></div>
    <div class="example_th example_<?php  echo $inner?>_hid" name='<?php  echo $inner?>' style="display:none;"><?php if($inner!='reports'){echo $inner;}?></div>
	 <div class="example_tech" style="display:none;"><?php  echo $inner."@".$inner;?></div>
    </th>
   
	<?php
		}
	else
		{ ?>
		<th style='background:none;' alt="<?php echo $nth;?>">
    </th>
		<?php }
		$nth++;
	 } 
	 ?>
	
	</tr>
      <tr style="display:none;" class="example_filter">
    
	 <?php $s=1;
	 foreach($ej as $inner=>$value )
	{ ?>
     <th><?php if($inner!='reports'){ ?><input type="text"  til='order_list' class="search_int" value="" alt='<?php echo $s;?>' name="table_today@example" style='width:100px;'><?php }?><span style='position:absolute;margin-left:5px;margin-top:3px;' id='filter_result_<?php echo $s;?>'></span></th>
 
	<?php $s++;}
	?>
	
    </tr>
    </thead>
	<tbody id='example_tbody' >
    <?php
	 } 
	 if($i==0) {?>
     
    <?php } ?>

<tr Onclick="thisrow(this)" class='last_row'>
<?php

$col=0;
$ip=0;
	foreach($ej as $inner=>$value)
	{
		
if($inner=="reports")
	{
	$clss='no_docs';
	}
	else
		{
		$clss='show_docs';
		}
?>
	<td class="example_cl<?php echo  $col;?> <?php echo $clss;?>" >
    <?php
	
	if($inner=='Status')
		{
		if($value=='S')
			{
	$ip=1;
			}
		}
	if($inner=="reports")
	{
		
	$expt=explode('$@$',$value);
	?>

<div class='ship_img'><img src='../images/s_b_detl.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','ORDERKDETL',this,'')"/><?php if($expt[1]=='X') { ?>&nbsp;<img src='../images/s_b_trns.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','SHIPMENT',this,'')"/><?php } ?></div>

	<?php }
	else
	{
	
	if (is_numeric(trim($value))) {
	             echo round(trim($value),2);
				}
		     else
				{
			echo $value;
				}
	}
	?>
    
    </td>
	<?php
	$col++;
	}

	?>
	
    </tr>
   

    <?php
	}

?>

                                 </tbody>
                            </table>
							
                            </div>
							<?php if($rowsag1>30){ ?>
							<div class='testr table_today' onClick='kop()' style="display:none;">Show more</div>
							<?php }?>
                          <div id='example_num' style="display:none;" alt='datastore'>30</div>
 
                       <div class='bottom_btns' style='text-align:center;'>
          <button  style='width:90px' class='btn' onClick='refresh()'>Refresh</button>
		  </div>
                </div>
          
          

        </div><!-- Body end -->

    </div><!-- Maincontent end -->



<div id='example_table' style="display:none">
 <?php echo json_encode($pdfdata);?>
 </div>
<div id='export_table' style="display:none">
 
 </div>


	    
<script type="text/javascript" src="../js/utopia.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/alerts.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../js/ui/datepicker.js"></script>
<script type="text/javascript" src="../js/jquery.simpleWeather.js"></script>
<script src="../js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="../js/jquery.validationEngine-en.js" type="text/javascript"></script>

<script type="text/javascript" src="../js/chosen.jquery.js"></script>
<script type="text/javascript" src="../js/header.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables1.js"></script>
   <script type="text/javascript" charset="utf-8" src="../js/smart_table.js" ></script>
	<script src="../js/jquery.accordion.source.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="../js/tweetable.jquery.js"></script>
		<script type="text/javascript" src="../js/jquery.timeago.js"></script>
<script>
$(document).ready(function(e) {
	//alert($(window).width());
	$('.show_docs').click(function(){
		
	$(this).parent('tr').children('td:last-child').children('div').children('img:first-child').trigger('click');
	
	});
	$('.table tbody').scroll(function()
{
	if($(this).scrollTop()+$(this).innerHeight()+10>=$(this).get(0).scrollHeight)
	{
		kop()
	}

	})
	$('#back_to_list').click(function()
	{
		$('#output').show();
		if($(window).width()<750)
				{
			$('.order_i').hide();
				}

			$('#order_details').hide();
$(window).resize(function(e) {
	if($(window).width()<750)
				{
			$('.order_i').hide();
				}
});
			$('#he1').html('| Your sales order');
			$('#o_det').hide();
	});
	$('#back_to_list_ship').click(function()
	{
		$('#output').show();
			$('#order_ship').hide();
			$('#he1').html('| Your sales order');
			$('#o_ship').hide();
	});
    $('.search_int').keyup(function () {
		//alert('hi');
		sear($(this).attr('alt'),$(this).val(),$(this).attr('name'),'order_list')
		})
	 data_table('example');
	
	var wids=$('.table').width()-2;
	$('.head_icons').css({
			width:wids+'px'
     });
	 $('.top').css({width:wids+'px'}).html($('.head_icons').html());
	 $('.bottom').css({width:wids+'px'});
	 
	
});



 function kop()
 {
	

	var rows=$('#example_num').html();
	var page=$('#example_num').attr('alt');
	$('#example_num').html(Number(rows)+30);
	//alert(page+'=='+rows);
	$.ajax({
      type: "POST",
	  data:"rows="+rows+"&page=order_list",
      url: "../html/"+page+".php",
      success: function(html) {
		  //alert(html);
		  var rep=html.split('@$@');
		  $('.testr').hide();
		if(rep[1]!='NO_ROWS')
		  {
			
		  $('.last_row:last-child').after(rep[0]);
		  if($(window).width()<1024)
			  {
			  $('.testr').show();
		  $('.last_row td').css({display:'none'});
		   $('.table tr:first th').each(function()
				  {
					if($(this).css('display')=='table-cell')
					  {
						var nth=$(this).attr('alt');
						 $('.last_row td:nth-child('+nth+')').css({display:'table-cell'});
					  }
				  })
			  }
			  if($(window).width()<500)
			  {
				  $('.testr').show();
				  //alert($('window').width());
				  $('.last_row td').css({display:'none'});
				  $('.table tr:first th').each(function()
				  {
					if($(this).css('display')=='table-cell')
					  {
						var nth=$(this).attr('alt');
						 $('.last_row td:nth-child('+nth+')').css({display:'table-cell'});
					  }
				  })
		 $('.last_row td:nth-child(7)').css({display:'table-cell',width:'40px',position:'absolute',right:'10px'});
		   
			  }
		  }
	  }
	});
	

 }
	  function show_doc(datas,action,ids,po)
	  {

		  var src=$(ids).attr('src');
		  $(ids).attr('src','../images/ajax-loader1.gif');
		    $.ajax({
		type:'POST', 
		url: '../lib/details.php',
			data:'row='+datas+'&action='+action+'&po='+po,
		success: function(response) {
			//alert(response);
			if(action!='SHIPMENT')
			{
				
				$('#o_det').show();
			var resp=response.split('$@$');
			
			
			json_data=JSON.parse(resp[0]);
		
			$('.Order').html(json_data.ORDERK.VBELN);
			$('.Quotation').html(json_data.ORDERK.QUOTATION);
			$('.PO_Number').html(json_data.ORDERK.BSTNK);
			$('.Received_Date').html(json_data.ORDERK.ERDAT_L);
			$('.Sch_Arrival_Date').html(json_data.ORDERK.VDATU_L);
			$('.Bill_To').html(json_data.ORDERK.BILLTONAME+'<br>'+json_data.ORDERK.STRAS_BT+'<br>'+json_data.ORDERK.REGIO_BT);
			$('.Ship_To').html(json_data.ORDERK.SHIPTONAME+'<br>'+json_data.ORDERK.STRAS+'<br>'+json_data.ORDERK.REGIO);
			var bol='';
			
			if(!jQuery.isEmptyObject(json_data.TTEXT))
			{
			$.each(json_data.TTEXT,function(i,item)
			{
				
		   $.each(item,function(key,value)
			{
				bol += value;
			});
			bol +='    ';
			});
			}
			$('.BOL_Comments').html(bol);
			$('.Status').html(resp[1]);
			$('.Sales_Rep').html(json_data.ORDERK.SALESREP_NAME+'<br>'+json_data.ORDERK.SALESREP_EMAIL+'<br>'+json_data.ORDERK.SALESREP_PHONE);
			$('.Customer_Service_Rep').html(json_data.ORDERK.SERVICE_NAME+'<br>'+json_data.ORDERK.SERVICE_EMAIL+'<br>'+json_data.ORDERK.SERVICE_PHONE);
			//var data_details='';
			if(!$.isArray(json_data.TORDERP))
				{
				//	alert('no');
					var arrayop=new Array();
					arrayop[0]=json_data.TORDERP;
json_data.TORDERP=arrayop;
				}
				//alert(json_data.Torderp.item);
				var data_details='';
			$.each(json_data.TORDERP,function(i,orderp)
			{
			//alert(orderp.Posnr);
			$('#he1').html('| Order '+orderp.POSNR)
			data_details+='<tr>';
			
            data_details+='<td>'+orderp.KDMAT+'<br>'+orderp.MATNR+'</td>';
			
			data_details+='<td>'+orderp.MAKTX+'<br>'+orderp.FINISHCODE+'<br>'+orderp.QTY+'</td>';
			
			data_details+='</tr>';
			});
			
            $('#table_details').html(data_details);
			$('#order_details').show();
			
			if($(window).width()<750)
				{
				
			$('.order_i').show();
				}
				$(window).resize(function(e) {
					if($(window).width()<750)
				{
				
			$('.order_i').show();
				}
				else
					{
					$('.order_i').hide();
					}
				});
			var order_id='order_details';
			}
			else
			{
				$('#excel_link').attr('href','../lib/packingslip.php?po='+po);
				$('#o_ship').show();
				var json_data=JSON.parse(response);

				var bol_ship='';
				var t1='';
				var t2='';
				var t3='';
				if(!$.isArray(json_data.TSHIPMENTK))
				{
				//	alert('no');
					var array=new Array();
					array[0]=json_data.TSHIPMENTK;
json_data.TSHIPMENTK=array;
				}
				$.each(json_data.TSHIPMENTK,function(i,shipk)
			{
					
		        bol_ship +='<tr><td>'+shipk.TKNUM+'<br>'+shipk.SIGNI+'</td>';
			
				bol_ship +='<td>'+shipk.TDLNR_NAME;
				
				
				$.each(json_data.TTEXT,function(i,item)
			{
					if($.trim(item.TYPE)==$.trim(shipk.TKNUM) && $.trim(item.SEQNR)=='901')
				{
						 t1 =item.TDLINE;
				}
				//alert($.trim(item.Type)+'=='+shipk.Tknum +'&&'+ $.trim(item.Seqnr)+'==902');
                   if($.trim(item.TYPE)==$.trim(shipk.TKNUM) && $.trim(item.SEQNR)=='902')
				{
						t2 =item.TDLINE;
				}
// alert($.trim(item.Type)+'=='+$.trim(shipk.Tknum) +'&&'+ $.trim(item.Seqnr)+'!=901');
				if($.trim(item.TYPE)==$.trim(shipk.TKNUM) && $.trim(item.SEQNR)!='901')
				{
						t3 +=item.TDLINE+'<br>';
				}

			});

               bol_ship += t1+'<br>'+t2+'</td></tr>';
		      
             
			})
			  //bol_ship +='<tr><td colspan="6"><span  style="COLOR:blue;FONT-WEIGHT:bold">Shipping Status<br>'+t3+'</span></td></tr>';
             $('#ship_status').html(t3);
			   $('#bol_ship').html(bol_ship);
//..............................................................
var sale_ship='';
//alert(json_data.Tshipmentp.item.Vgbel);
if(!$.isArray(json_data.TSHIPMENTP))
				{

	if($.trim(json_data.TSHIPMENTK[0].TKNUM)==$.trim(json_data.TSHIPMENTP.TKNUM))
				{
			$('#he1').html('| Shipment of order '+json_data.TSHIPMENTP.VGBEL)
            sale_ship +=  '<tr><td>'+json_data.TSHIPMENTP.VGBEL+'<br>'+json_data.TSHIPMENTP.KDMAT+'<br>'+json_data.TSHIPMENTP.MATNR+'</td>';
            sale_ship +=  '<td>'+json_data.TSHIPMENTP.MAKTX+'<br>'+json_data.TSHIPMENTP.BRGEW+'<br>'+json_data.TSHIPMENTP.LFIMG+'</td></tr>';
				}

					
				//	var arrayp=new Array();
					//arrayp[0]=json_data.Tshipmentp.item;
//json_data.Tshipmentp.item=array;
				}
	$.each(json_data.TSHIPMENTP,function(i,shipp)
			{
		
		//alert($.trim(json_data.Tshipmentk.item[0].Tknum)+'=='+$.trim(shipp.Vgbel));
		if($.trim(json_data.TSHIPMENTK[0].TKNUM)==$.trim(shipp.TKNUM))
				{
			$('#he1').html('| Shipment of order '+shipp.VGBEL)
            sale_ship +=  '<tr><td>'+shipp.VGBEL+'<br>'+shipp.KDMAT+'<br>'+shipp.MATNR+'</td>';
            sale_ship +=  '<td>'+shipp.MAKTX+'<br>'+shipp.BRGEW+'<br>'+shipp.LFIMG+'</td></tr>';
				}
			});
			
           $('#sale_ship').html(sale_ship);
				$('#order_ship').show();
				var order_id='order_ship';
				//$('#order_ship').append(response);
			}
			 $(ids).attr('src',src);
			$('#output').hide();
			
			//$('#order_details').append(response);
			/*var json_data=JSON.parse(response)
				$.each(json_data, function(i, item) {
    alert(i+'='+item);
  });*/
		
			//alert(order_id);
		 var table_data=$('#'+order_id).html();
		   $.ajax({
		type:'POST', 
		data:'name='+name+'&post_data='+encodeURIComponent(table_data),
		url: 'pdf_details.php', 
		success: function(response) {
			//alert('hi');
			
			//window.open('../pdf/pdf_order.php', '_blank');
		}
		   });	
		}
		
			});
	  }
	 function refresh()
	 {
		$('#sq').show(); 
		$('#output').hide();
		window.location.replace('../lib/orderlist.php');
	 }
	 function packing_slip()
	 {
		 jPrompt1('Enter PO Number','','Create Packing Slip by PO',function(r){
			 if(r!=null){

			 window.open('../lib/packingslip.php?po='+r, '_blank');
			 }
			 

		 });
	 }
</script>

</body>
</html>
