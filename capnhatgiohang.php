<?php 
    session_start();
    include('controller/c_sanpham.php');
    $c_sanpham = new C_sanpham();
    if(isset($_POST['btnUpdate'])){
        $soluong = $_POST['soluong'];
        $id = $_GET['id'];
        $gia = $_GET['gia'];
        $c_sanpham->updateCart($id, $soluong, $gia);
        header('location:giohang.php');
    }

?>