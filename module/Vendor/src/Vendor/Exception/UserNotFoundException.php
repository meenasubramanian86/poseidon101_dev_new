<?php

namespace Corporate\Exception;

class DepartmentNotFoundException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message, 100, null);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
