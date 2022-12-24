<?php

class Departement_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDepartement()
    {
        $this->db->query("SELECT * FROM departement");
        return $this->db->resultSet();
    }

    public function getDepartementById($id_departement)
    {
        $this->db->query("SELECT * FROM departement where id_departement = '$id_departement'");
        return $this->db->single();
    }

    public function tambahDepartement($data)
    {
        $nama_departement = htmlspecialchars($data['nama_departement']);
        $no_tlp = htmlspecialchars($data['no_tlp']);
        $keterangan = htmlspecialchars($data['keterangan']);

        $sql = "INSERT INTO departement VALUES
        (null, :nama_departement, :no_tlp, :keterangan)";
        $this->db->query($sql);
        $this->db->bind('nama_departement', $nama_departement);
        $this->db->bind('no_tlp', $no_tlp);
        $this->db->bind('keterangan', $keterangan);
        $this->db->execute();
    }

    public function hapusDepartement($id_departement)
    {
        //Cek apakah id penerbit ada dalam database
        $this->db->query("SELECT id_departement FROM departement WHERE id_departement = '$id_departement'");
        $row = $this->db->numRows();
        //Jika row berisikan nilai 0 maka tidak ada penerbit yang ingin dihapus dalam database
        if ($row == 0) {
            return 0;
        }
        $this->db->query("DELETE FROM departement WHERE id_departement = :id_departement");
        $this->db->bind('id_departement', $id_departement);
        $this->db->execute();
        return 1;
    }

    public function updateDepartement($id_departement, $data)
    {
        $nama_departement = htmlspecialchars($data['nama_departement']);
        $no_tlp = htmlspecialchars($data['no_tlp']);
        $keterangan = htmlspecialchars($data['keterangan']);

        $sql = "UPDATE departement SET
                nama_departement = :nama_departement,
                no_tlp = :no_tlp,
                keterangan = :keterangan
                WHERE id_departement = :id_departement";

        $this->db->query($sql);
        $fields = [
            'nama_departement' => $nama_departement,
            'no_tlp' => $no_tlp,
            'keterangan' => $keterangan,
            'id_departement' => $id_departement
        ];
        $this->db->binds($fields);
        $this->db->execute();
    }
}
