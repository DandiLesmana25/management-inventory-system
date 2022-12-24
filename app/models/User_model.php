<?php

class User_model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query("SELECT * FROM users");
        return $this->db->resultSet();
    }

    public function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM users WHERE username = '$username'");
        return $this->db->single();
    }

    public function getUserByID($id)
    {
        $this->db->query("SELECT * FROM users WHERE id = '$id'");
        return $this->db->single();
    }

    public function getDetailUser($id)
    {
        $this->db->query("SELECT * FROM users WHERE id = '$id'");
        return $this->db->single();
    }

    public function ubahUser($id, $data)
    {
        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);
        $role = htmlspecialchars($data['role']);
        $nama = htmlspecialchars($data['nama']);

        $sql = "UPDATE users SET
                username = :username,
                password = :password,
                role = :role,
                nama = :nama,
                WHERE id = :id";

        $this->db->query($sql);
        $fields = [
            'username' => $username,
            'password' =>  $password,
            'role' => $role,
            'nama' =>  $nama,
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

    public function hapusUser($id)
    {
        $this->db->query("SELECT id FROM users WHERE id = '$id'");
        $row = $this->db->numRows();
        if ($row == 0) {
            return 0;
        }

        $this->db->query("DELETE FROM users WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return 1;
    }

    public function checkUser($username)
    {
        $this->db->query("SELECT * FROM users WHERE username = '$username'");
        return $this->db->numRows();
    }

    public function checkUserByID($id)
    {
        $this->db->query("SELECT * FROM users WHERE id = '$id'");
        return $this->db->numRows();
    }

    public function countMember()
    {
        $this->db->query("SELECT COUNT(*) FROM users WHERE role = '1' or '2'");
        return $this->db->numRows();
    }

    public function insert($nama, $username, $password)
    {

        $new_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users VALUES 
                    (null, :username, :pass, 2, :nama)";

        $this->db->query($query);
        $fields = [
            'username' => $username,
            'pass' => $new_password,
            'nama' => $nama
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

    public function updateUser($id, $current_username, $data)
    {
        $new_username = htmlspecialchars($data['username']);
        $new_nama = htmlspecialchars($data['nama']);
        //Cek apakah username sudah ada
        if ($this->checkUser($new_username) > 0 && $current_username != $new_username) {
            return 0;
        } else {
            $sql = "UPDATE users 
                SET username = :new_username, nama = :new_nama
                WHERE id = :id";
            $this->db->query($sql);
            $fields = [
                'new_username' => $new_username,
                'new_nama' => $new_nama,
                'id' => $id
            ];
            $this->db->binds($fields);
            // $this->db->bind('new_username', $new_username);
            // $this->db->bind('new_nama', $new_nama);
            // $this->db->bind('id', $id);
            $this->db->execute();
        }
        $data['new_username'] = $new_username;
        $data['new_nama'] = $new_nama;
        return $data;
    }

    public function updatePassword($id, $new_password)
    {
        $hash_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE users 
                SET password = :hash_password
                WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind('hash_password', $hash_password);
        $this->db->bind('id', $id);
        $this->db->execute();
    }

    public function resetPassword($id)
    {
        $hash_password = password_hash('p4ssw0rd', PASSWORD_DEFAULT);
        $sql = "UPDATE users 
                SET password = :hash_password
                WHERE id = :id";
        $this->db->query($sql);
        $this->db->bind('hash_password', $hash_password);
        $this->db->bind('id', $id);
        $this->db->execute();
    }

    // public function resetPassword($id)
    // {


    //     $query = "UPDATE users SET password='p4ssw0rd' WHERE id='$id'";

    //     $this->db->query($query);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }

    public function setujuiPinjaman($id)
    {
        $query = "UPDATE pinjaman SET status_pinjam='Diterima', 
        tanggal_pinjam = CURDATE(), tanggal_kembali=CURDATE()+INTERVAL lama_pinjam DAY WHERE id_pinjaman='$id'";

        $this->db->query($query);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tolakPinjaman($data)
    {

        $id_pinjaman = $data['id_pinjaman'];
        $catatan_ditolak = $data['catatan_ditolak'];

        $query = "UPDATE pinjaman SET status_pinjam='Ditolak', 
        catatan_ditolak= :catatan_ditolak WHERE id_pinjaman= :id_pinjaman";

        $this->db->query($query);
        $this->db->bind('catatan_ditolak', $catatan_ditolak);
        $this->db->bind('id_pinjaman', $id_pinjaman);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function pengembalianPinjaman($id)
    {


        $query = "UPDATE pinjaman SET status_pinjam='Selesai', tanggal_kembali= CURDATE()  WHERE id_pinjaman='$id'";

        $this->db->query($query);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
