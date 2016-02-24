<?php

namespace Library\Model;

/**
 * This is the model class for states table. DB mapper will create objects of 
 * this class and populate the states table data in it. Each object will
 * represent one row in the DB table
 *
 * @author pandiaraj
 */
class State {
    
    private $id;
    private $name;
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
}
