<?php
session_start();

require_once("UsersDatabase.php");
require_once __DIR__ . '/../Api.php';

class AuthApi extends Api
{
    public function Run($json_data)
    {
        try {
            if ($json_data['action'] == 'login') {
                $this->Login($json_data['name'], $json_data['password']);
            } else if ($json_data['action'] = 'register') {
                $this->Register($json_data['name'], $json_data['password']);
            }
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
        header('Location: http://' . $_SERVER["SERVER_NAME"]);
    }

    private function Register($name, $password)
    {
        $db = new UsersDatabase();
        if ($db->UserExists($name)) {
            echo "{register: exists}";
            return;
        }
        $db->UserAdd($name, $password);
        echo "{register: succeed}";
    }

    private function Login($name, $password)
    {
        $db = new UsersDatabase();
        if (!$db->UserExists($name)) {
            echo "{login: not_exists}";
            return;
        }
        if ($db->UserLogin($name, $password)) {
            echo "{login: succeed}";
        } else {
            echo "{login: wrong}";
        }
    }

}