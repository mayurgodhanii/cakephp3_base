<?php

// src/Model/Table/ArticlesTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Auth\DefaultPasswordHasher;
use App\Model\Table\AppTable;

class UsersTable extends AppTable {

    public function initialize(array $config) {
        parent::initialize($config);
    }

    public function saveData($data) {

        $data['profile'] = $this->__uplaodfiles($data['profile'], "upload/", 1);
        if (empty($data['profile']))
            unset($data['profile']);

        $users = $this->newEntity();
        foreach ($data as $key => $value) {
            $users->{$key} = $value;
        }
        if ($this->save($users))
            return 1;
        else
            return 0;
    }

    public function checkPassword($passedPassword, $actualPassword) {
        if ((new DefaultPasswordHasher)->check($passedPassword, $actualPassword)) {
            return true;
        } else {
            return false;
        }
    }

    public function getEncryptedPassword($password) {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

}

?>