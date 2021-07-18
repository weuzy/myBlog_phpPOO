<?php

namespace App\Models;

use Database\DBConnection;
use PDO;
use stdClass;

abstract class Model {

    protected $db;
    protected $table;

    public function __construct(DBConnection $db) {
        $this->db = $db;
    }

    public function all(): array
    {
        return $this->query("SELECT * FROM ($this->table) ORDER BY created_at DESC");

        // $statements = $this->db->getPDO()->query("SELECT * FROM ($this->table) ORDER BY created_at DESC");
        // $statements->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        // return $statements->fetchAll();
    }

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM ($this->table) WHERE id = ?", [$id], true);

        // $statements = $this->db->getPDO()->prepare("SELECT * FROM ($this->table) WHERE id = ?");
        // $statements->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        // $statements->execute([$id]);
        // return $statements->fetch();
    }

    public function created(array $data, ?array $relations = null)
    {
        // "INSERT INTO posts (title, content) VALUES (:title, :content)";

        $firstParenthesis = "";
        $secondParenthesis = "";
        $i = 1;
        foreach ($data as $key => $val) {
            $comma = $i === count($data) ? "" : ", ";
            $firstParenthesis .= "{$key}{$comma}";
            $secondParenthesis .= ":{$key}{$comma}";
            $i++;
        }
        return $this->query("INSERT INTO {$this->table} ($firstParenthesis)
        VALUES ($secondParenthesis)", $data);
    }

    public function update(int $id, array $data)
    {
        // $sql = "UPDATE {$this->table} SET title = :title, content = :content WHERE id = :id";

        $sqlRequestPart = "";
        $i = 1;

        foreach ($data as $key => $val) {
            $comma = $i === count($data) ? "" : ', ';
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
            $i++;
        }
        $data['id'] = $id;

        return $this->query("UPDATE {$this->table} SET {$sqlRequestPart} WHERE id = :id", $data);
    }

    public function destroy(int $id): bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function query(string $sql, array $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';

        if (
            strpos($sql, 'DELETE') === 0
            || strpos($sql, 'UPDATE') === 0
            || strpos($sql, 'INSERT') === 0) {
            $statements = $this->db->getPDO()->$method($sql);
            $statements->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $statements->execute($param);
        }



        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $statements = $this->db->getPDO()->$method($sql);
        $statements->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === 'query') {
            return $statements->$fetch();
        } else {
            $statements->execute($param);
            return $statements->$fetch();
        }
    }
}