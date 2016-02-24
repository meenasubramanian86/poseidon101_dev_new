<?php

namespace Vendor\Service;

use Vendor\Model\VendorInterface;

interface VendorServiceInterface
{
	/**
	*   Validates the Vendor credentials and returs the Vendor model if authentication
	*   is succefull. Otherwise, throws InvalidCredentialsException.
	*
	*   @param string $email_id Email of the super admin
	*   @param string $password Admin password (plain text)
	*   @return CorporateInterface
	*/
	 
    public function insertVendor($data);
    
    
    
 }
