<?php

namespace Library\Entity;

use Doctrine\ORM\Mapping as ORM;
use Library\Entity\Country;

/**
 * @ORM\Entity
 * @ORM\Table(name="states")
 */
class State extends BaseEntity {
   
    /**
     * @ORM\Column(name="name", type="string")
     * @var String
     */
    protected $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Library\Entity\Country")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * @var \Library\Entity\Country
     */
    protected $country;
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getCountry() {
        return $this->country;
    }
    
    public function setCountry(Country $country) {
        $this->country = $country;
    }
    
    public function __toString() {
        return __CLASS__ . ": [id: {$this->id}, name: {$this->name}]";
    }
}
