<?php
namespace Library\Exception;

class RecordNotFoundException extends \Exception
{
    public function __construct($code, $message)
    {
        parent::__construct($message, $code, null);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}]";
    }
}
