<?php

namespace app\controller;

use app\model\User;

Class UserController
{
    function getUsers()
    {
        User::get();
    }
}
