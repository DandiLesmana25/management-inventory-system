<div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Register User</h1>
                    </div>
                    <form action="<?= BASEURL ?>/admin/tambah_user" method="post">
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
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" type="text" name="nama" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" name="username" id="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input class="form-control" type="password" name="password1" id="confirm_password" required>
                        </div>
                        <button class="btn btn-primary btn-user btn-block" type="submit" name="register">Register</button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <p class="small">Sudah punya akun? <a href="<?= BASEURL ?>/login">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>