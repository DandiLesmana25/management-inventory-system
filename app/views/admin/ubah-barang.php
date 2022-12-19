<h3 class="mb-3 text-center">Form Ubah Barang</h3>

<div class="card shadow">
    <div class="card-body">
        <form action=" " method="post">
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input class="form-control" type="text" name="kode_barang" id="kode_barang" value="<?= $data['data_barang']['kode_barang'] ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input class="form-control" type="text" name="nama_barang" id="nama_barang" value="<?= $data['data_barang']['nama_barang'] ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="tipe_barang">Tipe Barang</label>
                        <input class="form-control" type="text" name="tipe_barang" id="tipe_barang" value="<?= $data['data_barang']['tipe_barang'] ?>" required>
                    </div>
                    
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="jmlh_stok">Jumlah Stok</label>
                        <input class="form-control" type="number" name="jmlh_stok" id="jmlh_stok" value="<?= $data['data_barang']['jmlh_stok'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input class="form-control" type="text" name="lokasi" id="lokasi" value="<?= $data['data_barang']['lokasi'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_regist">Tanggal Registrasi</label>
                        <input class="form-control" type="date" name="tgl_regist" id="tgl_regist" value="<?= $data['data_barang']['tgl_regist'] ?>" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Update Barang</button>
            <a href="<?= BASEURL ?>/admin/daftar-barang" class="btn btn-warning">Batal</a>
        </form>
    </div>
</div>