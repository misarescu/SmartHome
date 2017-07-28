<html>
	<head>
		<title>Smart Home</title>
		<style>
			form{
				margin:auto;
			}
			
			.on{
				color: white;
				background-color: black;
			}
			
			.off{
				color: black;
				background-color: white;
			}
			
		</style>
	</head>
	<body>
		<?php
			date_default_timezone_set('Europe/Bucharest');
			//echo date('l, jS F H;i');
			
			$db_host = "localhost";
			$db_username = "root";
			$db_pass = "raspberry";
			$db_name = "smart_home";
			
			$conn = mysql_connect("$db_host","$db_username", "$db_pass") or die (" Could not connect to MySQL");
			@mysql_select_db("$db_name") or die (" No Dataabse");
			
			//echo " Successful connection";
			
			$result = mysql_query("SELECT IsOn1, IsOn2, IsOn3, IsOn4, IsOn5, IsOn6, IsOn7, IsOn8 FROM Variables;", $conn);
			
			if(! $result){
				die("Could get data: " . mysql_error());
;			}
			
			//require_once("CronManager.php");
			
			
			//$crontab = new Ssh2_crontab_manager('localhost', '80', 'root', 'raspberry');
			
			$row = mysql_fetch_array($result, MYSQL_ASSOC);
			/*	echo "<br/> 1 {$row[IsOn1]}" .
					"<br/> 2 {$row[IsOn2]}" .
					"<br/> 3 {$row[IsOn3]}" .
					"<br/> 4 {$row[IsOn4]}" .
					"<br/> 5 {$row[IsOn5]}" .
					"<br/> 6 {$row[IsOn6]}" .
					"<br/> 7 {$row[IsOn7]}" .
					"<br/> 8 {$row[IsOn8]}" ;
			*/
			
			
			
			
			if (isset($_POST['ON1']))
			{
				exec("sudo python /var/www/html/scripts/Button1on.py");
				mysql_query("UPDATE Variables SET IsOn1 = 1;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
			
			if (isset($_POST['OFF1']))
			{
				exec("sudo python /var/www/html/scripts/Button1off.py");
				mysql_query("UPDATE Variables SET IsOn1 = 0;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
						
			if (isset($_POST['ON2']))
			{
				exec("sudo python /var/www/html/scripts/Button2on.py");
				mysql_query("UPDATE Variables SET IsOn2 = 1;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
			
			if (isset($_POST['OFF2']))
			{
				exec("sudo python /var/www/html/scripts/Button2off.py");
				mysql_query("UPDATE Variables SET IsOn2 = 0;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
			
			if (isset($_POST['ON3']))
			{
				exec("sudo python /var/www/html/scripts/Button3on.py");
				mysql_query("UPDATE Variables SET IsOn3 = 1;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
						
			if (isset($_POST['OFF3']))
			{
				exec("sudo python /var/www/html/scripts/Button3off.py");
				mysql_query("UPDATE Variables SET IsOn3 = 0;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
			
			if (isset($_POST['ON4']))
			{
				exec("sudo python /var/www/html/scripts/Button4on.py");
				mysql_query("UPDATE Variables SET IsOn4 = 1;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
						
			if (isset($_POST['OFF4']))
			{
				exec("sudo python /var/www/html/scripts/Button4off.py");
				mysql_query("UPDATE Variables SET IsOn4 = 0;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
			
			if (isset($_POST['ON5']))
			{
				exec("sudo python /var/www/html/scripts/Button5on.py");
				mysql_query("UPDATE Variables SET IsOn5 = 1;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
						
			if (isset($_POST['OFF5']))
			{
				exec("sudo python /var/www/html/scripts/Button5off.py");
				mysql_query("UPDATE Variables SET IsOn5 = 0;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
			
			if (isset($_POST['ON6']))
			{
				exec("sudo python /var/www/html/scripts/Button6on.py");
				mysql_query("UPDATE Variables SET IsOn6 = 1;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
						
			if (isset($_POST['OFF6']))
			{
				exec("sudo python /var/www/html/scripts/Button6off.py");
				mysql_query("UPDATE Variables SET IsOn6 = 0;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
			
			if (isset($_POST['ON7']))
			{
				exec("sudo python /var/www/html/scripts/Button7on.py");
				mysql_query("UPDATE Variables SET IsOn7 = 1;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
						
			if (isset($_POST['OFF7']))
			{
				exec("sudo python /var/www/html/scripts/Button7off.py");
				mysql_query("UPDATE Variables SET IsOn7 = 0;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
			
			if (isset($_POST['ON8']))
			{
				exec("sudo python /var/www/html/scripts/Button8on.py");
				mysql_query("UPDATE Variables SET IsOn8 = 1;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
						
			if (isset($_POST['OFF8']))
			{
				exec("sudo python /var/www/html/scripts/Button8off.py");
				mysql_query("UPDATE Variables SET IsOn8 = 0;", $conn);
				echo '<meta http-equiv="refresh" content = "0">';
			}
			
		?>
		<table>
			<tr>
				<th style = "width : 25%">
					Index Buton:
				</th>
				<th colspan = "2">
					Button state
				</th>
			</tr>
			<tr>
				<td>#1</td>
				
				<td class="state">
						
					<form method = "post">
					<button class= <?php  if($row[IsOn1] == 1){echo '"on"';} else echo'"off"'?> name = "ON1">ON</button>&nbsp;
					<button class = <?php  if($row[IsOn1] == 0){echo '"on"';} else echo'"off"'?> name = "OFF1">OFF</button>
					</form>
				</td>
				
			</tr>
			<tr>
				<td>#2</td>
				<td class="state">
					<form method = "post">
					<button class=<?php  if($row[IsOn2] == 1){echo '"on"';} else echo'"off"'?>  name = "ON2">ON</button>&nbsp;
					<button class = <?php  if($row[IsOn2] == 0){echo '"on"';} else echo'"off"'?> name = "OFF2">OFF</button>
					</form>
				</td>
			</tr>
			<tr>
				<td>#3</td>
				<td class="state">
					<form method = "post">
					<button class= <?php  if($row[IsOn3] == 1){echo '"on"';} else echo'"off"'?>  name = "ON3">ON</button>&nbsp;
					<button class = <?php  if($row[IsOn3] == 0){echo '"on"';} else echo'"off"'?> name = "OFF3">OFF</button>
					</form>
				</td>
			</tr>
			<tr>
				<td>#4</td>
				<td class="state">
					<form method = "post">
					<button class= <?php  if($row[IsOn4] == 1){echo '"on"';} else echo'"off"'?>  name = "ON4">ON</button>&nbsp;
					<button class = <?php  if($row[IsOn4] == 0){echo '"on"';} else echo'"off"'?> name = "OFF4">OFF</button>
					</form>
				</td>
			</tr>
			<tr>
				<td>#5</td>
				<td class="state">
					<form method = "post">
					<button class= <?php  if($row[IsOn5] == 1){echo '"on"';} else echo'"off"'?>  name = "ON5">ON</button>&nbsp;
					<button class = <?php  if($row[IsOn5] == 0){echo '"on"';} else echo'"off"'?> name = "OFF5">OFF</button>
					</form>
				</td>
			</tr>
			<tr>
				<td>#6</td>
				<td class="state">
					<form method = "post">
					<button class= <?php  if($row[IsOn6] == 1){echo '"on"';} else echo'"off"'?>  name = "ON6">ON</button>&nbsp;
					<button class = <?php  if($row[IsOn6] == 0){echo '"on"';} else echo'"off"'?> name = "OFF6">OFF</button>
					</form>
				</td>
			</tr>
			<tr>
				<td>#7</td>
				<td class="state">
					<form method = "post">
					<button class= <?php  if($row[IsOn7] == 1){echo '"on"';} else echo'"off"'?>  name = "ON7">ON</button>&nbsp;
					<button class = <?php  if($row[IsOn7] == 0){echo '"on"';} else echo'"off"'?> name = "OFF7">OFF</button>
					</form>
				</td>
			</tr>
			<tr>
				<td>#8</td>
				<td class="state">
					<form method = "post">
					<button class= <?php  if($row[IsOn8] == 1){echo '"on"';} else echo'"off"'?>  name = "ON8">ON</button>&nbsp;
					<button class = <?php  if($row[IsOn8] == 0){echo '"on"';} else echo'"off"'?> name = "OFF8">OFF</button>
					</form>
				</td>
			</tr>
		</table>
		
		
	</body>
</html>