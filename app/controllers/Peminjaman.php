<?php


//inheritence dari class controller
class Peminjaman extends Controller
{

    private $peminjamanModel;
    private $userModel;
    private $barangModel;

    function __construct()
    {
        if (SessionManager::checkSession()) {
            $payload = SessionManager::getCurrentSession();
            if ($payload->role != 1) {
                header('Location: ' . BASEURL . '/login');
            }
        } else {
            header('Location: ' . BASEURL . '/login');
        }
         // ketika class model dipanggil maka akan otomatis terinstansiasi dari class Database
        $this->peminjamanModel = $this->model('Peminjaman_model'); 
        $this->userModel = $this->model('User_model');
        $this->barangModel = $this->model('Barang_model');
    }

    public function index()
    {
        header('Location: ' . BASEURL . '/admin');
    }

    public function tambah()
    {
        $id_member = $_POST['idmember'];
        $id_barang = $_POST['data_barang'];

        $sudahPinjamBelumKembali = $this->peminjamanModel->pinjamBelumKembali($_POST);
        if ($sudahPinjamBelumKembali > 0) {
            echo ('x');
            die;
        }

        //Cek member
        $memberExist = $this->userModel->checkUserByID($id_member);
        if ($memberExist == 0) {
            echo json_encode('xmember');
            die;
        }

        $nama_barang = $this->barangModel->getDetailBarang($id_barang)['nama_barang'];
        $row_id = md5(serialize($id_barang));
        $data = [
            $row_id => [
                'id_barang' => $id_barang,
                'nama_barang' => $nama_barang,
                'row_id' => $row_id
            ]
        ];

        if (!isset($_SESSION['member_pinjam']) && !isset($_SESSION['pinjaman'])) {
            $_SESSION['member_pinjam'] = [
                'id_member' => $id_member,
                'lama_pinjam' => $_POST['waktu']
            ];
            $_SESSION['pinjaman'] = $data;
            echo json_encode($_SESSION['pinjaman']);
        } else {
            $exist = false;
            foreach ($_SESSION['pinjaman'] as $data_barang) {
                if ($data_barang['id_barang'] == $id_barang) {
                    $exist = true;
                    break;
                }
            }
            if ($exist != false) {
                echo json_encode('exist');
            } else {
                $_SESSION['pinjaman'] = array_merge_recursive($_SESSION['pinjaman'], $data);
                echo json_encode($_SESSION['pinjaman']);
            }
        }
        // var_dump($_SESSION['member_pinjam']);
        // var_dump($_SESSION['pinjaman']);
    }

    public function hapus($row_id)
    {
        // $newPinjaman = $_SESSION['pinjaman'];
        // unset($newPinjaman[$row_id]);
        unset($_SESSION['pinjaman'][$row_id]);
        // $_SESSION['pinjaman'] = $newPinjaman;

        if ($_SESSION['pinjaman'] == []) {
            unset($_SESSION['member_pinjam']);
            unset($_SESSION['pinjaman']);
            header('Location: ' . BASEURL . '/admin/input-peminjaman');
        }
        header('Location: ' . BASEURL . '/admin/input-peminjaman');
    }

    public function cekmember()
    {
        $adamember = $this->userModel->checkUserByID($_POST['idmember']);
        if ($adamember == 0) {
            echo json_encode('tidak ditemukan');
        } else {
            echo json_encode($this->userModel->getUserByID($_POST['idmember']));
        }
    }

    public function ceksesi()
    {
        if (!isset($_SESSION['pinjaman']) && !isset($_SESSION['member_pinjam'])) {
            echo json_encode('no_session');
        }
    }

    public function simpan()
    {
        if (!isset($_SESSION['pinjaman']) && !isset($_SESSION['member_pinjam'])) {
            echo json_encode('no_session');
            die;
        }

        //Ambil session
        $pinjaman = $_SESSION['pinjaman'];
        $id_member = $_SESSION['member_pinjam']['id_member'];
        $lama_pinjam = $_SESSION['member_pinjam']['lama_pinjam'];

        $this->peminjamanModel->simpanPinjaman($pinjaman, $id_member, $lama_pinjam);

        unset($_SESSION['pinjaman']);
        unset($_SESSION['member_pinjam']);
        echo json_encode('OK');
    }

    public function detail()
    {
        $id_pinjaman = $_POST['id'];

        $data_barang = $this->peminjamanModel->getPinjamanBarang($id_pinjaman);
        $pinjaman = $this->peminjamanModel->getDetailPinjaman($id_pinjaman);

        echo json_encode([$data_barang, $pinjaman]);
    }

    public function selesai()
    {
        $id_pinjaman = $_POST['id'];
        $waktu = $this->peminjamanModel->getWaktuPinjaman($id_pinjaman);
        $lama_pinjam = $waktu['lama_pinjam'];
        $tanggal_pinjam = $waktu['tanggal_pinjam'];
        $tanggal_kembali = date('Y-m-d');

        $datediff = strtotime($tanggal_kembali) - strtotime($tanggal_pinjam);
        $bedahari = abs(round($datediff / (60 * 60 * 24)));

        if ($bedahari > $lama_pinjam) {
            $denda = ($bedahari - $lama_pinjam) * 10000;
            $this->peminjamanModel->updatePinjaman($id_pinjaman, $tanggal_kembali, $denda);
            echo json_encode($denda);
        } else {
            $this->peminjamanModel->updatePinjaman($id_pinjaman, $tanggal_kembali, 0);
            echo json_encode('tidak denda');
        }
    }

    public function tambah_peminjaman()
    {
        $data['id_member'] = $_POST["id_member"];
        $data['lama_pinjam'] = $_POST["lama_pinjam"];

        $insert = $this->barangModel->tambahRequest($data);

        if ($insert > 0) {
            Flasher::setFlash('Request berhasil ditambahkan', 'success');
            header('Location: ' . BASEURL . '/member/request-barang');
            exit();
        }
    }
}
