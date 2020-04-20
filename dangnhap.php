<?php 
    include('controller/c_user.php');
    $c_user = new C_user();
    if(isset($_POST['dangnhap'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $c_user->dangnhap($email, md5($password));
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <?php
                    if(isset($_SESSION['user_error'])){
                        echo "<div class='alert alert-danger'>".$_SESSION['user_error']."</div>";
                    }
                ?>
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng nhập</div>
				  	<div class="panel-body">
				    	<form method="POST" action="#">
							<div>   
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" 
							  	>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<br>
							<button type="submit" name="dangnhap" class="btn btn-success">Đăng nhập
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>

        <!-- end slide -->
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/my.js"></script>
</body>

</html>
