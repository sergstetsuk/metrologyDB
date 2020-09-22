<?php

include "Cathedra.php";

class CathedraRepository {

    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    private function read($row) {
        $result = new Cathedra();
        $result->id = $row["id"];
        $result->name = $row["name"];
        return $result;
    }

    public function getAll() {
        $sql = "SELECT * FROM cathedras";
        $q = $this->db->prepare($sql);
        $q->execute([]);
        $rows = $q->fetchAll();

        $result = array();
        foreach($rows as $row) {
            array_push($result, $this->read($row));
        }
        return $result;
    }

}

?>
