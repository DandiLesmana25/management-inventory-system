<?php

class Request extends Controller             //inheritence/pearisan dari class controller
{
//property
    private $barangModel;
    private $peminjamanModel;

    function __construct()                                            //constructor
    {
     $this->barangModel = $this->model('Barang_model');
     $this->peminjamanModel = $this->model('Peminjaman_model');
    }

    public function index()
    {
    
    }
    
    public function tambah_peminjaman()
    {
        $id_member = $_POST['id_member'];
        $lama_pinjam = $_POST['lama_pinjam'];
     $insert['data_master'] = $this->barangModel->tambahPeminjaman($_POST);

     $pinjaman['pinjam'] = $this->barangModel->getDataPinjam($id_member,$lama_pinjam);
     foreach ($pinjaman['pinjam'] as $dt_id) :

    $jumlah_data =count($_POST['id_barang']);
        $data['id_pinjaman'] = $dt_id['id_pinjaman'];
           for ($i = 0; $i < $jumlah_data; $i++) {
            $data['id_barang'] = $_POST["id_barang"][$i];
            $data['jumlah_brg'] = $_POST["jumlah_brg"][$i];
        $insert = $this->barangModel->tambahRequest($data);
    }
endforeach;

   
            if ($insert>0) {
            Flasher::setFlash('Request berhasil ditambahkan', 'success');
            header('Location: ' . BASEURL . '/member');
            exit();
        }
    }

    function data_peminjaman() {
        $id_barang = $_POST["id_barang"];
        $kode_barang = $_POST["kode_barang"];
        $nama_barang = $_POST["nama_barang"];
        $tipe_barang = $_POST["tipe_barang"];
        // $jmlh_stok = $_POST["jmlh_stok"];
        $jumlah = $_POST["jumlah"];
        $nomor = $_POST["nomor"];

        echo '<table class="table mt-4" id="tbl_brg'.$nomor.'">';

echo '<tr class="row-keranjang'.$nomor.'"> 
<input type="hidden" name="id_barang[]" id="id_barang[]" placeholder="0" class="form-control" readonly value="'.$id_barang.'">
<td style="width: 300px;" id="kd_brg'.$nomor.'">'.$kode_barang.'<input type="hidden" name="kode_barang[]" id="kode_barang[]" placeholder="0" class="form-control" readonly value="'.$kode_barang.'"></td>
<td style="width: 300px;" id="nm_brg'.$nomor.'">'.$nama_barang.'<input type="hidden" name="nama_barang[]" id="nama_barang[]" class="form-control" readonly value="'.$nama_barang.'"></td>
<td style="width: 400px;" id="tp_brg'.$nomor.'">'.$tipe_barang.'<input type="hidden" name="tipe_barang[]" id="tipe_barang[]" class="form-control" readonly value="'.$tipe_barang.'"></td>
<td style="width: 300px;" id="jml_brg'.$nomor.'">'.$jumlah.'<input type="hidden" name="jumlah_brg[]" id="jumlah_brg[]" class="form-control" readonly value="'.$jumlah.'"></td>
<td id="btn_brg'.$nomor.'"><button type="button" class="btn btn-danger btn-sm" onclick="hapus('.$nomor.','.$id_barang.')">Hapus</button></td>
</tr>';
echo '</table>';
    }

    function data_barang() {
        $id_barang = $_POST["id_barang"];
        $nomor = $_POST["nomor"];
        $pinjaman['barang'] = $this->peminjamanModel->getDatabarang($id_barang);
        foreach ($pinjaman['barang'] as $dt_brg) :
        echo '<table class="table mt-4" id="tbl_brg'.$nomor.'">';

echo '<tr class="row-keranjang'.$nomor.'"> 
<input type="hidden" name="id_barang[]" id="id_barang[]" placeholder="0" class="form-control" readonly value="'.$id_barang.'">
<td style="width: 400px;" id="kode_brg'.$nomor.'">'.$dt_brg['kode_barang'].'</td>
<td style="width: 400px;" id="nama_brg'.$nomor.'">'.$dt_brg['nama_barang'].'</td>
<td id="btn_brg'.$nomor.'"><button type="button" class="btn btn-danger btn-sm" onclick="hapus('.$nomor.')">Hapus</button></td>
</tr>';
echo '</table>';
endforeach;
    }
}
