<?php

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

        $this->view('home/index', $data);
    }
}
