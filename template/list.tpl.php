
<?php
ksort($courses);
$i = 0;
foreach($courses as $key => $val)
{
	if($i%3 == 0)
	{
		echo '<div class="row">';
	}
	echo '<div class="col-6 col-sm-6 col-lg-4"><h2>'.$val["name"].'</h2><p>'.$key.' - ';
	
	foreach($val["years"] as $year => $a)
	{
		if($year == date("Y"))
		{
			echo '<span style="color: #DD2E2E;">'.$year.'</span>, ';
		}
		else
		{
			echo " ".$year . ", ";
		}
	}
	echo '</p><p><a class="btn btn-default" href="?detail='.$key.'" role="button">Detail &raquo;</a></p></div>';
	
	if($i%3 == 2)
	{
		echo '</div>';
	}
	
	$i++;
}
?>
</div>

