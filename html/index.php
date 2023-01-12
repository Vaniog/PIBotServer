<!DOCTYPE html>
<html>
	
<head>
	<title>
        BotLaunch
	</title>
</head>

<body style="text-align:center;">	
	<h4>
        Press to relaunch bot
	</h4>
	
	<?php
		if(array_key_exists('button1', $_POST)) {
			button1();
		}
		else if(array_key_exists('button2', $_POST)) {
			button2();
		}
		function button1() {
			echo("Relaunch at " + date('l jS \of F Y h:i:s A'));
            shell_exec("cd ../python/Vaniog-bot && ./scripts/launch.sh");
		}
        function button2() {
			echo("Killed");
            shell_exec("cd ../python/Vaniog-bot && ./scripts/kill.sh");
        }
	?>

	<form method="post">
		<input type="submit" name="button1" class="button" value="Button1" />		
		<input type="submit" name="button2" class="button" value="Button2" />	
	</form>

</body>

</html>
