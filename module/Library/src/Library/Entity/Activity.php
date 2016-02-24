<?php

namespace Library\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entity represents activities table
 *
 * @author pandiaraj
 */
/**
 * @ORM\Entity
 * @ORM\Table(name="activities")
 */
class Activity extends BaseEntity {
    
    /**
     * @ORM\Column(name="user_id", type="integer")
     * @var integer
     */
    protected $user;

    /**
     * @ORM\Column(name="type", type="integer")
     * @var integer
     */
    protected $type;

    /**
     * @ORM\Column(name="source_user_id", type="integer")
     * @var integer
     */
    protected $sourceUserId;

    /**
     * @ORM\Column(name="from_user_type", type="string")
     * @var string
     */
    protected $fromUserType;

    /**
     * @ORM\Column(name="to_user_type", type="string")
     * @var string
     */
    protected $toUserType;

    /**
     * @ORM\Column(name="parent_id", type="integer")
     * @var integer
     */
    protected $parentId;

    /**
     * @ORM\Column(name="is_read", type="boolean")
     * @var integer
     */
    protected $read;

    /**
     * @ORM\Column(name="message", type="string")
     * @var string
     */
    protected $message;
    
    public function getUser() {
        return $this->user;
    }

    public function getType() {
        return $this->type;
    }

    public function getSourceUserId() {
        return $this->sourceUserId;
    }

    public function getFromUserType() {
        return $this->fromUserType;
    }

    public function getToUserType() {
        return $this->toUserType;
    }

    public function getParentId() {
        return $this->parentId;
    }

    public function getRead() {
        return $this->read;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setSourceUserId($sourceUserId) {
        $this->sourceUserId = $sourceUserId;
    }

    public function setFromUserType($fromUserType) {
        $this->fromUserType = $fromUserType;
    }

    public function setToUserType($toUserType) {
        $this->toUserType = $toUserType;
    }

    public function setParentId($parentId) {
        $this->parentId = $parentId;
    }

    public function setRead($read) {
        $this->read = $read;
    }

    public function setMessage($message) {
        $this->message = $message;
    }
}
