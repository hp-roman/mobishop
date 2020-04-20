<?php
    session_start();
    include('controller/c_user.php');
    $c_user = new C_user();
    $id = $_GET['id'];
    if(isset($_SESSION['admin'])){
        $c_user->deleteUser($id);
        header('location:dashboard-user.php');
    }
    else{
        header('location:admin.php');
    }
?>