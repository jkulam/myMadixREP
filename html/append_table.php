<?php
session_start();
$id=$_REQUEST['id'];
$val=$_REQUEST['val'];
$ses=$_REQUEST['ses'];
$table_name=$_REQUEST['table_name'];
$sess=explode('@',$ses);
$t_id=$sess[1];
$SalesOrder=$_SESSION[$sess[0]];
$page=$_REQUEST['page'];
$rows=$_COOKIE['table_cell'];

$bb=array('Sales_order_credit_block'=>'sales_order_credit_block','Sales_order_dashboard'=>'sales_order_dashboard','Todays_Orders'=>'sales_workbench','Sales_Orders_Due_for_Delivery'=>'sales_workbench','Return_Orders'=>'sales_workbench','Delivery_Due_for_Billing'=>'sales_workbench','search_customers'=>'search_customers','Search_sales_order'=>'search_sales_orders','Delivery_list'=>'delivery_list','prodcution_workbench'=>'prodcution_workbench','Inforecords'=>'inforecords','Search_ZCOMS'=>'Search_ZCOMS','Search_material'=>'Search_material');
$back_to=$_REQUEST['table_name'];
$split_rows=explode(",",$rows);
if(isset($_SESSION['combine']))
{
$combine=$_SESSION['combine'];
}
//var_dump($split_rows);
if($val!=NULL)
{
foreach($SalesOrder as $keys=>$values)
{
	//echo $keys."=>".$values."----------------------------------------------------<br>";
	$i=1;
	foreach($values as $sd=>$gf)
	{ 
	//echo $i."=i=".$id."&&".$gf."=v=".$val;
	$pos=strpos(strtolower($gf),strtolower($val));
	if($i==$id&&$pos!==false)
	{
		$gd[]=$keys;
	}
		//echo $i."=>".$sd."=>".$gf."<br>";
		$i++;
	}
	
	
}
}

if(isset($gd))
{
	$_SESSION['search_result']=$gd;
	$count=count($gd);
	$cont=$count;$romp='';
	if($count>10)
	{
		$cont=10;
		$romp='show_more';
	}
	for($i=0;$i<$cont;$i++)
	{
		$fd=$gd[$i];
		if($page=='reg_list')
{
	$gid=explode('@',$SalesOrder[$fd]['Status']);
	//var_dump($gid);
 ?>
<tr Onclick="show_form('<?php echo $gid[2];?>',this)" class='last_row'>
<?php
}
else { ?>
<tr  class='last_row'>
<?php }

 
$j=1;
$ip=0;
foreach($SalesOrder[$fd] as $hg=>$re)
{ 
if(isset($_SESSION['combine']))
{
$json_de=urlencode(json_encode($combine[$i]));
}
$jon=urlencode(json_encode($SalesOrder[$fd]));

	if($hg=='Status')
		{
		if($re=='Ship-To')
			{
	$ip=1;
			}
		}
if(in_array($j,$split_rows))
{ ?>
<td  style="display:table-cell;">
<?php

	if($hg=='reports')
	{ 
	$expt=explode('$@$',$re);
	if($expt[1]=='X') {
	$ponum=trim($SalesOrder[$fd]['PO #']);
	}
	else
	{
		$ponum='NO';
	}
	?>
		<div class='ship_img'><img src='../images/s_b_detl.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','ORDERKDETL',this,'<?php echo $ponum;?>')"/><?php if($expt[1]=='X') { ?>&nbsp;&nbsp;<img src='../images/s_b_trns.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','SHIPMENT',this,'<?php echo trim($SalesOrder[$fd]['PO #']);?>')"/>&nbsp;&nbsp;<a href='../lib/packingslip.php?po=<?php echo $expt[2];?>&pe=<?php echo $expt[3];?>' target='blank'><img src='../images/excel-icon.png' /></a><?php } ?></div>
		<?php }
	else
	{
		echo $re;
		}
	?>
    </td>
    <?php
}
else
{?>
 <td style="display:table-cell;"><?php
	if($hg=='reports')
	{ 
	$expt=explode('$@$',$re);
	if($expt[1]=='X') {
	$ponum=trim($SalesOrder[$fd]['PO #']);
	}
	else
	{
		$ponum='NO';
	}
	?>
		<div class='ship_img'><img src='../images/s_b_detl.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','ORDERKDETL',this,'<?php echo $ponum;?>')"/><?php if($expt[1]=='X') { ?>&nbsp;&nbsp;<img src='../images/s_b_trns.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','SHIPMENT',this,'<?php echo trim($SalesOrder[$fd]['PO #']);?>')"/>&nbsp;&nbsp;<a href='../lib/packingslip.php?po=<?php echo $expt[2];?>&pe=<?php echo $expt[3];?>' target='blank'><img src='../images/excel-icon.png' /></a><?php } ?></div>
		<?php }
	else
	{
				if($page=='reg_list')
{
		if($hg=="Status")
	{ ?>
    <div style='text-align:left;width:40px;margin:0px auto;'>
		<?php $vals=explode('@',$re);
	if($vals[0]=='1')
		{ ?>
		<span>
		<img src='../images/sent.png' />
		</span>
		<?php }
		if($vals[0]=='2')
		{ ?>
		<span>
		<img src='../images/yellow.png' />
		</span>
		<?php }
		if($vals[0]=='3')
		{ ?>
		<span>
		<img src='../images/pending.png' />
		</span>
		<?php }
		if($vals[1]=='X') { ?> <span><img src='../images/Lock-icon.png'/></span> <?php } else{ echo '<span></span>'; } ?>
        </div>
	<?php }
	else
	{
		echo $re;
	}
	
		}
		else
	{
		echo $re;
	}
		}
	?></td>
<?php }
$j++;
} 
?>
</tr>
<?php 
}
}
else{
	if($val!=NULL)
	{
	?>
    <h3 style="text-align:center;">Match not found</h3>
<?php }
else
{
	$count=count($SalesOrder);
	$cont=30;
	if($cont>$count)
	{
		
		$cont=$count;
		
	}
	
		for($i=0;$i<$cont;$i++)
	{
		$fd=$SalesOrder[$i];
//var_export($SalesOrder[$fd]);
	if($page=='reg_list')
{
	$gid=explode('@',$SalesOrder[$i]['Status']);
 ?>
<tr Onclick="show_form('<?php echo $gid[2];?>',this)" class='last_row'>
<?php
}
else { ?>
<tr  class='last_row'>
<?php }
 ?>

<?php

foreach($fd as $hg=>$re)
{ 
	
 ?>
<td  style="display:table-cell;">
<?php

	if($hg=='reports')
	{ $expt=explode('$@$',$re);
	if($expt[1]=='X') {
	$ponum=trim($SalesOrder[$i]['PO #']);
	}
	else
	{
		$ponum='NO';
	}
	//var_dump($expt);
	?>
		<div class='ship_img'><img src='http://mymadix.madixinc.com/OrderTracking/images/s_b_detl.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','ORDERKDETL',this,'<?php echo $ponum;?>')"/><?php if($expt[1]=='X') { ?>&nbsp;&nbsp;<img src='http://mymadix.madixinc.com/OrderTracking/images/s_b_trns.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','SHIPMENT',this,'<?php echo trim($SalesOrder[$i]['PO #']);?>')"/>&nbsp;&nbsp;<a href='../lib/packingslip.php?po=<?php echo $expt[2];?>&pe=<?php echo $expt[3];?>' target='blank'><img src='../images/excel-icon.png' /></a><?php } ?></div>
		<?php }
	else
	{
		if($page=='reg_list')
{
		if($hg=="Status")
	{ ?>
    <div style='text-align:left;width:40px;margin:0px auto;'>
		<?php $vals=explode('@',$re);
	if($vals[0]=='1')
		{ ?>
		<span>
		<img src='../images/sent.png' />
		</span>
		<?php }
		if($vals[0]=='2')
		{ ?>
		<span>
		<img src='../images/yellow.png' />
		</span>
		<?php }
		if($vals[0]=='3')
		{ ?>
		<span>
		<img src='../images/pending.png' />
		</span>
		<?php }
		if($vals[1]=='X') { ?> <span><img src='../images/Lock-icon.png'/></span> <?php } else{ echo '<span></span>'; } ?>
        </div>
	<?php }
	else
	{
		echo $re;
	}
	
		}
		else
	{
		echo $re;
	}
		}
	?>
    </td>
    <?php

} 
?>
</tr>
<?php 
}
}
}
?>
