<?php
    session_start();
    include('controller/c_sanpham.php');
    $c_sanpham = new C_sanpham();
    $id = $_GET['id'];
    if(isset($_SESSION['user_name'])){
        $carts = $_SESSION['giohang'];
        foreach($carts as $cart){
            if($cart->id == $id){
                $c_sanpham->deleteCart($id);
                header('location:giohang.php');
                exit();
            }
        }
        // echo "<h1 style='text-align:center; color: blue;'>Không có quyền xóa!</h1>";
        header('location:giohang.php');
    }
    else{
        header('location:index.php');
    }
?>