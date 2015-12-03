<style>
.order_details_align
{
	font-size:12px;
	color:#333;
	
	
}
.btn
{
	border-radius:5px;
	background:#fff;
	display:none;
	border:1px solid #fff;
	color:#fff;
	
}
.whitespace
{
	width:60px;
}
.order-detail
{
width:230px
}
.order-titles
{
width:100px;
}
.details-table
{

	position:relative;
	border-spacing:0;
    border-collapse:collapse;
	font-size:12px;
	margin:0px auto;
	
}
.details-table thead tr th
{
	background:#F5F5F5;

}
.details-table thead tr th,
.details-table tbody tr td
{
	border:1px solid #ddd;
	text-align:center;
	padding:5px;
}




#shipping_status
{
	COLOR:blue;
	FONT-WEIGHT:bold;
	width:950px;
	position:relative;
	margin:0 auto;
	font-size:10px;
}
.odd-s
{
	background-color:#F7FFF7;
}
.ship_img img
{
	cursor:pointer;
	
}
.ship_img
{
	text-align:left !important;
	
	width:50px;
	margin-left:60px;
}
#o_det
{
	position:absolute;
	right:200px;
	margin-top:20px;
	display:none;
	font-size:9px;
}
#o_ship
{
	position:absolute;
	right:200px;
	margin-top:5px;
	z-index:1000;
	display:none;
	font-size:9px;
}

</style>

<div style="border-bottom:2px solid #8DC73F;"><a href='http://www.madixinc.com/' ><img src="../images/madix-logo300.png" style='width:130px'/></a></div>
<br />
<?php
session_start();
if(isset($_POST['post_data']))
{
	$_SESSION['POST_DATA']=urldecode($_POST['post_data']);
}
echo $_SESSION['POST_DATA'];
?>