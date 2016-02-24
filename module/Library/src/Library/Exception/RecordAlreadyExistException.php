<?php

namespace Library\Exception;

class RecordAlreadyExistException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 200, null);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
