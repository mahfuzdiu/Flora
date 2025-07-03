<?php

namespace app\controller;

use app\model\Buyer;

Class BuyerController extends Controller
{
    function getBuyers()
    {
        $buyer = new Buyer();
        $buyers = $buyer->get();
        $this->view('buyers', ['buyers' => $buyers]);
    }

    public function store()
    {
        $data = file_get_contents('php://input');
        $buyer = new Buyer();
        $buyer->insert($data);
        setcookie('buyer_submitted', true, time() + (86400 * 30), "/");
        echo json_encode([
            'status' => 200,
            'message' => 'Data inserted'
        ]);
    }
}
