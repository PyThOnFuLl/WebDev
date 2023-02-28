<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");


include_once '../config/database.php';
include_once '../models/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);


parse_str(file_get_contents('php://input', TRUE), $_DELETE);

if (!empty($_DELETE['id'])) {
    $user->id = $_DELETE['id'];

    if($user->delete()){
        http_response_code(200);
        echo json_encode(array("message" => "Город удален."));

    }

    else{
        http_response_code(500);
        echo json_encode(array("message" => "Невозможно удалить город."));
    }

}
else{
    http_response_code(400);
    echo json_encode(array("message" => "Город не найден."));
}