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
		$arrIpVisits = array();
		foreach($arrLines as $a){
			$arrA = explode(' ', $a);
			if($currTime - $arrA[0] <= 10){
				#graph 2
				$arrIpVisits[$arrA[1]] = ipvisits($arrIpVisits, $arrA[1]);
			}
			
		}
		echo "10<br>";
	}
	
	function minute($arrLines, $currTime){
		$arrIpVisits = array();
		foreach($arrLines as $a){
			$arrA = explode(' ', $a);
			if($currTime - $arrA[0] <= 60){
				#graph 2
				$arrIpVisits[$arrA[1]] = ipvisits($arrIpVisits, $arrA[1]);
			}
			
		}
		echo "minute<br>";
	}
	
	function hour($arrLines, $currTime){
		$arrIpVisits = array();
		foreach($arrLines as $a){
			$arrA = explode(' ', $a);
			if($currTime - $arrA[0] <= 3600){
				#graph 2
				$arrIpVisits[$arrA[1]] = ipvisits($arrIpVisits, $arrA[1]);
			}
			
		}
		echo "hour<br>";
	}
	
	function all($arrLines, $currTime){
		$arrIpVisits = array();
		foreach($arrLines as $a){
			$arrA = explode(' ', $a);
			#graph 2
			$arrIpVisits[$arrA[1]] = ipvisits($arrIpVisits, $arrA[1]);
			
		}
		echo "all time<br>";
	}

	#graph 2 function
	function ipvisits($arrIpVisits, $ip){
		if(array_key_exists("$arrA[1]", $arrIpVisits)){
			$arrIpVisits[$ip] = $arrIpVisits[$ip] + 1;
			#print($arrIpVisits[$arrA[1]]."<br>");
		}
		else{
			$arrIpVisits[$ip] = 0;
		}
		
		return $arrIpVisits[$ip];
	}
?>
