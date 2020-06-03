<?php

include_once ('../header.php');
require_once '../config/koneksi.php';

?>

<?php
    //proses jika tombol edit pada tabel di tekan
    if(isset($_GET['id'])){
        //membuat variable untuk menampung data dari URL _get['id']
        $id_dokter = $_GET['id'];

        //membuat query untuk memilih data dengan id $nama dari database
        $query_pilih = "SELECT * FROM dokter WHERE id_dokter = '$id_dokter'";
        $pilih = mysqli_query ($koneksi, $query_pilih) or die(mysqli_error($koneksi));

        //menyimpan data row dari database ke dalam variable data_edit
        $data = mysqli_fetch_assoc ($pilih);

    }

?>

    <div class="box">
        <h1>Dokter</h1>
        <h4>
        <small>Edit data dokter</small>
        <div class="pull-right">
            <a href="data_dokter.php" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="namadokter">Nama dokter</label>
                        <input type="hidden" name="id_dokter" id="id_dokter" value="<?=$data['id_dokter']?>" required>
                        <input type="text" name="namadokter" id="namadokter" class="form-control" value="<?=$data['nama_dokter']?>" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="spesialis">Spesialis</label>
                        <input type="text" name="spesialis" id="spesialis" class="form-control" value="<?=$data['spesialis']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="ket" class="form-control"><?=$data['alamat']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notelp">No. Telp</label>
                        <input type="text" name="notelp" id="notelp" class="form-control" value="<?=$data['no_telp']?>" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update" value="Update" class="btn btn-success pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
        
<?php include_once ('../footer.php'); ?>