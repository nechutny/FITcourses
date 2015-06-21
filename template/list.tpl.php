<div style="text-align: right">
	<div class="btn-group">
		<a href="?set-list=block" class="glyphicon glyphicon-th-large btn btn-default "></a>
		<a href="?set-list=list" class="glyphicon glyphicon-align-justify btn btn-primary"></a>
	</div>
</div>
<br>
<table class="table table-striped table-hover tablesorter">
<thead>
	<tr>
		<th class="sort">Kód</th>
		<th class="sort">Jméno</th>
		<th class="sort">Roky</th>
		<th class="sort"> <span class="glyphicon glyphicon-sort"></span></th>
	</tr>
</thead>
<tbody>
<?php
ksort($courses);
foreach($courses as $key => $val)
{

	echo '<tr data-href="?detail='.$key.'" class="tr-link">
		<th>'.$key.'</th><td>'.$val["name"].'</td><td>';

	foreach($val["years"] as $year => $a)
	{
		if($year == date("Y")-1)
		{
			echo '<span style="color: #DD2E2E;">'.$year.'/'.($year+1).'</span>, ';
		}
		else
		{
			echo " ".$year . "/".($year+1).", ";
		}
	}
	echo '</td><td><a href="?detail='.$key.'" role="button">Detail &raquo;</a></td></tr>';

}
?>
</tbody>
</table>

<script>
$(document).ready(function() {
	$('tr.tr-link').on("click", function() {
	if($(this).data('href') !== undefined){
		document.location = $(this).data('href');
	}
	});
	$("table.table").tablesorter();
});
</script>
<style>
tr.tr-link, th.sort {
	cursor: pointer;
}
</style>
