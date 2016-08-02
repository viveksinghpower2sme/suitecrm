<?PHP

require_once('modules/Administration/controller.php');

class CustomAdministrationController extends AdministrationController {

    public function action_filteronhistory_activity_subpanel() {
        global $current_user;
        if (!is_admin($current_user)) {
            sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']);
        }
        $this->view = 'filteronhistory_activity_subpanel';
        $GLOBALS['view'] = $this->view;
    }

    public function action_saveSettingsForEnableCustomFilter() {
        require_once 'custom/include/custom_file_cf.php';
        global $db;
        $modules = $_REQUEST['chkmodule'];
        $date = TimeDate::getInstance()->nowDb();
        $select_query = "SELECT module FROM custom_filte_on_history_activity_sub";
        $query = $db->query($select_query);
        $module_Subpanel = array('activities', 'history');
        while ($result = $db->fetchByAssoc($query)) {
            $module_Extfolder_path = 'custom/modules/' . $result['module'] . '/Ext/Layoutdefs/layoutdefs.ext.php';
            if (file_exists($module_Extfolder_path)) {
                chmod($module_Extfolder_path, 0777);
                 unlink($module_Extfolder_path);
            }
            foreach ($module_Subpanel as $sub) {
                $folder_path = 'custom/Extension/modules/' . $result['module'] . '/Ext/Layoutdefs/';
                chmod($folder_path, 0777);
                $exist_cfilterFile = '_override_custom' . $sub . '_FilterBtn.php';
                $exist_cfilterFile = $folder_path . $exist_cfilterFile;
                chmod($exist_cfilterFile, 0777);
                if (file_exists($exist_cfilterFile)) {
                         unlink($exist_cfilterFile);
                }
            }
        }
        $delete_query = "DELETE FROM custom_filte_on_history_activity_sub";
        $db->query($delete_query);
        foreach ($modules as $module) {
            $id = create_guid();
            $insert_query = "INSERT INTO custom_filte_on_history_activity_sub
                                        (id,
                                         module,
                                         date_created)
                            VALUES ('{$id}',
                                    '{$module}',
                                    '{$date}')";
            $db->query($insert_query);
            enableCustomExportInSubpanel($module, $module_Subpanel);
        }
        header("Location:index.php?module=Administration&action=filteronhistory_activity_subpanel&msg=success");
        exit;
    }

}

?>
