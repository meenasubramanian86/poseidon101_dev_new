<?php

namespace Library\Entity;

use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Entity
 * @ORM\Table(name="country")
 */
class Country extends BaseEntity {
    
    /**
     * @ORM\Column(name="name", type="string")
     * @var string
     */
    protected $name;
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function __toString() {
        return __CLASS__ . ": [id: {$this->id}, name: {$this->name}]";
    }
}
