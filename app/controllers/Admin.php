<?php

class Admin extends Controller
{
    private $barangModel;
    private $peminjamanModel;
    private $userModel;
    private $payload;

    function __construct()
    {
        if (SessionManager::checkSession()) {
            $this->payload = SessionManager::getCurrentSession();
            if ($this->payload->role != 1) {
                header('Location: ' . BASEURL . '/login');
            }
        } else {
            header('Location: ' . BASEURL . '/login');
        }

        $this->barangModel = $this->model('Barang_model');
        $this->departementModel = $this->model('Departement_model');
        $this->peminjamanModel = $this->model('Peminjaman_model');
        $this->userModel = $this->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['nama'] = $this->payload->nama;
        $data['jml_barang'] = $this->barangModel->countBarang();
        $data['jml_member'] = $this->userModel->countMember();
        $data['belum_kembali'] = $this->peminjamanModel->countBelumKembali();

        $this->view('admin/header', $data);
        $this->view('admin/index', $data);
        $this->view('admin/footer');
    }

    public function lihat_pinjaman($id = 0)
    {
        if ($id) {
            $data['title'] = 'Detail Pinjaman';
            $data['nama'] = $this->payload->nama;
            $data['daftar_pinjaman'] = $this->peminjamanModel->getDtPinjaman($id);
            $data['data_barang'] = $this->peminjamanModel->getDetPinjaman($id);
            $this->view('admin/header', $data);
            $this->view('admin/detail-pinjaman', $data);
            $this->view('admin/footer');
        } else {
            echo 'Harap menggunakan tombol yang ada untuk melihat detail barang';
        }
    }

     public function setuju($id = 0)
    {
        if ($id) {
            $this->userModel->setujuiPinjaman($id);
             Flasher::setFlash('Request berhasil disetujui', 'success');
             header('Location: ' . BASEURL . '/admin/approve-pinjaman');
        }
    }

    public function ditolak()
    {
        $insert = $this->userModel->tolakPinjaman($_POST);
        if ($insert>0) {
            Flasher::setFlash('Request berhasil ditolak', 'success');
            header('Location: ' . BASEURL . '/admin/approve-pinjaman');
            exit();
        }
    }

    public function pengembalian($id = 0)
    {
        if ($id) {
            $this->userModel->pengembalianPinjaman($id);
             Flasher::setFlash('Pengembalian berhasil', 'success');
             header('Location: ' . BASEURL . '/admin/daftar-pinjaman');
        }
    }

    public function daftar_barang()
    {
        $data['title'] = 'Barang';
        $data['nama'] = $this->payload->nama;
        $data['data_barang'] = $this->barangModel->getAllBarang();

        $this->view('admin/header', $data);
        $this->view('admin/daftar-barang', $data);
        $this->view('admin/footer');
    }

    public function tambah_barang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: ' . BASEURL . '/admin/daftar-barang');
        }

        $this->barangModel->tambahBarang($_POST);
        Flasher::setFlash('Barang berhasil ditambahkan', 'success');
        header('Location: ' . BASEURL . '/admin/daftar-barang');
    }

    public function detail_barang($id = 0)
    {
        if ($id) {
            $data['title'] = 'Barang';
            $data['nama'] = $this->payload->nama;
            $data['data_barang'] = $this->barangModel->getDetailBarang($id);
            $this->view('admin/header', $data);
            $this->view('admin/detail-barang', $data);
            $this->view('admin/footer');
        } else {
            echo 'Harap menggunakan tombol yang ada untuk melihat detail barang';
        }
    }

    public function ubah_barang($id = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->barangModel->ubahBarang($id, $_POST);
            Flasher::setFlash('Barang berhasil diubah', 'success');
            header('Location: ' . BASEURL . '/admin/daftar-barang');
        }

        if ($id) {
            $data['title'] = 'Barang';
            $data['nama'] = $this->payload->nama;
            $data['data_barang'] = $this->barangModel->getDetailBarang($id);

            $this->view('admin/header', $data);
            $this->view('admin/ubah-barang', $data);
            $this->view('admin/footer');
        } else {
            header('Location: ' . BASEURL . '/admin/daftar-barang');
        }
    }

    public function hapus_barang($id = 0)
    {
        if ($id) {
            $hapus = $this->barangModel->hapusBarang($id);
            if ($hapus == 0) {
                Flasher::setFlash('Barang tidak ditemukan', 'danger');
                header('Location: ' . BASEURL . '/admin/daftar-barang');
            } else {
                Flasher::setFlash('Barang berhasil dihapus', 'success');
                header('Location: ' . BASEURL . '/admin/daftar-barang');
            }
        } else {
            header('Location: ' . BASEURL . '/admin/daftar-barang');
        }
    }

    public function tambah_user()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: ' . BASEURL . '/admin/daftar-user');
        }

        $nama = htmlspecialchars($_POST['nama']);
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password1 = $_POST['password1'];
        if ($password == $password1) {
            $row = $this->userModel->getUserByUsername($username);
            if ($row) {
                // User ada 
                Flasher::setFlash('Maaf, username sudah digunakan.', 'danger');
                header('Location: ' . BASEURL . '/admin/daftar-user');
            } else {
                $insert = $this->userModel->insert($nama, $username, $password);
                if ($insert) {
                    Flasher::setFlash('Register berhasil, silahkan login.', 'success');
                    header('Location: ' . BASEURL . '/admin/daftar-user');
                } else {
                    Flasher::setFlash('Gagal register.', 'danger');
                    header('Location: ' . BASEURL . '/admin/daftar-user');
                }
            }
        } else {
            Flasher::setFlash('Password dan konfirmasi password salah.', 'danger');
            header('Location: ' . BASEURL . '/admin/daftar-user');
        }
    }

    public function daftar_user()
    {
        $data['title'] = 'User';
        $data['nama'] = $this->payload->nama;
        $data['users'] = $this->userModel->getAllUser();

        $this->view('admin/header', $data);
        $this->view('admin/daftar-user', $data);
        $this->view('admin/footer');
    }

    public function detail_user($id = 0)
    {
        if ($id) {
            $data['title'] = 'User';
            $data['nama'] = $this->payload->nama;
            $data['users'] = $this->userModel->getDetailUser($id);
            $this->view('admin/header', $data);
            $this->view('admin/detail-user', $data);
            $this->view('admin/footer');
        } else {
            echo 'Harap menggunakan tombol yang ada untuk melihat detail user';
        }
    }

    public function hapus_user($id = 0)
    {
        if ($id) {
            $hapus = $this->userModel->hapusUser($id);
            if ($hapus == 0) {
                Flasher::setFlash('User tidak ditemukan', 'danger');
                header('Location: ' . BASEURL . '/admin/daftar-user');
            } else {
                Flasher::setFlash('User berhasil dihapus', 'success');
                header('Location: ' . BASEURL . '/admin/daftar-user');
            }
        } else {
            header('Location: ' . BASEURL . '/admin/daftar-user');
        }
    }

    // public function input_peminjaman()
    // {
    //     $data['title'] = 'Input Peminjaman';
    //     $data['nama'] = $this->payload->nama;
    //     $data['data_barang'] = $this->barangModel->getAllBarang();
    //     $data['waktu'] = [
    //         [
    //             'waktu' => 3,
    //             'nama' => '3 Hari'
    //         ],
    //         [
    //             'waktu' => 7,
    //             'nama' => '7 Hari'
    //         ],
    //         [
    //             'waktu' => 14,
    //             'nama' => '14 Hari'
    //         ]
    //     ];

    //     $this->view('admin/header', $data);
    //     $this->view('admin/input-peminjaman', $data);
    //     $this->view('admin/footer');
    // }

    public function daftar_pinjaman()
    {
        $data['title'] = 'Daftar Pinjaman';
        $data['nama'] = $this->payload->nama;
        $data['pinjaman'] = $this->peminjamanModel->getAllPinjaman();

        $this->view('admin/header', $data);
        $this->view('admin/daftar-pinjaman', $data);
        $this->view('admin/footer');
    }

    public function approve_pinjaman()
    {
        $data['title'] = 'Apporval Peminjaman';
        $data['nama'] = $this->payload->nama;
        $data['pinjaman'] = $this->peminjamanModel->getApprovePinjaman();

        $this->view('admin/header', $data);
        $this->view('admin/approve-pinjaman', $data);
        $this->view('admin/footer');
    }

    public function departement()
    {
        $data['title'] = 'Departement';
        $data['nama'] = $this->payload->nama;
        $data['departement'] = $this->departementModel->getAllDepartement();
        $this->view('admin/header', $data);
        $this->view('admin/departement', $data);
        $this->view('admin/footer');
    }

    public function tambah_departement()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: ' . BASEURL . '/admin/departement');
        }

        $this->departementModel->tambahDepartement($_POST);
        Flasher::setFlash('Departement baru berhasil ditambah', 'success');
        header('Location: ' . BASEURL . '/admin/departement');
    }

    
    public function hapus_departement($id_departement)
    {
        if (!$id_departement) {
            header('Location: ' . BASEURL . '/admin/departement');
        }

        $hapus = $this->departementModel->hapusDepartement($id_departement);
        if ($hapus == 0) {
            Flasher::setFlash('Departement tidak ditemukan', 'danger');
            header('Location: ' . BASEURL . '/admin/departement');
        } else {
            Flasher::setFlash('Departement berhasil dihapus', 'success');
            header('Location: ' . BASEURL . '/admin/departement');
        }
    }
    
    public function update_departement($id_departement = 0)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->departementModel->updateDepartement($id_departement, $_POST);
            Flasher::setFlash('Departement berhasil diubah', 'success');
            header('Location: ' . BASEURL . '/admin/departement');
        }

        if ($id_departement) {
            $data['title'] = 'Departement';
            $data['nama'] = $this->payload->nama;
            $data['departement'] = $this->departementModel->getDepartementById($id_departement);

            $this->view('admin/header', $data);
            $this->view('admin/update-departement', $data);
            $this->view('admin/footer');
        } else {
            header('Location: ' . BASEURL . '/admin/departement');
        }
    }

    public function about()
    {
        $data['title'] = 'About';
        $data['nama'] = $this->payload->nama;

        $this->view('admin/header', $data);
        $this->view('about/index', $data);
        $this->view('admin/footer');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        setcookie('PPI-Login', '', time() - 3600 * 24 * 30, '/');
        header('Location: ' . BASEURL . '');
    }
}
