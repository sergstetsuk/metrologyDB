<?php

include "../models/deviceTypesRepository.php";

$config = include("../db/config.php");
//$db = new PDO($config["db"], $config["username"], $config["password"]);
$db = new PDO("sqlite:../db/register.sqlite");
$deviceTypes = new deviceTypesRepository($db);


switch($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $result = $deviceTypes->getAll();
        break;
}

header("Content-Type: application/json");
echo json_encode($result);
?>
