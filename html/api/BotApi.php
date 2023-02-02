<?php
require_once("Api.php");
require_once("database.php");

class BotApi extends Api
{
    public function Run($json_data)
    {
        if (array_key_exists('launch', $json_data)) {
            $this->Launch();
        } else if (array_key_exists('kill', $json_data)) {
            $this->Kill();
        } else if (array_key_exists('ping', $json_data)) {
            $this->Ping();
        }
    }

    function Launch()
    {
        echo 'Relaunch:';
        echo date('l jS \of F Y h:i:s A');
        echo shell_exec("cd ../../python/Vaniog-bot && ./scripts/launch.sh > /dev/null &");
    }

    function Kill()
    {
        echo 'Stopped: ';
        echo shell_exec("cd ../../python/Vaniog-bot && ./scripts/kill.sh 2>&1");
    }

    function Ping()
    {
        $db = new CountDatabase();
        echo "PING!<br>";
        echo 'Pressed: ';
        try {
            echo $db->GetPingBtnPressed();
        } catch (Throwable $e) {
            echo $e;
        }
        echo shell_exec('cat ../../python/Vaniog-bot/data.json | jq .pressed');
        echo '<br>Photos send: ';
        echo $db->GetPhotosSend();
        echo shell_exec('cat ../../python/Vaniog-bot/data.json | jq .photos_send');
        echo shell_exec("cd ../../python/Vaniog-bot && python bot_ping_me.py 2>&1");
    }
}