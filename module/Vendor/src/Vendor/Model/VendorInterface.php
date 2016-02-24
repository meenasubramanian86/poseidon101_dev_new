<?php

namespace Vendor\Model;

interface VendorInterface
{
	
	public function getNumberOfVendor();
	public function setNumberOfVendor($numberOfVendor);
	 
	public function getVendorId();
	public function setVendorId($vendorId);
	 
 	public function getEmailId();
	public function setEmailId($emailId);
	 
 	public function getInsertedVendorId();
	public function setInsertedVendorId($insertedVendorId);
	 
  	public function getInsertedVendorCertificateId();
	public function setInsertedVendorCertificateId($insertedVendorCertificateId);
	
        public function getInsertedAssociateId();
	public function setInsertedAssociateId($insertedAssociateId);
        
        public function getId();
	public function setId($id);
        
        public function getName();
	public function setName($name);
	 
        public function getVendorType();
	public function setVendorType($vendorType);
	 
        public function getContactPerson();
	public function setContactPerson($contactPerson);
	 
        public function getContactAddress();
	public function setContactAddress($contactAddress);
	 
        public function getMobile();
	public function setMobile($mobile);
	 
        public function getContractPeriodFrom();
	public function setContractPeriodFrom($contractPeriodFrom);
	
        public function getContractPeriodTo();
	public function setContractPeriodTo($contractPeriodTo);
	 
        public function getIsAssociate();
	public function setIsAssociate($isAssociate);
	 
        public function getIsActive();
	public function setIsActive($isActive);
	 
        public function getLogoPath();
	public function setLogoPath($logoPath);
	 
        public function getCertificateName();
	public function setCertificateName($certificateName);
	 
        public function getCertificatePath();
	public function setCertificatePath($certificatePath);
	 
        public function getExpiryDate();
	public function setExpiryDate($expiryDate);
	 
 	
  }
