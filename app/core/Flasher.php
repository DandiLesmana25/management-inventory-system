<?php

//menggunakan method static agar kita tidak perlu melakukan instansiasi pada class flasher
// karena Static methods  dapat dipanggil secara langsung - tanpa membuat instance kelas terlebih dahulu.


class Flasher
{


    public static function setFlash($pesan, $tipe)
    {
        //membuat flash message
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        //cek apakah ada session
        if (isset($_SESSION['flash'])) {
            $flash['pesan'] = $_SESSION['flash']['pesan'];
            $flash['tipe'] = $_SESSION['flash']['tipe'];
            unset($_SESSION['flash']);
            return $flash;
        }
    }

    public static function check()
    {
        if (isset($_SESSION['flash'])) {
            return true;
        }
    }
}


//flasher/ flash message digunakan ketika kita telah selesai mengerjakan suatu aksi di dalam crud(creat,read,input,delete) mvc kita
// untuk membuat flash message menggunakan $_session
