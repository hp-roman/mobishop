<?php 
    session_start();
    include "controller/c_sanpham.php";
    $c_sanpham = new C_sanpham();
    $tin = $c_sanpham->chitietTin();
    $chitietTin = $tin['chitietTin'];
    $tinlienquan = $tin['tinlienquan'];
    if(isset($_SESSION['user_name'])){
        if(isset($_POST['them'])){
            $id_user =  $_SESSION['id_user'];
            $soluong = (int)$_POST['onhap'];
            $gia = (int)$chitietTin->gia;
            $tensanpham = $chitietTin->tieude;
            $idsanpham = (int)$chitietTin->id;
            $giohang = $c_sanpham->addCart($id_user, $tensanpham, $idsanpham, $soluong, $gia);
            
        }
    }
    else{
        echo "<h1 style='text-align:center; color: blue'>Vui lòng đăng nhập để mua hàng!</h1>";
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
                        <input type="text" class="form-control" placeholder="Nhập từ khóa">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-success" 
                            style="z-index: 1; position: absolute; height: 100%; top: 0px;">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

			    <ul class="nav navbar-nav">
                    <?php 
                        if(isset($_SESSION['user_name'])){
                            ?>
                                <li>
                                    <a style="margin-left: 30px"><span class ="glyphicon glyphicon-user"></span>
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
                                    <a href="dangki.php" style="margin-left: 30px">Đăng ký</a>
                                </li>
                                 <li>
                                    <a href="dangnhap.php">Đăng nhập</a>
                                 </li>
                            <?php

                        }
                    
                    ?>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h1><?php echo $chitietTin->tieude;?></h1>
                <h2 class="lead" style="color: red"><?=$chitietTin->tieude?></h2>
                <img class="img-responsive" src="assets/image/sanpham/<?=$chitietTin->image?>" alt="">
                <p><span class="glyphicon glyphicon-time"></span> Posted on</p>
                <hr>
                <?=$chitietTin->noidung?>
                <hr>


                <!-- Posted Comments -->

                <!-- Comment -->
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Sản phẩm liên quan</b></div>
                    <div class="panel-body">
                        <?php
                            foreach($tinlienquan as $tin){
                                ?>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-md-5">
                                        <a href="chitiet.php?id_tin=<?=$tin->id?>">
                                            <img class="img-responsive" src="assets/image/sanpham/<?=$tin->image?>" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-7">
                                        <a href="chitiet.php?id_tin=<?=$tin->id?>"><b><?=$tin->tieude?></b></a>
                                    </div>
                                    <p></p>
                                    <div class="break"></div>
                                </div>
                                <?php
                            }
                        ?>
                        
                    </div>
                </div>   
                <!-- START-CART -->
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Thêm vào giỏ hàng</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <form method="POST" action="#">
                                <label for="">Số lượng:</label>
                                <input type="number" value=1 class="form-control" name="onhap" min="1">
                                <br>
                                <label style="font-size: 25px">Giá: </label><span id="gia" class="label label-warning" style="font-size: 20px"><?=$chitietTin->gia?></span>
                                <br> <br>
                                <input type="submit" name="them" class="btn btn-danger pull-right" value="ADD CART">
                            </form>
                        </div>
                        <!-- end item -->

                    </div>
                </div>


                <!-- END-CART -->
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

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
</body>

</html>
