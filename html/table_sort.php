<?php
//error_reporting(0);
session_start();
$col  = $_REQUEST['column'];
$sor  = $_REQUEST['sor'];
$table  = $_REQUEST['table'];
$tec_name=$_REQUEST['tech'];
$table_id=$_REQUEST['table_id'];
$t_rows=$_REQUEST['t_rows'];
$page=$_REQUEST['page'];

//$cols = $_REQUEST['total_columns'];
//$showMore = $_REQUEST['showMore'];

//$exp  = explode("~", $cols);
//$field1 = $exp[0];
//$field2 = $exp[1];
//$field3 = $exp[2];
//$field4 = $exp[3];
//$field5 = $exp[4];
//$ses = $_REQUEST['table_sess'];
$ses = $_SESSION[$table];
//var_dump($_SESSION[$table]);
$count=count($ses);
$rcount=$t_rows;

if($t_rows>$count)
{
	$rcount=$count;
}
if($t_rows=='null')
{
$rcount=$count;
}

//var_dump($ses);
$i=0;
$j=0;
foreach($ses as $values)
{
	if($col=='Planned/Est. Arr Shipping')
	{
$exp=	explode('<br>',$values[$col]);
$sd0[$i]=$exp[1];
	}
	else
	{
		$sd0[$i]=$values[$col];
	}
$i++;
}

if($sor=='sorting_asc')
{
	
	if($col=='Planned/Est. Arr Shipping')
	{
	foreach ($sd0 as $key => $value){
		$kk[]=$key;
    $ord[] = strtotime($value);
}
array_multisort($ord, SORT_ASC, $sd0, $kk);
	}
	else
	{
	asort($sd0);
	}
}
else
{
	
	if($col=='Planned/Est. Arr Shipping')
	{
	foreach ($sd0 as $key => $value){
		$kk[]=$key;
    $ord[] = strtotime($value);
}
array_multisort($ord, SORT_DESC, $sd0, $kk);
	}
	else
	{
		arsort($sd0);
	}
}


$r=0;?>

<?php
$j=0;
foreach($sd0 as $keys=>$val)
{
	if($col=='Planned/Est. Arr Shipping')
	{
	$rows[$j]=$ses[$kk[$keys]];
	}
	else
	{
		$rows[$j]=$ses[$keys];
	}
	$j++;
}
$_SESSION[$table]=$rows;
//var_dump($rows);
for($i=0;$i<$rcount;$i++)
{
	if($tec_name=="ZBAPI_SLS_LIST_ORDERS_OUT"||$tec_name=="/KYK/S_POWL_BILLDUE")
	{
	foreach($rows[$i] as $keys=>$vales )
	{
		$art23[$i][]='['.$keys.']'.$vales;
	}
	$array23[$i]=implode($art23[$i]," ");

	}
	if($page=='reg_list')
{
	$gid=explode('@',$rows[$i]['Status']);
 ?>
<tr Onclick="show_form('<?php echo $gid[2];?>',this)" class='last_row'>
<?php
}
else { ?>
<tr  class='last_row'>
<?php } ?>
    
<?php
 $cols=0;
								   $td=1;
								$total_row=$rows[$i];
								$ip=0;
   foreach($rows[$i] as $keys=>$vales)
	          { 
			  if($keys=='Status')
		{
		if($vales=='Ship-To')
			{
	$ip=1;
			}
		} ?>
		<td>
       <?php if($keys=="reports")
		{
			$expt=explode('$@$',$vales);
		if($expt[1]=='X') {
	$ponum=trim($rows[$i]['PO #']);
	}
	else
	{
		$ponum='NO';
	}
	?>
		<div class='ship_img'><img src='../images/s_b_detl.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','ORDERKDETL',this,'<?php echo $ponum;?>')"/><?php if($expt[1]=='X') { ?>&nbsp;&nbsp;<img src='../images/s_b_trns.gif'  onClick="show_doc('<?php echo urlencode(trim($expt[0]));?>','SHIPMENT',this,'<?php echo trim($rows[$i]['PO #']);?>')"/>&nbsp;&nbsp;<a href='../lib/packingslip.php?po=<?php echo $expt[2];?>&pe=<?php echo $expt[3];?>' target='blank'><img src='../images/excel-icon.png' /></a><?php } ?></div>
	<?php }
	else
	{
				if($page=='reg_list')
{
		if($keys=="Status")
	{ ?>
    <div style='text-align:left;width:40px;margin:0px auto;'>
		<?php $vals=explode('@',$vales);
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
		echo $vales;
	}
	
		}
		else
	{
		echo $vales;
	}
		} $cols++;
	 $td++;?>
        </td>
       <?php }
	  
   ?>
   </tr>
		<?php $r++;
}?>


