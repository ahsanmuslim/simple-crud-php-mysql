<?php

//cek 
$check = $_POST['checked'];


if(!isset($check)){
    echo "<script>alert('Tidak ada data yang di pilih !!'); window.location = 'data_poli.php'</script>";
} else {

    include_once ('../header.php');
    require_once '../config/koneksi.php';

    ?>

        <div class="box">
            <h1>Poliklinik</h1>
            <h4>
            <small>Edit data poliklinik</small>
            <div class="pull-right">
                <a href="data_poli.php" class="btn btn-warning btn-block btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
            </h4>
            <div class="row" style="margin-top: 30px;">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Nama poliklinik</th>
                                    <th>Gedung</th>
                                </tr>
                                <?php
                                $no_urut = 1;
                                foreach ($check as $id_poli){
                                    $sql_edit = mysqli_query ($koneksi, "SELECT * FROM poliklinik WHERE id_poli = '$id_poli'") or die (mysqli_error($koneksi));
                                    while ($data = mysqli_fetch_assoc($sql_edit)) { ?>
                                    <tr>
                                        <td><?=$no_urut++?></td>
                                        <td>
                                            <input type="hidden" name="id_poli[]" value="<?=$data['id_poli']?>" class="form-control" required>
                                            <input type="text" name="nama[]" value="<?=$data['nama_poli']?>" class="form-control" required>
                                        </td>
                                        <td>
                                        <input type="text" name="gedung[]" value="<?=$data['gedung']?>" class="form-control" required>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                            <div class="form-group pull-right">
                                <input type="submit" name="editpoli" value="Update all" class="btn btn-info btn-sm" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            
    <?php 
    include_once ('../footer.php'); 
}    
?>