<?php

namespace Desktop\QueryBuilder\QueryBuilder;

use Desktop\QueryBuilder\Contracts\MySqlInterface;
use Desktop\QueryBuilder\Contracts\PostgresInterface;
use Desktop\QueryBuilder\Database\MySql;
use Desktop\QueryBuilder\Database\Postgres;
use Exception;
use PDO;

final class QueryBuilder
{
   
    /**
     * Подключаемся к бд
     * @param $connection Тип бд
     */
    public function connection(string $connection) : object
    {
        $pdo = $this->getPdo($connection);
        switch($connection)
        {
            case 'pgsql' : return new Postgres($pdo);
            case 'mysql' : return new MySql($pdo);
        }
    }

    /**
     * Получаем объект соединения 
     * @param $connection Тип бд
     */
    private function getPdo(string $connection) : object
    {
        $config = require_once 'C:\Users\Netbook\Desktop\QueryBuilder\config.php';

        if ($config[$connection]) {

            $db_host = $config[$connection]['db_host'];
            $db_name = $config[$connection]['db_name'];
            $db_user = $config[$connection]['db_user'];
            $db_password = $config[$connection]['db_password'];

            try {
                $pdo = new PDO("$connection:host=$db_host;dbname=$db_name", $db_user, $db_password);
            } catch (Exception $e) {
                echo $e;
            }
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } else {
            throw new Exception('Отсутствует соединение с базой данных', '500');
        }

        return $pdo;
    }
}
