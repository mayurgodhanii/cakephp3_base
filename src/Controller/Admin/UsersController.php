<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Auth\DefaultPasswordHasher;

class UsersController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['logout']);
    }

    public function profile() {

        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->data;
            $data['id'] = $this->Auth->user('id');
            if ($this->Users->saveData($data)) {
                $this->__updateLoginSession();
                $this->Flash->error(__('Your profile has been updated successfully.'));
                $this->redirect(array('action' => 'profile'));
            } else {
                $this->Flash->error(__('An error occurred, Please try again later.'));
            }
        }
        $users = $this->Users->get($this->Auth->user('id'));
        $this->set('users', $users);
    }

    public function login() {
        $this->layout = 'Htmllayout.adminlte_login';
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function changepassword() {
        $users = $this->Users->get($this->Auth->user('id'));
        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->data;
            $checkpwd = $this->Users->checkPassword($data['old_password'], $users->password);
            if ($checkpwd) {
                $users->password = $this->Users->getEncryptedPassword($data['new_password']);
                if ($this->Users->save($users)) {
                    $this->Flash->error(__('Your password has been changed successfully.'));
                } else {
                    $this->Flash->error(__('An error occurred, Please try again later.'));
                }
            } else {
                $this->Flash->error(__('Please enter correct Old Password.'));
            }
        }
        $this->set('users', $users);
    }

    public function __getHashPassword($password) {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

}
