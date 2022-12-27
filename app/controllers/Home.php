<?php

//inheritence dari class controller
class Home extends Controller {
    private $model;

    function __construct()
    {
        $this->model = $this->model('Barang_model');
    }

    public function index()
    {
        $data['nama_barang'] = 'Home';
        $data['data_barang'] = $this->model->getAllBarang();
        $data['page'] = 'home';
        
        //method view inhritence dari Controller
        $this->view('home/index', $data);        // method view  memanggil  folder views/home/ file index.php
    }
}
