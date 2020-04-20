<?php
    session_start();
    include('controller/c_sanpham.php');
    $c_sanpham = new C_sanpham();
    if(isset($_SESSION['admin'])){
        $giohang = $c_sanpham->getCartsByAdmin();
        $carts = $giohang['giohang'];
        // print_r($carts);
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
                    <li  class="active-link">
                        <a href="dashboard-cart.php"><i class="glyphicon glyphicon-shopping-cart"></i>Giỏ Hàng</a>
                    </li>
                    <li>
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
                    <h1 class="text-center" style="color: red">Quản Lý Đơn Hàng</h1>
                    <div class="col-xs-12">
                        <table class="table table-hover">
                            <thead>
                                <tr class="success">
                                    <th>Id</th>
                                    <th>Email</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng Tiền</th>
                                    <th>Ngày Đặt</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($carts as $cart){
                                        ?>
                                            <tr>
                                                <td><?=$cart->id?></td>
                                                <td><?=$cart->email?></td>
                                                <td><?=$cart->tensanpham?></td>
                                                <td><?=$cart->soluong?></td>
                                                <td><?=$cart->gia?></td>
                                                <td><?=$cart->tongtien?></td>
                                                <td><?=$cart->ngaydat?></td>
                                                <td>
                                                    <a href="delete-cart-by-admin.php?id=<?=$cart->id?>" class="btn btn-danger">DELETE</a>
                                                </td>
                                            </tr>
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