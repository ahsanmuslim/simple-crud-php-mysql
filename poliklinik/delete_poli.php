<?php
require_once '../config/koneksi.php';


$check = $_POST['checked'];
$jmldel = count($check);

if(!isset($check)){
    echo "<script>alert('Tidak ada data yang di pilih !!'); window.location = 'data_poli.php'</script>";
} else {

    foreach ($check as $idpoli){

        $sql_delete = mysqli_query ($koneksi, "DELETE FROM poliklinik WHERE id_poli = '$idpoli'") or die (mysqli_error($koneksi));
    }

    //alert jika penyimpanan berhasil / gagal
    if($sql_delete){
        echo "<script>alert('Berhasil hapus $jmldel data'); window.location='data_poli.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus data');window.location='data_poli.php';</script>";
    }

}

?>