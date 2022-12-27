<?php

//inheritence dari class controller
class Login extends Controller
{

    private $userModel;

    function __construct()
    {
        if (SessionManager::checkSession()) {
            $payload = SessionManager::getCurrentSession();
            if ($payload->role == 1) {
                header('Location: ' . BASEURL . '/admin');
            } else {
                header('Location: ' . BASEURL . '/member');
            }
        }

        $this->userModel = $this->model('User_model');
    }

    public function index()
    {
        $data['judul'] = 'Login';
        $this->view('auth/header', $data);
        $this->view('auth/login', $data);
        $this->view('auth/footer');
    }

    public function auth()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: ' . BASEURL . '');
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $dbUser = $this->userModel->getUserByUsername($username);

        if (!$dbUser) {
            Flasher::setFlash('Username atau password salah.', 'danger');
            header('Location: ' . BASEURL . '');
        }

        if (password_verify($password, $dbUser['password'])) {
            $payload = [
                'id' => $dbUser['id'],
                'username' => $username,
                'nama' => $dbUser['nama'],
                'role' => $dbUser['role']
            ];
            $jwt = SessionManager::makeJwt($payload);
            setcookie('PPI-Login', $jwt, time() + (60 * 60 * 24 * 30), '/', '', false, true);

            if ($dbUser['role'] == 1) {
                header('Location: ' . BASEURL . '/admin');
            } else {
                header('Location: ' . BASEURL . '/member');
            }
        } else {
            Flasher::setFlash('Username atau password salah.', 'danger');
            header('Location: ' . BASEURL . '');
        }
    }

    public function cs()
    {
        $data['title'] = 'Cs';
        // $data['nama'] = $this->payload->nama;

        $this->view('auth/header', $data);
        $this->view('auth/cs');
        $this->view('auth/footer');
    }

}
