<?php

namespace Desktop\QueryBuilder\Database;

use Desktop\QueryBuilder\Contracts\MySqlInterface;
use Exception;
use PDO;

final class MySql implements MySqlInterface
{
    private $columns;
    private $table;
    private $where;
    private $whereValue;
    private $limit;
    private $sortBy;
    private $pdo;
    private $sortColumn;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function select(string|array $columns = '*')
    {
        // Сбрасываем состояние объекта, чтобы делать несколько запросов с объектом
        $this->resetParamsStatus();

        $this->columns = $columns;

        return $this;
    }

    public function insert(array $data)
    {

        $table = $this->table;

        $this->resetParamsStatus();

        $columns = implode(', ', array_keys($data)); // Столбцы таблицы
        $values = implode(', ', array_values($data)); // Параметры

        $sql = "INSERT INTO " . $table . " ($columns) VALUES ($values)";


        $query = $this->pdo->prepare($sql);

        $query->execute();
    }

    public function update(array $data)
    {

        $table = $this->table;
        $where = $this->where;
        $whereValue = $this->whereValue;

        // Сбрасываем состояние объекта, чтобы делать несколько запросов с объектом
        $this->resetParamsStatus();

        $str = '';

        foreach ($data as $key => $val) {
            $str .= $key . '=' . $val . ',';
        }

        $str = rtrim($str, ', ');

        $sql = "UPDATE " . $table . " SET $str";


        if ($where) {
            $sql .= " WHERE {$where}";
        }

        $query = $this->pdo->prepare($sql);

        if ($where) {
            $query->bindValue(':value', $whereValue);
        }

        $query->execute();
    }

    public function delete()
    {
        $table = $this->table;
        $where = $this->where;
        $whereValue = $this->whereValue;

        // Сбрасываем состояние объекта, чтобы делать несколько запросов с объектом
        $this->resetParamsStatus();

        $sql = "DELETE FROM " . $table . " ";

        if ($where) {
            $sql .= " WHERE {$where}";
        }

        $query = $this->pdo->prepare($sql);

        if ($where) {
            $query->bindValue(':value', $whereValue);
        }

        $query->execute();
    }

    public function from(string $table)
    {
        $this->table = $table;
        return $this;
    }

    public function where(string $column, string $operator = '=', string|int $value)
    {
        $this->where = "$column $operator :value";
        $this->whereValue = $value;
        return $this;
    }

    public function limit(int $limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function sortBy(string $column, string $sortType = 'asc')
    {
        $sortType != 'asc' ? ($sortType != 'desc' ?: throw new Exception) : null;

        $this->sortColumn = $column;
        $this->sortBy = $sortType;
        return $this;
    }

    public function get()
    {
        $sql = '';
        // Собираем запрос 
        if ($this->columns) {
            $sql .= "SELECT {$this->columns} FROM " . $this->table;
        }

        if ($this->where) {
            $sql .= " WHERE {$this->where}";
        }

        if ($this->sortBy) {
            $sql .= " ORDER BY {$this->sortColumn} {$this->sortBy}";
        }

        if ($this->limit) {
            $sql .= " LIMIT {$this->limit}";
        }

        $query = $this->pdo->prepare($sql);

        if ($this->where) {
            $query->bindValue(':value', $this->whereValue);
        }

        // Выполняем
        try {
            $query->execute();
        } catch (Exception $e) {
            echo 'Ошибка при выполнении запроса: ' . $e . ' ' . __CLASS__;
            return;
        }


        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    private function resetParamsStatus()
    {
        $this->columns = null;
        $this->table = null;
        $this->where = null;
        $this->whereValue = null;
        $this->limit = null;
        $this->sortBy = null;
        $this->sortColumn = null;
    }
}
