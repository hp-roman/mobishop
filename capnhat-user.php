<?php
    session_start();
    include('controller/c_user.php');
    $c_user = new C_user();
    if(isset($_SESSION['admin']) && isset($_POST['btnUpdate'])){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $c_user->updateUser($id, $name, $phone);
        header('location:dashboard-user.php');
    }
    else{
        header('location:admin.php');
    }
?>