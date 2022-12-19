<!-- <h3 class="mb-3 text-center">Form Tambah Buku Baru</h3>
<div class="card shadow">
    <div class="card-body">
        <form action="<?= BASEURL ?>/admin/tambah_buku" method="post">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="judul">Judul Buku</label>
                        <input class="form-control" type="text" name="judul" id="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <select class="form-control" name="penerbit" id="penerbit" required>
                            <option value="">--- Pilih Penerbit ---</option>
                            <?php if ($data['penerbit'] != []) : ?>
                                <?php foreach ($data['penerbit'] as $p) : ?>
                                    <option value="<?= $p['id'] ?>"><?= $p['nama_penerbit'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahun">Tahun Terbit</label>
                        <input class="form-control" type="number" name="tahun" id="tahun" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input class="form-control" type="text" name="penulis" id="penulis" required>
                    </div>
                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input class="form-control" type="text" name="isbn" id="isbn" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori" required>
                            <option value="">--- Pilih Kategori ---</option>
                            <?php if ($data['kategori'] != []) : ?>
                                <?php foreach ($data['kategori'] as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Tambah Buku</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </form>
        
        <hr>

        <h3>List Buku</h3>
        <?php if (Flasher::check()) : ?>
            <?php $flash = Flasher::flash() ?>
            <div class="alert alert-<?= $flash['tipe'] ?> alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <?= $flash['pesan'] ?>
            </div>
        <?php endif; ?>

        <table id="tbl-daftar-buku" class="table dt-responsive nowrap" style="width: 100%;">
            <thead class="thead-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Tahun Terbit</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($data['buku'] != []) : ?>
                    <?php $i = 1; ?>
                    <?php foreach ($data['buku'] as $b) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $b['judul'] ?></td>
                            <td><?= $b['tahun_terbit'] ?></td>
                            <td><?= $b['nama_kategori'] ?></td>
                            <td class="text-center">
                                <a class="badge badge-info" href="<?= BASEURL ?>/admin/detail-buku/<?= $b['id'] ?>">Detail ></a>
                                <a class="badge badge-warning" href="<?= BASEURL ?>/admin/ubah-buku/<?= $b['id'] ?>">Ubah</a>
                                <a class="badge badge-danger" href="<?= BASEURL ?>/admin/hapus-buku/<?= $b['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5"><strong>Tidak ada data buku</strong></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div> -->