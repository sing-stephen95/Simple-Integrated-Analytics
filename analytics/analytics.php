<?php
	$trafficTime = $_GET['tAnalytics'];
	#print($_GET['tAnalytics']);
	
	
	$fileHandle = fopen("../data/count.txt", "r");
	$arrLines = file("../data/count.txt");
#foreach($arrLines as $a){
#	$arrA = explode(' ', $a);
#	print($arrA[0]."<br>");
#}
	
	$currTime = time();
	print($currTime."<br>");	
	if(strcmp($trafficTime, "last 10 seconds") == 0){
		ten($arrLines, $currTime);
	}
	else if(strcmp($trafficTime, "last minute") == 0){
		minute($arrLines, $currTime);
	}
	else if(strcmp($trafficTime, "last hour") == 0){
		hour($arrLines, $currTime);		
	}
	else{
		all($arrLines, $currTime);
	}

	
	function ten($arrLines, $currTime){
		foreach($arrLines as $a){
			$arrA = explode(' ', $a);
			if($currTime - $arrA[0] <= 10){
				print($arrA[0]."<br>");
			}
			
		}
		echo "10<br>";
	}
	
	function minute($arrLines, $currTime){
		foreach($arrLines as $a){
			$arrA = explode(' ', $a);
			if($currTime - $arrA[0] <= 60){
				print($arrA[0]."<br>");
			}
			
		}
		echo "minute<br>";
	}
	
	function hour($arrLines, $currTime){
		foreach($arrLines as $a){
			$arrA = explode(' ', $a);
			if($currTime - $arrA[0] <= 3600){
				print($arrA[0]."<br>");
			}
			
		}
		echo "hour<br>";
	}
	
	function all($arrLines, $currTime){
		foreach($arrLines as $a){
			$arrA = explode(' ', $a);
			print($arrA[0]."<br>");
			
		}
		echo "all time<br>";
	}

?>
