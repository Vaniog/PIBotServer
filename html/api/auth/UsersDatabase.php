<?php

require_once(__DIR__ . "/../Database.php");

class UsersDatabase extends Database
{
    private function Encode($string): string
    {
        return sha1($string);
    }

    public function UserExists($name): bool
    {
        $sql = "select * from users where name='$name';";
        $result = mysqli_query($this->link_, $sql);
        return mysqli_fetch_array($result) != null;
    }

    public function UserAdd($name, $password): bool
    {
        if ($this->UserExists($name)) {
            return false;
        }
        $new_password = $this->Encode($password);

        $sql = "insert into users (name, password) values ('$name', '$new_password')";
        mysqli_query($this->link_, $sql);

        return true;
    }

    public function UserLogin($name, $password): bool
    {
        if (!$this->UserExists($name)) {
            return false;
        }
        $sql = "select (password) from users where name='$name';";
        $result = mysqli_query($this->link_, $sql);
        $real_password = mysqli_fetch_array($result)[0];
        return $this->Encode($password) == $real_password;
    }

}