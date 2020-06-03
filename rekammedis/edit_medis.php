<?php include_once ('../header.php'); ?>

<?php require_once '../config/koneksi.php'?>


<?php
    //proses jika tombol edit pada tabel di tekan
    if(isset($_GET['id'])){
        //membuat variable untuk menampung data dari URL _get['id']
        $id_medis = $_GET['id'];

        //membuat query untuk memilih data dengan id $nama dari database
        $query_pilih = "SELECT * FROM medis WHERE id_medis = '$id_medis'";
        $pilih = mysqli_query ($koneksi, $query_pilih) or die(mysqli_error($koneksi));

        //menyimpan data row dari database ke dalam variable data_edit
        $data = mysqli_fetch_assoc ($pilih);

    }

?>




<div class="box">
        <h1>Rekam Medis</h1>
        <h4>
        <small>Edit rekam medis</small>
        <div class="pull-right">
            <a href="data_medis.php" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
        </h4>
        <div class="row" style="margin-top: 30px;">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">

                    <div class="form-group">
                        <input type="hidden" name="id_medis" id="id_medis" value="<?=$data['id_medis']?>" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal periksa</label>
                        <input type="date" name="tanggal" id="tanggal" value="<?=$data['tgl_periksa']?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="pasien">Nama pasien</label>
                        <select name="pasien"  class="form-control">
                        <?php
                        
                        $query = "SELECT * FROM pasien ORDER by nama_pasien ASC";
                        $tampilpasien = mysqli_query ($koneksi, $query) or die(mysqli_error($koneksi));

                        while($datapasien = mysqli_fetch_assoc($tampilpasien)){
                            if($data['id_pasien'] == $datapasien['id_pasien']){
                                echo '<option value="'.$datapasien['id_pasien'].'" selected>'.$datapasien['nama_pasien'].'</option>';
                            } else {
                                echo '<option value="'.$datadatapasien2['id_pasien'].'">'.$datapasien['nama_pasien'].'</option>';
                            }                     
                        }
                        ?>   
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dokter">Dokter</label>
                        <select name="dokter"  class="form-control">
                        <?php
                        
                        $query = "SELECT * FROM dokter ORDER by nama_dokter ASC";
                        $tampildokter = mysqli_query ($koneksi, $query) or die(mysqli_error($koneksi));

                        while($datadokter = mysqli_fetch_assoc($tampildokter)){
                            if($data['id_dokter'] == $datadokter['id_dokter']){
                                echo '<option value="'.$datadokter['id_dokter'].'" selected>'.$datadokter['nama_dokter'].'</option>';
                            } else {
                                echo '<option value="'.$datadokter['id_dokter'].'">'.$datadokter['nama_dokter'].'</option>';
                            }                     
                        }
                        ?>   
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="poli">Poliklinik</label>
                        <select name="poli"  class="form-control">
                        <?php
                        
                        $query = "SELECT * FROM poliklinik ORDER by nama_poli ASC";
                        $tampilpasien = mysqli_query ($koneksi, $query) or die(mysqli_error($koneksi));

                        while($datapoli = mysqli_fetch_assoc($tampilpasien)){
                            if($data['id_poli'] == $datapoli['id_poli']){
                                echo '<option value="'.$datapoli['id_poli'].'" selected>'.$datapoli['nama_poli'].'</option>';
                            } else {
                                echo '<option value="'.$datapoli['id_poli'].'">'.$datapoli['nama_poli'].'</option>';
                            }                     
                        }
                        ?>   
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea name="keluhan" id="keluhan" class="form-control"><?=$data['keluhan']?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Diagnosa">Diagnosa</label>
                        <textarea name="diagnosa" id="diagnosa" class="form-control"><?=$data['diagnosa']?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="obat">Obat</label>
                        <select multiple name="obat[]" id="obat" class="form-control" size="7" required>
                            <?php

                            $query_obat = mysqli_query ($koneksi , "SELECT * FROM obat") or die (mysqli_error ($koneksi));                         

                            while ($data3 = mysqli_fetch_array ($query_obat)){

                                $list_obat = mysqli_query ($koneksi , "SELECT nama_obat FROM detail_obat JOIN obat on detail_obat.id_obat = obat.id_obat WHERE id_medis = '$id_medis'") or die (mysqli_error ($koneksi));

                                $select_attribute = '';

                                while ($dataobat = mysqli_fetch_array($list_obat)){

                                    if ($data3['nama_obat'] == $dataobat['nama_obat']){                                        
                                        $select_attribute = 'selected';
                                    } 
                                    
                                }
                                echo '<option value="'.$data3['id_obat'].'"'.$select_attribute.'>'.$data3['nama_obat'].'</option>';
                            }

                            

                            ?>
                        </select>
                    </div>
                    
                    <br>

                    <div class="form-group pull-right">
                        <input type="submit" name="update" value="Update" class="btn btn-warning">
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