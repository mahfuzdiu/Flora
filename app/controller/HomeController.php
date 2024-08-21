<?php
/**
 * Created by PhpStorm.
 * User: Mahfuz
 * Date: 1/1/2020
 * Time: 11:52 AM
 */

namespace app\controller;



class HomeController extends Controller
{
    public function welcome()
    {
        $buyerIp = $_SERVER['REMOTE_ADDR'];
        $this->view('home', [
            'ip' => $buyerIp
        ]);
    }

    public static function submitForm()
    {
        echo 'im submitForm';
    }
}