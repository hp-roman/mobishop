<?php
    session_start();
    include('controller/c_sanpham.php');
    $c_sanpham = new C_sanpham();
    if(isset($_SESSION['admin'])){
        if(isset($_POST['them'])){
            $tieude = $_POST['tieude'];
            $tomtat = $_POST['tomtat'];
            $image = $_POST['image'];
            $gia = $_POST['gia'];
            $loai = $_POST['loai'];
            $noidung = $_POST['noidung'];
            $c_sanpham->addProduct($loai, $tieude, $noidung, $image, $gia, $tomtat);
        }
    }
    else{
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SHOP ĐIỆN MÁY</title>
    <link rel="shortcut icon" type="image/png" href="assets/image/favicon.ico" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/cus.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/image/shoplogo.png" width="75px" />
                    </a>

                </div>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="dashboard-user.php"><i class="fa fa-desktop "></i>Người Dùng</a>
                    </li>
                    <li>
                        <a href="dashboard-cart.php"><i class="glyphicon glyphicon-shopping-cart"></i>Giỏ Hàng</a>
                    </li>
                    <li class="active-link">
                        <a href="addproduct.php"><i class="	glyphicon glyphicon-plus-sign"></i>Thêm Sản Phẩm</a>
                    </li>
                    <li>
                        <a href="list-product.php"><i class="glyphicon glyphicon-th-list"></i>Danh Sách Sản Phẩm</a>
                    </li>
                    <li>
                        <a href="dangxuat.php"><i class="glyphicon glyphicon-log-out"></i>Log Out</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-xs-12">
<?php 
    if(isset($_SESSION['addsuccess'])){
                            echo "<h3 class='text-center' style='color: blue'>".$_SESSION['addsuccess']."</h3>";
			    unset($_SESSION['addsuccess']);
    }
                        ?>
                    </div>
                </div>
                <div class="row carousel-holder center-block">   
                    
                    <div class="col-md-8 col-xs-push-2">
                    <div class="panel panel-default">
				  	    <div class="panel-heading"><h1 class="text-center" style="color: red">Thêm Sản Phẩm</h1></div>
				  	    <div class="panel-body">
				    	    <form method="POST" action="#">
							<div>   
				    			<label>Tiêu đề sản phẩm</label>
							  	<input type="text" class="form-control" placeholder="Tiêu Đề" name="tieude">
							</div>
							<br>	
                            <div>   
				    			<label>Tóm tắt nội dung</label>
							  	<input type="text" class="form-control" placeholder="Tóm Tắt" name="tomtat">
							</div>
							<br>
                            <div>   
				    			<label>Hình ảnh</label>
							  	<input type="file" class="form-control" name="image">
							</div>
							<br>
                            <div>   
				    			<label>Loại sản phẩm</label>
							  	<select name="loai" class="form-control">
                                    <option value="1" selected="selected">Android</option>
                                    <option value="2">Iphone</option>
                                    <option value="3">Cục gạch</option>
                                    <option value="4">DELL</option>
                                    <option value="5">HP</option>
                                    <option value="6">MAC</option>
                                    <option value="7">ASUS</option>
                                    <option value="8">Ipad</option>
                                    <option value="9">Masstel</option>
                                    <option value="10">SamSung</option>
                                </select>
							</div>
                            <br>
                            <div>   
				    			<label>Giá tiền</label>
							  	<input type="number" class="form-control" placeholder="Giá" name="gia">
							</div>
							<br>
							<div>   
				    			<label>Nội dung</label>
                                <textarea name="noidung" rows="10" class="form-control"></textarea>
							</div>
							<br>
							<button type="submit" name="them" class="btn btn-primary pull-right">Thêm
							</button>
				    	    </form>
				  	    </div>
				    </div>
                    </div>
                </div>

                <!-- /. ROW  -->
            </div>
        </div>

    </div>
    <div class="footer">
        <div class="row">
            <div class="col-lg-12">
                &copy;Design by: <a href="#" style="color:#fff;" target="_blank">Google </a>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>
