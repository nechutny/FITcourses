<?php
include("courses.php");
?>
<html>
<head>
<style>
body {
    font-family: sans-serif;
    background: silver;
    font-size: 12px;
    text-align: center;
}
a, td {
    font-family: sans-serif;
    font-size: 12px;
}

td {
    border:1px solid black;
    border-collapse: collapse;
    padding:3px;
}


table {
    margin: 8px;
    border:1px solid black;
    border-collapse: collapse;
}
#layout {
    margin: auto;
    width: 500px;
    background: white;
    border: 1px solid black;
}
.lay2 {
    border: 1px solid black;
    width: 420px;
    margin: auto;
    margin-bottom: 4px;
    padding: 3px;
}
.yd {
    font-weight: bold;
    font-size: 14px;
    padding: 3px;
    
}
</style>
<title>Statistika predmetu</title>
</head>
<body>
<div id="layout">
<h2>Seznam predmetu vyucovanych na FIT</h2>
Pro zobrazeni statistik je nutne byt prihlaseny do WISu
<table>
	<tr style="font-weight: bold; background: orange">
		<td>Jmeno predmetu</td>
        <td>Rocniky</td>
	</tr>
<!--<img src="https://wis.fit.vutbr.cz/FIT/st/course-g.php?ects=1&id=7896">-->
<?php
ksort($courses);
foreach($courses as $c => $d)
{
	echo "<tr>";
    echo "<td width=150><a href=\"course.php?s=$c\">$c</a></td>";
    echo "<td class=\"year\">";
    $d=array_reverse($d);
    foreach($d as $a)
        if($a[0]==date("Y")-1)
            echo "<span style=\"background: red; color: white\">{$a[0]}</span> ";
        else
            echo $a[0] . " ";
    echo "</td>";
	echo "</tr>";
}
?>
</table>
</div>
</body>
</html>
