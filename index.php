<?php
if(isset($_GET["set-list"]))
{
	setcookie("list-style",$_GET["set-list"], time()+60*60*24*365);
	header("Location: ?list");
	exit;
}

date_default_timezone_set("europe/prague");

include("template/header.tpl.php");

if(isset($_GET["list"]))
{
	$courses = json_decode(file_get_contents("courses.json"),true);
	if(isset($_COOKIE["list-style"]) && $_COOKIE["list-style"] == "block")
	{
		include("template/block.tpl.php");
	}
	else
	{
		include("template/list.tpl.php");
	}
}
else if(isset($_GET["detail"]))
{
	$courses = json_decode(file_get_contents("courses.json"),true);
	include("template/detail.tpl.php");
}
elseif(isset($_GET["compare"]))
{
	$courses = json_decode(file_get_contents("courses.json"),true);
	include("template/compare.tpl.php");
}
else
{
	include("template/homepage.tpl.php");
}
include("template/footer.tpl.php");
