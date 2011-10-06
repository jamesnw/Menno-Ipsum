<?php
if(ISSET($_GET['s'])){
	$site = $_GET['s'];}
else{
	$site = "http://jamessw.com";
	}
$ch = curl_init($site);
$userAgent =  'Googlebot/2.1 (http://www.googlebot.com/bot.html)'; // Set our UserAgent as Googlebot
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$text = curl_exec($ch);

$lines = explode("\n",$text);
$textA = array();
$textB = array();
for($i=1;$i<=count($lines);$i++) {
	$line = $lines[$i];
	// Strip the naughty stuff
	//$line = preg_replace(array('~[\r\n]+~', '~<(script|object|embed)[^>]*>(?:.*?)</\1>~si'), array(' ', null), $body[1]);
	// Strip the rest
	$line = trim(strip_tags($line));
	$line = preg_replace("/[^a-zA-Z0-9\s]/", "", $line);
	$line = preg_replace('/\s{2,}/',' ', $line);

	$line = strtolower($line);
	$newWords = explode(" ",$line);
	$textA = array_merge($textA, $newWords);
}

foreach($textA as $word){
		if(array_key_exists($word, $textB)){
			$textB[$word] += 1;
			}
		else{
			$textB[$word] = 1;
			}
	}
	asort($textB);
	$textB = array_reverse($textB);
print (json_encode($textB));
?>