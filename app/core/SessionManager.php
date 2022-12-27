<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;



//cara untuk menyimpan informasi (dalam variabel) untuk digunakan di beberapa halaman
//Tidak seperti cookie, informasi tidak disimpan di komputer pengguna.

class SessionManager
{
    private static string $SECRET_KEY = 'qwerty123321qwerty';

    public static function makeJwt(array $payload)
    {
        //generate jwt
        $jwt = JWT::encode($payload, SessionManager::$SECRET_KEY, 'HS256');   //menggunakan algoritma HS256(sign)
        return $jwt;
    }

    public static function checkSession()
    {
        if (isset($_COOKIE['PPI-Login'])) {
            return true;
        }

        return false;
    }

    //request kedua
    //validasi jwt apakah ada coocie atau tidak

    public static function getCurrentSession()
    {

        $jwt = $_COOKIE['PPI-Login'];
        // payload > Menyimpan nilai-nilai yang akan menjadi inti dari token
        $payload = JWT::decode($jwt, new Key(SessionManager::$SECRET_KEY, 'HS256'));
        return $payload;
    }
}


