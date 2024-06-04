<?php


use Desktop\QueryBuilder\QueryBuilder\QueryBuilder;

$dir = str_replace('\\', '/', __DIR__);

require_once $dir . '/Contracts/MySqlInterface.php';
require_once $dir . '/Contracts/PostgresInterface.php';
require_once $dir . '/QueryBuilder/QueryBuilder.php';
require_once $dir . '/Database/MySql.php';
require_once $dir . '/Database/Postgres.php';

try {

    $connect = new QueryBuilder();
    $db = $connect->connection('pgsql');

    $db->from('users')->insert(
        [
            'id' => '1',
            'name' => "'Igor'",
            'email' => "'Igor@yandex.ru'",
            'data_in' => "'{2021-10-10}'",
        ]
    );

    $db->from('users')->insert(
        [
            'id' => '2',
            'name' => "'Dima'",
            'email' => "'Dima@yandex.ru'",
            'data_in' => "'{2021-10-10}'",
        ]
    );

    $db->from('users')->insert(
        [
            'id' => '3',
            'name' => "'Vasia'",
            'email' => "'Vasia@yandex.ru'",
            'data_in' => "'{2021-10-10}'",
        ]
    );

    $db->from('users')->where('id', '=', 1)->update(
        [
            'name' => "'MAKS'",
        ]
    );

    $db->from('users')->where('id', '=', 2)->delete();


    $result = $db->select()->from('users')->sortBy('id')->limit(3)->get();

    foreach ($result as $row) {
        print_r($row); // Выводим каждую строку результата
    }
} catch (PDOException $e) {
    // Если произошла ошибка, выводим ее
    echo 'Ошибка соединения с базой данных: ' . $e->getMessage();
}
