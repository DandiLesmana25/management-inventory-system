<!-- <h3 class="text-center mb-5">Input PeminjamanN</h3>

<div class="card shadow">
    <div class="card-body">
        <div class="form-group row">
            <label for="id-member" class="col-sm-2 col-form-label">Pilih Member</label>
            <div class="col-sm-2">
                <select name="id-member" class="form-control">
                    <option value="">==PILIH MEMBER==</option>
                </select>
            </div>
            <div class="col-sm-4">
               
            </div>
        </div>

        <div class="form-group row">
            <label for="lama-pinjam" class="col-sm-2 col-form-label">Lama Pinjam</label>
            <div class="col-sm-4">
                <select class="form-control" id="lama-pinjam" name="waktu" required <?php echo isset($_SESSION['member_pinjam']) ? 'disabled' : '' ?>>
                    <option value="">--- Pilih waktu ---</option>
                    <?php foreach ($data['waktu'] as $w) : ?>
                        <?php if (isset($_SESSION['member_pinjam'])) : ?>
                            <?php if ($w['waktu'] == $_SESSION['member_pinjam']['lama_pinjam']) : ?>
                                <option value="<?= $w['waktu'] ?>" selected><?= $w['nama'] ?></option>
                            <?php else : ?>
                                <option value="<?= $w['waktu'] ?>"><?= $w['nama'] ?></option>
                            <?php endif ?>
                        <?php else : ?>
                            <option value="<?= $w['waktu'] ?>"><?= $w['nama'] ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="data_barang" class="col-sm-2 col-form-label">Barang</label>
            <div class="col-sm-4">
                <select class="form-control" id="barang" data-live-search="true" name="barang" required>
                    <option value="">--- Pilih barang ---</option>
                    <?php foreach ($data['data_barang'] as $b) : ?>
                        <!-- nyambung ke db -->
                        <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <button id="tambah-peminjaman" class="btn btn-primary">Tambah Peminjaman</button>

        <table class="table mt-4">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tabel-ajax">
                <?php if (isset($_SESSION['pinjaman'])) : ?>
                    <?php $i = 1;
                    foreach ($_SESSION['pinjaman'] as $key => $value) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $value['nama_barang'] ?></td>
                            <td><a href="<?= BASEURL ?>/peminjaman/hapus/<?= $value['row_id'] ?>" class="badge badge-danger">Hapus</a></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>

            </tbody>
        </table>

        <button id="simpan-pinjaman" class="btn btn-success">Simpan Pinjaman</button>

        <!-- Modal -->
        <div class="modal fade" id="cekMemberModal" tabindex="-1" role="dialog" aria-labelledby="cekMemberModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cekMemberModalLabel">Cek Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 id="ada"></h5>
                        <p id="nama-member"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> --> -->