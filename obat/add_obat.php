<?php

include_once ('../header.php');
require_once '../config/koneksi.php';

?>

    <div class="box">
        <h1>Obat</h1>
        <h4>
        <small>Tambah data obat</small>
        <div class="pull-right">
            <a href="data_obat.php" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="nama_obat">Nama obat</label>
                        <input type="text" name="nama_obat" id="nama_obat" class="form-control" require autofocus>
                    </div>
                    <div class="form-group">
                        <label for="ket_obat">Keterangan obat</label>
                        <textarea name="ket_obat" id="ket" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
        
<?php include_once ('../footer.php'); ?>