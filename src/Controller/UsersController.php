<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;

class UsersController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['forgotpassword', 'logout', 'forgot_checkmail']);
    }

    function forgot_checkmail() {
        $this->layout = false;
        $email = isset($_GET['username']) ? $_GET['username'] : "";
        if (!empty($email)) {
            $query = $this->Users->find('all', [
                'conditions' => ['username' => $email]
            ]);
            $row = $query->first();
            if (empty($row)) {
                echo "false";
            } else {
                echo "true";
            }
        } else {
            echo "false";
        }
        exit;
    }

    public function login() {
        $this->layout = 'Htmllayout.adminlte_login';

        $LOGIN_REDIRECT = Configure::read('LOGIN_REDIRECT');

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $role_id = $user['role_id'];
                if (isset($LOGIN_REDIRECT[$role_id])) {
                    return $this->redirect($LOGIN_REDIRECT[$role_id]);
                }
                return $this->redirect(array('prefix' => false, 'action' => 'index', 'controller' => 'dashboards'));
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function forgotpassword() {
        $this->layout = 'Htmllayout.adminlte_login';
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (!empty($data)) {
                $email = $this->request->data['username'];

                $query = $this->Users->find('all', [
                    'conditions' => ['username' => $email]
                ]);
                $row = $query->first();
                if (!empty($row)) {
                    $random_password = rand('111111111', '999999999');
                    $row->password = $this->Users->getEncryptedPassword($random_password);
                    if ($this->Users->save($row)) {
                        $mailer_to = $email;
                        $mailer_subject = "Password Reset : " . Configure::read('SITE_TEAM');

                        $data = array();
                        $data['to'] = $mailer_to;
                        $data['subject'] = $mailer_subject;
                        $data['random_password'] = $random_password;

                        $this->Mailcontent->forgotPasswordMail($data);
                        
                        $this->Flash->set('A new password has been sent to your e-mail address.', [
                            'element' => 'success'
                        ]);
                        
                        $this->redirect('/login');
                    } else {
                        $this->Flash->error(__('Error occured Please try again after sometime.'));
                    }
                } else {
                    $this->Flash->error(__('Invalid username, try again!'));
                }
            } else {
                $this->Flash->error(__('Invalid username, try again!'));
            }
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
                    $this->Flash->success(__('Your password has been changed successfully.'));
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
