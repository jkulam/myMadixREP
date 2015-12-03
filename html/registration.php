<?php
session_start();
//print_r($valueArray);
$options=$_SESSION['options'];
?>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=0">
		<link REL="StyleSheet" href="http://www.madixinc.com/stylesheet/Madix.css" TYPE="text/css">
		<title>
			Registration  
		</title>
		 <link class="theme-css" href="../css/utopia-white.css" rel="stylesheet">
		 <link href="../css/utopia-responsive.css" rel="stylesheet">
    <link href="../css/ie.css" rel="stylesheet"/>
	<link rel="stylesheet" href="../css/website.css" type="text/css" media="screen"/>
	 <link href="../css/alerts.css" type="text/css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet"/>
    <!-- styles -->
   <link href="../css/utopia-white.css" rel="stylesheet">
    <link href="../css/utopia-responsive.css" rel="stylesheet">
    <link href="../css/ie.css" rel="stylesheet">
    <link href="../css/jquery.tagedit.css" rel="stylesheet" type="text/css">
    <link href="../css/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="../css/validationEngine.jquery.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" type="text/css" href="../css/colortip-1.0-jquery.css"/>

<link rel="stylesheet" href="../css/jquery.contextmenu.css">
<link rel="stylesheet" href="../css/datepicker.css">
            
         <script type="text/javascript" src="../js/jquery.min.js"></script>
     <script type="text/javascript" src="../js/jquery.cookie.js"></script>
<script type="text/javascript" src="../js/utopia.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/alerts.js"></script>
	</head>
	
	<script>
            
		function putFocus() {
			document.mainform.title.focus();
		}
		function submit_onclick() {
			
			$('#myMadixSubmit').html('<img src="../images/ajax-loader1.gif" />');
			 $.ajax({
				type:'POST',
				url:'../lib/registration_insert.php',
				data:$('#myMadixRegistrationForm').serialize(),
				success: function(response)
				{
					autofill();
					$('#myMadixSubmit').html('Submit');
					var error=response.search('Message:-');
					if(error!='-1')
			{
				jAlert('<div style="max-width:450px;">'+response+'</div>','Message');
				
				return false;
			}
					var msg=response.split('@');
					if(msg[0]=='S')
					{
						jAlert('<p style="color:green;">'+msg[1]+'</p>','Message',function(r){
							if(r)
							{
			
			document.mainform.action = "../index.php";
			document.body.style.cursor="wait";
			document.mainform.submit();
							}
						});
			
					}
					else
					{
						jAlert('<p style="color:red;">'+msg[1]+'</p>','Message');
					}
				}
			 });
			
		}
		function cancel_onclick() {
			
			document.mainform.action = "../index.php";
			document.body.style.cursor="wait";
			document.mainform.submit();
		}
			
		function autofill()
				{
					
						$('input').each(function(index, element) {
               var names=$(this).attr('name');
			   var values=$(this).val();
			  // alert(idss);
			   var cook=$.cookie(names);
			    //var myw= cook.split(',');
			 // alert(cook.indexOf(values));
			   var name_cook=values;
			   if(cook!=null)
			   {
			name_cook=cook+','+values;
			   }
			   if($.cookie(names))
			{
			var str=$.cookie(names);
            var n=str.search(values);
			if(n==-1)
			{
			$.cookie(names,name_cook);
			}
			}
			else
			{
				$.cookie(names,name_cook, { expires: 365 });
			}
			return false;
			//alert($.cookie(names));
            });
				}
	</script>	
	<body onLoad="putFocus()">
<div id="header">
    		<div class='span3'><a href='http://www.madixinc.com/' ><img src="../images/madix-logo300.png"></a></div><div class='span5 your_title' style='margin-top:45px;'><h2 id='he1'>| Web User Registration</h2></div>
    
             
          
            <div class="clear"></div>
  		</div>
		
	
	 
	 <form name="mainform" method="post" ACTION="javascript:submit_onclick()" id="myMadixRegistrationForm" class="form-horizontal create_account" style='padding-top:10px;'>
                      
						<table class='reg_form'>
						<tr><td><div valign='top' class='reg_padding reg_form_create'>
						<div class='reg_table_row'>
                                <div>M/M<span> </span>:</div>
                                <div>
								<select class="chzn-select-deselect  "  name="title" >
                                 <?php echo $options['TITLE'];?>
	                                </select>
                                </div>
								</div>
                           <!----------------------------------------------------------------------------->
                            <div class='reg_table_row'>
								 <div>First Name<span> *</span>:</div>

                                <div>
                              <input id="firstname" class=" validate[required] " type="text" name='firstname' id='firstname' placeholder="First Name" onKeyUp="jspt('firstname',this.value,event)" autocomplete="off">
                                </div>
                            </div>
							<!------------------------------------------------------------------------------->
                                                        <div class='reg_table_row'>
                                <div>Last Name<span> *</span>:</div>

                                <div>
                                    <input id="lastname" class=" validate[required] " type="text" name='lastname' placeholder="Last Name"  onKeyUp="jspt('lastname',this.value,event)" autocomplete="off">
                                </div>
                            </div>
							<!-------------------------------------------------------------------------------->
                            <div class='reg_table_row' >
							
                                <div>Job Title<span> </span>:</div>

                                <div>
                          <input   type="text" name='jobtitle'  placeholder="Job Title" id='jobtitle' onKeyUp="jspt('jobtitle',this.value,event)" autocomplete="off">
                                   
                                </div>
                            </div>
                           <!--------------------------------------------------------------------------------->
                   <div class='reg_table_row'>
                                <div>Company Name<span> *</span>:</div>

                                <div >
                                    <input id="companyname" class=" validate[required,custom[onlyLetterSp]] " type="text" name='companyname' placeholder="Company Name" onKeyUp="jspt('companyname',this.value,event)" autocomplete="off">
                                </div>
                            </div>
							<!--------------------------------------------------------------------------------->
							 <div class='reg_table_row'>
                                <div>Company Type<span> *</span>:</div>

                                <div >
                                    <select class="chzn-select-deselect  validate[required]" name="companytype" >
                                    <?php echo $options['COMPTYPE'];?>
	                                </select>
                                </div>
                            </div>
							<!------------------------------------------------------------------------------------>
                      <div class='reg_table_row'>
                                <div>Unique Customer Type<span> </span>:</div>

                                <div >
								<select class="chzn-select-deselect  "  name="customertype" >
                                   <?php echo $options['CUSTTYPE'];?>
	                                </select>
                                </div>
                            </div>
<!-------------------------------------------------------------------------------------------------------------->
                   <div class='reg_table_row'>
                                <div >Email Address<span> *</span>:</div>

                                <div >
                              <input id='email'  class=" validate[required,custom[email]] " type="text" name='email' placeholder="Email Address" onKeyUp="jspt('email',this.value,event)" autocomplete="off">
                                </div>
                            </div>
<!------------------------------------------------------------------------------------------------------------------->
							 <div class='reg_table_row'>
                                <div>Work Ph #<span> *</span>:</div>

                                <div >
                                    <input  class=" validate[required] " id='telnumber' type="text" name='telnumber' placeholder="Work Ph #" onKeyUp="jspt('telnumber',this.value,event)" autocomplete="off">
                                </div>
                            </div>
<!--------------------------------------------------------------------------------------------------------------------->
							<div class='reg_table_row'>
                                <div>Fax #<span> </span>:</div>

                                <div >
                                    <input  type="text" name='faxnumber' placeholder="Fax #" id='faxnumber' onKeyUp="jspt('faxnumber',this.value,event)" autocomplete="off">
                                </div>
                            </div>
                                 <!------------------------------------------------------------------------------------>      
 <div class='reg_table_row'>
                                <div>Mobile Ph #<span> </span>:</div>

                                <div >
                                    <input   type="text" name='cellphone' placeholder="Mobile Ph #" id='cellphone' onKeyUp="jspt('cellphone',this.value,event)" autocomplete="off">
                                </div>
                            </div>

<!-------------------------------------------------------------------------------------->


                           
                           </div>
						   
						   
						   
						   
						   <div valign='top' class='reg_form_create'>

                                  <div class='reg_table_row'>
                                <div>Madix Account Number.<span> *</span>:</div>

                                <div >
                                    <input  class=" validate[required] " type="text" name='kunnr' placeholder="Madix Account Number." id='kunnr' onKeyUp="jspt('kunnr',this.value,event)" autocomplete="off">
									
                                </div>
								<div style='display:none;margin-left:250px;border:1px solid red;width:200px;position:absolute;'>Call your sales or customer service rep if you don't</div>
                            </div>
<!---------------------------------------------------------------------------------->
     <div class='reg_table_row'>
                                <div>Address<span> *</span>:</div>

                                <div >
                                    <input  class=" validate[required] " type="text" name='street' id='street' placeholder="Address" onKeyUp="jspt('street',this.value,event)" autocomplete="off">
                                </div>
                            </div>
							<!-------------------------------------------------------------------->
<div class='reg_table_row'>
                                <div>City<span> *</span>:</div>

                                <div >
                                    <input  class=" validate[required] " type="text" name='city' id='city' placeholder="City" onKeyUp="jspt('city',this.value,event)" autocomplete="off">
                                </div>
                            </div>
							<!----------------------------------------------------------->
<div class='reg_table_row'>
                                <div>State<span> *</span>:</div>

                                <div >
                                    <input  class=" validate[required] " type="text" name='state' placeholder="State" id='state' onKeyUp="jspt('state',this.value,event)" autocomplete="off">
                                </div>
                            </div>
							<!----------------------------------------------------------->
<div class='reg_table_row'>
                                <div>Postal Code<span> *</span>:</div>

                                <div >
                                    <input  class=" validate[required] " type="text" name='postalcode' placeholder="Postal Code" id='postalcode' onKeyUp="jspt('postalcode',this.value,event)" autocomplete="off">
                                </div>
                            </div>
							<!------------------------------------------------------------->
<div class='reg_table_row'>
                                <div>Country<span> </span>:</div>

                                <div>
                                    <input   type="text" name='country' placeholder="Country" id='country' onKeyUp="jspt('country',this.value,event)" autocomplete="off">
                                </div>
                            </div>
							<!------------------------------------------------------------->
<div class='reg_table_row'>
                                <div>Region<span> </span>:</div>

                                <div >
                                    <input  class=" " type="text" name='region' placeholder="Region" id='region' onKeyUp="jspt('region',this.value,event)" autocomplete="off">
                                </div>
                            </div>
							<!-------------------------------------------------------------->
<div class='reg_table_row'>
                                <div>Company's Web Page Address<span> </span>:</div>

                                <div >
                                    <input   type="text" name='companyurl' placeholder="Company's Web Page Address" >
                                </div>
                            </div>
<!--------------------------------------------------------------------------------------->



<div class='reg_table_row'>
                                <div>How did you learn about Madix Website<span> *</span>:</div>

                                <div >
								<select class="chzn-select-deselect  validate[required]" name="howlearn" >
                                  <?php echo $options['HOWLEARN'];?>
	                                </select>
                                </div>
                            </div>
<!------------------------------------------------------------------------------>
							<div class='reg_table_row'>
                                <div>Please add me to Madix's Mailing List?<span> </span>:</div>

                                <div >
								<select class="chzn-select-deselect  "  name="maillist" >
                                 <?php echo $options['MAILLIST'];?>
	                                </select>
                                </div>
                            </div>
							</div>
                            </td>
							</tr>
							<tr>
							<td colspan='2' align='center' style='padding:10px;'>
							<button TYPE="submit" NAME="save"  id='myMadixSubmit' class='btn' style='width:90px;'>Submit</button>
							<button  TYPE="button" NAME="cancel"  onClick="return cancel_onclick()" style='width:90px;' class='btn'>Cancel</button>
							</td>
							</tr>
                           
							    </table>                  
					
	
                    </form>

	    <div class="footer span12" id="footer" style="padding:10px;text-align:center;">&copy; 2014 Madix, Inc. All rights reserved. | Texas: 800.776.2349 |&nbsp;Alabama: 800.633.6282 |&nbsp;<a href="http://www.madixinc.com/legal/privacy.php">Privacy Policy</a> |&nbsp;<a href="http://www.madixinc.com/legal/terms.php">Terms&nbsp;&amp;&nbsp; Conditions</a></div>
		<br>

		<script src="../js/jquery.validationEngine1.js" type="text/javascript"></script>
<script src="../js/jquery.validationEngine-en.js" type="text/javascript"></script>
	<script>
		
		document.body.style.cursor="auto";
		$(document).ready(function()
		{
			 jQuery("#myMadixRegistrationForm").validationEngine();
		});
	</script>
	
	<input type="hidden" value="http://sapps901:8001">
	<input type="hidden" value="900">
	<input type="hidden" value="39">
	</body>
	

</html>
