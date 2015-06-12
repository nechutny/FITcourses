<?php
date_default_timezone_set("europe/prague");

$startYear = 2014;

function download($year, $first)
{

	$match = array();
	$result = array();

	$page = iconv("iso-8859-2","utf-8",file_get_contents("http://www.fit.vutbr.cz/study/course-l.php.cs?rok=".$year));

	if($first)
	{
		preg_match_all("/<a\s*href=\"[^\"0-9]*([0-9]+)\">(.*)<\/a>.*<b>(.*)<\/b>.*>(\d+)<\/td>/",$page,$match);
	}
	else
	{
		preg_match_all("/.*?id=([0-9]+)\" rel=\"nofollow\">(.*)<\/a>.*<b>(.*)<\/b>.*>(\d+)<\/td>/",$page,$match);
	}

	foreach($match[3] as $key => $val)
	{
		$result[ $match[3][$key] ]["years"][ $year ] = $match[1][$key];
		$result[ $match[3][$key] ]["name"] = $match[2][$key];
		$result[ $match[3][$key] ]["credit"] = $match[4][$key];

	}

	return $result;
}

$result = array();
for($i = $startYear; $i >= 2003; $i--)
{
	$result = array_replace_recursive($result,download($i, $i == $startYear));
}
ksort($result);
echo json_encode($result);
