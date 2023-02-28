<?php

class City
{

    private ?PDO $conn;
    private string $table_name = "city";
    public int $id;
    public string $name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function get(): bool
    {

        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    function create(): bool
    {

        $query = "INSERT INTO " . $this->table_name . " SET name=:name";

        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));

        $stmt->bindParam(":name", $this->name);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function delete(): bool
    {
        $query = "DELETE FROM " . $this->table_name ." WHERE id=:id;";

        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":id", $this->id);

        $stmt->execute();

        return $stmt;
    }

    function update(): bool
    {
        $query = " UPDATE ". $this->table_name . " SET name=:name, username=:username, city_id=:city_id" . " WHERE id=:id;";


        $stmt = $this->conn->prepare($query);

        if($this->db->affected_rows > 0){
            return true;
        }
        return false;

        $stmt->execute();

        return $stmt;
    }
}


