<?php

class Barang_model
{
    //vaariabel untuk menampung class database
    private $db;

    public function __construct()
    {   
        //ketika construct dipanggil akan konek ke class Database
        $this->db = new Database;
    }

    public function getAllBarang()
    {
        $this->db->query("SELECT * FROM data_barang");
        return $this->db->resultSet();
    }

    public function getBarang($idpinjam)
    {
        $this->db->query("SELECT * FROM detail_pinjaman INNER JOIN data_barang ON data_barang.id=detail_pinjaman.id_barang WHERE id_pinjaman = '$idpinjam'");
        return $this->db->resultSet();
    }

    public function getDetailBarang($id)
    {
        $this->db->query("SELECT * FROM data_barang WHERE id = '$id'");
        return $this->db->single();
    }

    public function countBarang()
    {
        $this->db->query("SELECT COUNT(*) FROM data_barang");
        return $this->db->numRows();
    }


    public function countBaranguser()
    {
        $this->db->query("SELECT COUNT(*) FROM data_barang");
        return $this->db->numRows();
    }

    public function tambahBarang($data)
    {
        $kode_barang = htmlspecialchars($data['kode_barang']);
        $nama_barang = htmlspecialchars($data['nama_barang']);
        $tipe_barang = htmlspecialchars($data['tipe_barang']);
        $jmlh_stok = htmlspecialchars($data['jmlh_stok']);
        $lokasi = htmlspecialchars($data['lokasi']);
        $tgl_regist = date('Y-m-d');

        $query = "INSERT INTO data_barang VALUES
        (null, :kode_barang, :nama_barang, :tipe_barang, :jmlh_stok, :lokasi, :tgl_regist)";

        $this->db->query($query);
        $fields = [
            'kode_barang' => $kode_barang,
            'nama_barang' =>  $nama_barang,
            'tipe_barang' => $tipe_barang,
            'jmlh_stok' =>  $jmlh_stok,
            'lokasi' => $lokasi,
            'tgl_regist' => $tgl_regist
        ];
        $this->db->binds($fields);

        try {
            $this->db->execute();
        } catch (\PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                return 0;
                die;
            }
        }

        return $this->db->rowCount();
    }

    public function ubahBarang($id, $data)
    {
        $kode_barang = htmlspecialchars($data['kode_barang']);
        $nama_barang = htmlspecialchars($data['nama_barang']);
        $tipe_barang = htmlspecialchars($data['tipe_barang']);
        $jmlh_stok = htmlspecialchars($data['jmlh_stok']);
        $lokasi = htmlspecialchars($data['lokasi']);
        $tgl_regist = date('Y-m-d');

        $sql = "UPDATE data_barang SET
                kode_barang = :kode_barang,
                nama_barang = :nama_barang,
                tipe_barang = :tipe_barang,
                jmlh_stok = :jmlh_stok,
                lokasi = :lokasi,
                tgl_regist = :tgl_regist
                WHERE id = :id";

        $this->db->query($sql);
        $fields = [
            'kode_barang' => $kode_barang,
            'nama_barang' =>  $nama_barang,
            'tipe_barang' => $tipe_barang,
            'jmlh_stok' =>  $jmlh_stok,
            'lokasi' => $lokasi,
            'tgl_regist' => $tgl_regist,
            'id' => $id
        ];
        $this->db->binds($fields);

        try {
            $this->db->execute();
        } catch (\PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                return 0;
                die;
            }
        }

        return $this->db->rowCount();
    }

    public function hapusBarang($id)
    {
        //Cek apakah id barang ada dalam database
        $this->db->query("SELECT id FROM data_barang WHERE id = '$id'");
        $row = $this->db->numRows();
        //Jika row berisikan nilai 0 maka tidak ada barang yang ingin dihapus dalam database
        if ($row == 0) {
            return 0;
        }

        $this->db->query("DELETE FROM data_barang WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return 1;
    }

    public function tambahRequest($data)
    {

        $id_barang = $data['id_barang'];
        $jumlah_brg = $data['jumlah_brg'];
        $id_pinjaman = $data['id_pinjaman'];

        $query = "INSERT INTO tb_request_barang
        VALUES ('', :id_pinjaman , :id_barang, :jumlah_brg)";

        $this->db->query($query);
        $this->db->bind('id_pinjaman', $id_pinjaman);
        $this->db->bind('id_barang', $id_barang);
        $this->db->bind('jumlah_brg', $jumlah_brg);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function tambahPeminjaman($data)
    {

        $id_member = $data['id_member'];
        $lama_pinjam = $data['lama_pinjam'];

        $query = "INSERT INTO pinjaman
        VALUES ('', :id_member, :tanggal_transaksi , null, :lama_pinjam, null, :status_pinjam, null)";

        $this->db->query($query);
        $this->db->bind('id_member', $id_member);
        $this->db->bind('tanggal_transaksi', date("Y-m-d"));
        $this->db->bind('lama_pinjam', $lama_pinjam);
        $this->db->bind('status_pinjam', 'Sedang Diproses');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getDataPinjam($idmember, $lamawaktu)
    {
        $sql = "SELECT id_pinjaman FROM pinjaman 
        WHERE id_member = '$idmember' AND lama_pinjam = '$lamawaktu' GROUP BY id_pinjaman DESC LIMIT 1";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getPinjam()
    {
        $sql = "SELECT id_pinjaman FROM pinjaman";
        $this->db->query($sql);
        return $this->db->resultSet();
    }
}
