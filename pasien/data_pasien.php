<?php include_once ('../header.php'); ?>

<a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Toggle Menu</a><br>
    <div class="box">
        <h1>Pasien</h1>
        <h4>
        <small>Data daftar pasien</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="add_pasien.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Add-data</i></a>
            <a href="import.php" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-plus">Import-pasien</i></a>
        </div>
        </h4>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="tblpasien">
                <thead>
                    <tr>
                        <th>No. Identitas</th>    
                        <th>Nama pasien</th>
                        <th>Jenis kelamin</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
            </table>
        </div>        
    </div>


    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/libs/DataTables/datatables.min.js"></script>
    <script src="../assets/libs/DataTables/Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="../assets/libs/DataTables/Buttons-1.6.1/js/buttons.print.min.js"></script>
    <script src="../assets/libs/DataTables/Buttons-1.6.1/js/dataTables.select.min.js"></script>

    

    <script type="text/javascript">

    $(document).ready(function() {


    } );

    $('#tblpasien').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "getData.php",

            dom : 'Bfrtip',
            buttons: [
                {
                    extend : 'pdf',
                    orientation : 'potrait',
                    pageSize : 'A4',
                    title : 'Data Pasien',
                    download : 'open'
                },
                'csv', 'excel', 'print', 'copy'
            ],
                                
            columnDefs : [
                {
                    "searchable" : false,
                    "orderable" : false,
                    "targets" : 5,
                    "render" : function(data, type, row){
                        var btn="<center><a href=\"edit_pasien.php?id="+data+"\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a>  <a href=\"delete_pasien.php?id="+data+"\" onClick=\"return confirm(\'Apakah Anda yakin menghapus data ini ?\')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"></i></a></center>";
                        return btn;
                    }
                }
            ]

    } );


    </script>



<?php include_once ('../footer.php'); ?>