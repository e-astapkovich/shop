<?php

namespace app\models;

class User extends Model {
    public $id_user;
    public $name_user;
    public $password_hash;
    public $role;
    public $status;
    public $manager_id;

    protected function getTableName() {
        return 'users';
    }

}