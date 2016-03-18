<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
//    public function beforeFilter(Event $event) {
//        parent::beforeFilter($event);
//            echo "asd";
//        exit;
//        if ($this->name == 'CakeError') {
//            echo "call";
//            exit;
//            $this->layout = 'error';
//        }
//    }   

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Mailer');
        $this->loadComponent('Mailcontent');
        $this->loadComponent('Accesslog');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'dashboards',
                'action' => 'index',
                'plugin' => false
            ],
            'logoutRedirect' => '/login'
        ]);
//        $this->set('theme_folder', '/htmllayout/base_theme');

        $settings = $this->__getSettings();

        $this->__checkAuthorized();

        $userAuth = $this->Auth->user();
        $this->set('userAuth', $userAuth);

        $this->layout = 'Htmllayout.base_theme';

        $this->__logSession();
    }

    function __updateLoginSession() {
        $LoginUserData = $this->Users->get($this->Auth->user('id'))->toArray();
        unset($LoginUserData['password']);
        $this->Auth->setUser($LoginUserData);
    }

    function __checkAuthorized() {
        $userAuth = $this->Auth->user();

        if (!empty($userAuth)) {
            $prefix = isset($this->request->params['prefix']) ? $this->request->params['prefix'] : "";
            $role_id = $userAuth['role_id'];
            if ($prefix == "admin" && $role_id != 1) {
                $this->Auth->logout();
                $this->Flash->error(__('Sorry, you are not valid User.'));
                $this->redirect('/login');
            } elseif ($prefix == "" && $role_id != 3) {
                $this->Auth->logout();
                $this->Flash->error(__('Sorry, you are not valid User.'));
                $this->redirect('/login');
            }
        }
    }

    function __getSettings() {
        $this->Settings = TableRegistry::get('Settings');
        $settingsTableData = $this->Settings->find('list', array('keyField' => 'key', 'valueField' => 'value'))->toArray();
        Configure::write('SITE_TITLE', $settingsTableData['site_title']);
        Configure::write('SITE_NAME', $settingsTableData['site_name']);
        Configure::write('LOGO_NAME', $settingsTableData['site_name']);
        Configure::write('LOGO_NAME_MINI', $settingsTableData['logo_name_mini']);
        Configure::write('COPY_RIGHT_LINK', $settingsTableData['copy_right_link']);
        Configure::write('COPY_RIGHT', $settingsTableData['copy_right']);
        $this->set('settingsTableData', $settingsTableData);
    }

    function __logSession() {
        $login_user_id=$this->Auth->user('id');
        $this->Accesslog->logdata($login_user_id);
    }

}
