<?php
    
    include('controller/c_user.php');
    $c_user = new C_user();
    if(isset($_POST['dangki'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['passwordAgain'];
        if($password == $repassword){
            $user = $c_user->dangkiTK($name, $phone, $email, $password);

        }
        else{
            $_SESSION['error']='Mật khẩu phải trùng nhau!';
        }
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
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <?php 
                    if(isset($_SESSION['error'])){
                        echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
                    }
                
                ?>
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng ký tài khoản</div>
				  	<div class="panel-body">
				    	<form method="POST" action="#">
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Nhập tên" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
                            <div>
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" placeholder="Phone" name="phone" aria-describedby="basic-addon1">
                            </div>
                            <br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>	
							<div>
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
							</div>
							<br>
							<input type="submit" name="dangki" class="btn btn-danger" value="Register">
							

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->


    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/my.js"></script>
</body>

</html>
