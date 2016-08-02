<?php

function setActivtyAndHistoryQueryBasedOnFilter($final_query, $final_query_rows) {
    if (is_null($_REQUEST['filter_module']) && is_null($_REQUEST['filter_module_forAll'])) {
        $history_module = array('tasks', 'meetings', 'calls', 'notes', 'emails');
        $activity_module = array('tasks', 'meetings', 'calls');
        $_REQUEST['filter_module'] = 'All';
        $_REQUEST['filter_module_forAll'] = ($_REQUEST['subpanel'] == 'history') ? $history_module : $activity_module;
    }
    $queryArray = array();
    $extractArray_final_query = explode('UNION ALL', $final_query);
    $extractArray_final_query_rows = explode('UNION ALL', $final_query_rows);
    $filter_module = $_REQUEST['filter_module'];
    $filter_module_forAll = $_REQUEST['filter_module_forAll'];
    $filter_module_text = $_REQUEST['filter_module_text'];
    if ($filter_module != 'All') {
        if ($filter_module != 'emails') {
            foreach ($extractArray_final_query as $key => $query_string) {
                if (strpos($query_string, $filter_module) !== false) {
                    $queryArray['final_query'][$key] = $extractArray_final_query[$key];
                    if ($filter_module_text != '') {
                        $queryArray['final_query'][$key] = str_replace(trim($filter_module . ".deleted=0 "), $filter_module . ".deleted=0 and " . $filter_module . ".name like " . "'%" . $filter_module_text . "%'", $queryArray['final_query'][$key]);
                    }
                }
            }

            foreach ($extractArray_final_query_rows as $key => $query_string) {
                if (strpos($query_string, $filter_module) !== false) {
                    $queryArray['final_query_rows'][$key] = $extractArray_final_query_rows[$key];
                    if ($filter_module_text != '') {
                        $queryArray['final_query_rows'][$key] = str_replace(trim($filter_module . ".deleted=0 "), $filter_module . ".deleted=0 and " . $filter_module . ".name like " . "'%" . $filter_module_text . "%'", $queryArray['final_query_rows'][$key]);
                    }
                }
            }
            $final_query_union = implode('UNION ALL', $queryArray['final_query']);
            $final_query_rows_union = implode('UNION ALL', $queryArray['final_query_rows']);
            $queryArray['final_query'] = $final_query_union;
            $queryArray['final_query_rows'] = $final_query_rows_union;
        } else {

            foreach ($extractArray_final_query as $key => $query_string) {
                if (strpos($query_string, $filter_module) !== false) {
                    $queryArray['final_query'][$key] = $extractArray_final_query[$key];
                    if ($filter_module_text != '') {
                        $queryArray['final_query'][$key] = str_replace(trim("emails.deleted=0"), " emails.deleted=0 and " . $filter_module . ".name like " . "'%" . $filter_module_text . "%'", $queryArray['final_query'][$key]);
                    }
                }
            }

            foreach ($extractArray_final_query_rows as $key => $query_string) {
                if (strpos($query_string, $filter_module) !== false) {
                    $queryArray['final_query_rows'][$key] = $extractArray_final_query_rows[$key];
                    if ($filter_module_text != '') {
                        $queryArray['final_query_rows'][$key] = str_replace(trim("emails.deleted=0"), "emails.deleted = 0 and  " . $filter_module . ".name like " . "'%" . $filter_module_text . "%'", $queryArray['final_query_rows'][$key]);
                    }
                }
            }
            $final_query_union = implode('UNION ALL', $queryArray['final_query']);
            $final_query_rows_union = implode('UNION ALL', $queryArray['final_query_rows']);
            $queryArray['final_query'] = $final_query_union;
            $queryArray['final_query_rows'] = $final_query_rows_union;
        }
    } else {
        $whereQueryForAllArray = explode(',', $filter_module_forAll);
        if ($filter_module_text != '') {
            foreach ($extractArray_final_query as $key => $query_string) {
                if (strpos($query_string, $whereQueryForAllArray[$key]) !== false) {
                    if ($whereQueryForAllArray[$key] == 'linkedemails') {
                        $filter_module = 'emails';
                    } else if ($whereQueryForAllArray[$key] == 'tasks_parent') {
                        $filter_module = 'tasks';
                    } else if ($whereQueryForAllArray[$key] == 'notes_parent') {
                        $filter_module = 'notes';
                    } else if ($whereQueryForAllArray[$key] == 'calls_parent') {
                        $filter_module = 'calls';
                    } else if ($whereQueryForAllArray[$key] == 'meetings_parent') {
                        $filter_module = 'meetings';
                    } else {
                        $filter_module = $whereQueryForAllArray[$key];
                    }
                $whereQueryForAllArray['final_query'][$key] = $extractArray_final_query[$key];
                    if ($filter_module_text != '') {
                        $whereQueryForAllArray['final_query'][$key] = str_replace(trim($filter_module . ".deleted=0 "), $filter_module . ".deleted=0 and " . $filter_module . ".name like " . "'%" . $filter_module_text . "%'", $whereQueryForAllArray['final_query'][$key]);
                }
            }
            }

            foreach ($extractArray_final_query_rows as $key => $query_string) {
                if (strpos($query_string, $whereQueryForAllArray[$key]) !== false) {

                    if ($whereQueryForAllArray[$key] == 'linkedemails') {
                        $filter_module = 'emails';
                    } else if ($whereQueryForAllArray[$key] == 'tasks_parent') {
                        $filter_module = 'tasks';
                    } else if ($whereQueryForAllArray[$key] == 'notes_parent') {
                        $filter_module = 'notes';
                    } else if ($whereQueryForAllArray[$key] == 'calls_parent') {
                        $filter_module = 'calls';
                    } else if ($whereQueryForAllArray[$key] == 'meetings_parent') {
                        $filter_module = 'meetings';
                    } else {
                        $filter_module = $whereQueryForAllArray[$key];
                    }
                    $whereQueryForAllArray['final_query_rows'][$key] = $extractArray_final_query_rows[$key];
                    if ($filter_module_text != '') {
                        $whereQueryForAllArray['final_query_rows'][$key] = str_replace(trim($filter_module . ".deleted=0 "), $filter_module . ".deleted=0 and " . $filter_module . ".name like " . "'%" . $filter_module_text . "%'", $whereQueryForAllArray['final_query_rows'][$key]);
                }
            }
            }
            $queryArray['final_query'] = implode('UNION ALL', $whereQueryForAllArray['final_query']);
            $queryArray['final_query_rows'] = implode('UNION ALL', $whereQueryForAllArray['final_query_rows']);
        } else {
            $queryArray['final_query'] = $final_query;
            $queryArray['final_query_rows'] = $final_query_rows;
        }
    }
    return $queryArray;
}

function enableCustomExportInSubpanel($module, $subpanels = array()) {
    require_once 'include/SubPanel/SubPanelTiles.php';
    $focus = BeanFactory::getBean($module);
    $subpanel = new SubPanelTiles($focus, $module);
    $Widgetbtn_activitySub = array(
        array('widget_class' => 'SubPanelActivityFilter')
    );
    $Widgetbtn_historySub = array(
        array('widget_class' => 'SubPanelHistoryFilter')
    );
    if (!file_exists('custom/Extension/modules/' . $module . '/Ext/Layoutdefs')) {
        mkdir('custom/Extension/modules/' . $module . '/Ext/Layoutdefs', 0777, true);
    }
    foreach ($subpanels as $subpanel_setup) {
        $supanel_Details = array();
        if (!is_null($subpanel->subpanel_definitions->layout_defs['subpanel_setup'][$subpanel_setup]['top_buttons'])) {
            $supanel_Details = $subpanel->subpanel_definitions->layout_defs['subpanel_setup'][$subpanel_setup]['top_buttons'];
        }
        if ($subpanel_setup == 'activities') {
            $activity_widgets_with_customFilterBtn = array_merge($supanel_Details, $Widgetbtn_activitySub);
            $supanel_Details = array();
            createExtensionFIleWithCustomFilter($module, $subpanel_setup, $activity_widgets_with_customFilterBtn);
        } else {
            $history_widgets_with_customFilterBtn = array_merge($supanel_Details, $Widgetbtn_historySub);
            $supanel_Details = array();
            createExtensionFIleWithCustomFilter($module, $subpanel_setup, $history_widgets_with_customFilterBtn);
        }
    }
}

function createExtensionFIleWithCustomFilter($module, $subpanel_setup, $customFilterBtnArray) {
    $the_name = 'layout_defs["' . $module . '"]["subpanel_setup"]["' . $subpanel_setup . '"]["top_buttons"]';
    $the_file = 'custom/Extension/modules/' . $module . '/Ext/Layoutdefs/_override_custom' . $subpanel_setup . '_FilterBtn.php';
    $the_array = $customFilterBtnArray;
    write_array_to_file($the_name, $the_array, $the_file, $mode = "w", $header = "");
    chmod($the_file, 0777);
    $flat_button_content = '$layout_defs["' . $module . '"]["subpanel_setup"]["' . $subpanel_setup . '"]["flat"] = true;';
    $existContent = file_get_contents($the_file);
    file_put_contents($the_file, $existContent . $flat_button_content);
}
