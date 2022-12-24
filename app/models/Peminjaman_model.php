<?php

class Peminjaman_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPinjaman()
    {
        $this->db->query("SELECT * FROM pinjaman 
        JOIN users ON pinjaman.id_member = users.id WHERE status_pinjam!='Sedang Diproses'
        ORDER BY id_pinjaman DESC");
        return $this->db->resultSet();
    }

    public function getApprovePinjaman()
    {
        $this->db->query("SELECT * FROM pinjaman 
        JOIN users ON pinjaman.id_member = users.id WHERE status_pinjam='Sedang Diproses'
        ORDER BY id_pinjaman DESC");
        return $this->db->resultSet();
    }

    public function getAllUser()
    {
        $this->db->query("SELECT * FROM users WHERE role='2'");
        return $this->db->resultSet();
    }

    public function getAllBarang()
    {
        $this->db->query("SELECT * FROM data_barang");
        return $this->db->resultSet();
    }

    public function pinjamBelumKembali($data)
    {
        $id_member = $data['idmember'];
        $id_barang = $data['data_barang'];
        $sql = "SELECT pinjaman.id_pinjaman FROM pinjaman
                JOIN detail_pinjaman ON pinjaman.id_pinjaman = detail_pinjaman.id_pinjaman
                WHERE id_member = $id_member AND id_barang = $id_barang AND tanggal_kembali IS NULL";
        $this->db->query($sql);
        return $this->db->numRows();
    }

    public function countProsesadmin()
    {
        $sql = "SELECT COUNT(*) FROM pinjaman WHERE status_pinjam='Sedang Diproses'";
        $this->db->query($sql);
        return $this->db->numRows();
    }

    public function countSelesai()
    {
        $sql = "SELECT COUNT(*) FROM pinjaman WHERE status_pinjam='Selesai'";
        $this->db->query($sql);
        return $this->db->numRows();
    }

    public function countSelesai2($id)
    {
        $sql = "SELECT COUNT(*) FROM pinjaman WHERE status_pinjam='Selesai' AND id_member='$id'";
        $this->db->query($sql);
        return $this->db->numRows();
    }

    public function countTolak($id)
    {
        $sql = "SELECT COUNT(*) FROM pinjaman WHERE status_pinjam='Ditolak' AND id_member='$id'";
        $this->db->query($sql);
        return $this->db->numRows();
    }
    public function countProses($id)
    {
        $sql = "SELECT COUNT(*) FROM pinjaman WHERE status_pinjam='Sedang Diproses' AND id_member='$id'";
        $this->db->query($sql);
        return $this->db->numRows();
    }

    public function simpanPinjaman($pinjaman, $id_member, $lama_pinjam)
    {
        $tanggal_pinjam = date('Y-m-d');

        //Insert get id
        $sql = "INSERT INTO pinjaman VALUES
                (null, :id_member, :tanggal_pinjam, :lama_pinjam, null)";
        $this->db->query($sql);
        $fields = [
            'id_member' => $id_member,
            'tanggal_pinjam' => $tanggal_pinjam,
            'lama_pinjam' => $lama_pinjam
        ];
        $this->db->binds($fields);
        $this->db->execute();
        $id_peminjaman = $this->db->lastInsertId();

        foreach ($pinjaman as $data_barang) {
            $sql = "INSERT INTO detail_pinjaman VALUES
            (:id_peminjaman, '$data_barang[id_barang]')";
            $this->db->query($sql);
            $this->db->bind('id_peminjaman', $id_peminjaman);
            $this->db->execute();
        }
    }

    public function getPinjamanBarang($id_pinjaman)
    {
        $sql = "SELECT nama_barang FROM data_barang
                JOIN detail_pinjaman ON detail_pinjaman.id_barang = data_barang.id
                WHERE id_pinjaman = '$id_pinjaman'";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getDetailPinjaman($id_pinjaman)
    {
        $sql = "SELECT tanggal_pinjam, tanggal_kembali, nama, lama_pinjam, denda FROM pinjaman
        JOIN users ON pinjaman.id_member = users.id
        WHERE id_pinjaman = '$id_pinjaman'";
        $this->db->query($sql);
        return $this->db->single();
    }

    public function getWaktuPinjaman($id_pinjaman)
    {
        $sql = "SELECT lama_pinjam, tanggal_pinjam FROM pinjaman WHERE id_pinjaman = '$id_pinjaman'";
        $this->db->query($sql);
        return $this->db->single();
    }

    public function updatePinjaman($id_pinjaman, $tanggal_kembali, $denda)
    {
        $sql = "UPDATE pinjaman
                    SET tanggal_kembali = :tanggal_kembali, denda = :denda
                    WHERE id_pinjaman = :id_pinjaman";
        $this->db->query($sql);
        $fields = [
            'tanggal_kembali' => $tanggal_kembali,
            'denda' => $denda,
            'id_pinjaman' => $id_pinjaman
        ];
        $this->db->binds($fields);
        $this->db->execute();
    }

    public function getPinjamanMember($id_member)
    {
        $sql = "SELECT * FROM pinjaman 
        WHERE id_member = '$id_member'
        ORDER BY id_pinjaman DESC";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getDatabarang($idbarang)
    {
        $sql = "SELECT * FROM data_barang 
        WHERE id = '$idbarang'";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getDtPinjaman($idpinjaman)
    {
        $sql = "SELECT * FROM pinjaman 
        WHERE id_pinjaman = '$idpinjaman'";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getDetPinjaman($id)
    {
        $this->db->query("SELECT * FROM tb_request_barang INNER JOIN data_barang ON data_barang.id=tb_request_barang.id_barang WHERE tb_request_barang.id_pinjaman = '$id'");
        return $this->db->resultSet();
    }
}
