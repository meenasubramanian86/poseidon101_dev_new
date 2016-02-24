<?php

namespace Library\Entity;

use Doctrine\ORM\Mapping as ORM;
use Library\Entity\City;

/**
 * Represents areas table
 *
 * @author pandiaraj
 */
/**
 * @ORM\Entity
 * @ORM\Table(name="areas")
 */
class Area extends BaseEntity {
    
    /**
     * @ORM\Column(name="name", type="string")
     * @var string
     */
    protected $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Library\Entity\City")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * @var \Library\Entity\City
     */
    protected $city;
    
    public function getName() {
        return $this->name;
    }

    public function getCity() {
        return $this->city;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCity(City $city) {
        $this->city = $city;
    }
    
    public function __toString() {
        return __CLASS__ . "[id: {$this->id}, name: {$this->name}]";
    }
}
