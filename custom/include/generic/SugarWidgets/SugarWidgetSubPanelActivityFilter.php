<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
require_once('include/generic/SugarWidgets/SugarWidgetSubPanelTopButton.php');

class SugarWidgetSubPanelActivityFilter extends SugarWidgetSubPanelTopButton {

    function display(&$widget_data) {
        $subpanel_definition = $widget_data['subpanel_definition'];
        $subpanel_name = $subpanel_definition->get_name();
        $module_name = ($_REQUEST['module'] ? $_REQUEST['module'] : '');
        $searchLabel = 'Search By Subject';
        $defualt_sub_mod_list = implode(',',array_keys($subpanel_definition->_instance_properties['collection_list']));
        $act_optioArray = array('tasks', 'meetings', 'calls');
        $act_opt = '';
        foreach ($act_optioArray as $opt) {
            $opt_lbl = ucfirst($opt);
            $act_opt .= "<option value='{$opt}'>{$opt_lbl}</option>";
        }
        $button = <<<EOHTML
                <script type='text/javascript'>
                function ShowSubpanel{$subpanel_name}(){
                    var filter_module = document.getElementById('filter_module_act_dd').value;
                    var filter_module_forAll = '';
                    if(filter_module == 'All'){
                         filter_module_forAll = '{$defualt_sub_mod_list}';
                     }
                    var filter_module_text = document.getElementById('filter_param_{$subpanel_name}').value;
                    url = 'index.php?module={$module_name}&return_module={$_REQUEST['return_module']}&action={$_REQUEST['action']}&record={$_REQUEST['record']}&ajax_load=1&loadLanguageJS=1&to_pdf=true&action=SubPanelViewer&subpanel={$subpanel_name}&filter_module='+ filter_module +'&filter_module_text='+ filter_module_text +'&filter_module_forAll='+filter_module_forAll+'&layout_def_key={$_REQUEST['module']}';
                    showSubPanel('{$subpanel_name}',url,true);
                    document.getElementById('filter_module_act_dd').value = filter_module;
                    document.getElementById('filter_param_{$subpanel_name}').value = filter_module_text;
                }
                function clearFilter{$subpanel_name}(){
                    document.getElementById('filter_param_{$subpanel_name}').value = '';
                    ShowSubpanel{$subpanel_name}();
                }
            </script>
                   <select id='filter_module_act_dd' onchange="ShowSubpanel{$subpanel_name}();">
                        <option value='All'>All</option>
                        {$act_opt}
                      </select>
                    <input type='text' id='filter_param_{$subpanel_name}' name='filter_param_{$subpanel_name}' value = '{$_REQUEST['filter_module_text']}' onKeydown='Javascript: if (event.keyCode==13){ ShowSubpanel{$subpanel_name}();}' />
                        <input type='button' id='submitFilter' name='submitFilter' onclick="ShowSubpanel{$subpanel_name}();" value='{$searchLabel}' style='vertical-align: top;'>
                        <input type='button' id='clearFilter' name='clearFilter' onclick="clearFilter{$subpanel_name}();" value='Clear' style='vertical-align: top;'> 
                        &nbsp;
EOHTML;
        return $button;
    }

}

?>
