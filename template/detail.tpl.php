<p id="load_error" class="bg-danger" style="display:none; padding: 20px;">
	Vypadá to, že se nedaří načíst grafy. Důvodem může být, že nejste přihlášeni ve WISu.
</p>
<script>
	img_loaded = 0;
function image_loaded()
{
	if(img_loaded == 0)
	{
		$("#load_error").hide();
	}
	img_loaded = 1;
}
$(document).ready(function() {
	setTimeout(function() {
		if(img_loaded === 0)
		{
			$("#load_error").show();
		}
	}, 3000);
});
</script>
<?php
if(!isset($courses[ $_GET["detail"] ]))
{
	echo "<h1><a href='?list'><span class='glyphicon glyphicon-chevron-left'></span> Zpět</a> &bull; Předmět nenalezen.</h1>";
}
else
{
	echo "<h1>".$_GET["detail"]." - ".htmlspecialchars($courses[ $_GET["detail"] ]["name"])." - ".$courses[ $_GET["detail"] ]["credit"]." kr.</h1>";
	foreach($courses[ $_GET["detail"] ]["years"] as $key => $val)
	{
		echo "<div class=\"col-6 col-sm-6 col-lg-6\"><h2>".$key."/".($key+1)."</h2>";
		echo "<img onload=\"image_loaded()\" class='thumbnail' src=\"https://wis.fit.vutbr.cz/FIT/st/course-g.php?ects=1&id=".$val."\" >";
		echo "</div>";
	}
}

?>
