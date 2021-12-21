<?php

class DatabaseInteraction
{
    private PDO $db;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $config = self::getConfig();

        try {
            $this->db = new PDO("mysql:host=" . $config["host"] . ";dbname=" . $config["database"], $config["user"], $config["password"]);
        } catch (Exception $e) {
            file_put_contents('connectionException.txt', 'Connection Exception: '
                . print_r($e, 1) . "\n", FILE_APPEND);
        }
        return $this;
    }

    private static function getConfig(): array
    {
        $DBconfig = new DBConfig("runtime.php");
        return $DBconfig->config;
    }

    private function execute($sql, $data = null)
    {
        try {
            $sql = $this->db->prepare($sql);

            if ($data) {
                return $sql->execute($data);
            } else {
                return $sql->execute();
            }
        } catch (PDOException $e) {
            file_put_contents('dbException.txt', 'DataBase Exception: '
                . print_r($e->getMessage(), 1) . "\n", FILE_APPEND);
            return false;
        }
    }

    public function query($sql)
    {
        $sql = $this->db->prepare($sql);

        $sql->execute();

        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (!$result) {
            return [];
        }

        return $result;
    }
}