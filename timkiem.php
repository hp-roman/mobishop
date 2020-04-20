<?php 
	include('controller/c_sanpham.php');
	$c_sanpham = new c_sanpham();
	if(isset($_POST['tukhoa'])){
		$key = $_POST['tukhoa'];
		$tintuc = $c_sanpham->timkiem($key);
		?>
		<div class="panel panel-default">
		<div>Tìm thấy <b><?=count($tintuc)?></b> sản phẩm cho từ khóa <b>"<?=$key?>"</b></div>
		<?php 
        foreach($tintuc as $tin){
        ?>
            <div class="row-item row">
                <div class="col-md-3">
                    <a href="chitiet.php?id_tin=<?=$tin->id?>">
                        <br>
                        <img width="200px" height="200px" class="img-responsive" src="assets/image/sanpham/<?=$tin->image?>" alt="">
                    </a>
                </div>

                <div class="col-md-9">
                    <h3><?=$tin->tieude?></h3>
                    <h3><label class="label label-warning"><?=$tin->gia?> đ</label></h3>
                    <a class="btn btn-primary btn-lg" href="chitiet.php?id_tin=<?=$tin->id?>">Chi Tiết<span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <div class="break"></div>
            </div>
        <?php
		}
		?>
		</div>
	<?php
	};
	?> 	