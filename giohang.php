<?php
    session_start();
    include('controller/c_sanpham.php');
	$c_sanpham = new C_sanpham();
    if(isset($_SESSION['user_name'])){
        $id_user= $_SESSION['id_user'];
        $giohang = $c_sanpham->getCart($id_user);
        $carts = $giohang['giohang'];
        $_SESSION['giohang'] = $carts;
    }
    else{
        echo "<h1 style='text-align:center'>VUI LÒNG ĐĂNG NHẬP ĐỂ THỰC HIỆN CHỨC NĂNG NÀY!</h1>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SHOP ĐIỆN MÁY</title>
    <link rel="shortcut icon" type="image/png" href="assets/image/favicon.ico"/>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/shop-homepage.css" rel="stylesheet">
    <link href="assets/css/my.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet"> 

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Trang chủ</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search">
	                <div class="input-group">
                        <input type="text"  id="txtSearch" class="form-control" placeholder="Nhập từ khóa">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-success" id="btnSearch"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
			    <ul class="nav navbar-nav">
                   <?php 
                        if(isset($_SESSION['user_name'])){
                            ?>
                                <li>
                                    <a><span class ="glyphicon glyphicon-user"></span>
                                    <?=$_SESSION['user_name']?></a>
                                </li>

                                <li>
                                    <a href="dangxuat.php">Đăng xuất</a>
                                </li>
                                <li>
                                    <a href="giohang.php">Giỏ hàng</a>
                                </li>
                            <?php

                        }
                        else{
                            ?>
                                <li>
                                    <a href="dangki.php">Đăng ký</a>
                                </li>
                                 <li>
                                    <a href="dangnhap.php">Đăng nhập</a>
                                 </li>
                            <?php

                        }
                    
                    ?>
                    
                    
                </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <h2 style="text-align:center; color: red; font-family: 'Times New Roman, Times, serif'; font-style: italic">GIỎ HÀNG</h2>
            <table class="table table-hover">
            <tr class="info">
                <th>Tên Sản Phẩm</th>
                <th>Số Lượng</th>
                <th>Giá</th>
                <th>Tổng Tiền</th>
                <th>Thời Gian Đặt Hàng</th>
                <th>Thay Đổi</th>
            </tr>
            <?php 
                foreach($carts as $cart){
                    ?>
                    <form method="POST" action="capnhatgiohang.php?id=<?=$cart->id?>&gia=<?=$cart->gia?>">
                    <tr>
                        <td name="ten"><?=$cart->tensanpham?></td>
                        <td>
                            <input type="number" value="<?=$cart->soluong?>" class="form-control" name="soluong" min="1">
                        </td>
                        <td><?=$cart->gia?> đ</td>
                        <td><?=$cart->tongtien?> đ  </td>
                        <td><?=$cart->ngaydat?></td>
                        <td>
                            <input type="submit" name="btnUpdate" class="btn btn-success" value="Cập nhật">
                            <a class="btn btn-danger" href="xoagiohang.php?id=<?=$cart->id?>">
                                Hủy
                            </a>
                        </td>
                    </tr>
                    </form>
                    <?php
                }
            
            ?>
            </table>
        </div>

        <!-- end slide -->
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/my.js"></script>
</body>

</html>
