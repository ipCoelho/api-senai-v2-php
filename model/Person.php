<?php
    class Person {
        private $_connection;
        private $_codPessoa;
        private $_nome;
        private $_sobrenome;
        private $_email;
        private $_celular;
        private $_fotografia;

        public function __construct($connection) {
            $requestJson = file_get_contents("php://input");
            $arrayPerson = json_decode($requestJson, true);

            $this->codPessoa = $arrayPerson->cod_pessoa ?? null;
            $this->nome = $arrayPerson->nome ?? null;
            $this->sobrenome = $arrayPerson->sobrenome ?? null;
            $this->email = $arrayPerson->email ?? null;
            $this->celular = $arrayPerson->celular ?? null;
            $this->fotografia = $arrayPerson->fotografia ?? null;
            $this->_connection = $connection;
        }

        public function create() {
            $query = "INSERT INTO tbl_pessoa(nome, sobrenome, email, celular, fotografia) VALUES (?, ?, ?, ?, ?);";

            $statement = $this->_connection->prepare($query);

            $statement->bindValue(1, $this->_nome);
            $statement->bindValue(2, $this->_sobrenome);
            $statement->bindValue(3, $this->_email);
            $statement->bindValue(4, $this->_celular);
            $statement->bindValue(5, $this->_fotografia);

            if ($statement->execute()) {
                return "Status: 200 : Message: Sucess on creating a new Person.";
            } else {
                return "Status: 400 : Message: Error on creating a new Person.";
            }
        }

        public function findAll() {
            $query = "SELECT * FROM tbl_pessoa;";
            $statement = $this->_connection->prepare($query);
            $statement->execute();

            return $statement->fetchAll();
        }

        public function findById() {
            $query = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = ?;";
            $statement = $this->_connection->prepare($query);

            $statement->bindValue(1, $this->codPessoa);

            $statement->execute();

            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function update($id, $NAME = NULL, $LASTNAME = NULL, $EMAIL = NULL, $PHONE = NULL, $PHOTO = NULL) {
            $query = "UPDATE tbl_pessoa SET nome = '$NAME', sobrenome = '$LASTNAME', email = '$EMAIL', celular = '$PHONE', fotografia = '$PHOTO' WHERE cod_pessoa = $id;";
            $statement = $this->_connection->prepare($query);
            $statement->execute();

            return $statement->fetchAll();
        }

        public function deleteById($id) {
            $query = "DELETE * FROM tbl_pessoa WHERE cod_pessoa = $id;";
            $statement = $this->_connection->prepare($query);
            $statement->execute();

            return $statement->fetchAll();
        }
    }

?>