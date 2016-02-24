<?php
$GLOBALS['MYSQLERRORRES'] = array('select'=>'Data Could not select from the table','insert'=>'Data Could not insert the table','update'=>'Data Could not update into the table','delete'=>'Data Could not not delete from the table','recordexist'=>'Already Exist');
const DOCTORPROFILEDB = array('DOCTORS'=>'doctors','EDUCATION'=>'doctor_educations','EXPERIENCE'=>'doctor_experiences',
    'REGISTRATIONS'=>'doctors_registrations','MEMBERSHIP'=>'doctor_membership');
const EMPLOYEEPROFILEDB = array('MEDICAL_CONDITION'=>'users_medical_conditions','USER_ALLERGIES'=>'users_allergies',
    'USER_MEDICATION'=>'users_medications','USER_MEDICAL_EVENTS'=>'user_medical_events');
define('DB_DATE_FORMAT',date('Y-m-d H:i:s'));
define('NULL_DATE_FORMAT','0000-00-00');
define('SUCCESSMSG','SUCCESS');
define('ERRORMSG','ERROR');
define('DEACTIVESTATUS',0);
define('ACTIVESTATUS',1);
define('SITE_DATE_FORMAT','Y-m-d');
define('APPOINTMENTREJECT',2);
define('AVILABLE','A');
define('NOTAVILABLE','NA');
define('APPOINTMENT_MORNING',"11:55");
define('APPOINTMENT_AFTERNOON',"15:55");
define('APPOINTMENT_EVENING',"19:55");
define('APPOINTMENT_PENDING',0);
define('APPOINTMENT_CANCEL',4);
const FACDAYS = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
return array(
	'settings' => array(
		'site' => array(
			'TITLE' => 'Corporate360',
			'DESCRIPTION' => 'Corporate360 description',
			'SITE_NAME' => 'corporate360.com',
			'ACTIVE_STATUS' => 1
			),
	),
	'DB_DATE_FORMAT' => 'Y-m-d',
        'SITE_DATE_FORMAT'=>'dS-F-Y',
	'ACTIVE_STATUS'=>1,
	'DEACTIVE_STATUS'=>0,
	'LOGIN' =>array('corporate_branch_id' => 1,'user_id'=>1),
	'ORGANIZATION_TYPE' =>array('HSP' =>'HSP','CORPORATE'=>'CORPORATE'),
	'RESPONSEMSG'=> array(
		'FORMVALIDFAILURE'=>array('status'=>'failure','errorCode'=>'501','errorMessage'=>'Should not be empty'),
		'EMAILEXIST'=>array('status'=>'failure','errorCode'=>'1001','errorMessage'=>'Email Id not exist'),
		'USERPARAMSEXIST'=>array('status'=>'failure','errorCode'=>'501','errorMessage'=>'Should not be empty'),
	),
	'USERPARAMS' =>array('ID'=>'ID','X-AUTH-TOKEN'=>'X-AUTH-TOKEN','ROLE'=>'ROLE'),
	'FORMS'=> array(
		'ADDEMPLOYEE'=>array('firstName'=>'First Name','lastName'=>'Last Name','emailId'=>'Email ID'),
		'USERMEDICALCONDITION'=>array('ID'=>'ID','condition_id'=>'Condition','drug_id'=>'Medicines','from_date'=>'Start Date'),
		'USERALLERGIES'=>array('allergy_id'=>'Allergy','symptom_id'=>'Symptoms','from_date'=>'Start Date'),
		'USERMEDICATION'=>array('drug_id'=>'Medicines','frequency_id'=>'Frequency','from_date'=>'Start Date'),
		'USERMEDICALEVENTS'=>array('medical_event_id'=>'Medical Event','medical_procedure_id'=>'Medical Procedure','medical_event_date'=>'Medical Event Date'),
                'DOCTOREDUCATIION'=>array('university_id'=>'University/College'),
                'DOCTOREXPERIENCE'=>array('job_role'=>'Job Role'),
                'DOCTOREGISTRATION'=>array('registration_no'=>'Registration Number'),
                'DOCTORMEMBERSHIP'=>array('membership_council'=>'Membership Council'),
                'ADDDOCTOR'=>array('first_name'=>'First Name','last_name'=>'Last Name','email_id'=>'Email ID'),
		
	),
	'NODATASYMB' => '--',
	);

