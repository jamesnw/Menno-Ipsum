<?php
//Set up vars


$words = file('lists/words.txt');
$phrases = file('lists/phrases.txt');
$fillers = file('lists/fillers.txt');

if(ISSET($_GET['p'])){
	$paras = $_GET['p'];}
	else {$paras = 4;}
if(ISSET($_GET['smax'])){
	$sentence_max = $_GET['smax'];}
	else {$sentence_max = 9;}	
if(ISSET($_GET['smin'])){
	$sentence_min = $_GET['smin'];}
	else {$sentence_min = 5;}	

//generate paragraphs
for($i=1;$i<=$paras;$i++) {
		//generate sentences
		$sentence_per_para = rand($sentence_min,$sentence_max);
		echo '<p>';
		for($j=1; $j<=$sentence_per_para;$j++) {
			//generate random numbers
			$words1rn = rand(0,sizeof($words)-1);
			while (($words2rn = rand(0,sizeof($words)-1)) == $words1rn){};
			$phrase1rn = rand(0,sizeof($phrases)-1);
			while (($phrase2rn = rand(0,sizeof($phrases)-1)) == $phrase1rn){};
			$filler1rn = rand(0,sizeof($fillers)-1);
			//generate words
			$word1 = rtrim($words[$words1rn]);
			$word2 = rtrim($words[$words2rn]);
			$phrase1 = ucfirst(rtrim($phrases[$phrase1rn]));
			$phrase2 = rtrim($phrases[$phrase2rn]);
			$filler1 = rtrim($fillers[$filler1rn]);
			$sentence = $phrase1.' '.$word1.' '.$filler1.' '.$phrase2.' '.$word2.'. ';
			echo $sentence;
		}
		echo '</p>';
	}
?>