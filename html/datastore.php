<?php
session_start();

$SalesOrder=$_SESSION['table_today'];
$rows=$_REQUEST['rows'];
$page=$_REQUEST['page'];
//var_dump($SalesOrder);
$count=count($SalesOrder);
	$cont=$rows+30;
	$rowp='';
	if($cont>$count)
	{
		
		$cont=$count;
		
	}
	if($rows>$count)
	{
$rowp='NO_ROWS';
	}
	for($i=$rows;$i<$cont;$i++)
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
foreach($fd as $hg=>$re)
{ 
	
 ?>
<td  style="display:table-cell;">
<?php

	if($hg=='reports')
	{ $expt=explode('$@$',$re);
	//var_dump($expt);
	if($expt[1]=='X') {
	$ponum=trim($SalesOrder[$i]['PO #']);
	}
	else
	{
		$ponum='NO';
	}
	?>
		<div class='ship_img'><img src='../images/s_b_detl.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','ORDERKDETL',this,'<?php echo $ponum;?>')"/><?php if($expt[1]=='X') { ?>&nbsp;&nbsp;<img src='../images/s_b_trns.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','SHIPMENT',this,'<?php echo trim($SalesOrder[$i]['PO #']);?>')"/>&nbsp;&nbsp;<a href='../lib/packingslip.php?po=<?php echo $expt[2];?>&pe=<?php echo $expt[3];?>' target='blank'><img src='../images/excel-icon.png' /></a><?php } ?></div>
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
echo '@$@'.$rowp;
?>