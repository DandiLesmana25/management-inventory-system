<!-- <h3 class="mb-3 text-center">Form Ubah Buku</h3>

<div class="card shadow">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="judul">Judul Buku</label>
                        <input class="form-control" type="text" name="judul" id="judul" value="<?= $data['buku']['judul'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <select class="form-control" name="penerbit" id="penerbit">
                            <?php foreach ($data['penerbit'] as $p) : ?>
                                <?php if ($p['id'] == $data['buku']['id_penerbit']) : ?>
                                    <option value="<?= $p['id'] ?>" selected><?= $p['nama_penerbit'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $p['id'] ?>"><?= $p['nama_penerbit'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun Terbit</label>
                        <input class="form-control" type="number" name="tahun" id="tahun" value="<?= $data['buku']['tahun_terbit'] ?>" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input class="form-control" type="text" name="penulis" id="penulis" value="<?= $data['buku']['penulis'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input class="form-control" type="text" name="isbn" id="isbn" value="<?= $data['buku']['isbn'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori">
                            <?php foreach ($data['kategori'] as $k) : ?>
                                <?php if ($k['id'] == $data['buku']['id_kategori']) : ?>
                                    <option value="<?= $k['id'] ?>" selected><?= $k['nama_kategori'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Ubah Buku</button>
            <a href="<?= BASEURL ?>/admin/daftar-buku" class="btn btn-warning">Batal</a>
        </form>
    </div>
</div> -->