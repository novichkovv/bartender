<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 23.07.2015
 * Time: 12:28
 */
class settings_controller extends controller
{
    public function index()
    {
        $this->view('settings' . DS . 'settings');
    }

    public function index_ajax()
    {
        switch($_REQUEST['action']) {
            case "save_settings":
                $row = $_POST['settings'][array_keys($_POST['settings'])[0]];
                if($this->model('settings')->updateSettings($row)) {
                    echo json_encode(array('status' => 1));
                } else {
                    echo json_encode(array('status' => 2));
                }
                exit;
                break;
        }
    }
}