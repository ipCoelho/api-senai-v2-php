<?php

class Connection {
    private $_hostname = 'localhost';
    private $_dbname = 'cadastro';
    private $_username = 'root';
    private $_password = 'bcd127';
    private $_connection;

    public function __construct() {
        try {
            $this->_connection = new PDO("mysql: host=$this->_hostname; dbname=$this->_dbname;", $this->_username, $this->_password); 

            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $error) {
            echo "Connection failed: " . $error->getMessage();
        }
    }

    public function connect() {
        return $this->_connection;
    }
}

?>