<?php

require_once('include/MVC/View/views/view.list.php');

class CustomViewList extends ViewList {

    function CustomViewList() {
        parent::ViewList();
    }

    function listViewPrepare() {
        parent::listViewPrepare();
        /* Change By Bc:- Custom Code For Field Level Access Controll. */
        global $current_user;
        require_once 'modules/acl_fields/acl_checkaccess.php';
        $moduleObj = loadBean($this->module);
        foreach ($this->lv->displayColumns as $field => $details) {
            $field = strtolower($field);
            $is_owner = $moduleObj->isOwner($current_user->id);
            $accessCode = hasAccess($field, $this->module, $current_user->id, $is_owner);
            if ($accessCode == '0') {
                unset($this->lv->displayColumns[strtoupper($field)]);
            }
        }
        /*  Change By Bc:- Custom Code For Field Level Access Controll. End */
    }

}

?>
