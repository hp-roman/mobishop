<?php
session_start();
include('controller/c_sanpham.php');
$c_sanpham = new C_sanpham();
if (isset($_SESSION['admin'])) {
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $c_sanpham->deleteProduct($id);
        header('location:list-product.php');
    }
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $tieude = $_POST['tieude'];
        $ten = $_POST['ten'];
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $gia = $_POST['gia'];
        $arr = array($tieude, $ten, $tomtat, $noidung, $gia);
        $c_sanpham->updateProduct($id, $arr);
        header('location:list-product.php');
    }
} else {
    header('location:admin.php');
}