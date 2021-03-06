<?php

namespace Hcode;

class Model {
    /* Todos os valores dos campos objeto */

    private $values = [];

    public function __call($name, $args) {
        /* é um método GET ou SET */
        $method = substr($name, 0, 3);
        $fieldName = substr($name, 3, strlen($name));

        switch ($method) {
            case "get":
                return $this->values[$fieldName];
                break;
            case "set":
                $this->values[$fieldName] = $args;
                break;
        }
    }

    public function setData($data = array()) {

        foreach ($data as $key => $value) {

            $this->{"set" . $key}($value);
        }
    }

    public function getValues() {
        return $this->values;
    }

}

?>
