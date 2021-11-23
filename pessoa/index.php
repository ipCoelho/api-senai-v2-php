<?php
    header("Access-Controll-Allow-Origin: *");
    header("Access-Controll-Allow-Headers: *");
    header("Access-Controll-Allow-Method: GET, POST, PUT, DELETE");
    header("Content-Type: application/json");

    include('../Connection.php');
    include('../model/Person.php');
    include('../controller/PersonController.php');

    $database = new Connection();
    $model = new Person($database->connect());
    $controller = new controllerPerson($model);

    $date = $controller->route();

    echo(json_encode(array(
        "status"=>"200",
        "content"=>$date
    )));
?>