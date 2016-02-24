<?php

namespace Library\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Base class for all the Entities
 * This class maps id, active, created and modified columns 
 *
 * @author pandiaraj
 */
/**
 * @ORM\MappedSuperclass
 */
class BaseEntity {
    
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->modifiedAt = new \DateTime();
        $this->createdBy = 0;
        $this->modifiedBy = 0;
    }
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id", type="integer")
     * @var integer
     */
    protected $id;
    
    /**
     * @ORM\Column(name="is_active", type="boolean")
     * @var boolean
     */
    protected $active;
    
    /**
     * @ORM\Column(name="created_at", type="datetime")
     * @var datetime
     */
    protected $createdAt;
    
    /**
     * @ORM\Column(name="created_by", type="integer")
     * @var integer
     */
    protected $createdBy;

    /**
     * @ORM\Column(name="modified_at", type="datetime")
     * @var datetime
     */
    protected $modifiedAt;

    /**
     * @ORM\Column(name="modified_by", type="integer")
     * @var integer
     */
    protected $modifiedBy;
    
    public function getId() {
        return $this->id;
    }

    public function getActive() {
        return $this->active;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getCreatedBy() {
        return $this->createdBy;
    }

    public function getModifiedAt() {
        return $this->modifiedAt;
    }

    public function getModifiedBy() {
        return $this->modifiedBy;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    public function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;
    }

    public function setModifiedAt($modifiedAt) {
        $this->modifiedAt = $modifiedAt;
    }

    public function setModifiedBy($modifiedBy) {
        $this->modifiedBy = $modifiedBy;
    }
}
