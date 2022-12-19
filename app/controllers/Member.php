<?php

class Member extends Controller             //inheritence/pearisan dari class controller
{
//property
    private $peminjamanModel;
    private $barangModel;
    private $userModel;
    private $payload;

    function __construct()                                            //constructor
    {
        if (SessionManager::checkSession()) {
            $this->payload = SessionManager::getCurrentSession();
            if ($this->payload->role != 2) {
                header('Location: ' . BASEURL . '/login');
            }
        } else {
            header('Location: ' . BASEURL . '/login');
        }

        $this->peminjamanModel = $this->model('Peminjaman_model');
        $this->userModel = $this->model('User_model');
        $this->barangModel = $this->model('Barang_model');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['id_member'] = $this->payload->id;
        $data['nama'] = $this->payload->nama;
        $data['pinjaman'] = $this->peminjamanModel->getPinjamanMember($this->payload->id);
        $this->view('member/header', $data);
        $this->view('member/index', $data);
        $this->view('member/footer');
    }

    public function lihat_pinjaman($id = 0)
    {
        if ($id) {
            $data['title'] = 'Detail Pinjaman';
            $data['nama'] = $this->payload->nama;
            $data['daftar_pinjaman'] = $this->peminjamanModel->getDtPinjaman($id);
            $data['data_barang'] = $this->peminjamanModel->getDetPinjaman($id);
            $this->view('member/header', $data);
            $this->view('member/detail-pinjaman', $data);
            $this->view('member/footer');
        } else {
            echo 'Harap menggunakan tombol yang ada untuk melihat detail barang';
        }
    }

    public function request_barang()
    {
        $data['title'] = 'Barang';
        $data['nama'] = $this->payload->nama;
        $data['id_member'] = $this->payload->id;
        $data['data_barang'] = $this->barangModel->getAllBarang();
        $data['waktu'] = [
            [
                'waktu' => 3,
                'nama' => '3 Hari'
            ],
            [
                'waktu' => 7,
                'nama' => '7 Hari'
            ],
            [
                'waktu' => 14,
                'nama' => '14 Hari'
            ]
        ];

        $this->view('member/header', $data);
        $this->view('member/request-barang', $data);
        $this->view('member/footer');
    }

    public function detail_barang($id = 0)
    {
        if ($id) {
            $data['title'] = 'Barang';
            $data['nama'] = $this->payload->nama;
            $data['data_barang'] = $this->barangModel->getDetailBarang($id);
            $this->view('member/header', $data);
            $this->view('member/detail-barang', $data);
            $this->view('member/footer');
        } else {
            echo 'Harap menggunakan tombol yang ada untuk melihat detail barang';
        }
    }
    
    public function draft($id = 0)
    {
        if ($id) {
            $data['title'] = 'Barang';
            $data['nama'] = $this->payload->nama;
            $data['data_barang'] = $this->barangModel->getDetailBarang($id);
            $this->view('member/header', $data);
            $this->view('member/request-barang', $data);
            $this->view('member/footer');
        } else {
            echo 'Harap menggunakan tombol yang ada untuk melihat detail barang';
        }
    }

    public function ambil_barang()
    {
        echo json_encode($this->barangModel->getDetailBarang($_POST['id']));
    }

    public function daftar_pinjaman()
    {
        $data['title'] = 'Daftar Pinjaman';
        $data['nama'] = $this->payload->nama;
        $data['pinjaman'] = $this->peminjamanModel->getPinjamanMember($this->payload->id);

        $this->view('member/header', $data);
        $this->view('member/daftar-pinjaman', $data);
        $this->view('member/footer');
    }
    
    public function input_peminjaman()
    {
        $data['title'] = 'Input Peminjaman';
        $data['nama'] = $this->payload->nama;
        $data['barang'] = $this->peminjamanModel->getAllBarang();
        $data['member'] = $this->peminjamanModel->getAllUser();
        $data['waktu'] = [
            [
                'waktu' => 3,
                'nama' => '3 Hari'
            ],
            [
                'waktu' => 7,
                'nama' => '7 Hari'
            ],
            [
                'waktu' => 14,
                'nama' => '14 Hari'
            ]
        ];

        $this->view('member/header', $data);
        $this->view('member/input-peminjaman', $data);
        $this->view('member/footer');
    }
    
    public function input_data()
    {
        $data['title'] = 'Input Data';
        $data['nama'] = $this->payload->nama;
        $data['data_barang'] = $this->barangModel->getAllBarang();
        $data['waktu'] = [
            [
                'waktu' => 3,
                'nama' => '3 Hari'
            ],
            [
                'waktu' => 7,
                'nama' => '7 Hari'
            ],
            [
                'waktu' => 14,
                'nama' => '14 Hari'
            ]
        ];

        $this->view('member/header', $data);
        $this->view('member/input-data', $data);
        $this->view('member/footer');
    }


    public function kontak()
    {
        $data['title'] = 'Kontak';
        $data['nama'] = $this->payload->nama;

        $this->view('member/header', $data);
        $this->view('member/kontak');
        $this->view('member/footer');
    }

    public function about()
    {
        $data['title'] = 'About';
        $data['nama'] = $this->payload->nama;

        $this->view('member/header', $data);
        $this->view('about/index');
        $this->view('member/footer');
    }

    public function profil()
    {
        $data['title'] = 'Profil';
        $data['nama'] = $this->payload->nama;
        $data['id_member'] = $this->payload->id;
        $data['username'] = $this->payload->username;

        $this->view('member/header', $data);
        $this->view('member/profil', $data);
        $this->view('member/footer');
    }

    public function edit_profil()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: ' . BASEURL . '/member/profil');
        }

        $data = $this->userModel->updateUser($this->payload->id, $this->payload->username, $_POST);
        if ($data == 0) {
            Flasher::setFlash('Username sudah digunakan', 'danger');
            header('Location: ' . BASEURL . '/member/profil');
        } else {
            $new_payload = [
                'id' => $this->payload->id,
                'username' => $data['new_username'],
                'nama' => $data['new_nama'],
                'role' => $this->payload->role
            ];
            $new_jwt = SessionManager::makeJwt($new_payload);
            setcookie('PPI-Login', $new_jwt, time() + (60 * 60 * 24 * 30), '/', '', false, true);
            Flasher::setFlash('Profil berhasil diubah', 'success');
            header('Location: ' . BASEURL . '/member/profil');
        }
    }

    public function edit_password()
    {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $new_password_confirmation = $_POST['new_password_confirmation'];

        $data = $this->userModel->getUserByID($this->payload->id);

        //Cek apakah konfirmasi password sama
        if ($new_password != $new_password_confirmation) {
            Flasher::setFlash('Konfirmasi password tidak sama.', 'danger');
            header('Location: ' . BASEURL . '/member/profil');
        } else {
            if (!password_verify($current_password, $data['password'])) {
                Flasher::setFlash('Password lama salah.', 'danger');
                header('Location: ' . BASEURL . '/member/profil');
            } else {
                $this->userModel->updatePassword($this->payload->id, $new_password);
                Flasher::setFlash('Password berhasil diubah', 'success');
                header('Location: ' . BASEURL . '/member/profil');
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        setcookie('PPI-Login', '', time() - 3600 * 24 * 30, '/');
        header('Location: ' . BASEURL . '');
    }
}
