<?php

declare(strict_types=1);

require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


class Database
{
    private string $host = 'localhost';
    private string $db_name = 'school_x';
    private string $username = 'root';
    private string $password = 'TRaPbOOm3005!';
    public ?PDO $conn = null;

    public function getConnection(): ?PDO
    {

        $dotenv = Dotenv\Dotenv::createImmutable('../');
        $dotenv->load();

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

