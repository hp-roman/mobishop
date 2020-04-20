<?php
    session_start();
    include('controller/c_sanpham.php');
    $c_sanpham = new C_sanpham();
    $id = $_GET['id'];
    if(isset($_SESSION['admin'])){
        $c_sanpham->deleteCart($id);
        header('location:dashboard-cart.php');
    }
    else{
        header('location:admin.php');
    }
?>