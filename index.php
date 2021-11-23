<?php
    include('./Connection.php');
    include('./model/Person.php');

    $connection = new Connection();
    $person = new Person($connection->connect());

    $arrayAll = $person->findAll();

    echo '<pre>';
    dump($arrayAll);
    echo '</pre>';
?>