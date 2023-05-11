<?php
include '../config.php';
include 'CrudInterface.php';
class db implements CrudInterface
{
    protected $connection;
    protected $PrimaryKey = 'UserID';
    protected $Table = 'Users';
    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASS);
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
    public function get_all(): array
    {
        return $this->get(['*'], ' ');
    }
    public function get(array $data, string $where): array
    {
        $column = '';
        foreach ($data as $key) {
            $column .= $key . ', ';
        }
        $column = trim($column, ', ');
        $query = empty(trim($where)) ? "SELECT $column FROM $this->Table;" : "SELECT $column FROM $this->Table WHERE ($where);";

        $stmt = $this->connection->query($query);
        return $stmt->fetchAll();
    }
    public function update(array $data, string $where): string
    {
        $value = '';
        foreach ($data as $key => $val) {
            $value .= $key.'=:' . $key . ', ';
        }
        $value = trim($value, ', ');

        $query = "UPDATE $this->Table SET $value WHERE $where";
        var_dump($query);
        $stmt = $this->connection->prepare($query);
        return $stmt->execute($data);
    }
    public function delete(string $where): string
    {
        $query = "DELETE FROM $this->Table WHERE $where";
        $stmt = $this->connection->query($query);
       return $stmt->execute();
    }
    public function create(array $data): string
    {
        $column = '';
        $value = '';
        foreach ($data as $key => $val) {
            $column .= $key . ', ';
            $value .= ':' . $key . ', ';
        }
        $column = trim($column, ', ');
        $value = trim($value, ', ');


        $query = "INSERT INTO $this->Table ({$column}) VALUE ({$value});";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute($data);
    }
}
