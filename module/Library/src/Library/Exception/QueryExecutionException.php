<?php

namespace Library\Exception;

class QueryExecutionException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message, null, null);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
