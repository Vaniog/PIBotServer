<!DOCTYPE html>
<html>

<head>
	<link rel="icon" href="https://icons.iconarchive.com/icons/google/noto-emoji-smileys/48/10103-robot-face-icon.png">
	<title>
		BotLaunch
	</title>
</head>

<body style="text-align:center;">
	<h1>
		Press to ping
	</h1>

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


	<div id="api_answer"></div>
	<button id="btn_ping" class="button">PING</button>
	<button id="btn_launch" class="button">LAUNCH</button>
	<button id="btn_kill" class="button">KILL</button>

	<script type="text/javascript" src="main.js"></script>
</body>

</html>