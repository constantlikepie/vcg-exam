<?php
include_once "../config/database.php";
include_once '../objects/name.php';

$database = new Database();
$db = $database->getConnection();
$name = new Name($db);

if(isset($_POST)){
    $name->name = isset($_POST["name"]) ? $_POST["name"] : "";
    if($name->recordExistsByName() > 0){
        echo "Cannot add the same name.";
        die();
    }
    if($name->create()){
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
    }else{
        echo "Adding name failed";
    }
}