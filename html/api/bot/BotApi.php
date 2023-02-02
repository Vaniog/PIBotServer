<?php

require_once("CountDatabase.php");
require_once __DIR__ . '/../Api.php';

class BotApi extends Api
{
    public function Run($json_data)
    {
        try {
            if ($json_data['action'] == 'launch') {
                $this->Launch();
            } else if ($json_data['action'] == 'kill') {
                $this->Kill();
            } else if ($json_data['action'] == 'ping') {
                $this->Ping();
            }
        } catch (Throwable $e) {
            return;
        }
    }

    private function Launch()
    {
        echo 'Relaunch:';
        echo shell_exec("cd ../../../python/Vaniog-bot && ./scripts/launch.sh > /dev/null &");
        echo date('l jS \of F Y h:i:s A');
    }

    private function Kill()
    {
        echo 'Stopped: ';
        echo shell_exec("cd ../../../python/Vaniog-bot && ./scripts/kill.sh 2>&1");
    }

    private function Ping()
    {
        $db = new CountDatabase();
        echo "PING!<br>";
        echo 'Pressed: ';
        try {
            echo $db->GetPingBtnPressed();
        } catch (Throwable $e) {
            echo $e;
        }
        echo '<br>Photos send: ';
        echo $db->GetPhotosSend();
        echo shell_exec("cd ../../../python/Vaniog-bot && python bot_ping_me.py 2>&1");
    }
}