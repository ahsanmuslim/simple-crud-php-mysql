<?php

include_once ('../header.php');
require_once '../config/koneksi.php';

?>

    <div class="box">
        <h1>Pasien</h1>
        <h4>
        <small>Update data pasien</small>
        <div class="pull-right">
            <a href="data_pasien.php" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>

        <?php
        if(isset($_GET['id'])){

            $id_pasien = $_GET['id'];
            $sql = mysqli_query ($koneksi, "SELECT * FROM pasien WHERE id_pasien = '$id_pasien'") or die (mysqli_error($koneksi));
            $data = mysqli_fetch_assoc ($sql);

        }
            
        ?>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="noidentitas">No identitas</label>
                        <input type="hidden" name="id_pasien" id="id_pasien" class="form-control" value="<?=$data['id_pasien']?>" required>
                        <input type="text" name="noidentitas" id="noidentitas" class="form-control" value="<?=$data['nomor_identitas']?>" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="namapasien">Nama pasien</label>
                        <input type="text" name="namapasien" id="namapasien" class="form-control" value="<?=$data['nama_pasien']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis kelamin</label>
                        <div>
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="L" <?php if($data['jenis_kelamin'] == 'L') { echo 'checked';} ?> required>Laki - laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="jk" id="jk" value="P" <?php if($data['jenis_kelamin'] == 'P') { echo 'checked';} ?> required>Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control"><?=$data['alamat']?></textarea>
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