<?php
echo '<div>';

class Database
{
    protected $link_;
    public function __construct()
    {
        try {
            $this->link_ = mysqli_connect('localhost', 'root', file_get_contents('../../sql/sql_password.txt'), 'web_database');
            mysqli_set_charset($this->link_, "utf8");
        } catch (Throwable $e) {
            echo "Error in connecting to database: " . $e->getMessage();
        }
    }
}

class CountDatabase extends Database
{
    public function GetPingBtnPressed()
    {
        $sql = 'SELECT count FROM count where name="ping"';
        $result = mysqli_query($this->link_, $sql);
        return mysqli_fetch_array($result)[0];
    }
    public function GetPhotosSend()
    {
        $sql = 'SELECT count FROM count where name="photos_send"';
        $result = mysqli_query($this->link_, $sql);
        return mysqli_fetch_array($result)[0];
    }
}

echo '</div>';