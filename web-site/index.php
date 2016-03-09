<?php 

	#page name requested, number of times requested, time, ip, total request for ip
		session_start();
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		$_SESSION['time'] = time();
		$_SESSION['file'] = $_SERVER['PATH_INFO'];
		#print($_SESSION['ip']);
		#print("<br>");
		#print($_SESSION['time']);
		#print("<br>");
		#print($_SESSION['file']);
		
	#Save session data into count.txt
		$fileHandle = fopen("../data/count.txt", "a");  // use "a" for append
		#"time ip file"
		$out_data = $_SESSION['time']." ".$_SESSION['ip']." ".$_SESSION['file']." "."\n";
		#print($_SESSION['time']." ".$_SESSION['ip']." ".$_SESSION['file']);
		#print("<br>");
		#print($out_data);
		fwrite($fileHandle, $out_data);
		fclose($fileHandle);

	#Serve request
		$filename = $_SERVER['PATH_INFO'];
		$cType = explode('.', $filename);
		$filepath = '../web-site'.$filename;
	
		if(file_exists('../web-site'.$filename)){
			if(strcasecmp($cType[1], "jpg") == 0){
				header("Content-type: image/jpeg");
				readFile($filepath);
			}
			if(strcasecmp($cType[1], "html") == 0){
				header("Content-type: text/html");
				readFile($filepath);	
			}
		}
		

?>