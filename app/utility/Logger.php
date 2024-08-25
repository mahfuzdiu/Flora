<?php


namespace app\utility;


class Logger
{
    public static function log($data)
    {
        file_put_contents(__DIR__ . './../../logs/' .date('d-m-y') . '_log.txt', json_encode($data), FILE_APPEND);
    }
}