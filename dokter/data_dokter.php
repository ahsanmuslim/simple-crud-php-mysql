<?php include_once ('../header.php'); ?>

<?php require_once '../config/koneksi.php'?>

<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
    <div class="box">
        <h1>Dokter</h1>
        <h4>
        <small>Data daftar dokter</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="add_dokter.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Add-data</i></a>
        </div>
        </h4>

        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="dokter">
                <thead class="thead-light">
                    <tr align="center">
                        <th>
                            <center>
                                <input type="checkbox" id="select_all" value="">
                            </center>
                        </th>
                        <th>No.</th>    
                        <th>Nama dokter</th>
                        <th>Spesialis</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM dokter ORDER BY nama_dokter ASC";
                    //query untuk memanggil data dari table obat database rumahsakit
                    $query_dokter = mysqli_query ($koneksi, $query) or die (mysqli_error($koneksi));
                    //query untuk mengecek data row pada table obat
                    $cek_row = mysqli_num_rows ($query_dokter);
                    //looping untuk menampilkan data table
                    if($cek_row > 0){
                        //deklarasi variable no urut table
                        $no_urut = 1;
                        while ( $data = mysqli_fetch_assoc($query_dokter)){ ?>
                                    <tr>
                                        <td class="text-center">
                                            <center>
                                                <input type="checkbox" name="checked[]" class="check" value="<?=$data['id_dokter'] ?>">
                                            </center>
                                        </td>
                                        <td><?=$no_urut?></td>
                                        <td><?=$data['nama_dokter'] ?></td>
                                        <td><?=$data['spesialis'] ?></td>
                                        <td><?=$data['alamat'] ?></td>
                                        <td><?=$data['no_telp'] ?></td>
                                        <td class="text-center">
                                            <a href="edit_dokter.php?id=<?=urlencode($data['id_dokter'])?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                        </td>
                                    </tr>
                        <?php
                        $no_urut++;
                        }                        
                    } else {
                        echo '<tr>
                                    <td colspan="7">Tidak ada data di database !!!</td>
                        </tr>';
                    }

                ?>
                </tbody>
            </table>
        </div>
        </form>
    
        <div class="box pull-right" style="margin-bottom: 30px;">            
            <button class="btn btn-danger btn-sm" onclick="hapusdokter()"><i class="glyphicon glyphicon-trash"></i>  Delete  </button>
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

    $('#dokter').DataTable({

        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdf',
                orientation: 'potrait',
                pageSize: 'A4',
                title: 'Data dokter',
                download: 'open'
            },
            'csv', 'excel', 'print', 'copy'
        ],

        columnDefs: [
            {
                "searchable" : false,
                "orderable" : false,
                "targets" : [0, 6]
            }
        ],
        "order": [2, "asc"]
    });

    function hapusdokter(){
        var konfir = confirm('Apakah Anda yakin akan menghapus data ini ?');

        if(konfir){
            document.proses.action = 'delete_dokter.php';
            document.proses.submit();
        }
    }

</script>


<?php include_once ('../footer.php'); ?>