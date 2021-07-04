<?php

namespace app\models;

final class User extends DBModel {
    public $id;
    public $name_user;
    public $password_hash;
    public $role;
    public $status;
    public $manager_id;

    public function __construct($name_user = null, $password_hash = null, $role = null, $status = null, $manager_id = null)
    {
        $this->name_user = $name_user;
        $this->password_hash = $password_hash;
        $this->role = $role;
        $this->status = $status;
        $this->manager_id = $manager_id;
    }

    protected static function getTableName() {
        return 'users';
    }

}