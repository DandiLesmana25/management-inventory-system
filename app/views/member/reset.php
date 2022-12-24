<h3>Ganti Password</h3>
<hr>

<div class="card shadow">
    <div class="card-body">
        <h4><?= $data['nama'] ?></h4>
        <small>ID Member: <?= $data['id_member'] ?></small>
        <hr>
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
        <div class="row mt-3">
            <div class="col-sm-6">
                <h5>Ganti password</h5>
                <form action="<?= BASEURL ?>/member/edit-password" method="post">
                    <div class="form-group">
                        <label for="current_password">Password Sekarang</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="new_password">Password Baru</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit_password" onclick="return confirm('Apakah anda yakin ingin mengubah password')">Ganti password</button>
                </form>
            </div>
        </div>
    </div>
</div>