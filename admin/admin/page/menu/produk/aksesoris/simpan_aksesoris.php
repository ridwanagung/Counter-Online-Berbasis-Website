<?php

include('admin/admin/page/menu/koneksi/koneksi.php');

$judul_gambar = @$_POST['judul_gambar'];
$keterangan = @$_POST['keterangan'];
$harga = @$_POST['harga'];

$sumber = @$_FILES['nama_file']['tmp_name'];
$target = 'aset/images/produk/';
$nama_gambar = @$_FILES['nama_file']['name'];

$tambah_produkbaru = @$_POST['tambah'];

if ($tambah_produkbaru) {
    if ($judul_gambar == "" || $nama_gambar == "" || $keterangan == "" || $harga == "") {
        ?>
        <script type="text/javascript">
            alert("Inputan tidak Boleh ada yang kosong");
        </script>
        <?php

    } else {
        $pindah = move_uploaded_file($sumber, $target . $nama_gambar);
        if ($pindah) {
            mysql_query("INSERT into tb_aksesoris (judul_gambar,nama_file,keterangan,harga) VALUES('$judul_gambar','$nama_gambar','$keterangan','$harga')") or die(mysql_error());
            ?> 
            <script type="text/javascript">
                alert("data berhasil di tambah");
                window.location.href = "dasbord.php?page=aksesoris";
            </script>
            <?php

        } else {
            ?>
            <script type="text/javascript">
                alert("gambar gagal diupload");
            </script>
            <?php

        }
    }
}
?>