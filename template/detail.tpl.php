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
		echo "<div class=\"col-6 col-sm-6 col-lg-6\"><h2>".$key."</h2>";
		echo "<img class='thumbnail' src=\"https://wis.fit.vutbr.cz/FIT/st/course-g.php?ects=1&id=".$val."\" >";
		echo "</div>";
	}
}

?>
