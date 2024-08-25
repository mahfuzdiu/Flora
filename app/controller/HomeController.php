<?php
/**
 * Created by PhpStorm.
 * User: Mahfuz
 * Date: 1/1/2020
 * Time: 11:52 AM
 */

namespace app\controller;

use app\model\Buyer;
use app\utility\Logger;

class HomeController extends Controller
{
    public function welcome()
    {
        $isBuyerSubmitted = isset($_COOKIE['buyer_submitted']);
        $this->view('home', ['isBuyerSubmitted' => $isBuyerSubmitted]);
    }
}