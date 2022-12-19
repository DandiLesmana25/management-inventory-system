const base_url = $('meta[name="base_url"]').attr('content');
$(document).on('click', '.btn-detail-buku', function () {
  // console.log('OK');
  let id = $(this).data('id');
  // console.log(id);
  $.ajax({
    method: 'post',
    url: base_url + '/member/ambil-buku',
    data: {
      id: id,
    },
    dataType: 'json',
    success: function (response) {
      // console.log(response);
      $('#judul-buku').html(response.judul);
      $('#tahun-terbit').html(response.tahun_terbit);
      $('#penulis').html(response.penulis);
      $('#isbn').html(response.isbn);
    },
  });
});

$(document).on('click', '.btn-detail-pinjaman', function () {
  let id = $(this).data('id');
  $('#id-pinjaman').html(id);
  $.ajax({
    url: base_url + '/member/ambil-pinjaman',
    data: {
      id: id,
    },
    method: 'post',
    dataType: 'json',
    success: function (data) {
      if (data[1].tanggal_kembali == null) {
        $('#tanggal-kembali').html('Belum Dikembalikan');
      } else {
        const options = {
          year: 'numeric',
          month: 'long',
          day: 'numeric',
        };
        let date = new Date(data[1].tanggal_kembali);
        $('#tanggal-kembali').html(date.toLocaleString('id-ID', options));
      }
      if (data[1].denda == null) {
        $('#denda').html('-');
      } else {
        $('#denda').html(data[1].denda);
      }
      let buku = '';
      $.each(data[0], function (i, val) {
        buku += '<li>' + val.judul + '</li>';
      });
      $('#daftar-buku').html(buku);
    },
  });
});

$('#draft-peminjaman').on('click', function () {
  let idmember = $('#id-member').val();
  let barang = $('#barang').val();
  let waktu = $('#lama-pinjam').val();
  if (barang == '' || waktu == '') {
    alert('Mohon masukkan barang atau waktu peminjaman terlebih dahulu.');
    return;
  }
  $.ajax({
    url: base_url + '/peminjaman/tambah',
    data: {
      idmember: idmember,
      barang: barang,
      waktu: waktu,
    },
    method: 'post',
    dataType: 'json',
    success: function (data) {
      if (data == 'exist') {
        alert('Barang ini sudah masuk ke sesi peminjaman');
      } else if (data == 'x') {
        alert('Barang ini sudah dipinjam dan belum dikembalikan, harap dikembalikan dulu');
      } else if (data == 'xmember') {
        alert('Member tidak ditemukan, harap cek member terlebih dahulu.');
      } else {
        let tabel = '';
        let j = 1;
        $.each(data, function (i, val) {
          tabel += '<tr>' + '<td>' + j++ + '</td>' + '<td>' + val.nama_barang + '</td>' + '<td><a href="' + base_url + '/peminjaman/hapus/' + val.row_id + '" class="badge badge-danger btn-hapus">Hapus</a></td>' + '</tr>';
        });
        $('#tabel-ajax').html(tabel);
        $('#id-member').prop('disabled', true);
        $('#lama-pinjam').prop('disabled', true);
        $('.selectpicker').selectpicker('refresh');
      }
    },
  });
});

$('#cek-member').on('click', function () {
  let idmember = $('#id-member').val();
  $.ajax({
    url: base_url + '/peminjaman/cekmember',
    data: {
      idmember: idmember,
    },
    method: 'post',
    dataType: 'json',
    success: function (data) {
      if (data == 'tidak ditemukan') {
        $('#ada').html('Member tidak ditemukan!');
        $('#nama-member').html('');
      } else {
        $('#ada').html('Member ditemukan!');
        $('#nama-member').html(data.nama);
      }
    },
  });
});

$('#simpan-pinjaman').on('click', function () {
  if (confirm('Apakah anda yakin ingin menyimpan pinjaman baru?')) {
    $.ajax({
      url: base_url + '/peminjaman/simpan',
      method: 'post',
      dataType: 'json',
      success: function (data) {
        if (data == 'no_session') {
          alert('Silahkan buat sesi peminjaman terlebih dahulu!');
        } else {
          alert('Peminjaman baru berhasil disimpan');
          location.reload();
        }
      },
    });
  }
});

$(document).on('click', '.btn-detail-pinjaman', function () {
  let id = $(this).data('id');
  if ($(this).data('kembali') == true) {
    $('#selesaikan-pinjaman').hide();
  } else {
    $('#selesaikan-pinjaman').data('id', id);
    $('#selesaikan-pinjaman').show();
  }
  $('#id-pinjaman').html(id);
  $.ajax({
    url: base_url + '/peminjaman/detail',
    data: {
      id: id,
    },
    method: 'post',
    dataType: 'json',
    success: function (data) {
      $('#nama-member').html(data[1].nama);
      $('#lama-pinjam').html(data[1].lama_pinjam + ' hari');
      if (data[1].denda != null) {
        $('#denda').html('Denda : Rp ' + data[1].denda);
      } else {
        $('#denda').html('Denda : Rp 0');
      }
      let barang = '';
      $.each(data[0], function (i, val) {
        barang += '<li>' + val.nama_barang + '</li>';
      });
      $('#daftar-barang').html(barang);
    },
  });
});

$('#selesaikan-pinjaman').on('click', function () {
  let id = $(this).data('id');
  if (confirm('Apakah anda yakin ingin menyelesaikan pinjaman ini?')) {
    $.ajax({
      url: base_url + '/peminjaman/selesai',
      data: {
        id: id,
      },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        if (data == 'tidak denda') {
          alert('Pinjaman berhasil diselesaikan, tidak ada denda');
          location.reload();
        } else {
          alert('Pinjaman berhasil diselesaikan, denda Rp ' + data);
          location.reload();
        }
      },
    });
  }
});
