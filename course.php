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
<?php
echo "<h2>Detaily predmetu {$_GET["s"]}</h2>";
echo "<a href=\"./\">Zpet</a>";
if(!isset($courses[$_GET["s"]]))
    die("Neznamy predmet");

$c=$courses[$_GET["s"]];
$c=array_reverse($c);
foreach($c as $data)
{
    echo "<div class=\"lay2\"><div class=\"yd\">Detaily roku {$data[0]} - " . ($data[0]+1) . "</div>";
    echo "<img src=\"https://wis.fit.vutbr.cz/FIT/st/course-g.php?ects=1&id={$data[1]}\" width=\"400\" height=\"400\"></div>";
}
echo "<hr>Pro cteni dat musite byt prihlasen do WISu<br> <a href=\"./\">Zpet</a>";
?>
<a href="http://www.toplist.cz/" target="_top"><img 
src="http://toplist.cz/count.asp?id=1465752&logo=mc" border="0" alt="TOPlist" width="88" height="60"/></a>
</div>
</body>
</html>
