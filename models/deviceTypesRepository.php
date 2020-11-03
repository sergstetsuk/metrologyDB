<?php

include "deviceTypes.php";

class deviceTypesRepository {

    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    private function read($row) {
        $result = new deviceTypes();
        $result->id = $row["id"];
        $result->name = $row["name"];
        return $result;
    }

    public function getAll() {
        $sql = "SELECT * FROM devicetypes";
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
