<?php

namespace Vendor\Mapper;

use Vendor\Model\VendorInterface;

interface VendorMapperInterface
{
	
	
    /**
    *   Returns VendorInterface if record found for the given emailId,
    *   else throws InvalidArgumentException
    *
    *   @return VendorInterface
    *   @throws VendorNotFoundException
    */
 
    public function checkVendorExits($vendorName);
    
    public function checkEmailExits($emailId);
	
    public function insertVendor($data);
 	
    
 }
