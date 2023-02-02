<?php

//require_once("../Database.php");
require_once __DIR__ . '/../Database.php';

class CountDatabase extends Database
{
    public function GetPingBtnPressed() : int
    {
        $sql = 'SELECT count FROM count where name="ping"';
        $result = mysqli_query($this->link_, $sql);
        return mysqli_fetch_array($result)[0];
    }
    public function GetPhotosSend() : int
    {
        $sql = 'SELECT count FROM count where name="photos_send"';
        $result = mysqli_query($this->link_, $sql);
        return mysqli_fetch_array($result)[0];
    }
}