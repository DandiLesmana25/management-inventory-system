<h3 class="mb-3 text-center">Form Tambah User</h3>
<div class="card shadow">
    <div class="card-body">
         <form action=" " method="post">
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
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control" type="text" name="nama" id="nama" value="<?= $data['users']['nama'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" id="username" value="<?= $data['users']['username'] ?>" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" value="<?= $data['users']['password'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input class="form-control" type="password" name="password1" id="confirm_password" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="register">Register User</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </form>

    </div>
</div>