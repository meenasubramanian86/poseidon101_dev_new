<?php

namespace Library\Util;

/**
 * This class contains all the error codes across modules
 *
 * @author pandiaraj
 */
class ErrorCodeConstants {

    const INVALID_COUNTRY_ID = 1001;
    const NO_STATES_FOUND_FOR_COUNTRY = 1002;
    const NO_STATES_FOUND = 1003;
    const INVALID_STATE_ID = 1004;
    const NO_STATE_FOUND_FOR_ID = 1005;
    const NO_CITIES_FOUND_FOR_STATE = 1006;
    const NO_CITIES_FOUND = 1007;
    const INVALID_CITY_ID = 1008;
    const NO_CITIES_FOUND_FOR_ID = 1009;
    const NO_AREAS_FOUND_FOR_CITY = 1010;
    const NO_AREAS_FOUND = 1011;
    const INVALID_AREA_ID = 1012;
    const NO_AREA_FOUND_FOR_ID = 1013;
    const USER_ID_EMPTY = 1014;
    const NO_ACTIVITY_FOR_USER = 1015;

    /**
     * Organization Module
     */
    const ORGANIZATION = [
        'NO_ORGANIZATION_FOUND_FOR_ID'  => 2001,
        'ORGANIZATION_COULD_NOT_INSERTED'  => 2002,
        'ORGANIZATION_COULD_NOT_UPDATED' => 2003,
        'ORGANIZATION_COULD_NOT_DELETED' => 2004,
        
        'INVALID_ORGANIZATION_ID' => 2006,
        'INVALID_ORGANIZATION_NAME' => 2007,
    ];
    
    /**
     * Department Module
     */
    const DEPARTMENT = [
        'NO_DEPARTMENT_FOUND_FOR_ID'  => 2001,
        'DEPARTMENT_COULD_NOT_INSERTED'  => 2002,
        'DEPARTMENT_COULD_NOT_UPDATED' => 2003,
        'DEPARTMENT_COULD_NOT_DELETED' => 2004,
        
        'INVALID_DEPARTMENT_ID' => 2006,
        'INVALID_DEPARTMENT_NAME' => 2007,
    ];
    
    /**
     * Designation Module
     */
    const DESIGNATION = [
        'NO_DESIGNATION_FOUND_FOR_ID'  => 2001,
        'DESIGNATION_COULD_NOT_INSERTED'  => 2002,
        'DESIGNATION_COULD_NOT_UPDATED' => 2003,
        'DESIGNATION_COULD_NOT_DELETED' => 2004,
        
        'INVALID_DESIGNATION_ID' => 2006,
        'INVALID_DESIGNATION_NAME' => 2007,
    ];
    
    /**
     * Survey Module
     */
    const SURVEY = [
        'NO_SURVEY_FOUND_FOR_ID'  => 8001,
        'SURVEY_AND_QUESTIONS_COULD_NOT_INSERTED'  => 8002,
        'SURVEY_COULD_NOT_UPDATED' => 8003,
        'QUESTION_COULD_NOT_UPDATED' => 8004,
        'SURVEY_COULD_NOT_DELETED' => 8005,
        'INVALID_SURVEY_ID' => 8006,
        'INVALID_SURVEY_TITLE' => 8007,
        'INVALID_QUESTION_ID' => 8008,
        'INVALID_SURVEY_QUESTION' => 8007,
        
        'INVALID_SURVEY_IN_INSERTION' => 8007,
        'INVALID_QUESTION_IN_INSERTION' => 8007,
        'INVALID_RATING' => 8007,
        'NO_RATINGS_FOUND_FOR_QUESTION_ID' => 8007,
    ];
    
    // Organization Module
    const NO_BRANCHES_FOUND_FOR_USER = 5001;
    const INVALID_ORG_ID = 5002;
    const INVALID_USER_ID = 5003;
    
    //Employee Appointment
     const employeeAppointment =[
         'NO_CORPORATE_BRANCH_FOUND'=>9000,
         'NO_DOCTOR_FOUND'=>9001,
         'NO_LOCATION_FOUND'=>9002,
         'NO_CORPORATE_FOUND'=>9003,
         'NO_SPECIALIZATION_FOUND'=>9004,
         'NO_APPOINTMENT_DATE_FOUND'=>9005,
         'NO_APPOINTMENT_TIME_FOUND'=>9006,
         'NO_ORGANIZATION_FOUND'    =>9007,
         'NO_SEARCH_FILTER_FOUND'   =>9008,
         'NO_PATIENT_FOUND'         =>9009,
         'NO_USER_FOUND'            =>9010,
         'DOCTOR_NOT_AVAILABLE'     =>9011,
         'APPOINTMENT_CATEGORY_FOUND' =>9012,
         'NO_APPOINTMENT_ID_FOUND'  =>9013,
         'NO_APPOINTMENT_FOUND'     =>9014,
         'APPOINTMENT_COULD_NOT_INSERTED'     =>9015,
         'RESCHEDULE_COULD_NOT_INSERTED'=>9016,
         'APPOINTMENT_CANCELATION_NOT_DONE'=>9017,
         'APPOINTMENT_DATA_EXIST'=>9018
         ];
     
     //Doctor Profile
     const doctorProfile =[
         'NO_FACILITY_FOUND'=>9100,
         'NO_HOLIDAY_FOUND'=>9101,
         'NO_STARTTIME_FOUND'=>9102,
         'NO_ENDTIME_FOUND'=>9103,
         'NO_APPOINTMENT_SLOT_FOUND'=>9104,
         'NO_APPOINTMENT_START_DATE_FOUND'=>9105,
         'DOCTOR_SCHEDULE_COULD_NOT_INSERTED'=>9106,
         'NO_TIME_PERSLOT_FOUND' =>9107,
         'NO_START_DATE_FOUND' =>9108,
         'NO_SCHEDULE_ID_FOUND' =>9109,
         'DOCTOR_SCHEDULE_COULD_NOT_UPDATED'=>9110,
         'DOCTOR_SCHEDULE_COULD_NOT_DELETED'=>9111
         ];
    //doctor Appointment
     const doctorAppointment =[
         'NO_DOCTOR_FOUND'=>9201,
         'NO_APPOINTMENT_ID_FOUND'=>9202,
         'NO_ORGANIZATION_FOUND'    =>9203,
         'NO_APPOINTMENT_STATUS_FOUND' =>9204,
         'APPOINTMENT_STATUS_COULD_NOT_UPDATED' =>9205,
         'NO_PATIENT_NAME_FOUND'   =>9206,
         'NO_CONDITION_ID_FOUND'   =>9207,
         'APPOINTMENT_CONDITION_COULD_NOT_INSERTED' =>9208,
         'NO_OBESERVATION_FOUND'=>9209,
         'NO_TREATMENT_FOUND'  =>9210,
         'NO_COST_FOUND'  =>9211,
         'NO_DISCOUNT_FOUND'  =>9210,
         'APPOINTMENT_OBSERVATION_COULD_NOT_INSERTED'=>9211,
         'APPOINTMENT_PROCEDURE_COULD_NOT_INSERTED'=>9212,
         'APPOINTMENT_PRESCRIPTION_COULD_NOT_INSERTED'=>9213,
         'NO_PHARMACY_FOUND'=>9214,
         'NO_DRUG_FOUND'=>9215,
         'NO_DRUG_DURATION_FOUND'=>9216,
         'NO_DRUG_DOSAGE_FOUND'=>9217,
         'APPOINTMENT_PRESCRIPTION_COULD_NOT_INSERTED'=>9218
         ];
}
