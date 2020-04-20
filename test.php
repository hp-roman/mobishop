<?php
    session_start();
    include('controller/c_sanpham.php');
    $c_sanpham = new C_sanpham();
    if(isset($_SESSION['admin'])){
        if(isset($_POST['them'])){
            $tieude = $_POST['tieude'];
            $tomtat = $_POST['tomtat'];
            $image = $_POST['image'];
            $gia = $_POST['gia'];
            $noidung = $_POST['noidung'];
            print_r($image);
        }
    }
    else{
        header('location:index.php');
    }
?>