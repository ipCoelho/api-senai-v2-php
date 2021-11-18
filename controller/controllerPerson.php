<?php

class ControllerPerson {
    private $_method;
    private $_modelPerson;

    public function __construct($model) {
        $this->_modelPerson = $model;
        $this->_method = $_SERVER['REQUEST_METHOD'];
    }

    function router() {
        switch ($variable) {
            case 'value':
                # code...
                break;
            
            default:
                # code...
                break;
        }
    }
}

?>