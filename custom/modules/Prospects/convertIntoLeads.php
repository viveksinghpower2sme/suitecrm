<?php 
class convertIntoLeadsC {
    function convertIntoLeadsF($bean, $event, $args) {
        if (isset($bean->convert_prospect) && $bean->convert_prospect != $bean->fetched_row['convert_prospect'] && empty($bean->lead_id)) {
            $oLead = new Lead();
            foreach ($oLead->field_defs as $keyField => $aFieldName) {
                $oLead->$keyField = $bean->$keyField;
            }
            $oLead->id = '';
            $oLead->save(true);
            $bean->lead_id = $oLead->id;            
        }
        //var_dump($bean);die;
    }
}