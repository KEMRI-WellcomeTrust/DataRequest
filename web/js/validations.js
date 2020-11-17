
validate("beneficiary-disability","beneficiary-disability_type","field-beneficiary-disability_type","==",1);
validate("beneficiary-disability","beneficiary-disability_type_specify","field-beneficiary-disability_type_specify","==",1);

validate("beneficiary-disability_type","beneficiary-disability_type_specify","field-beneficiary-disability_type_specify","==",7);

// validate("beneficiary-type_csec","beneficiary-type_csec_specify","field-beneficiary-type_csec_specify","==",8);
// validate("beneficiary-cause_csec","beneficiary-cause_csec_specify","field-beneficiary-cause_csec_specify","==",11);

validate("beneficiary-rescued_csec","beneficiary-tracing_date","field-beneficiary-tracing_date","==",1);
validate("beneficiary-counseling","beneficiary-counseling_date","field-beneficiary-counseling_date","==",1);
validate("beneficiary-medical_care","beneficiary-medical_care_date","field-beneficiary-medical_care_date","==",1);
validate("beneficiary-legal_support","beneficiary-legal_support_date","field-beneficiary-legal_support_date","==",1);
validate("beneficiary-education_support","beneficiary-educational_support_date","field-beneficiary-educational_support_date","==",1);
validate("beneficiary-vocational_training","beneficiary-vocational_training_date","field-beneficiary-vocational_training_date","==",1);
validate("beneficiary-empl_voc_training","beneficiary-empl_voc_training_date","field-beneficiary-empl_voc_training_date","==",1);
validate("beneficiary-provided_income","beneficiary-provided_income_date","field-beneficiary-provided_income_date","==",1);
validate("beneficiary-family_counseling","beneficiary-familty_counseling_date","field-beneficiary-familty_counseling_date","==",1);
validate("beneficiary-family_training","beneficiary-family_training_date","field-beneficiary-family_training_date","==",1);
validate("beneficiary-family_income","beneficiary-family_income_date","field-beneficiary-family_income_date","==",1);

// validate("beneficiary-main_care_arrangement","beneficiary-main_care_specify","field-beneficiary-main_care_specify","==",9);

validate("beneficiary-main_support_provider","beneficiary-main_support_provider_specify","field-beneficiary-main_support_provider_specify","==",14);
validate("beneficiary-comm_contact_person_position","beneficiary-comm_contact_person_pos_specify","field-beneficiary-comm_contact_person_pos_specify","==",14);

validate("beneficiary-cause_failure","beneficiary-cause_failure_specify","field-beneficiary-cause_failure_specify","==",8);
validate("beneficiary-cause_success","beneficiary-cause_success_specify","field-beneficiary-cause_success_specify","==",6);
 
function validate(parent_var, dependent_var, dependent_div, operator, value){
    
    showHide(parent_var, dependent_var, dependent_div, operator, value)
    
    $("#"+parent_var).change( function(){
           showHide(parent_var, dependent_var, dependent_div, operator, value);
       })
       
}

function showHide(parent_var, dependent_var, dependent_div, operator, value){
    
    if(operator === "=="){
        
        if($("#"+parent_var).val() == value){

               $("."+dependent_div).show();

           }
           else{
               $("#"+dependent_var).val("");
               $("."+dependent_div).hide();
           }
   }
}