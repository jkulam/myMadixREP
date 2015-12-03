<?php SESSION_START();
$parvw=$_SESSION['PARVW'];?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Madix :: Welcome to My Madix Order Tracking System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=0">
<meta name="description" content="Madix manufactures store fixtures and shop fittings. Madix Inc helps a store designer improve store layouts and retail store design.">

<!-- rev date 03172011, 1:32pm CST -->

<script type="text/javascript" src="../js/jquery.min.js"></script>
     <script type="text/javascript" src="../js/jquery.cookie.js"></script>
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
<link href="../css/utopia-white.css" rel="stylesheet" type="text/css">
<link href="../css/styles.css" rel="stylesheet" type="text/css">
<link href="../css/alerts.css" type="text/css" rel="stylesheet">
   
    
   
    <link href="../css/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="../css/validationEngine.jquery.css" rel="stylesheet" type="text/css">

</head>


<script>
		
		
		function submit_onclick() {
			document.mainform.command.value = "SUBMIT";
			document.mainform.action = "Logon.php";
			document.body.style.cursor="wait";
			document.mainform.submit();
		}
		function cancel_onclick() {
			//$('#status_login').val('change_password');
			
			
			document.location="../index.php";
		
			
		}
		function registration_onclick() {
			document.mainform.command.value = "NEWREGISTRATION";
			document.mainform.action = "Registration.php";
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
		function ChangePassword()
		{
		//$('#status_login').val('change_password');
			//var status=$('#status_login').val();
			$('#myMadixSubmit').html('<img src="../images/ajax-loader1.gif" />');
            $.ajax({
				type:'POST',
				url:'../lib/change_password.php',
				data:$('#myMadixLogin').serialize(),
				success: function(response)
				{
					var error=response.search('Message:-');
			
			if(error!='-1')
			{
				jAlert('<div style="max-width:450px;">'+response+'</div>','Message');
				$('#myMadixSubmit').html('Submit');
				return false;
			}
					if(response=='success')
					{
					
					jAlert('Your password has been changed successfully','Message',function(r){
						if(r)
						{
							document.mainform.command.value = "SUBMIT";	
					
			document.mainform.action = "../index.php";
						
			document.body.style.cursor="wait";
			document.mainform.submit();
						}
					});
					
					}
					else
					{
						$('#myMadixSubmit').html('Submit');
						$('.inputField').val('');
						$('input[name=oldpassword]').focus();
if(response=='Wrong password')
						{
	$('#myMadixLoginerror').html('Wrong old password').css({color:'red','padding-bottom':'10px'});
						}
						else
						{
						$('#myMadixLoginerror').html(response).css({color:'red','padding-bottom':'10px'});
						}
					}
				}
				})
        }
	</script>

<style>

</style>
<body ">


	<div id="header">
    		<div class='span3'><a href='http://www.madixinc.com/' ><img src="../images/madix-logo300.png"></a></div><div class='span5 your_title' style='margin-top:45px;'><h2 id='he1'>| Change password</h2></div>
    
    		<!-- new navbar -->
    
    
    
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
		
		<div id='csold'>
	<div id="myMadixContainer" >
    
    	<!--begin header-->
  	<!--end header-->	
        
        <div id="myMadixContent">
        
   
            
            <center>
            <div id="registerForm" style='padding-top:20px'>
				
        		<div style="width:385px;" id='myMdixlog' class='change_pass_conf'>
                <form name="mainform" method="post" action="javascript:ChangePassword()" id='myMadixLogin' >
				<table align="center" cellpadding='0' cellspacing='0'>
				<?php $email='';$msg='';if(isset($_SESSION['initialPass'])){$email=$_SESSION['initialPass'];$msg='<p style="color:red;">Please change your initial password.</p>';}?>
				<tr><td colspan='2' id='myMadixLoginerror' align='center'><?php echo $msg;?></td></tr>
				<tr class='loginreslution'>
				
				
						<td style="font-size:8pt;padding-top:4px;" align="right" valign='top' class='mymadixlabel'><strong>Email Address :&nbsp;</strong></td>
						<td align="left">
						<?php if($parvw=='AG') {?>
						<input class="inputField  validate[required,custom[email]]" type="text" name="email" value="<?php echo $email;?>" >
						<?php } else { ?>
						<input class="inputField  validate[required]" type="text" name="email" value="<?php echo $email;?>" >
						<?php } ?>
						</td>
					</tr>
				<tr class='loginreslution'>
						<td style="font-size:8pt;padding-top:4px;" align="right" valign='top' class='mymadixlabel'><strong>Old Password :&nbsp;</strong></td>
						<td align="left"><input class="inputField  validate[required]" type="password" name="oldpassword" value="" ></td>
					</tr>
					<tr class='loginreslution'>
						<td style="font-size:8pt;padding-top:4px;" align="right" valign='top' class='mymadixlabel'><strong>New Password :&nbsp;</strong></td>
						<td align="left"><input class="inputField  validate[required]" type="password" name="password" value="" id='txtPassword'></td>
					</tr>
                    <tr>
						<td colspan="2" height="5"></td>
					</tr>
					<tr class='loginreslution'>
						<td style="font-size:8pt;padding-top:4px;" align="right" valign='top' class='mymadixlabel'><strong>Confirm Password :&nbsp;</strong></td>

						<td align="left"><input class="inputField validate[required,equals[txtPassword]]" type="password" name="confpassword" value="" ></td>
					</tr>
				
					<tr>
                    	<td colspan='2' align='center' style="padding-top:10px;"><button class="btn" TYPE="submit" NAME="save" id="myMadixSubmit" style="width:90px;">Submit</button>
						<input class="btn"  NAME="cancel"  onClick="return cancel_onclick()" style="width:60px;padding:5px;" value='Cancel'>
						</td>
                        
            		</tr>
				
					
                    
                    
				</table>
                 
 					<input type="hidden" name="WebHost" value="http://mymadix.madixinc.com" >
					<input type="hidden" name="sysid" value="PR1" >
					<input type="hidden" name="command" value="">

				</form>
                </div>
        	</div><!-- end RegisterForm -->
            
            </center>
        
        </div><!-- end myMadixContent -->
        
        <div class="footer" style='padding-top:105px;text-align:center;margin:0px;'>&copy; 2013 Madix, Inc. All rights reserved. | Texas: 800.776.2349 |&nbsp;Alabama: 800.633.6282 |&nbsp;<a href="http://www.madixinc.com/privacypolicy.html">Privacy Policy</a> |&nbsp;<a href="http://www.madixinc.com/terms-conditions.html">Terms&nbsp;&amp;&nbsp; Conditions</a></div>        
        
        </div><!-- end myMadixContainer -->
</div>
</body>
<script type="text/javascript" src="../js/utopia.js"></script>


<script type="text/javascript" src="../js/custom.js"></script>
<script type="text/javascript" src="../js/alerts.js"></script>

<script src="../js/utopia-ui.js"></script>
<script src="../js/ui/mouse.js"></script>
<script src="../js/ui/slider.js"></script>

<script src="../js/pagescroller.min.js" type="text/javascript"></script>

<script src="../js/jquery.validationEngine1.js" type="text/javascript"></script>
<script src="../js/jquery.validationEngine-en.js" type="text/javascript"></script>



<script>
		document.body.style.cursor="auto";
		$(document).ready(function()
		{
			 jQuery("#myMadixLogin").validationEngine();
		});
	</script>
	

</html>
