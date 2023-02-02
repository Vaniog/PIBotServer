<?php

class Database
{
    protected $link_;
    public function __construct()
    {
        try {
            $this->link_ = mysqli_connect('localhost', 'root',
                file_get_contents( $_SERVER["DOCUMENT_ROOT"].'/../sql/sql_password.txt'), 'web_database');
            mysqli_set_charset($this->link_, "utf8");
        } catch (Throwable $e) {
            echo "Error in connecting to database: " . $e->getMessage();
        }
    }
}
