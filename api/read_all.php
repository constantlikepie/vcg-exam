<?php
include_once "../config/database.php";
include_once '../objects/name.php';

$database = new Database();
$db = $database->getConnection();
$name = new Name($db);

$names = [];
$stmt = $name->readAll();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    array_push($names, [
        "id" => $id,
        "name" => $name
    ]);
}
echo(json_encode($names));