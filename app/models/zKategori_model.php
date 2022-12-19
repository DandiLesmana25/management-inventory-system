<?php

class Kategori_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKategori()
    {
        $this->db->query("SELECT * FROM kategori");
        return $this->db->resultSet();
    }

    public function getKategoriById($id)
    {
        $this->db->query("SELECT * FROM kategori where id = '$id'");
        return $this->db->single();
    }

    public function tambahKategori($data)
    {
        $nama_kategori = htmlspecialchars($data['nama_kategori']);
        $keterangan = htmlspecialchars($data['keterangan']);

        $sql = "INSERT INTO kategori VALUES
        (null, :nama_kategori, :keterangan)";
        $this->db->query($sql);
        $this->db->bind('nama_kategori', $nama_kategori);
        $this->db->bind('keterangan', $keterangan);
        $this->db->execute();
    }

    public function updateKategori($id, $data)
    {
        $nama_kategori = htmlspecialchars($data['nama_kategori']);
        $keterangan = htmlspecialchars($data['keterangan']);

        $sql = "UPDATE kategori SET
                nama_kategori = :nama_kategori,
                keterangan = :keterangan
                WHERE id = :id";

        $this->db->query($sql);
        $fields = [
            'nama_kategori' => $nama_kategori,
            'keterangan' => $keterangan,
            'id' => $id
        ];
        $this->db->binds($fields);
        // $this->db->bind('nama_kategori', $nama_kategori);
        // $this->db->bind('keterangan', $keterangan);
        // $this->db->bind('id', $id);
        $this->db->execute();
    }

    public function hapusKategori($id)
    {
        //Cek apakah id kategori ada dalam database
        $this->db->query("SELECT id FROM kategori WHERE id = '$id'");
        $row = $this->db->numRows();
        //Jika row berisikan nilai 0 maka tidak ada kategori yang ingin dihapus dalam database
        if ($row == 0) {
            return 0;
        }

        $this->db->query("DELETE FROM kategori WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return 1;
    }
}
