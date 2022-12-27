<?php

//menjalankan session
if (!session_id()) session_start();        //kalo di dalam apps tidak ada session id, maka jalankan session nya
require '../vendor/autoload.php';

if (file_exists('../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv->load();
}
//memanggil file init.php di dalam folder app
require_once '../app/init.php';

$app = new App;


//teknik bootstraping
//file index memanggil file init
//di file init memanggil semua class yang dibutuhkan