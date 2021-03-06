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

namespace App\Controller;

use App\Controller\AppController;
use Users\Model\Table\UsersTable;
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
class DashboardsController extends AppController {
    /* public $paginate = [
      'limit' => 2,
      'order' => [
      'Users.id' => 'desc'
      ]
      ]; */

    public function initialize() {
        parent::initialize();
        //$this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index() {
        $title_for_layout = 'Dashboard';
        $this->set('title_for_layout', $title_for_layout);
    }

}
