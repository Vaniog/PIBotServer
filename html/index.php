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
		if(array_key_exists('btn_launch', $_POST)) {
			btn_launch();
		}
		else if(array_key_exists('btn_kill', $_POST)) {
			btn_kill();
		}
		else if(array_key_exists('btn_ping', $_POST)) {
			btn_ping();
		}
		function btn_launch() {
           	echo 'Relaunch:';
			echo date('l jS \of F Y h:i:s A');
			echo shell_exec("cd ../python/Vaniog-bot && ./scripts/launch.sh > /dev/null &");
		}

		function btn_kill() {
			echo 'Stopped: ';
			echo shell_exec("cd ../python/Vaniog-bot && ./scripts/kill.sh 2>&1");
		}

		function btn_ping() {
			echo "PING!<br>";
			echo 'Pressed: ';
			echo shell_exec('cat ../python/Vaniog-bot/data.json | jq .pressed');
			echo '<br>Photos send:';
			echo shell_exec('cat ../python/Vaniog-bot/data.json | jq .photos_send');
			echo shell_exec("cd ../python/Vaniog-bot && python bot_ping_me.py 2>&1");
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
		<input type="submit" name="btn_ping" class="button" value="PING" />
		<input type="submit" name="btn_launch" class="button" value="LAUNCH" />
		<input type="submit" name="btn_kill" class="button" value="KILL" />
	</form>

</body>

</html>
