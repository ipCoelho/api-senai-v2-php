<?php
    class Person {
        private $_connection;

        public function __construct($connection) {
            $this->_connection = $connection;
        }

        public function create($NAME, $LASTNAME, $EMAIL, $PHONE, $PHOTO = NULL) {
            $query = "INSERT INTO tbl_pessoa(nome, sobrenome, email, celular, fotografia) VALUES ('$NAME', '$LASTNAME', '$EMAIL', '$PHONE', '$PHOTO');";
            $statement = $this->_connection->prepare($query);
            $statement->execute();

            return $statement->fetchAll();
        }

        public function findAll() {
            $query = "SELECT * FROM tbl_pessoa;";
            $statement = $this->_connection->prepare($query);
            $statement->execute();

            return $statement->fetchAll();
        }

        public function findById($id) {
            $query = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = $id;";
            $statement = $this->_connection->prepare($query);
            $statement->execute();

            return $statement->fetchAll();
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