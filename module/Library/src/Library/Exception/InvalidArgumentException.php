<?php

namespace Library\Exception;

/**
 * This exception can be used anywhere if the argument passed for method, request param, etc
 * is invalid
 *
 * @author pandiaraj
 */
class InvalidArgumentException extends \Exception {
    
    /**
     * Each code uniquely identifies the error type and message contains the description
     * @param int $code
     * @param string $message
     */
    public function __construct($code, $message) {
        parent::__construct($message, $code, NULL);
    }
    
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: [{$this->message}]";
    }
}
