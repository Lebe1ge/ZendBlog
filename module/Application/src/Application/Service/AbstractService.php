<?php
/**
 * Created by PhpStorm.
 * User: Lebelge
 * Date: 01/02/2016
 * Time: 12:41
 */

namespace Application\Model\Entity;


abstract class AbstractService
{
    public function getArrayCopy(){
        return get_object_vars($this);
    }

    public function exchangeArray($options){
        $methods = get_class_methods($this);
        foreach($options as $key => $value) {
            $method = $this->getSetterMethod($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function getSetterMethod($propertyName){
        return "set" . str_replace(' ', '', ucwords(str_replace('_', '', $propertyName)));
    }
}