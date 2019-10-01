<?php
date_default_timezone_set("europe/prague");

$startYear = 2019;

function download($year, $first)
{

	$match = array();
	$result = array();

	$page = file_get_contents("https://www.fit.vut.cz/study/courses/.cs?year=".$year."&type=ALL");

	if($first)
	{
		preg_match_all('^https://www.fit.vut.cz/study/course/(\d+)/.*">(.*)</a></td><td>([A-z0-9]+)</td>.*<td>(\d+)</td>^',$page,$match);
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
	$result = array_replace_recursive($result,download($i, TRUE));
}
ksort($result);
echo json_encode($result);
