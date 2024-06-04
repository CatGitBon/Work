<?php
namespace Desktop\QueryBuilder\Contracts;

interface PostgresInterface
{

    public function select(string|array $columns = '*');

    public function update(array $data);

    public function delete();

    public function from(string $table);

    public function where(string $column, string $operator = '=', string|int $value);

    public function limit(int $limit);

    public function sortBy(string $column, string $sortType = 'asc');

    public function get();
}