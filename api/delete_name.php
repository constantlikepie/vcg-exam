<?php
include_once "../config/database.php";
include_once '../objects/name.php';

$database = new Database();
$db = $database->getConnection();
$name = new Name($db);

if(isset($_POST)){
    $name->name = isset($_POST["name"]) ? $_POST["name"] : "";
    if($name->delete()){
        echo "Name removed.";
    }else{
        echo "Removing name failed";
    }
}