<?php
session_start();
if(!isset($_SESSION['TOKEN']))
{
	header('location:../index.php');
	exit;
}
$options=$_SESSION['options'];
//var_dump($options);
$table_as=$_SESSION['table_reg_list'];
//var_dump($table_as);
$labels_today="COMPANYNAME,FIRSTNAME,LASTNAME,EMAIL,CRDATE_L,DISPLAYSTATUS,LOCKFLAG,GUID";
$exp=explode(',',$labels_today);
$pdfdata=NULL;

if(!empty($table_as))
{
foreach($table_as as $val_t=>$retur1)
	{
	$retur=$retur1;
	$data=array('Status'=>trim($retur[$exp[5]]).'@'.$retur[$exp[6]].'@'.$retur[$exp[7]]);
		
	$order_t=array('Company'=>trim($retur[$exp[0]]),'First Name'=>trim($retur[$exp[1]]),'Last Name'=>trim($retur[$exp[2]]),'Email'=>trim($retur[$exp[3]]),'Submitted'=>trim($retur[$exp[4]]));
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
    <title>Madix :: Registrationlist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=0">
    <meta name="description" content="A complete admin panel theme">
    <meta name="author" content="theemio">

		
 		 <link class="theme-css" href="../css/utopia-white.css" rel="stylesheet">
		 <!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="../css/ie.css" />
<![endif]-->
		  <link href="../css/utopia-responsive.css" rel="stylesheet">
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
.order_details
{
text-align:center;
}

.order_details_align
{
width:980px;
margin:0px auto;


}
.order_details tr td
{
	width:150px;
	
	
}
.order_details_align tr td
{
padding:5px; 
}
.clear
{
display:none;
}

.search_int
{
margin-bottom:0px;
}
.table th:nth-child(1), .table td:nth-child(1) {
    width: 225px ;
}
.table th:nth-child(2), .table td:nth-child(2) {
    width: 203px ;
}
.table th:nth-child(3), .table td:nth-child(3) {
    width: 203px ;
}
.table th:nth-child(4), .table td:nth-child(4) {
    width: 250px ;
}
.table th:nth-child(6), .table td:nth-child(6) {
    width: 100px ;
}

.table td
{
padding-top:5px !important;
padding-bottom:5px !important;
}
.bottom_btns
{

margin:0px auto;
margin-top:15px;
text-align:center;

}
.bottom_btns button
{


margin-left:5px;


}
.reg_table_row div:nth-child(1) {
    min-width: 269px !important;
    font-size: 12px !important;;
	}
	#filtes2 {
    float: right;
    background: url("../images/filter1.png") no-repeat scroll 0% 0% transparent;
    width: 32px;
    height: 26px;
    cursor: pointer;
    z-index: 10;
}
#myMadixrefresh
{
background:url('../images/Refresh-icon.png') no-repeat;
background-position: top 5px left 5px;

}
#myMadixSubmit
{
background:url('../images/Save-icon.png') no-repeat;
background-position: top 5px left 5px;
}
#myMadixunlock
{
background:url('../images/Unlock-icon.png') no-repeat;
background-position: top 5px left 5px;
}
.myMadixunlock
{
background:url('../images/Unlock-icon.png') no-repeat;
background-position: top 5px left 5px;
position:absolute;
margin-left:5px;

}
.myMadixunlock:hover
{
background-color:none !important;
background-position: top 5px left 5px !important;
}
#myMadixDelete
{
background:url('../images/Delete-icons.png') no-repeat;
background-position: top 5px left 5px;
}
#myMadixResetpassword
{
background:url('../images/Reset-icon.png') no-repeat;
background-position: top 5px left 5px;
}
#back_to_list
{
background:url('../images/Back-icon.png') no-repeat;
background-position: top 5px left 5px;
}
@media all and (max-width : 750px) {
.table th, .table td {
    width: 100% !important;
}
.table td:nth-child(6) {
   
	display:table-cell;
	width:40px !important;
	position:absolute;
	right:5px;
	border:none !important;
	
}
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
<div class='span12' id='header'>
<div class='span2'><a href='http://www.madixinc.com/' ><img src="../images/madix-logo300.png"></a></div><div class='span5 your_title' style='margin-top:45px;'><h2 id='he1'>| Web User Registration</h2></div>
<a href='../lib/logout.php' style='right:30px;position:absolute;top:60px;'>Logout</a>
    </div>
	</div>
<?php 
if(isset($_REQUEST['error']))
{ ?>
<div style="text-align:center;padding-top:10px;"><h3><?php echo $_REQUEST['error'];?></h3><img src='../images/warning-icon.png'/></div>
<?php exit;}
else
{
if(empty($table_as))
{?>
<div style="text-align:center;padding-top:10px;"><h3>No records found</h3><img src='../images/search-icons.png'/></div>
	
<?php exit; }
}
//var_dump($_SESSION['order_details']);
?>
<div id='UserId'></div>
<div style='display:none;margin-left:auto;margin-right:auto;padding-top:150px;width:400px;text-align:center;' id='sq'><img src='../images/466.gif'/></div>
<div class='registration_list' style='display:none'>
<form name="mainform" method="post" ACTION="javascript:submit_onclick('save')" id="myMadixRegistrationForm" class="form-horizontal create_account" style='padding-top:10px;'>
                      
						<table class='reg_form'>
						<tr><td><div valign='top' class='reg_padding reg_form_create'>
						<div class='reg_table_row'>
                                <div>M/M<span> </span>:</div>
                                <div>
								<select class="chzn-select-deselect  "  name="Title" id='TITLE'>
                                 <?php echo $options['TITLE'];?>
	                                </select>
									<button TYPE="button"   class='myMadixunlock btn'  style='width:29px;' onclick="submit_onclick('unlock',this)" style='display:none'>&nbsp;</button>
                                </div>
								</div>
                           <!----------------------------------------------------------------------------->
                            <div class='reg_table_row'>
								 <div>First Name<span> *</span>:</div>

                                <div>
                              <input id="FIRSTNAME" class=" validate[required] " type="text" name='Firstname'  placeholder="First Name"  autocomplete="off">
                                </div>
                            </div>
							<!------------------------------------------------------------------------------->
                                                        <div class='reg_table_row'>
                                <div>Last Name<span> *</span>:</div>

                                <div>
                                    <input id="LASTNAME" class=" validate[required] " type="text" name='Lastname' placeholder="Last Name"   autocomplete="off">
                                </div>
                            </div>
							<!-------------------------------------------------------------------------------->
                            <div class='reg_table_row' >
							
                                <div>Job Title<span> </span>:</div>

                                <div>
                          <input   type="text" name='Jobtitle'  placeholder="Job Title" id='JOBTITLE'  autocomplete="off">
                                   
                                </div>
                            </div>
                           <!--------------------------------------------------------------------------------->
                   <div class='reg_table_row'>
                                <div>Company Name<span> *</span>:</div>

                                <div >
                                    <input id="COMPANYNAME" class=" validate[required,custom[onlyLetterSp]] " type="text" name='Companyname' placeholder="Company Name"  autocomplete="off">
                                </div>
                            </div>
							<!--------------------------------------------------------------------------------->
							 <div class='reg_table_row hidden_fields'>
                                <div>Company Type<span> *</span>:</div>

                                <div >
                                    <select class="chzn-select-deselect  validate[required]" name="Companytype" id='COMPANYTYPE'>
                                    <?php echo $options['COMPTYPE'];?>
	                                </select>
                                </div>
                            </div>
							<!------------------------------------------------------------------------------------>
                      <div class='reg_table_row hidden_fields'>
                                <div>Unique Customer Type<span> </span>:</div>

                                <div >
								<select class="chzn-select-deselect"  name="Customertype" id='CUSTOMERTYPE'>
                                   <?php echo $options['CUSTTYPE'];?>
	                                </select>
                                </div>
                            </div>
<!-------------------------------------------------------------------------------------------------------------->
                   <div class='reg_table_row'>
                                <div >Email Address<span> *</span>:</div>

                                <div >
                              <input id='EMAIL'  class=" validate[required,custom[email]] " type="text" name='Email' placeholder="Email Address" autocomplete="off">
                                </div>
                            </div>
<!------------------------------------------------------------------------------------------------------------------->
							 <div class='reg_table_row'>
                                <div>Work Ph #<span> *</span>:</div>

                                <div >
                                    <input  class=" validate[required] " id='TEL_NUMBER' type="text" name='TelNumber' placeholder="Work Ph #"  autocomplete="off">
                                </div>
                            </div>
<!--------------------------------------------------------------------------------------------------------------------->
							<div class='reg_table_row'>
                                <div>Fax #<span> </span>:</div>

                                <div >
                                    <input  type="text" name='FaxNumber' placeholder="Fax #" id='FAX_NUMBER' autocomplete="off">
                                </div>
                            </div>
                                 <!------------------------------------------------------------------------------------>      
 <div class='reg_table_row'>
                                <div>Mobile Ph #<span> </span>:</div>

                                <div >
                                    <input   type="text" name='Cellphone' placeholder="Mobile Ph #" id='CELLPHONE' autocomplete="off">
                                </div>
                            </div>

<!-------------------------------------------------------------------------------------->

   <div class='reg_table_row'>
                                <div>Status<span> </span>:</div>

                                <div >
								<select class="chzn-select-deselect  "  name="Status" id='STATUS'>
                                   <?php echo $options['REGSTATUS'];?>
	                                </select>
                                </div>
                            </div>
<!------------------------------------------------------------------------------------->      

<div class='reg_table_row'>
                                <div>Madix Customer Type<span> *</span>:</div>

                                <div >
								<select class="chzn-select-deselect validate[required] "  name="Parvw" id='PARVW'>
                                   <?php echo $options['PARTNER'];?>
	                                </select>
                                </div>
								<div style="display:none;" id='PARVWIN'> <?php echo $options['PARTNERINT'];?></div>
                            </div>
<!------------------------------------------------------------------------------------------------------------>
                                  <div class='reg_table_row hidden_fields'>
                                <div>Madix Account Number.<span> *</span>:</div>

                                <div >
                                    <input  class=" validate[required] " type="text" name='Kunnr' placeholder="Madix Account Number." id='KUNNR'  autocomplete="off">
									
                                </div>
								<div style='display:none;margin-left:250px;border:1px solid red;width:200px;position:absolute;'>Call your sales or customer service rep if you don't</div>
                            </div>
<!---------------------------------------------------------------------------------->
    <div class='reg_table_row hidden_fields'>
                                <div>Address<span> *</span>:</div>

                                <div >
                                    <input  class=" validate[required] " type="text" name='Street' id='STREET' placeholder="Address" autocomplete="off">
                                </div>
                            </div>
			
							
                           </div>
						   
						   

					   
						   
						   <div valign='top' class='reg_form_create'>


 				<!-------------------------------------------------------------------->
<div class='reg_table_row hidden_fields'>
                                <div>City<span> *</span>:</div>

                                <div >
                                    <input  class=" validate[required] " type="text" name='City' id='CITY' placeholder="City"  autocomplete="off">
                                </div>
                            </div>
							<!----------------------------------------------------------->
<div class='reg_table_row hidden_fields'>
                                <div>State<span> *</span>:</div>

                                <div >
                                    <input  class=" validate[required] " type="text" name='State' placeholder="State" id='STATE' autocomplete="off">
                                </div>
                            </div>
							<!--------------------------------------------------------->

<div class='reg_table_row hidden_fields'>
                                <div>Postal Code<span> *</span>:</div>

                                <div >
                                    <input  class=" validate[required] " type="text" name='Postalcode' placeholder="Postal Code" id='POSTALCODE'  autocomplete="off">
                                </div>
                            </div>
							<!------------------------------------------------------------->
<div class='reg_table_row hidden_fields' >
                                <div>Country<span> </span>:</div>

                                <div>
                                    <input   type="text" name='Country' placeholder="Country" id='COUNTRY'  autocomplete="off">
                                </div>
                            </div>
							<!------------------------------------------------------------->
<div class='reg_table_row hidden_fields'>
                                <div>Region<span> </span>:</div>

                                <div >
                                    <input  class=" " type="text" name='Region' placeholder="Region" id='REGION'  autocomplete="off">
                                </div>
                            </div>
							<!-------------------------------------------------------------->
<div class='reg_table_row hidden_fields'>
                                <div>Company's Web Page Address<span> </span>:</div>

                                <div >
                                    <input   type="text" name='Companyurl' placeholder="Company's Web Page Address" id='COMPANYURL'>
                                </div>
                            </div>
<!--------------------------------------------------------------------------------------->



<div class='reg_table_row hidden_fields'>
                                <div>How did you learn about Madix Website<span> *</span>:</div>

                                <div >
								<select class="chzn-select-deselect  validate[required]" name="Howlearn" id="HOWLEARN">
                                  <?php echo $options['HOWLEARN'];?>
	                                </select>
                                </div>
                            </div>
<!------------------------------------------------------------------------------>
							<div class='reg_table_row hidden_fields'>
                                <div>Please add me to Madix's Mailing List?<span> </span>:</div>

                                <div >
								<select class="chzn-select-deselect  "  name="Maillist" id="MAILLIST">
                                 <?php echo $options['MAILLIST'];?>
	                                </select>
                                </div>
                            </div>
<!-------------------------------------------------------------------------------------->

<div class='reg_table_row'>
                                <div>Expiry Date<span> </span>:</div>

                                <div >
                                    <input   type="text" name='Expirydate'  id='EXPIRYDATE'>
                                </div>
                          </div>
						  <!-------------------------------------------------------------------------------------->

<div class='reg_table_row'>
                                <div>Comment<span> </span>:</div>

                                <div >
								<textarea id='COMMENT' name='Comment'></textarea>
                                  
                                </div>
                          </div>
<!-------------------------------------------------------------------------------------->

<div class='reg_table_row'>
                                <div>Maximum order days<span> </span>:</div>

                                <div >
                                    <input   type="text" name='Maxday' placeholder="" id='MAXDAY'>
                                </div>
                          </div>
						  <!-------------------------------------------------------------------------------------->

<div class='reg_table_row'>
                                <div>Maximum order records<span> </span>:</div>

                                <div >
                                    <input   type="text" name='Maxorder' placeholder="" id='MAXORDER'>
                                </div>
                          </div>
<!-------------------------------------------------------------------------------------->

<div class='reg_table_row'>
                                <div>System Logon Id<span> </span>:</div>

                                <div >
                                    <input   type="text" name='Logonid' placeholder="" id='LOGONID'>
                                </div>
                          </div>

<!-------------------------------------------------------------------------------------->

<div class='reg_table_row'>
                                <div>Init. Password<span> </span>:</div>

                                <div >
                                    <input   type="text" name='Initpassword' placeholder="" id='INITPASSWORD'>
                                </div>
                          </div>
<input   type="hidden" name='Mandt' placeholder="" id='MANDT'>
<input   type="hidden" name='Guid' placeholder="" id='GUID'>
<input   type="hidden" name='Stores' placeholder="" id='STORES'>
<input   type="hidden" name='Newstores' placeholder="" id='NEWSTORES'>
<input   type="hidden" name='Focus' placeholder="" id='FOCUS'>
<input   type="hidden" name='Interestproduct' placeholder="" id='INTERESTPRODUCT'>
<input   type="hidden" name='Installservice' placeholder="" id='INSTALLSERVICE'>
<input   type="hidden" name='Ernam' placeholder="" id='ERNAM'>
<input   type="hidden" name='Crdate' placeholder="" id='CRDATE'>
<input   type="hidden" name='Crtime' placeholder="" id='CRTIME'>
<input   type="hidden" name='Chdate' placeholder="" id='CHDATE'>
<input   type="hidden" name='Chtime' placeholder="" id='CHTIME'>
<input   type="hidden" name='Lockflag' placeholder="" id='LOCKFLAG'>
<input   type="hidden" name='Internal' placeholder="" id='INTERNAL'>
<input   type="hidden" name='TelExtens' placeholder="" id='TEL_EXTENS'>
<input   type="hidden" name='action' placeholder="" id='actions' value='SAVE'>



							<!--------------------------------------------------------------------------------->
							</div>
                            </td>
							</tr>
							<tr>
							<td colspan='2' align='center' style='padding:10px;'>
							<button TYPE="button" NAME="save"  id='myMadixSubmit' class='btn' style='width:90px;' onclick="submit_onclick('save',this)">Save</button>
							<button TYPE="button"  id='myMadixResetpassword' class='btn' style='width:140px;' onclick="submit_onclick('reset',this)">Reset Password</button>
							<button TYPE="button"   id='myMadixDelete' class='btn' style='width:90px;' onclick="submit_onclick('delete',this)">Delete</button>
							<button TYPE="button"   id='myMadixunlock' class='btn' style='width:90px;' onclick="submit_onclick('unlock',this)" style='display:none'>Unlock</button>
							<button  TYPE="button" NAME="cancel"  id='back_to_list' style='width:90px;' class='btn'>Back</button>
							</td>
							</tr>
                           
							    </table>                  
					
	
                    </form>
</div>
   <div class="container-fluid">
    <div class="row-fluid">
	
        <!-- Body start -->

		 <!-----start registration list----->



         <!-----End registration list----->

		 
        <div  id='output' style='margin-top:20px;'>
                    
                        <div class="labl pos_pop">
<div class='pos_center'>
</div>
<button class="cancel btn" style="width:60px;float:right;margin-right:10px; margin-top:5px;" onClick='cancel_pop()'>Cancel</button>
<button  class="btn"  id="p_ch" onclick"p_ch()" style="width:60px; float:right; margin-top:5px;margin-right:15px;">Submit</button>
</div>
<div class="head_icons" style='float:inherit'>
<span id='post' tip="Table columns" class="yellow post_col" onClick="table_cells('example')" style="display:none"></span>
<table cellpadding='0px' cellspacing='0px' class="table_head"><tr>
<td><span id='filtes2' tip='&nbsp; Filters '  class="yellow" onClick="filtes1('example')"></span></td>
</tr></table>
</div>


 <div id='table_today'>
                             <table  class="table table-striped table-bordered" id="example"  alt="Sales_orders" style='margin:0px auto;position:relative;'>
                                                       
<?php
$table_th="";
$table_td="";
$th_example="";

for($i=0;$i<$cont;$i++)
{
	$gid=explode('@',$SalesOrder[$i]['Status']);
	
	$ej=$SalesOrder[$i];
	if($i==0) { 
?>
      <thead>
	<tr >
	<?php
$nth=1;
	foreach($ej as $inner=>$value)
	{
	if($inner!='Status')
		{
		?>
	 
        
	<th onclick="rowShort('<?php echo $inner;?>',this,'BAPIVBRKOUT','table_today','reg_list')" alt="<?php echo $nth;?>"><div class="example_<?php  echo $inner?> cutz" alt="<?php  echo $inner?>"><?php if($inner!='Lock'){echo $inner;}?></div>
    <div class="example_th example_<?php  echo $inner?>_hid" name='<?php  echo $inner?>' style="display:none;"><?php if($inner!='Lock'){echo $inner;}?></div>
	 <div class="example_tech" style="display:none;"><?php  echo $inner."@".$inner;?></div>
    </th>
   
	<?php
		}
	else
		{ ?>
		<th style='background:none;' alt="<?php echo $nth;?>">
<?php echo $inner;?>
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
     <th class='thser'><?php if($inner!='Status'){ ?><input type="text"  til='reg_list' class="search_int" value="" alt='<?php echo $s;?>' name="table_today@example" style='width:100px;'><?php }?><span style='position:absolute;margin-left:5px;margin-top:3px;' id='filter_result_<?php echo $s;?>'></span></th>
 
	<?php $s++;}
	?>
	
    </tr>
    </thead>
	<tbody id='example_tbody' >
    <?php
	 } 
	 if($i==0) {?>
     
    <?php } ?>

<tr Onclick="show_form('<?php echo $gid[2];?>',this,'<?php echo $table_as[$i]['DISPLAYSTATUS'];?>')" class='last_row'>
<?php

$col=0;
$ip=0;
	foreach($ej as $inner=>$value)
	{
		

?>
	<td class="example_cl<?php echo  $col;?>" >
    <?php
	
		if($inner=="Status")
	{ ?>
	<div style='text-align:left;width:40px;margin:0px auto;'>
		<?php $vals=explode('@',$value);
	if($vals[0]=='1')
		{ ?>
		<span >
		<img src='../images/sent.png' />
		</span>
		<?php }
		if($vals[0]=='2')
		{ ?>
		<span style=''>
		<img src='../images/yellow.png' />
		</span>
		<?php }
		if($vals[0]=='3')
		{ ?>
		<span style=''>
		<img src='../images/pending.png' />
		</span>
		<?php }
		if($vals[1]=='X') { ?> <span><img src='../images/Lock-icon.png'/></span> <?php } else{ echo '<span></span>'; } ?>
		</div>
	<?php }
	else
	{
	
	if (is_numeric(trim($value))) {
	             echo round(trim($value),2);
				}
		     else
				{
			echo mb_convert_encoding($value, "EUC-JP", "auto");
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
 
                        <div class='bottom_btns'>
          <button  style='width:90px' class='btn' onClick='refresh()' id='myMadixrefresh'>Refresh</button>
		  <button  style='width:90px' class='btn' onclick="create_reg(this)">Create</button>
</div>
                </div>
         
        </div><!-- Body end -->

    </div><!-- Maincontent end -->


<div id='dfg'></div>
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
		

			$('.registration_list').hide();

			$('#he1').html('| Web User Registration');
			//alert($('#COMPANYTYPE').val());
			$('#myMadixRegistrationForm input[type=text]').val('');
			$('#myMadixRegistrationForm input[type=hidden]').val('');
			$('#myMadixRegistrationForm select').val('');
			//alert($('#COMPANYTYPE').val());
			
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
		sear($(this).attr('alt'),$(this).val(),$(this).attr('name'),'reg_list')
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
	  data:"rows="+rows+"&page=reg_list",
      url: "../html/"+page+".php",
      success: function(html) {
		//  alert(html);
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
		 $('.last_row td:nth-child(6)').css({display:'table-cell',width:'40px',position:'absolute',right:'10px'});
		   
			  }
		  }
	  }
	});
	

 }
function show_form(Iguid,ids,flag)
{
	
	$('#myMadixResetpassword').show();
	if(flag=='2')
	{
	$('#myMadixResetpassword').hide();
	}
	var imgs=$(ids).children('td:nth-child(6)').html();
	$(ids).children('td:nth-child(6)').children('div').children('span:eq(0)').html('<img src="../images/pending1.gif" />');
	
	$.ajax({
      type: "POST",
	  data:"Iguid="+Iguid,
      url: "../lib/registration_approval.php",
      success: function(html) {

		  $(ids).children('td:nth-child(6)').html(imgs);
		  $('#he1').html('| Registration Approval');
		// alert(html);
		var error=html.search('Message:-');
			
			if(error!='-1')
			{
				jAlert('<div style="max-width:450px;">'+html+'</div>','Message');
				
				return false;
			}
	var jsonObject=JSON.parse(html);
		  $('#output').hide();
$('.registration_list').show();
if(jsonObject.INTERNAL=='X')
{
var PARVWIN=$('#PARVWIN').html();
$('#PARVW').html(PARVWIN);
$('.hidden_fields').hide();
}
$.each(jsonObject,function(keys,value){
	//alert(keys+'=='+value);
	$('#'+keys).val(value);
	
});

	//alert($('#Lockflag').val());
if($('#LOCKFLAG').val()=='X')
		  {
	$('#myMadixunlock').show();
	$('.myMadixunlock').show();
		  }
		  else
		  {
			  $('#myMadixunlock').hide();
			  $('.myMadixunlock').hide();
		  }
	  }});
	


}
function urldecode(url) {
  return decodeURIComponent(url.replace(/\+/g, ' '));
}
function submit_onclick(type,ids)
		{
		$('#INTERNAL').val('');
			var values=$(ids).html();
			var conf_msg='<p>Please confirm to save</p>';
		if(type=='delete')
			{
			$('#actions').val('DELETE');
			var conf_msg='<p>Please confirm to delete</p>';
			}
			if(type=='unlock')
			{
			$('#actions').val('UNLOCK');
			var conf_msg='<p>Please confirm to unlock</p>';
			}
			if(type=='reset')
			{
			$('#actions').val('RESETPW');
			var conf_msg='<p>Please confirm to reset password</p>';
			}
			
			//alert($('#myMadixRegistrationForm').serialize());
jConfirm(conf_msg,'Confirm',function(r){
	if(r)
	{
		$(ids).html('<img src="../images/ajax-loader1.gif" />');

			$.ajax({
      type: "POST",
	  data:$('#myMadixRegistrationForm').serialize(),
      url: "../lib/registration_save.php",
      success: function(data) {
		  //alert(data);
		  //$('#dfg').html(data);
		  $(ids).html(values);
		  var error=data.search('Message:-');
			
			if(error!='-1')
			{
				jAlert('<div style="max-width:450px;">'+data+'</div>','Message');
				
				return false;
			}
		  var msg=data.split('@');
		  jAlert(msg[1],'Message',function(r){
			  if(r)
			  {
				  if(msg[0]=='S')
		  {
					  $('#he1').html('| Web User Registration');
					  $('#sq').show();
					  $('.registration_list').hide();
					  window.location.replace("../lib/registrationlist.php");

		  }

			  }
		  });
		  
	  }
			});
	}
});
		
			
		}
		function refresh()
	 {
		$('#sq').show(); 
		$('#output').hide();
		window.location.replace('../lib/registrationlist.php');
	 }
	 function create_reg(ids)
	 {
		 var values=$(ids).html();
		 jPrompt1('User Id :', '', 'Internal User Registration', function(r) {
            if(r) 
			{
			    
				$(ids).html('<img src="../images/ajax-loader1.gif" />');
				$('#actions').val('CREATE');
				$('#INTERNAL').val('X');
				$('#LOGONID').val(r);
				//alert($('#myMadixRegistrationForm').serialize());
      $.ajax({
      type: "POST",
	  data:$('#myMadixRegistrationForm').serialize(),
      url: "../lib/registration_save.php",
      success: function(data) {
		  //alert(data);
		 // $('#dfg').html(data);
		  $(ids).html(values);
		  var error=data.search('Message:-');
			
			if(error!='-1')
			{
				jAlert('<div style="max-width:450px;">'+data+'</div>','Message');
				
				return false;
			}
		  var msg=data.split('@');
		  jAlert(msg[1],'Message',function(r){
			  if(r)
			  {
				  if(msg[0]=='S')
		  {
					  $('#he1').html('| Web User Registration');
					  $('#sq').show();
					  $('#output').hide();
					  $('.registration_list').hide();
					  window.location.replace("../lib/registrationlist.php");

		  }

			  }
		  });
		  
	  }
			});

			}
		 });
	
	 }
        	 
</script>

</body>
</html>
