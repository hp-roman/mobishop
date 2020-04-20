<?php
    session_start();
    include('controller/c_sanpham.php');
    $c_sanpham = new C_sanpham();
    if(isset($_SESSION['admin'])){
        if(isset($_POST['delete'])){
            $id = $_GET['id'];
            $c_sanpham -> deleteProduct($id);
            header('location:list-product.php');
        }
    }
    else{
        header('location:admin.php');
    }
?>