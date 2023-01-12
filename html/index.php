<!DOCTYPE html>
<html>

<head>
	<title>
		BotLaunch
	</title>
</head>

<body style="text-align:center;">
	<h1>
		Press to ping
	</h1>

	<?php
		if(array_key_exists('button1', $_POST)) {
			button1();
		}
		else if(array_key_exists('button2', $_POST)) {
			button2();
		}
		else if(array_key_exists('button3', $_POST)) {
			button3();
		}
		function button1() {    
            echo 'Relaunch:';
			echo date('l jS \of F Y h:i:s A');
            exec(sprintf("%s > %s 2>&1 & echo $! >> %s", 
            "cd ../python/Vaniog-bot && sudo ./scripts/launch.sh", 
            'file1.txt', 'file2.txt'));
		}
        function button2() {
			echo("Killed");
            shell_exec("cd ../python/Vaniog-bot && sudo ./scripts/kill.sh");
        }
		function button3() {
			echo "PING!";
            echo shell_exec("cd ../python/Vaniog-bot && python bot_ping_me.py 2>$1");
		}
	?>

	<style>
		.button {
			font-size: 2em;
			width: 200px;
			height: 100px;
			border-radius: 20px;
			border: none;
		}

		.button:hover {
			transform: scale(0.97);
		}
	</style>

	<form method="post">
		<input type="submit" name="button3" class="button" value="PING" />
	</form>

</body>

</html>