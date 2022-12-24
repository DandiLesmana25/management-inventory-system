 <h3 class="mb-3 text-center">Form Register User</h3>
 <div class="card shadow">
     <div class="card-body">
         <form action="<?= BASEURL ?>/admin/tambah-user" method="post">
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
                         <input class="form-control" type="text" name="nama" id="nama" required>
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label for="username">Username</label>
                         <input class="form-control" type="text" name="username" id="username" required>
                     </div>
                 </div>
             </div>
             <button class="btn btn-primary" type="submit" name="register">Register User</button>
             <button class="btn btn-danger" type="reset">Reset</button>
         </form>

         <hr>
         <h3>Data User</h3>
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

         <table id="tbl-daftar-user" class="table dt-responsive nowrap" style="width: 100%;">
             <thead class="thead-dark text-center">
                 <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>Username</th>
                     <th>Role</th>
                     <th>Aksi</th>
                 </tr>
             </thead>
             <tbody>
                 <?php if ($data['users'] != []) : ?>
                     <?php $i = 1; ?>
                     <?php foreach ($data['users'] as $brg) : ?>
                         <tr>
                             <td><?= $i ?></td>
                             <td><?= $brg['nama'] ?></td>
                             <td><?= $brg['username'] ?></td>
                             <td><?= $brg['role'] ?></td>
                             <td class="text-center">
                                 <a class="btn btn-primary" href="<?= BASEURL ?>/admin/detail-user/<?= $brg['id'] ?>">Detail </a>
                                 <a class="btn btn-success" href="<?= BASEURL ?>/admin/reset-password/<?= $brg['id'] ?>" onclick="return confirm('Apakah anda yakin ingin reset password?')">Reset Password</a>
                                 <a class="btn btn-danger" href="<?= BASEURL ?>/admin/hapus-user/<?= $brg['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
                             </td>
                         </tr>
                         <?php $i++; ?>
                     <?php endforeach; ?>
                 <?php else : ?>
                     <tr>
                         <td colspan="5"><strong>Tidak ada data User</strong></td>
                     </tr>
                 <?php endif; ?>
             </tbody>
         </table>
     </div>
 </div>