<?php include_once ('../header.php'); ?>

<?php require_once '../config/koneksi.php'?>

<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
    <div class="box">
        <h1>Obat</h1>
        <h4>
        <small>Data daftar obat</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="add_obat.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Add-data</i></a>
        </div>
        </h4>
        <div style="margin-bottom: 20px;">
            <form class="form-inline" action="" method="post">
                <div class="form-group">
                    <input type="text" name="pencarian" class="form-control" placeholder="pencarian"> 
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                    <tr align="center">
                        <th>No.</th>    
                        <th>Nama Obat</th>
                        <th>Keterangan Obat</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no_urut = 1;
                    //pagination
                    $batas = 5;
                    $hal = @$_GET['hal'];
                    if(empty($hal)){
                        $posisi = 0;
                        $hal = 1;
                    } else {
                        $posisi = ($hal -1) * $batas;
                    } 

                    //pencarian
                    if($_SERVER['REQUEST_METHOD'] == "POST"){
                        $pencarian = trim(mysqli_real_escape_string ($koneksi, $_POST['pencarian']));
                        if($pencarian != ''){
                            $sql = "SELECT * FROM obat WHERE nama_obat LIKE '%$pencarian%'";
                            $query = $sql;
                            $queryjml = $sql;
                        } else {
                            $query = "SELECT * FROM obat LIMIT $posisi, $batas";
                            $queryjml = "SELECT * FROM obat";
                            $no_urut = $posisi + 1 ;
                        }
                    } else {
                        $query = "SELECT * FROM obat LIMIT $posisi, $batas";
                        $queryjml = "SELECT * FROM obat";
                        $no_urut = $posisi + 1 ;
                    }

                    //query untuk memanggil data dari table obat database rumahsakit
                    $query_obat = mysqli_query ($koneksi, $query) or die (mysqli_error($koneksi));
                    //query untuk mengecek data row pada table obat
                    $cek_row = mysqli_num_rows ($query_obat);
                    //looping untuk menampilkan data table
                    if($cek_row > 0){
                        //deklarasi variable no urut table
                        
                        while ( $data = mysqli_fetch_assoc($query_obat)){
                            echo '
                                    <tr>
                                        <td>'.$no_urut.'.</td>
                                        <td>'.$data['nama_obat'].'</td>
                                        <td>'.$data['ket_obat'].'</td>
                                        <td class="text-center">
                                            <a href="edit_obat.php?id='.urlencode($data['id_obat']).'" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                            <a href="delete_obat.php?id='.urlencode($data['nama_obat']).'" class="btn btn-danger btn-xs" onClick="return confirm(\'Apakah Anda yakin menghapus data ini ?\')"><i class="glyphicon glyphicon-trash"></i></a>
                                        </td>
                                    </tr>
                            ';
                        $no_urut++;
                        }                        
                    } else {
                        echo '<tr>
                                    <td colspan="4">Tidak ada data di database !!!</td>
                        </tr>';
                    }

                ?>
                </tbody>
            </table>
        </div>
        <?php
        if(isset($_POST['pencarian'])){
            echo "<div style=\"float:left;\">";
            $jml = mysqli_num_rows (mysqli_query($koneksi, $queryjml));
            echo "Data hasil pencarian : <b>$jml</b>";
            echo "</div>";
        } else { ?>
            <div style="float:left;">
                <?php
                $jml = mysqli_num_rows (mysqli_query($koneksi, $queryjml));
                echo "Jumlah data : <b>$jml</b>";
                ?>
            </div>
        <?php 
        }
        ?>
            <div style="float:right;">
                <ul class="pagination pagination-sm" style="margin:0">
                    <?php
                    $jml_hal = ceil($jml / $batas);
                    for ($i=1; $i <= $jml_hal; $i++){
                        if($i != $hal){
                            echo "<li><a href=\"?hal=$i\">$i</a></li>";
                        } else {
                        echo "<li class=\"active\"><a>$i</a></li>";
                        }
                    }
                    ?>
                </ul>
            </div>
    </div>

<?php include_once ('../footer.php'); ?>