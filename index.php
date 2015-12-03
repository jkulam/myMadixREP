<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Madix :: Welcome to My Madix Order Tracking System</title>
<meta name="description" content="Madix manufactures store fixtures and shop fittings. Madix Inc helps a store designer improve store layouts and retail store design.">

<!-- rev date 03172011, 1:32pm CST -->

<script type="text/javascript" src="js/jquery.min.js"></script>
     <script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript">

$(function() {
		// set opacity to nill on page load
		$("ul#menuNew a span").css("opacity","0");
		// on mouse over
		$("ul#menuNew a span").hover(function () {
			// animate opacity to full
			$(this).stop().animate({
				opacity: 1
			}, "slow");
		},
		// on mouse out
		function () {
			// animate opacity to nill
			$(this).stop().animate({
				opacity: 0
			}, "slow");
		});
	});
</script>

<link rel="shortcut icon" href="http://www.madixinc.com/images/favicon.ico">
<link href="css/utopia-white.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/alerts.css" type="text/css" rel="stylesheet">
   
    
   
    <link href="css/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="css/validationEngine.jquery.css" rel="stylesheet" type="text/css">

</head>


<script>
			
		function putFocus() {		
			document.mainform.email.focus();
		}
		function submit_onclick() {
			document.mainform.command.value = "SUBMIT";
			document.mainform.action = "logon.php";
			document.body.style.cursor="wait";
			document.mainform.submit();
		}
		function cancel_onclick() {
			//$('#status_login').val('change_password');
			var status=$('#status_login').val();
			if(status!='change_password')
			{
			document.location="http://www.madixinc.com/";
			}
			else
			{
				$('#changePass').show();
			$('#ctext').show();
			$('#ctexts').hide();
			$('#status_login').val('Login');
			}
		}
		function registration_onclick() {
			document.mainform.command.value = "NEWREGISTRATION";
			document.mainform.action = "lib/dropdown.php";
			document.body.style.cursor="wait";
			document.mainform.submit();
		}
		function forgetpw_onclick() {
			jAlert('Please contact Madix to reset your password','Message');
		}
		function logon_success() {
			document.body.style.cursor="wait";
			
				document.mainform.command.value = "LOGON";
				if ("AG"=="AD") {
  					document.mainform.action = "RegList.php"; 
				}
				else {
					document.mainform.action = "OrderList.php"; 
				}				
				document.mainform.submit();
			
		}
		function change_initpassword() {
			$('#changePass').hide();
			$('#ctext').hide();
			$('#ctexts').show();
			$('#status_login').val('change_password');
			//document.mainform.command.value = "LOGON";
			//document.mainform.action = "ChangePassword.php";  
			//document.body.style.cursor="wait";
			//document.mainform.submit();
		}
		
		//........................................jQuery...................................
		function loginCheck()
		{
		//$('#status_login').val('change_password');
			autofill();
			$('#myMadixSubmit').html('<img src="images/ajax-loader1.gif" />');
			var screenwidth=$(window).width();
			$('#screenwidth').val(screenwidth);
            $.ajax({
				type:'POST',
				url:'lib/logon.php',
				data:$('#myMadixLogin').serialize(),
				success: function(response)
				{
					//alert(response);
					var error=response.search('Message:-');
			
			if(error!='-1')
			{
				jAlert('<div style="max-width:450px;">'+response+'</div>','Message');
				$('#myMadixSubmit').html('Submit');
				return false;
			}
					if(response=='success')
					{
					
					$('#csold').hide();
					$('#navContainer').hide();
					
					$('#sq').show().css({'margin-left':'auto','margin-right':'auto','font-size':'5px'});
					document.mainform.command.value = "SUBMIT";	
					
			document.mainform.action = "lib/orderlist.php";
						
			document.body.style.cursor="wait";
			document.mainform.submit();
					}
					else
					{
						if(response=='registration')
						{
							$('#csold').hide();
					$('#navContainer').hide();
					$('#your_sales').show();
					$('#your_sales h2').html('| Web User Registration');
					$('#sq').show().css({'margin-left':'auto','margin-right':'auto'});
					$('#sq h3').html('Please wait while your web user registration are loading...');
					document.mainform.command.value = "SUBMIT";	
					
			document.mainform.action = "lib/registrationlist.php";
						
			document.body.style.cursor="wait";
			document.mainform.submit();
						}
						else
						{
						if(response=='C'){
						document.mainform.action = "html/changepassword.php";
						document.body.style.cursor="wait";
			document.mainform.submit();
						return false;
						}
						$('#myMadixSubmit').html('Submit');
						$('.inputField').val('');
						$('#myMadixLoginerror').html(response).css({color:'red'});
						}
					}
				}
				})
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

<style>

</style>
<body onLoad="putFocus()">


	<div id="header">
    		<div class="logo" style='margin:0px;padding:0px;'><table style='margin:0px;padding:0px;' id='header_titils'><tr><td>
	  		<a href='http://www.madixinc.com/' ><img src="images/madix-logo300.png" alt="madix, store designer, store interior, store fixtures, shopfitting, shop fitters, store planning, store fixture, madix inc, retail store fixtures, retail store designers, madix store fixtures, madix fixtures" width="225" border="0" id="Image4"></a></td><td valign='bottom' id='your_sales'	style='margin-top:53px;padding:0px;position:absolute;display:none;'><h2>| Your Sales Orders</h2></td></tr></table></div>
    
    		<!-- new navbar -->
    
    <div id="navContainer">

		<ul id="menuNew">
			<li><a href="http://www.madixinc.com" class="home"><span></span>Home</a></li>
			<li><a>|</a></li>
    		<li><a href="http://madixsalesassistance.questionpro.com" target="_blank" class="sales"><span></span>Sales Assistance</a></li>
			<li><a>|</a></li>
    		<li><a href="http://www.madixinc.com/catalogs/" class="catalogs"><span></span>Catalogs</a></li>
			<li><a>|</a></li>
    		<li><a href="http://mymadix.madixinc.com"  class="mymadix"><span></span>MyMadix</a></li>
			<li><a>|</a></li>
    		<li><a href="http://www.madixinc.com/about" class="about"><span></span>About Us</a></li>
		</ul>

	</div>
    
    <!-- end new navbar   -->

	<!-- old navbar 
    <div id="topNav">
	  	<ul id="menu">
				<li><a href="../index.html" class="home">Home</a></li>
				<li><a href="http://buymadix.com.p2.hostingprod.com/sales-assistance.html" target="_blank" class="salesassist">Sales Assistance</a></li>       	  
				<li><a href="http://mymadix.madixinc.com:80/OrderTracking/Logon.jsp" target="_blank" class="mymadix">My Madix</a></li>
				<li><a href="../about/index.html" class="aboutus">About Us</a></li>
				<li><a href="../oem.html" class="oem">OEM</a></li>       	  
	  	</ul>   
	</div>
    
    end old navbar -->
            
            <div class="clear"></div>
            
  		</div>
		<div style='display:none;margin-left:auto;margin-right:auto;padding-top:150px;width:400px;text-align:center;' id='sq'><h3>Please wait while your sales orders are loading...</h3><br><img src='images/466.gif' id='loid'/></div>
		<div id='csold'>
	<div id="myMadixContainer" >
    
    	<!--begin header-->
  	<!--end header-->	
        
        <div id="myMadixContent">
        
        	<img style="float:right;" src="images/monitorRow_mymadix.jpg" name="computer" id='img_monitorRow'>
        
        	<img src="images/headericon_cuorder.jpg" alt="" id='img_cuorder'>
            
            <p id='paragh'>Through the MyMadix system, customers have access to their order information 24/7. This information is refreshed every two hours to ensure timely information is available. Through the tracking system, a customer can obtain carriers' tracking information, see what's included in their order, and view the order's production status. He or she can even check estimated arrival dates on specific orders. Order information can also be generated into a PDF and emailed.</p>
            
            <div style="display:block;clear:both;padding:5px 0px;">
            	&nbsp;
            </div>
            
            <center>
            <div id="registerForm">
           <div id='ctext'></div>
				<div id='ctexts' style='display:none;padding:15px;color:#89C63B;font-weight:bold;'>Please login to change your password.</div>
        		<div style="width:335px;" id='myMdixlog'>
                <form name="mainform" method="post" action="javascript:loginCheck()" id='myMadixLogin' >
				<table align="center" cellpadding='0' cellspacing='0'>
				<tr><td colspan='2' id='myMadixLoginerror' align='center'>&nbsp;</td></tr>
					<tr class='loginreslution'>
						<td style="font-size:8pt;padding-top:4px;" align="right" valign='top' class='mymadixlabel'><strong>Email Address :&nbsp;</strong></td>
						<td align="left"><input class="inputField  validate[required]" type="text" name="email" value="" id='email' onKeyUp="jspt('email',this.value,event)" autocomplete="off"></td>
					</tr>
                    <tr>
						<td colspan="2" height="5"></td>
					</tr>
					<tr class='loginreslution'>
						<td style="font-size:8pt;padding-top:4px;" align="right" valign='top' class='mymadixlabel'><strong>Password :&nbsp;</strong></td>

						<td align="left"><input class="inputField validate[required]" type="password" name="password" value="" ></td>
					</tr>
				
					<tr>
                    	<td colspan='2' align='center' style="padding-top:10px;"><button class="btn" TYPE="submit" NAME="save" id="myMadixSubmit" style="width:90px;">Submit</button>
						<input class="btn"  NAME="cancel"  onClick="return cancel_onclick()" style="width:60px;padding:5px" value='Cancel'/>
						</td>
                        
            		</tr>
				<tr><td colspan='2' align='center' style="padding-top:10px;"><input type='hidden' value='Login' name='status' id='status_login'/></td></tr>
				
					<tr>
                    	<td colspan='2' align='center' style="padding-top:2px;" id='changePass'>
						<span style="font-size:8pt;" class="button2"><A href="#" language="javascript" onClick="return registration_onclick()">Register</A></span><span>|</span>
						<span style="font-size:8pt;" class="button2"><A href="#" language="javascript" onClick="return forgetpw_onclick()">Forgot Password?</A></span><span>|</span>
						<span style="font-size:8pt;" class="button2"><A href="html/changepassword.php" >Change Password</A></span>
						</td>
            		</tr>
                    
                    
				</table>
                 
 					<input type="hidden" name="WebHost" value="http://mymadix.madixinc.com" >
					<input type="hidden" name="sysid" value="PR1" >
					<input type="hidden" name="command" value="">
					<input type="hidden" name="screenwidth" value="" id="screenwidth">

				</form>
                </div>
        	</div><!-- end RegisterForm -->
            
            </center>
        
        </div><!-- end myMadixContent -->
        
        <div class="footer" style='padding-top:5px;text-align:center;margin:0px;'>&copy; 2014 Madix, Inc. All rights reserved. | Texas: 800.776.2349 |&nbsp;Alabama: 800.633.6282 |&nbsp;<a href="http://www.madixinc.com/legal/privacy.php">Privacy Policy</a> |&nbsp;<a href="http://www.madixinc.com/legal/terms.php">Terms&nbsp;&amp;&nbsp; Conditions</a> <img src="images/thinui1.png" width='120px' style="right:50px;position:absolute;margin-top:-22px;"/></div>        
        
        </div><!-- end myMadixContainer -->
</div>
</body>
<script type="text/javascript" src="js/utopia.js"></script>


<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/alerts.js"></script>

<script src="js/utopia-ui.js"></script>
<script src="js/ui/mouse.js"></script>
<script src="js/ui/slider.js"></script>

<script src="js/pagescroller.min.js" type="text/javascript"></script>

<script src="js/jquery.validationEngine1.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>



<script>
		document.body.style.cursor="auto";
		$(document).ready(function()
		{
			
			 jQuery("#myMadixLogin").validationEngine();
		});
	</script>
	<script>
		var ctext = "";
		ctext = ctext + "You are about to enter a secure area of this web site. Please enter your" + " ";
		ctext = ctext + "User ID and Password if you have already registered." + " ";
		ctext = ctext + "<br><br>If you are an existing Madix customer, you can register to use" + " ";
		ctext = ctext + "this site to track orders by clicking the \"Register\" link below." + " ";
		ctext = ctext + "" + " ";
		ctext = ctext + "" + " ";
					
		while (ctext.search("<tab>") > 0) {
		  ctext = ctext.replace("<tab>","\t")
		}
		while (ctext.search("<br>") > 0) {
		  ctext = ctext.replace("<br>","\r\n")
		}
		while (ctext.search("  ") > 0) {
		  ctext = ctext.replace("  "," ")
		}
		document.getElementById('ctext').innerHTML = ctext;

</script>	

</html>
