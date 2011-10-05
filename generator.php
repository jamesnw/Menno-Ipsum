<?php
//Set up vars
$words = array("Pittsburgh Experiment","Anabaptist","Martyr's Mirror","Menno Simons","Dirk Willems","Conrad Grebel","chow chow","bonnebrugge","John Paul Lederach","congregations","coverings","budget","pastor","Mennonite Central Committee","dove","colony","Venture Club","MYF","JYF","Goshen College","Eastern Mennonite University","Bluffton","Bethel","Hesston","The Corinthian Plan","Peace and Justice","Ulrich Zwingli","Felix Manz","adult baptism","nonresistance","Sermon on the Mount","in the name of the Father and of the Son and of the Holy Spirit","communal","fellowship meal","fellowship","community","simplicity","peace","conflict studies","service","missional","martyrs","MCC","AMBS","footwashing");
$phrases = array("ate zweibach","let's delegate","let's come to agreement","decision by consensus","healing the world","peace by peace","who are the Mennonites","healing and hope","joining together","joyfully following Jesus","bridges to the cross","bringing forth firstfruits","share with each other","pass the peace","a kiss of brotherly love","longing for a greater experience","opt for believer's baptism","make disciples","baptizing them","teach all nations","in the world, but not of it","the third way","servant leadership","the Anabaptist Vision","the Silent in the land","gelassenheit","in the world but not of it","More with Less");
$fillers = array("and","'twas","was","now","or","not","is","isn't","to","at","our");

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