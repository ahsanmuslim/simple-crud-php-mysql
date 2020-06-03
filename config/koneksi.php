<?php

date_default_timezone_set('Asia/Jakarta');
session_start();

include_once "conn.php";

$koneksi = mysqli_connect ($conno['host'], $conno['user'], $conno['pass'], $conno['db']);
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}

function base_url ($url = null){
    $base_url = "http://localhost/myapps/rumahsakit";
    if($url != null){
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}

?>

