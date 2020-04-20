<?php
    session_start();
    include('controller/c_sanpham.php');
    $c_sanpham = new C_sanpham();
    if(isset($_SESSION['admin'])){
        $sanpham = $c_sanpham->getAllProduct();
        $products = $sanpham['sanpham'];
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
                    <li>
                        <a href="addproduct.php"><i class="	glyphicon glyphicon-plus-sign"></i>Thêm Sản Phẩm</a>
                    </li>
                    <li class="active-link">
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
                    <h1 class="text-center" style="color: red">Sản Phẩm</h1>
                    <div class="col-xs-12">
                        <table class="table table-hover">
                            <thead>
                                <tr class="success">
                                    <th>Tiêu Đề</th>
                                    <th>Loại</th>
                                    <th>Tóm Tắt</th>
                                    <th>Nội Dung</th>
                                    <th>Giá</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($products as $product){
                                        ?>
                                        <form method="POST" action="delete-product.php?id=<?=$product->id?>">
                                            <tr>
                                                <td>
                                                    <?=$product->tieude?>
                                                </td>
                                                <td>
                                                    <?=$product->ten?>
                                                </td>
                                                <td><?=$product->tomtat?></td>
                                                <td><?=$product->noidung?></td>
                                                <td>
                                                    <?=$product->gia?>
                                                </td>
                                                <td>
                                                    <input type="submit" name="delete" value="DELETE" class="form-control btn btn-danger">
                                                </td>
                                            </tr>
                                        </form>
                                        <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>
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