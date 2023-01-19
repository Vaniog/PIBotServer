<?php
require_once("Api.php");

class BotApi extends Api
{
    public function run($json_data)
    {
        if (array_key_exists('launch', $json_data)) {
            $this->launch();
        } else if (array_key_exists('kill', $json_data)) {
            $this->kill();
        } else if (array_key_exists('ping', $json_data)) {
            $this->ping();
        }
    }

    function launch()
    {
        echo 'Relaunch:';
        echo date('l jS \of F Y h:i:s A');
        echo shell_exec("cd ../../python/Vaniog-bot && ./scripts/launch.sh > /dev/null &");
    }

    function kill()
    {
        echo 'Stopped: ';
        echo shell_exec("cd ../../python/Vaniog-bot && ./scripts/kill.sh 2>&1");
    }

    function ping()
    {
        echo "PING!<br>";
        echo 'Pressed: ';
        echo shell_exec('cat ../../python/Vaniog-bot/data.json | jq .pressed');
        echo '<br>Photos send:';
        echo shell_exec('cat ../../python/Vaniog-bot/data.json | jq .photos_send');
        echo shell_exec("cd ../../python/Vaniog-bot && python bot_ping_me.py 2>&1");
    }
}