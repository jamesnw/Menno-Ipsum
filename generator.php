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

//echoRandSentence('pfw', $words, $phrases, $fillers);
/* Takes a structure String (e.g. "pfw") and returns an appropriate, random sentence. */
function echoRandSentence($structure, $words, $phrases, $fillers) {
	// Break the structure String into an Array.
	$structure = preg_split('//', $structure, -1, PREG_SPLIT_NO_EMPTY);

	// Count the number of words, phrases and fillers needed.
	$rand_words = 0;
	$rand_phrases = 0;
	$rand_fillers = 0;
	foreach ($structure as $entry) {
		switch($entry) {
			case 'w': $rand_words++; break;
			case 'p': $rand_phrases++; break;
			case 'f': $rand_fillers++; break;
		}
	}

	// Get a random list of words, phrases and fillers.
	switch($rand_words) {
		case 0: $rand_words = array(); break;
		case 1: $rand_words = array(array_rand($words, $rand_words)); break;
		default: $rand_words = array_rand($words, $rand_words); break;
	}
	switch($rand_phrases) {
		case 0: $rand_phrases = array(); break;
		case 1: $rand_phrases = array(array_rand($phrases, $rand_phrases)); break;
		default: $rand_phrases = array_rand($phrases, $rand_phrases); break;
	}
	switch($rand_fillers) {
		case 0: $rand_fillers = array(); break;
		case 1: $rand_fillers = array(array_rand($fillers, $rand_fillers)); break;
		default: $rand_fillers = array_rand($fillers, $rand_fillers); break;
	}

	// Combine the random list of words, phrases and fillers together based on
	// the original, given $structure.
	$sentence = array();
	foreach ($structure as $entry) {
		switch($entry) {
			case 'w': $sentence[] = rtrim($words[array_pop($rand_words)]); break;
			case 'p': $sentence[] = rtrim($phrases[array_pop($rand_phrases)]); break;
			case 'f': $sentence[] = rtrim($fillers[array_pop($rand_fillers)]); break;
		}
	}

	// Print out a nice English-formatted sentence.
	$sentence[0] = ucfirst($sentence[0]);
	echo "<p>";
	echo implode(' ', $sentence).'. ';
	echo "</p>\n";
}

//generate paragraphs
for($i=1;$i<=$paras;$i++) {
		//generate sentences
		$sentence_per_para = rand($sentence_min,$sentence_max);
		echo '<p>';
		for($j=1; $j<=$sentence_per_para;$j++) {
			$structure = rand(1,3);
			switch($structure) {
				case 1: //pwfpw
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
					break;
				case 2: //pfw
					//generate random numbers
					$words1rn = rand(0,sizeof($words)-1);
					$phrase1rn = rand(0,sizeof($phrases)-1);
					$filler1rn = rand(0,sizeof($fillers)-1);
					//generate words
					$word1 = rtrim($words[$words1rn]);
					$phrase1 = ucfirst(rtrim($phrases[$phrase1rn]));
					$filler1 = rtrim($fillers[$filler1rn]);
					$sentence = $phrase1.' '.$filler1.' '.$word1.'. ';
					echo $sentence;	
					break;
				case 3: //pwfpw,pfw
				
					//generate random numbers
					$words1rn = rand(0,sizeof($words)-1);
					
					while (($words2rn = rand(0,sizeof($words)-1)) == $words1rn){};
					while (($words3rn = rand(0,sizeof($words)-1)) == $words2rn){};
					$phrase1rn = rand(0,sizeof($phrases)-1);
					
					while (($phrase2rn = rand(0,sizeof($phrases)-1)) == $phrase1rn){};
					while (($phrase3rn = rand(0,sizeof($phrases)-1)) == $phrase2rn){};
					$filler1rn = rand(0,sizeof($fillers)-1);
					
					while (($filler2rn = rand(0,sizeof($fillers)-1)) == $filler1rn){};
					
					//generate words
					$word1 = rtrim($words[$words1rn]);
					$word2 = rtrim($words[$words2rn]);
					$word3 = rtrim($words[$words3rn]);
					$phrase1 = ucfirst(rtrim($phrases[$phrase1rn]));
					$phrase2 = rtrim($phrases[$phrase2rn]);
					$phrase3 = rtrim($phrases[$phrase3rn]);
					$filler1 = rtrim($fillers[$filler1rn]);
					$filler2 = rtrim($fillers[$filler2rn]);
					$sentence = $phrase1.' '.$word1.' '.$filler1.' '.$phrase2.' '.$word2.', '.$phrase3.' '.$filler2.' '.$word3.'. ';
					echo $sentence;
					break;
				default:
					return "Broken";
			}
		}
		echo '</p>';
	}
	

?>