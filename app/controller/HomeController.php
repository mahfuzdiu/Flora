<?php
/**
 * Created by PhpStorm.
 * User: Mahfuz
 * Date: 1/1/2020
 * Time: 11:52 AM
 */

namespace app\controller;


class HomeController
{
    public function welcome()
    {
        echo 'welcome to flora';
    }

    public static function home()
    {
        echo 'im at home';
    }
}