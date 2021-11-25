<?php

class ControllerPerson {
    private $_method;
    private $_modelPerson;
    private $_codPessoa;

    public function __construct($model) {
        $this->_modelPerson = $model;
        $this->_method = $_SERVER['REQUEST_METHOD'];

        $json = file_get_contents("php://input");
        $arrayPerson = json_decode($json, true);

        $this->_codPessoa = $arrayPerson->cod_pessoa ?? null;
    }

    function router() {
        switch ($this->_method) {
            
            case 'GET':
                if (isset($this->_codPessoa)) {
                    return $this->_codPessoa->findById();
                }
                return $this->_modelPerson->findAll();
            break;
            
            case 'POST':
                return $this->modelPerson->create();
            break;
            
            case 'PUT':
            break;

            case 'DELETE':
            break;

            default:
            break;
        }
    }
}

?>