<?php

include_once ('../header.php');
require_once '../config/koneksi.php';

?>

    <div class="box">
        <h1>Pasien</h1>
        <h4>
        <small>Tambah data pasien</small>
        <div class="pull-right">
            <a href="data_pasien.php" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="noidentitas">No identitas</label>
                        <input type="text" name="noidentitas" id="noidentitas" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="namapasien">Nama pasien</label>
                        <input type="text" name="namapasien" id="namapasien" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis kelamin</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="L" required>Laki - laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="P" required>Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notelp">No. Telp</label>
                        <input type="text" name="notelp" id="notelp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
        
<?php include_once ('../footer.php'); ?>