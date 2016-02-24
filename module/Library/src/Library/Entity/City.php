<?php

namespace Library\Entity;

use Doctrine\ORM\Mapping as ORM;
use Library\Entity\State;

/**
 * Represents cities table
 *
 * @author pandiaraj
 */
/**
 * @ORM\Entity
 * @ORM\Table(name="cities")
 */
class City extends BaseEntity {

    /**
     * @ORM\Column(name="name", type="string")
     * @var string
     */
    protected $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="Library\Entity\State")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     * @var \Library\Entity\State
     */
    protected $state;

    public function getName() {
        return $this->name;
    }

    public function getState() {
        return $this->state;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setState(State $state) {
        $this->state = $state;
    }
    
    public function __toString() {
        return __CLASS__ . "[id: {$this->id}, name: {$this->name}]";
    }
}
