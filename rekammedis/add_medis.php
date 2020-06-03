<?php include_once ('../header.php'); ?>

<?php require_once '../config/koneksi.php'?>



<div class="box">
        <h1>Rekam Medis</h1>
        <h4>
        <small>Tambah rekam medis</small>
        <div class="pull-right">
            <a href="data_medis.php" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="tanggal">Tanggal periksa</label>
                        <input type="date" name="tanggal" id="tanggal" value="<?=date('Y-m-d')?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pasien">Nama pasien</label>
                        <select name="pasien" id="pasien" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php
                            $query_pasien = mysqli_query ($koneksi, "SELECT * FROM pasien ORDER by nama_pasien ASC") or die (mysqli_error($koneksi));
                            if(mysqli_num_rows ($query_pasien) > 0){
                                while($data = mysqli_fetch_assoc($query_pasien)){
                                    echo '<option value="'.$data['id_pasien'].'">'.$data['nama_pasien'].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="poli">Poliklinik</label>
                        <select name="poli" id="poli" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php
                            $query_poli = mysqli_query ($koneksi, "SELECT * FROM poliklinik ORDER by id_poli ASC") or die (mysqli_error($koneksi));
                            if(mysqli_num_rows ($query_poli) > 0){
                                while($data = mysqli_fetch_assoc($query_poli)){
                                    echo '<option value="'.$data['id_poli'].'">'.$data['nama_poli'].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dokter">Dokter</label>
                        <select name="dokter" id="dokter" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php
                            $query_dokter = mysqli_query ($koneksi, "SELECT * FROM dokter ORDER by nama_dokter ASC") or die (mysqli_error($koneksi));
                            if(mysqli_num_rows ($query_dokter) > 0){
                                while($data = mysqli_fetch_assoc($query_dokter)){
                                    echo '<option value="'.$data['id_dokter'].'">'.$data['nama_dokter'].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea name="keluhan" id="keluhan" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa</label>
                        <textarea name="diagnosa" id="diagnosa" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="obat">Obat</label>
                        <select multiple name="obat[]" id="obat" class="form-control" size="7" required>
                            <?php
                            $query_obat = mysqli_query ($koneksi, "SELECT * FROM obat ORDER by nama_obat ASC") or die (mysqli_error($koneksi));
                            if(mysqli_num_rows ($query_obat) > 0){
                                while($data = mysqli_fetch_assoc($query_obat)){
                                    echo '<option value="'.$data['id_obat'].'">'.$data['nama_obat'].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group pull-right">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                        <input type="submit" name="reset" value="Reset" class="btn btn-default">
                    </div>
                </form>
                <script>
                    CKEDITOR.replace( 'keluhan' );
                </script>
            </div>
        </div>
    </div>


<?php include_once ('../footer.php'); ?>