<html><head><title>Menno Ipsum</title>
<style type="text/css">

body {
 background-color:#FFFFFF;
 color:#666666;
   font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
   font-weight: 300;
 font-size:15px;
 margin-top:2px;
 margin-left:2px;
 margin-right:2px;
 margin-bottom:2px;
} 
h1{
 font-size:120px;
 color:#666666;
margin-bottom: -30px;
margin-top:-20px;
font-weight: 100;
margin:0px auto;
text-align: center;
width: 800px;

}
p{
width:600px;
text-align:justify;
margin:20px auto;
text-indent:50px;
}
a:link {color:#000099} 

a:visited {color:#000066} 

a:hover {color:#6600CC} 

a:active {color:#3333FF} 

</style>
</head><body>
<h1>Menno Ipsum</h1>
<?php
//Set up vars
$words = array("","Pittsburgh Experiment","Anabaptist","Martyr's Mirror","Menno Simons","Dirk Willems","Conrad Grebel","chow chow","Bonnebrugge","John Paul Lederach","congregations","coverings","budget","pastor","Mennonite Central Committee","dove","colony","Venture Club","MYF","JYF","Goshen College","Eastern Mennonite University","Bluffton","Bethel","Hesston","The Corinthian Plan","Peace and Justice","Ulrich Zwingli","Felix Manz","adult baptism","nonresistance","Sermon on the Mount","in the name of the Father and of the Son and of the Holy Spirit");
$phrases = array("","ate zweibach","let's delegate","let's come to agreement","chust a minute now","stop ruching around","how are you making out","decision by consensus","healing the world","peace by peace","who are the Mennonites","healing and hope","joining together","joyfully following Jesus","bridges to the cross","bringing forth firstfruits","share with each other","pass the peace","a kiss of brotherly love","longing for a greater experience","opt for believer's baptism","make disciples","baptizing them","teach all nations");
$fillers = array("","and","'twas","was","now","or","not","is","isn't","to","at","our");

$paras = 4;
$sentence_max = 9;
$sentence_min = 5;

//generate paragraphs
for($i=1;$i<=$paras;$i++) {
		//generate sentences
		$sentence_per_para = rand($sentence_min,$sentence_max);
		echo '<p>';
		for($j=1; $j<=$sentence_per_para;$j++) {
			//generate random numbers
			$words1rn = rand(1,sizeof($words));
			while (($words2rn = rand(1,sizeof($words))) == $words1rn){};
			$phrase1rn = rand(1,sizeof($phrases));
			while (($phrase2rn = rand(1,sizeof($phrases))) == $phrase1rn){};
			$filler1rn = rand(1,sizeof($fillers));
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
</body>