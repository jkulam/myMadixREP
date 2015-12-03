<?php
session_start();
ini_set('memory_limit', '-1');
$SalesOrder=$_SESSION['table_today'];
//var_dump($SalesOrder);
$cont=count($SalesOrder);
$heds=NULL;
$bdy=NULL;
for($i=0;$i<$cont;$i++)
{
	$ej=$SalesOrder[$i];
	if($i==0)
	{ 
		
		foreach($ej as $inner=>$value)
	{
			if($inner=="reports")
	{
				
	}
	else
		{
			$heds.=trim($inner).'$@$';
		}
	}
		$heds.= 'end';
	}

	foreach($ej as $inner=>$value)
	{
		if($inner=="reports")
	{}
	else
		{
$bdy.=trim($value).'$@$';
		}

	}
	$bdy.='end';
}

?>

                               
                         