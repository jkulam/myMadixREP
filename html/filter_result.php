<?php
session_start();
$gd=$_SESSION['search_result'];
$SalesOrder=$_SESSION['table_today'];
$rows=$_REQUEST['rows'];

$page=$_REQUEST['page'];
if(isset($gd))
{
	$count=count($gd);
	$cont=$rows+10;
	$rowp='';
	if($cont>$count)
	{
		$rowp='NO_ROWS';
		$cont=$count;
		
	}
	for($i=$rows;$i<$cont;$i++)
	{
		$fd=$gd[$i];
$gid=explode('@',$SalesOrder[$fd]['Status']);
if($page=='reg_list')
{
 ?>
<tr Onclick="show_form('<?php echo $gid[2];?>',this)" class='last_row'>
<?php
}
else { ?>
<tr  class='last_row'>
<?php } ?>

<?php

foreach($SalesOrder[$fd] as $hg=>$re)
{ 
	
 ?>
<td  style="display:table-cell;">
<?php

	if($hg=='reports')
	{ $expt=explode('$@$',$re);
	//var_dump($expt);
	?>
		<div class='ship_img'><img src='../images/s_b_detl.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','ORDERKDETL',this)"/><?php if($expt[1]=='X') { ?>&nbsp;&nbsp;<img src='../images/s_b_trns.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','SHIPMENT',this)"/><?php } ?></div>
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
else{
	?>
    <h3 style="text-align:center;">Match not found</h3>
<?php }
echo '@$@'.$rowp;
?>
