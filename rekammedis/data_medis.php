<?php include_once ('../header.php'); ?>

<?php require_once '../config/koneksi.php'?>

<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
<div class="box">
        <h1>Rekam Medis</h1>
        <h4>
        <small>Data daftar rekam medis</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="add_medis.php" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-plus">Add-data</i></a>
        </div>
        </h4>

        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="medis">
                <thead class="thead-light">
                    <tr align="center">
                        <th>
                            <center>
                                <input type="checkbox" id="select_all" value="">
                            </center>
                        </th>
                        <th>No.</th>  
                        <th>Tanggal periksa</th>  
                        <th>Nama Pasien</th>
                        <th>Poliklinik</th>
                        <th>Dokter</th>
                        <th>Keluhan</th>
                        <th>Diagnosa</th>
                        <th>Jenis Obat</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM medis 
                    join pasien on pasien.id_pasien=medis.id_pasien 
                    join dokter on dokter.id_dokter=medis.id_dokter
                    join poliklinik on poliklinik.id_poli=medis.id_poli 
                    ORDER BY nama_pasien ASC";
                    //query untuk memanggil data dari table obat database rumahsakit
                    $query_medis = mysqli_query ($koneksi, $sql) or die (mysqli_error($koneksi));
                    //query untuk mengecek data row pada table obat
                    $cek_row = mysqli_num_rows ($query_medis);
                    //looping untuk menampilkan data table
                    if($cek_row > 0){
                        //deklarasi variable no urut table
                        $no_urut = 1;
                        while ( $data = mysqli_fetch_assoc($query_medis)){ ?>
                                    <tr>
                                        <td class="text-center">
                                            <center>
                                                <input type="checkbox" name="checked[]" class="check" value="<?=$data['id_medis'] ?>">
                                            </center>
                                        </td>
                                        <td><?=$no_urut?></td>
                                        <td><?=date('d F Y',strtotime($data['tgl_periksa'])) ?></td>
                                        <td><?=$data['nama_pasien'] ?></td>
                                        <td><?=$data['nama_poli'] ?></td>
                                        <td><?=$data['nama_dokter'] ?></td>
                                        <td><?=$data['keluhan'] ?></td>
                                        <td><?=$data['diagnosa'] ?></td>
                                        <td>
                                        <?php
                                            $id_medis = $data['id_medis'];
                                            $sql_obat = mysqli_query($koneksi,"SELECT * FROM detail_obat JOIN obat on detail_obat.id_obat=obat.id_obat WHERE id_medis='$id_medis'") or die (mysqli_error($koneksi));
                                            while ( $detail = mysqli_fetch_assoc ($sql_obat) ){
                                                echo $detail['nama_obat']."<br>";
                                            }
                                            
                                        ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="edit_medis.php?id=<?=urlencode($data['id_medis'])?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                        </td>
                                    </tr>
                        <?php
                        $no_urut++;
                        }                        
                    } else {
                        echo '<tr>
                                    <td colspan="9">Tidak ada data di database !!!</td>
                        </tr>';
                    }

                ?>
                </tbody>
            </table>
        </div>
        </form>
    
        <div class="box pull-right" style="margin-bottom: 30px;">            
            <button class="btn btn-danger btn-sm" onclick="hapusmedis()"><i class="glyphicon glyphicon-trash"></i>  Delete  </button>
        </div>
    </div>

    <script src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/libs/DataTables/datatables.min.js')?>"></script>
    <script src="../assets/libs/DataTables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="../assets/libs/DataTables/Buttons-1.6.1/js/buttons.print.min.js"></script>
    <script src="../assets/libs/DataTables/Buttons-1.6.1/js/dataTables.select.min.js"></script>

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

    $('#medis').DataTable({

        columnDefs: [
            {
                "searchable" : false,
                "orderable" : false,
                "targets" : [0, 6]
            }
        ],
        "order": [2, "asc"]
    });

    function hapusmedis(){
        var konfir = confirm('Apakah Anda yakin akan menghapus data ini ?');

        if(konfir){
            document.proses.action = 'delete_medis.php';
            document.proses.submit();
        }
    }

</script>


<?php include_once ('../footer.php'); ?>