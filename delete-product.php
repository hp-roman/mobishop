<?php
    session_start();
    include('controller/c_sanpham.php');
    $c_sanpham = new C_sanpham();
    echo $_POST['id'];
    var_dump($_POST); die();
    if(isset($_SESSION['admin'])){
        if(isset($_POST['delete'])){
            $id = $_POST['id'];
            $c_sanpham -> deleteProduct($id);
            header('location:list-product.php');
        }
    }
    else{
        header('location:admin.php');
    }
?>