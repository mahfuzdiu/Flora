<?php


namespace app\model;


use app\core\Model;
use app\utility\Logger;

class Buyer extends Model
{
    private $table = 'buyers';

    public function get()
    {
        $stmt = $this->con->prepare("select * from {$this->table}");
        $stmt->execute();
        //Logger::log($stmt->get_result()->fetch_all(MYSQLI_ASSOC));
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($data)
    {
        $data = json_decode($data);

        $stmt = $this->con->prepare("INSERT INTO {$this->table} (amount, buyer, receipt_id, items, buyer_email, buyer_ip, note, city, phone, hash_key, entry_at, entry_by) VALUES (?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssssssssi", $amount, $buyer, $receipt_id, $items, $buyer_email, $buyer_ip, $note, $city, $phone, $hash_key, $entry_at, $entry_by);

        $amount = $data->amount;
        $buyer = $data->buyer;
        $receipt_id = $data->receipt_id;
        $items = $data->items;
        $buyer_email = $data->buyer_email;
        $buyer_ip = $_SERVER['REMOTE_ADDR'];
        $note = $data->note;
        $city = $data->city;
        $phone = $data->phone;
        $hash_key = hash('sha512', $receipt_id . parent::SALT, false);
        $entry_at = date('Y-m-d');
        $entry_by = $data->entry_by;

        $stmt->execute();
    }
}