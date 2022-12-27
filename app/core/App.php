<?php
// berisi logic routing
class App
{
    //property untuk menentukan controller, method dan parameter default
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        //Cek apakah ada sebuah file controller di folder controller
        //Contoh mengetikkan localhost/phpmvc/public/home/index/1/2
        //home adalah controller, index adalah method, 1 dan 2 adalah parameter
        //Karena url berupa array yang sudah dipecah, jadi index ke 0 adalah controller
        if ($url != NULL) {
            if (file_exists('../app/controllers/' . ucfirst($url[0]) . '.php') && $url != NULL) {
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
            }
        }

        require_once '../app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        //Cek apakah ada method
        if (isset($url[1])) {
            // Cek apakah url isi dash, kalau ada konversi ke underscore
            if (substr_count($url[1], '-') > 0) {
                $url[1] = str_replace('-', '_', $url[1]);
            }

            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //Cek parameter, jika udah di unset2 diatas masih ada array, berarti bisa jadi itu parameter
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        //Jalankan controller dan method, parameter jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
