<?php

namespace Vendor\Model;
class Vendor implements VendorInterface
{
	
	//##	START :: Vendor	##
 
	protected $numberOfVendor;
        protected $vendorId;
        protected $emailId;
        protected $insertedVendorId;
        protected $insertedVendorCertificateId;
	
        public function getNumberOfVendor(){	return $this->numberOfVendor;	}
	public function setNumberOfVendor($numberOfVendor){$this->numberOfVendor = $numberOfVendor;}
	
        public function getVendorId(){	return $this->vendorId;	}
	public function setVendorId($vendorId){$this->vendorId = $vendorId;}

        public function getEmailId(){	return $this->emailId;	}
	public function setEmailId($emailId){$this->emailId = $emailId;}

        public function getInsertedVendorId(){	return $this->insertedVendorId;	}
	public function setInsertedVendorId($insertedVendorId){$this->insertedVendorId = $insertedVendorId;}
        
        public function getInsertedVendorCertificateId(){	return $this->insertedVendorCertificateId;	}
	public function setInsertedVendorCertificateId($insertedVendorCertificateId){$this->insertedVendorCertificateId = $insertedVendorCertificateId;}
	
        public function getInsertedAssociateId(){	return $this->insertedAssociateId;	}
	public function setInsertedAssociateId($insertedAssociateId){$this->insertedAssociateId = $insertedAssociateId;}
	
        public function getId(){	return $this->id;	}
	public function setId($id){$this->id = $id;}
        
        public function getName(){	return $this->name;	}
	public function setName($name){$this->name = $name;}
        
        public function getVendorType(){	return $this->vendorType;	}
	public function setVendorType($vendorType){$this->vendorType = $vendorType;}
        
        public function getContactPerson(){     return $this->contactPerson;	}
	public function setContactPerson($contactPerson){$this->contactPerson = $contactPerson;}
        
        public function getContactAddress(){     return $this->contactAddress;	}
	public function setContactAddress($contactAddress){$this->contactAddress = $contactAddress;}
        
        public function getMobile(){     return $this->mobile;	}
	public function setMobile($mobile){$this->mobile = $mobile;}
        
        public function getContractPeriodFrom(){     return $this->contractPeriodFrom;	}
	public function setContractPeriodFrom($contractPeriodFrom){$this->contractPeriodFrom = $contractPeriodFrom;}
 
        public function getContractPeriodTo(){     return $this->contractPeriodTo;	}
	public function setContractPeriodTo($contractPeriodTo){$this->contractPeriodTo = $contractPeriodTo;}
        
        public function getIsAssociate(){     return $this->isAssociate;	}
	public function setIsAssociate($isAssociate){$this->isAssociate = $isAssociate;}
        
        public function getIsActive(){     return $this->isActive;	}
	public function setIsActive($isActive){$this->isActive = $isActive;}
        
        public function getLogoPath(){     return $this->logoPath;	}
	public function setLogoPath($logoPath){$this->logoPath = $logoPath;}
        
        public function getCertificatePath(){     return $this->certificatePath;	}
	public function setCertificatePath($certificatePath){$this->certificatePath = $certificatePath;}
        
        public function getCertificateName(){     return $this->certificateName;	}
	public function setCertificateName($certificateName){$this->certificateName = $certificateName;}
        
        public function getExpiryDate(){     return $this->expiryDate;	}
	public function setExpiryDate($expiryDate){$this->expiryDate = $expiryDate;}
        
 
        
  }
