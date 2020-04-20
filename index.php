<?php
    session_start();
    include('controller/c_sanpham.php');
	$c_sanpham = new C_sanpham();
	$noi_dung = $c_sanpham->index();
    $menu = $noi_dung['menu'];
    $sanphamnoibat = $noi_dung['sanphamnoibat'];
    //  print_r($sanphamnoibat);
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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Trang chủ</a>
            </div>
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
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        
                        <div class="item active">
                                    <img src="assets/image/slide2.png" class="slide-image" alt="">
                        </div>
                        <div class="item ">
                                    <img src="assets/image/slide3.png" class="slide-image" alt="">
                        </div>
                        <div class="item">
                                    <img src="assets/image/slide4.png" class="slide-image" alt="">
                        </div>           
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end slide -->

        <div class="space20"></div>


        <div class="row main-left">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                    	Menu
                    </li>
                     <?php
                        foreach ($menu as $mn) {
                            ?>
                            <li href="#" class="list-group-item menu1">
                                <?=$mn->ten?>
                            </li>
                            <ul>
                            <?php
                                $loaitin = explode(',',$mn->LoaiSanPham);
                                foreach($loaitin as $loai){
                                list    ($id, $ten)= explode(':', $loai);
                                ?>
                                <li class="list-group-item">
                                    <a href="loaisanpham.php?id_loai=<?=$id?>"><?=$ten?> </a>
                                </li>
                                <?php
                                
                                }
                            ?>
                                
                            </ul>
                            <?php
                        }
                    ?>
                </ul>
            </div>

            <div class="col-md-9" id="dataSearch">
	            <div class="panel panel-default">
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Sản Phẩm Nổi Bật</h2>
	            	</div>

	            	<div class="panel-body">
                         <!-- START -->
                        <?php
                            foreach($sanphamnoibat as $sanpham){
                                ?>
                                <div class="row-item row">
                                    <h3 style="color:blue"><?=$sanpham->ten?></h3>
		                	        <div class="col-md-12 border-right">
		                		        <div class="col-md-3">
			                                <a href="chitiet.php?id_tin=<?=$sanpham->id?>">
			                                    <img class="img-responsive" src="assets/image/sanpham/<?=$sanpham->image?>" alt="">
			                                </a>
			                            </div>
			                            <div class="col-md-9">
			                                <h3><?=$sanpham->tieude?></h3>
			                                <p><?=$sanpham->tomtat?></p>
			                                <a class="btn btn-primary" href="chitiet.php?id_tin=<?=$sanpham->id?>">Chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
								        </div>
		                	        </div>
							        <div class="break"></div>
		                        </div>
                                <?php
                            }
                        ?>
					    
                        <!-- END -->
					</div>
	            </div>
        	</div>
        </div>
    </div>
    <hr>

    <footer class="container-fluid" style="background-color: DarkCyan ;">
    <div class="row footer-music" style="background-color: DarkCyan ;">
        <div class="col-sm-12">
            <div class="col-md-3 text-center text-md-left">
                <img style="width: 35%; height: auto; margin-bottom: 2rem; margin-top: 2rem"
                    class="img-fluid mb-4" src="assets/image/shoplogo.png">
                <p class="my-p">© 2018 SHOP Điện Tử</p>
                <p class="my-p">Giay phep MXH so 314/GP-BTTTT.</p>
            </div>

            <div class="col-md-3">
                <h5 class="title">BAI DANG MOI NHAT</h5>

                <ul class="list-unstyled pt-3">
                    <li><a href="#">Duis aute irure dolor in
                            reprehe.</a> <br>
                    <small>July 22, 2018</small></li>
                    <li><a href="#">Excepteur sint occaecat.</a> <br>
                    <small>July 22, 2018</small></li>
                    <li><a href="#">Sunt in culpa qui officia.</a> <br>
                    <small>July 22, 2018</small></li>
                </ul>
            </div>

            <div class="col-md-3">
                <h5 class="title">CAP NHAT MOI NHAT</h5>

                <ul class="list-unstyled pt-3">
                    <li><a href="#">Duis aute irure dolor in
                            reprehe.</a> <br>
                    <small>July 22, 2018</small></li>
                    <li><a href="#">Excepteur sint occaecat.</a> <br>
                    <small>July 22, 2018</small></li>
                    <li><a href="#">Sunt in culpa qui officia.</a> <br>
                    <small>July 22, 2018</small></li>
                </ul>
            </div>

            <div class="col-md-3">
                <h5 class="title">LIEN HE</h5>
                <p class="my-p" style="line-height: 3rem">
                    +84 163 629 7612 <br> +84 163 629 7613 <br> 50 Yen Bai,
                    quan Hai Chau, thanh pho Da nang
                </p>
            </div>
        </div>
    </div>
</footer>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/my.js"></script>
    <script>
        $(document).ready(function() {
            $('#btnSearch').click(function(){
                var keyword = $('#txtSearch').val();
                $.post('timkiem.php', {tukhoa: keyword}, function(data) {
                    $('#dataSearch').html(data);
                });
            })
        });
    </script>
</body>
</html>
