<?php

use app\config\Database;

//initiating database
new Database();

//initiating router

if(isset($_GET['url']))
{
    var_dump($_GET['url']);
}
