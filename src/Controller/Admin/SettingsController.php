<?php

/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace App\Controller\Admin;

use App\Controller\AppController;
use Settings\Model\Table\SettingsTable;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property UsersTable $Users
 */
class SettingsController extends AppController {

    public function initialize() {
        parent::initialize();
        //$this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index() {
        if ($this->request->isPut() || $this->request->isPost()) {
            $data = $this->request->data;
            foreach ($data as $key => $value) {
                $this->Settings->updateAll(['value' => $value], ['key' => $key]);
            }
            $this->Flash->success(__('Default settings has been updated successfully.'));
            $this->redirect(array('action' => 'index'));
        }

        $conditions = array();
        $conditions['key in'] = array("site_title", "site_name", "logo_name", "logo_name_mini", "copy_right_link", "copy_right");
        $settings = $this->Settings->find('all')->where($conditions)->toArray();
        $this->set('settings', $settings);
    }

    public function themeoptions() {

        if ($this->request->isPut() || $this->request->isPost()) {
            $data = $this->request->data;
            foreach ($data as $key => $value) {
                $this->Settings->updateAll(['value' => $value], ['key' => $key]);
            }
            $this->Flash->success(__('Theme options has been updated successfully.'));
            $this->redirect(array('action' => 'themeoptions'));
        }
        $this->Themes = TableRegistry::get('Themes');
        $themes = $this->Themes->find('list', array('keyField' => 'value', 'valueField' => 'name'))->toArray();
        $this->set('themes', $themes);

        $conditions = array();
        $conditions['key in'] = array("theme", "fixed");
        $settings = $this->Settings->find('list', array('keyField' => 'key', 'valueField' => 'value'))->where($conditions)->toArray();
        $this->set('settings', $settings);
    }

    public function logfile() {

        $filename = "accesslog.log";
        if (file_exists($filename)) {
            $logs = file_get_contents($filename, true);
        }
        $logs = explode('<br />', $logs);
        $logs = array_filter($logs);
        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
            if ($limit != "all") {
                $startlimit = -1 * $limit;
                $logs = array_slice($logs, $startlimit, $limit);
            }
        } else {
            $logs = array_slice($logs, -20, 20);
        }
        $logs = implode('<br />', $logs);
        $this->set('logs', $logs);
    }

}
