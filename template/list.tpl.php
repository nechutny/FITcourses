<div style="text-align: right">
	<div class="btn-group">
		<a href="?set-list=block" class="glyphicon glyphicon-th-large btn btn-default "></a>
		<a href="?set-list=list" class="glyphicon glyphicon-align-justify btn btn-primary"></a>
	</div>
</div>
<table class="table table-striped table-hover">
<thead>
	<tr>
		<th>Kód</th>
		<th>Jméno</th>
		<th>Roky</th>
		<th></th>
	</tr>
</thead>
<tbody>
<?php
ksort($courses);
foreach($courses as $key => $val)
{
	
	echo '<tr>
		<th>'.$key.'</th><td>'.$val["name"].'</td><td>';
	
	foreach($val["years"] as $year => $a)
	{
		if($year == date("Y")-1)
		{
			echo '<span style="color: #DD2E2E;">'.$year.'</span>, ';
		}
		else
		{
			echo " ".$year . ", ";
		}
	}
	echo '</td><td><a href="?detail='.$key.'" role="button">Detail &raquo;</a></td></tr>';
	
}
?>
</tbody>
</table>

