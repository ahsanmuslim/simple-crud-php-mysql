<?php

include_once ('../header.php');
require_once '../config/koneksi.php';

?>

<?php
    //proses jika tombol edit pada tabel di tekan
    if(isset($_GET['id'])){
        //membuat variable untuk menampung data dari URL _get['id']
        $id_obat = $_GET['id'];

        //membuat query untuk memilih data dengan id $nama dari database
        $query_pilih = "SELECT * FROM obat WHERE id_obat = '$id_obat'";
        $pilih = mysqli_query ($koneksi, $query_pilih) or die(mysqli_error($koneksi));

        //menyimpan data row dari database ke dalam variable data_edit
        $data = mysqli_fetch_assoc ($pilih);

    }

?>

    <div class="box">
        <h1>Obat</h1>
        <h4>
        <small>Edit data obat</small>
        <div class="pull-right">
            <a href="data_obat.php" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama_obat">Nama obat</label>
                        <input type="hidden" name="id_obat"  value="<?php echo $data['id_obat']?>" required>
                        <input type="text" name="nama_obat" class="form-control" value="<?php echo $data['nama_obat']?>"required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="ket_obat">Keterangan obat</label>
                        <textarea name="ket_obat" class="form-control" required><?php echo $data['ket_obat']?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="update" value="Update" class="btn btn-info pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
        
<?php include_once ('../footer.php'); ?>