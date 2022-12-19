<h3 class="mb-3 text-center">Form Ubah Departement</h3>

<div class="card shadow">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group">
                        <label for="nama_departement">Nama Departement</label>
                        <input class="form-control" type="text" name="nama_departement" id="nama_departement" value="<?= $data['departement']['nama_departement'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_tlp">No Telpon</label>
                        <input class="form-control" type="number" name="no_tlp" id="no_tlp" value="<?= $data['departement']['no_tlp'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input class="form-control" type="text" name="keterangan" id="keterangan" value="<?= $data['departement']['keterangan'] ?>" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Ubah Departement</button>
            <a href="<?= BASEURL ?>/admin/departement" class="btn btn-warning">Batal</a>
        </form>
    </div>
</div>

<!-- cek -->