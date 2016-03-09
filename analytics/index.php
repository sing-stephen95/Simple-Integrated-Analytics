<!DOCTYPE html>
 
<html>
    <head>
        <title>Web-site Analytics</title>
        <meta charset="utf-8" />
    </head>	
    <body>
		
		<h1 align="center">Web-site Analytics</h1>
		
		
		<form method="get" action="./analytics.php" style="text-align:center">
			<label for="analytics">Select traffic time: </label>
				<select name="tAnalytics" id="analytics">
					<option>last 10 seconds</option>
					<option>last minute</option>
					<option>last hour</option>
					<option>all time</option>
				</select>
			<input type = "submit" value = "Go" />
		</form>
	
		
		
    </body>
</html>