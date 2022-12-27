<?php
// setiap class turunan nya harus mengimplementasikan property ataupun method pada abstract class.
//abstract class harus melakukan inheritance kepada class turunannya menggunakan extends. 


//class controller utama
abstract class Controller
{    
    abstract public function index();
    //method view
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';     //memanggil view di dalam folder views
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;                                 //instansiasi model
    }
}
