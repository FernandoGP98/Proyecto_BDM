<?php

namespace app\Models;

use \Model;

class User extends Model
{
    protected $table = "users";
    protected $primaryKey ="id_user";

    public $name;
    public $age;
    public $email;


}