<div class="card shadow">
    <div class="card-body">
        <h3>Management Inventory System</h3>
        <h6>Advics Manufacturing Indonesia PT.</h6>
        <hr>
        <h6>Silahkan pilih barang yang akan di pinjam.</h6>
        <br>
        <form action="<?= BASEURL ?>/request/tambah_peminjaman" method="post">
            <div class="form-group row">
                <label for="id-member" class="col-sm-2 col-form-label">Pilih Member</label>
                <div class="col-sm-4">
                    <select name="id_member" class="form-control" required>
                        <option value="">--Pilih Member--</option>
                        <?php foreach ($data['member'] as $m) : ?>
                            <option value="<?= $m['id'] ?>"><?= $m['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-sm-4">

                </div>
            </div>


            <div class="form-group row">
                <label for="lama-pinjam" class="col-sm-2 col-form-label">Lama Pinjam</label>
                <div class="col-sm-4">
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

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-5">
                    <div class="input-group">

                        <select class="form-control selectpicker" id="id_barang" data-live-search="true" name="id_barang">
                            <option value="">--- Pilih Barang ---</option>
                            <?php foreach ($data['barang'] as $br) : ?>
                                <option value="<?= $br['id'] ?>"><?= $br['nama_barang'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="input-group-btn">
                            <a class="btn btn-primary" onclick="tambah_barang()" style="color: white;">Tambah Peminjaman</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="data_brg">
                <table class="table mt-4">
                    <thead class="thead-light">
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tabel-ajax">
                        <input type="hidden" id="nomor" class="form-control" value="1" readonly>
                        <!--  <?php if (isset($_SESSION['pinjaman'])) : ?>
                    <?php $i = 1;
                                    foreach ($_SESSION['pinjaman'] as $key => $value) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $value['judul'] ?></td>
                            <td><a href="<?= BASEURL ?>/peminjaman/hapus/<?= $value['row_id'] ?>" class="badge badge-danger">Hapus</a></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?> -->

                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-success">Simpan Pinjaman</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    function tambah_barang() {
        var id_barang = $('#id_barang').val();
        var nomor = $('#nomor').val();
        $.ajax({
            url: "<?= BASEURL ?>/request/data_barang",
            data: {
                id_barang: id_barang,
                nomor: nomor
            },
            method: "post",
            success: function(html) {
                $("#data_brg").append(html);
                $('#id_barang').val('');
                $('#nomor').val(nomor * 1 + 1 * 1);
            }
        });
    }

    function hapus(no) {
        var tanya = confirm("Apakah Anda Akan Menghapus Data Ini ?");
        if (tanya === true) {
            $('.row-keranjang' + no).closest('.row-keranjang' + no).remove();
            $('#tbl_brg' + no).closest('#tbl_brg' + no).remove();
        }
    }
</script>