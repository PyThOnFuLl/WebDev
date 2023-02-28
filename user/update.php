<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");


include_once '../config/database.php';
include_once '../models/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new City($db);

parse_str(file_get_contents('php://input'), $_DELETE);

$data = json_decode(file_get_contents("php://input"));

$user->id = isset($_GET['id']) ? $_GET['id'] : die();
$user->username = $_GET['username'];
$user->name = $_GET['name'];
$user->city_id = $_GET['city_id'];
if($user->updateEmployee()){
    echo json_encode("Пользователь обновлён.");
} else{
    echo json_encode("Пользователь не обновлён.");
}
