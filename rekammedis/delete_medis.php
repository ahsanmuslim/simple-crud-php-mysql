<?php
require_once '../config/koneksi.php';


$check = (!empty($_POST['checked']) ? $_POST['checked'] : null );
$jmldel = (is_countable($check) ? count($check) : null);

if(isset($check)){

    foreach ($check as $id_medis){

        $sql_delete = mysqli_query ($koneksi, "DELETE FROM medis WHERE id_medis = '$id_medis'") or die (mysqli_error($koneksi));
    }

    //alert jika penyimpanan berhasil / gagal
    if($sql_delete){
        echo "<script>alert('Berhasil hapus $jmldel data'); window.location='data_medis.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus data');window.location='data_medis.php';</script>";
    }

    
} else {

    echo "<script>alert('Tidak ada data yang di pilih !!');window.location='data_medis.php';</script>";

}

?>