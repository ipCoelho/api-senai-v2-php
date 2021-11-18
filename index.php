<?php
    include('./Connection.php');
    include('./model/Person.php');

    $database = new Connection();
    $person = new Person($database->connect());

    // $sqlObject = $person->findById(1);

    echo '<pre>',
    var_dump(
        $person->findAll(),
        $person->findbyId(10),
        $person->update(2, 'Joaquim', 'Teixeira'),
        $person->create('Jorge', 'Washington', 'jorge.washington', '940041001')
    ),
    '</pre>';
    
?>