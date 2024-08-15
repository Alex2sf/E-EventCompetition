<?php
session_start();
require 'connect.php';
$id = $_GET['id'];

$query_runs = mysqli_query($conn, "DELETE FROM peserta WHERE id = '$id' ");

if($query_runs){
    $_SESSION['message'] = "Berhasil Menghapus Data Peserta";
        header("Location: adminhome.php");
        exit(0);
}else{
    $_SESSION['message'] = "Gagal Menghapus Data Peserta";
        header("Location: adminhome.php");
        exit(0);
}

?>

