<?php include_once ('../header.php'); ?>

<?php require_once ('../config/koneksi.php')?>

<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
    <div class="box">
        <h1>Poliklinik</h1>
        <h4>
        <small>Data poliklinik</small>
        <div class="pull-right">
            <a href="data_poli.php" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="generate.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Add-data</i></a>
        </div>
        </h4>
        <div style="margin-bottom: 20px;">
            <form class="form-inline" action="" method="post" name="pencarian">
                <div class="form-group">
                    <input type="text" name="pencarian" class="form-control" placeholder="pencarian"> 
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </form>
        </div>
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                    <tr align="center">
                        <th>No.</th>    
                        <th>Nama Poliklinik</th>
                        <th>Gedung</th>
                        <th>
                            <center>
                                <input type="checkbox" id="select_all" value="">
                            </center>
                        </th>
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
                    if(isset($_POST['pencarian'])){
                        $pencarian = $_POST['pencarian'];
                        if($pencarian != ''){
                            $sql = "SELECT * FROM poliklinik WHERE nama_poli LIKE '%$pencarian%'";
                            $query = $sql;
                            $queryjml = $sql;
                        } else {
                            $query = "SELECT * FROM poliklinik LIMIT $posisi, $batas";
                            $queryjml = "SELECT * FROM poliklinik";
                            $no_urut = $posisi + 1 ;
                        }
                    } else {
                        $query = "SELECT * FROM poliklinik LIMIT $posisi, $batas";
                        $queryjml = "SELECT * FROM poliklinik";
                        $no_urut = $posisi + 1 ;
                    }

                    //query untuk memanggil data dari table poliklinik database rumahsakit
                    $query_poli = mysqli_query ($koneksi, $query) or die (mysqli_error($koneksi));
                    //query untuk mengecek data row pada table poliklinik
                    $cek_row = mysqli_num_rows ($query_poli);
                    //looping untuk menampilkan data table
                    if($cek_row > 0){
                        //deklarasi variable no urut table
                        
                        while ( $data = mysqli_fetch_assoc($query_poli)){ ?>
                            <tr>
                                <td><?=$no_urut ?></td>
                                <td><?=$data['nama_poli'] ?></td>
                                <td><?=$data['gedung'] ?></td>
                                <td class="text-center">
                                    <center>
                                        <input type="checkbox" name="checked[]" class="check" value="<?=$data['id_poli'] ?>">
                                    </center>
                                </td>
                            </tr>
                        <?php
                        $no_urut++;
                        }                        
                    } else {
                        ?>
                        <tr>
                                <td colspan="4">Tidak ada data di database !!!</td>
                        </tr>
                    <?php
                    
                    }

                ?>
                </tbody>
            </table>
        </div>
        </form>

        <div class="box pull-right" style="margin-bottom: 30px;">            
            <button class="btn btn-warning btn-sm" onclick="editpoli()"><i class="glyphicon glyphicon-edit"></i>  Update  </button>
            <button class="btn btn-danger btn-sm" onclick="hapuspoli()"><i class="glyphicon glyphicon-trash"></i>  Delete  </button>
        </div>

        <?php
        if(isset($_POST['pencarian'])){
            echo "<div style=\"margin-top:10px;\">";
            $jml = mysqli_num_rows (mysqli_query($koneksi, $queryjml));
            echo "Data hasil pencarian : <b>$jml</b>";
            echo "</div>";
        } else { ?>
            <div style="margin-top:10px;">
                <?php
                $jml = mysqli_num_rows (mysqli_query($koneksi, $queryjml));
                echo "Jumlah data : <b>$jml</b>";
                ?>
            </div>
        <?php 
        }
        ?>
            <div style="float:left;">
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

    <script src="../assets/js/jquery.js"></script>


    <script>

    $(document).ready(function(){
        $('#select_all').on('click', function () {            
            if(this.checked) {
                $('.check').each(function(){
                    this.checked = true;
                })
            } else {
                $('.check').each(function(){
                    this.checked = false;
                })
            }
        })

        $('.check').on('click', function() {
            if ($('.check:checked').length == $('.check').length){
                $('#select_all').prop('checked',true)
            } else {
                $('#select_all').prop('checked',false)
            }
        })
    })


    
    function editpoli(){
        document.proses.action = 'edit_poli.php';
        document.proses.submit();
    }

    function hapuspoli(){
        var konfir = confirm('Apakah Anda yakin akan menghapus data ini ?');

        if(konfir){
            document.proses.action = 'delete_poli.php';
            document.proses.submit();
        }
    }

    </script>


<?php include_once ('../footer.php'); ?>