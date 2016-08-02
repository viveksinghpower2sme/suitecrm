<?php
die('vivek');

$dependencies['AOS_Quotes']['customer_taxation_preference_c'] = array(
    'hooks' => array("edit"), // this is where you want it to fire
    'trigger' => 'true', // to fire when fields change
    'triggerFields' => array('customer_taxation_preference_c'), // field that will trigger this when changed
    'onload' => true, // fire when page is loaded
    'actions' => array( // actions we want to run, you can set multiple dependency action here
        array(
        'name' => 'SetRequired', // function to trigger
        'params' => array( // the params for the set required action
            'target' => 'form_type_c', // the field id
            'label' => 'form_type_c_label', // the field label id
            'value' => 'equal($customer_taxation_preference_c, "CST_Only")', // the SugarLogic for it to trigger if the field is required or not
            ),
        ),
    ),
);
?>
