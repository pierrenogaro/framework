<?php

namespace Core\Database;

use Core\Environment\DotEnv;


class PDOMySQL
{
    public static function getPdo()
    {
        $dotEnv = new DotEnv();

        $dbHost = $dotEnv->getVariable("DB_HOST");
        $dbName = $dotEnv->getVariable("DB_NAME");
        $username = $dotEnv->getVariable("DB_USER");
        $password = $dotEnv->getVariable("DB_PASSWORD");

        $pdo = new \PDO(
            "mysql:host=$dbHost;dbname=$dbName",
            $username,
            $password,
            [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            ]
        );
        return $pdo;
    }

}
