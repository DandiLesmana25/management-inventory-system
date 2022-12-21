 <form action="<?= BASEURL ?>/request/tambah_peminjaman" method="post">
     <div class="card shadow">
         <div class="card-body">
             <h3>Management Inventory System</h3>
             <h6>Advics Manufacturing Indonesia PT.</h6>
             <hr>
             <h6>Silahkan pilih barang yang akan di pinjam.</h6>
             <br>
             <!--  <form action="" method="post"> -->
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
                 <div class="col-sm-3">
                     <div class="form-group">
                         <label for="waktu">Member</label>
                         <input type="text" readonly name="nama_member" id="nama_member" class="form-control" value="<?= $data['nama'] ?>">
                         <input type="hidden" name="id_member" value="<?= $data['id_member'] ?>">
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <div class="form-group">
                         <label for="waktu">Lama Waktu</label>
                         <select class="form-control selectpicker" id="lama_pinjam" name="lama_pinjam" required <?php echo isset($_SESSION['member_pinjam']) ? 'disabled' : '' ?>>
                             <option value="">--- Pilih Waktu ---</option>
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
                 <div class="col-sm-3">
                     <div class="form-group">
                         <label for="nama_barang">Kode Barang</label>
                         <input type="text" readonly placeholder="Kode Barang" id="kode_barang" name="kode_barang" class="form-control">
                     </div>
                 </div>
                 <div class="col-md-3" style="margin-top: 2.5%;">
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaldraft">
                         Pilih Barang
                     </button>
                 </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label for="nama_barang">Nama Barang</label>
                         <input type="hidden" readonly name="id_barang" id="id_barang" class="form-control">

                         <input type="text" readonly name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang">
                     </div>

                     <div class="form-group">
                         <label for="tipe_barang">Tipe Barang</label>
                         <input type="text" readonly name="tipe_barang" id="tipe_barang" class="form-control" placeholder="Tipe Barang">
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="form-group">
                         <label for="">Jumlah Stok</label>
                         <input type="number" readonly name="jmlh_stok" id="jmlh_stok" class="form-control" placeholder="Jumlah Stok">
                     </div>
                     <div class="form-group">
                         <label for="jmlh_stok">Jumlah Pinjam</label>
                         <input type="number" min="0" name="jumlah" id="jumlah" autocomplete="off" class="form-control" placeholder="Jumlah Pinjam">
                     </div>
                     <a class="btn btn-primary" onclick="simpan_draft()" style="color: white;">Simpan Draft</a>
                     <button type="reset" onclick="batal_request();" class="btn btn-danger" value="Reset">Batal </button>
                 </div>
             </div>
             <!--   </form> -->
         </div>
     </div>
     <br>

     <div class="card shadow">
         <div class="card-body">
             <div id="data_peminjaman">

                 <table class="table mt-4">
                     <thead class="thead-light">
                         <p>Draft Request Peminjaman</p>
                         <tr>
                             <th>Kode Barang</th>
                             <th>Nama Barang</th>
                             <th>Tipe Barang</th>
                             <th>Jumlah Pinjam</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <input type="hidden" id="nomor" class="form-control" value="1" readonly>
                     <!--  <tbody id="tabel-ajax">
                <?php if (isset($_SESSION['pinjaman'])) : ?>
                    <?php $i = 1;
                    foreach ($_SESSION['pinjaman'] as $key => $value) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $value['judul'] ?></td>
                            <td><a href="<?= BASEURL ?>/peminjaman/hapus/<?= $value['row_id'] ?>" class="badge badge-danger">Hapus</a></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>

            </tbody> -->
                 </table>

             </div>
             <hr>
             <button id="simpan-pinjaman" type="submit" class="btn btn-danger">Simpan Pinjaman</button>
         </div>

     </div>
 </form>




 <!-- Modal -->
 <div class="modal fade" id="modaldraft" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Daftar Barang</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <table id="tbl-request-barang" class="table">
                     <thead class="thead-light">
                         <tr>
                             <th>No</th>
                             <th>Kode Barang</th>
                             <th>Nama Barang</th>
                             <th>Tipe Barang</th>
                             <th>Jumlah Stok</th>
                             <th>Lokasi</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php if ($data['data_barang'] != []) : ?>
                             <?php $i = 1; ?>
                             <?php foreach ($data['data_barang'] as $brg) : ?>
                                 <tr>
                                     <td><?= $i ?></td>
                                     <td><?= $brg['kode_barang'] ?></td>
                                     <td><?= $brg['nama_barang'] ?></td>
                                     <td><?= $brg['tipe_barang'] ?></td>
                                     <td><?= $brg['jmlh_stok'] ?></td>
                                     <td><?= $brg['lokasi'] ?></td>
                                     <?php if ($brg['jmlh_stok'] == "0") {  ?>
                                         <td>
                                             <button class="btn btn-primary simpan-draft" disabled>Pilih</button>
                                         </td>
                                     <?php } else { ?>
                                         <td>
                                             <button id="Btn<?= $brg['id'] ?>" class="btn btn-primary simpan-draft" onclick="pilih_barang('<?= $brg['id'] ?>', '<?= $brg['kode_barang'] ?>','<?= $brg['nama_barang'] ?>','<?= $brg['tipe_barang'] ?>','<?= $brg['jmlh_stok'] ?>')">Pilih</button>
                                         </td>
                                     <?php } ?>
                                 </tr>
                                 <?php $i++; ?>
                             <?php endforeach; ?>
                         <?php else : ?>
                             <tr>
                                 <td colspan="5"><strong>Tidak ada data barang</strong></td>
                             </tr>
                         <?php endif; ?>
                     </tbody>
                 </table>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>
 <script>
     function pilih_barang(id, kode, nama, tipe, jmlh) {
         $('#id_barang').val(id);
         $('#kode_barang').val(kode);
         $('#nama_barang').val(nama);
         $('#tipe_barang').val(tipe);
         $('#jmlh_stok').val(jmlh);
         disabled_tombol(id);
     }

     function disabled_tombol(id) {
         var x = document.getElementById("Btn" + id);
         x.disabled = true;
         $('#modaldraft').modal('hide');
     }

     function enabled_tombol(id) {
         var x = document.getElementById("Btn" + id);
         x.disabled = false;
         $('#modaldraft').modal('hide');
     }

     function simpan_draft() {
         var id_barang = $('#id_barang').val();
         var kode_barang = $('#kode_barang').val();
         var nama_barang = $('#nama_barang').val();
         var tipe_barang = $('#tipe_barang').val();
         var jmlh_stok = $('#jmlh_stok').val();
         var jumlah = $('#jumlah').val();
         var cek_jumlah = jmlh_stok - jumlah;
         var nomor = $('#nomor').val();
         if (jumlah == "") {
             alert("Jumlah Belum Terisi!");
         } else if (cek_jumlah < 0) {
             alert("Jumlah Melebihi Maksimal Stok!");
         } else {
             $.ajax({
                 url: "<?= BASEURL ?>/request/data_peminjaman",
                 data: {
                     id_barang: id_barang,
                     kode_barang: kode_barang,
                     nama_barang: nama_barang,
                     tipe_barang: tipe_barang,
                     // jmlh_stok: jmlh_stok,
                     jumlah: jumlah,
                     nomor: nomor
                 },
                 method: "post",
                 success: function(html) {
                     $("#data_peminjaman").append(html);
                     reset_request();
                     $('#nomor').val(nomor * 1 + 1 * 1);
                 }
             });
         }
     }

     function reset_request() {
         var id_barang = $('#id_barang').val('');
         var kode_barang = $('#kode_barang').val('');
         var nama_barang = $('#nama_barang').val('');
         var tipe_barang = $('#tipe_barang').val('');
         var jmlh_stok = $('#jmlh_stok').val('');
         var jumlah = $('#jumlah').val('');

     }

     function batal_request() {
         var id_barang = $('#id_barang').val();
         enabled_tombol(id_barang);
         var id_barang = $('#id_barang').val('');
         var kode_barang = $('#kode_barang').val('');
         var nama_barang = $('#nama_barang').val('');
         var tipe_barang = $('#tipe_barang').val('');
         var jmlh_stok = $('#jmlh_stok').val('');
         var jumlah = $('#jumlah').val('');

     }

     function hapus(no, id) {
         var tanya = confirm("Apakah Anda Akan Menghapus Data Ini ?");
         if (tanya === true) {
             $('.row-keranjang' + no).closest('.row-keranjang' + no).remove();
             $('#tbl_brg' + no).closest('#tbl_brg' + no).remove();
             enabled_tombol(id)
         }
     }
 </script>