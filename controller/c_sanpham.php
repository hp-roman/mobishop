<?php 
    include('model/m_sanpham.php');
    include('model/pager.php');
    class C_sanpham{
        public function index(){
            $m_sanpham = new M_sanpham();
            $menu = $m_sanpham->getMenu();	
            $sanphamNoibat = $m_sanpham->getSanPhamNoiBat();
            return array('sanphamnoibat'=>$sanphamNoibat, 'menu'=>$menu);
        }
        public function loaitin(){
            $id_loai = $_GET['id_loai'];
            $m_sanpham = new M_sanpham();
            $danhmuctin = $m_sanpham->getTinTucByIdLoai($id_loai);
            $trang_hientai = (isset($_GET['page']))? $_GET['page'] : 1;

            $pagination = new pagination(count($danhmuctin), 
                $trang_hientai, 4, 5);
            $paginationHTML = $pagination->showPagination();
            $limit = $pagination->_nItemOnPage;
            $vitri = ($trang_hientai-1)*$limit;

            $danhmuctin = $m_sanpham->getTinTucByIdLoai($id_loai, $vitri, $limit);

            $menu = $m_sanpham->getMenu();
            $title = $m_sanpham->getTitlebyId($id_loai);
            return array('danhmuctin'=> $danhmuctin, 'menu'=> $menu, 'title'=>$title, 'thanh_phantrang'=>$paginationHTML);
        }

        public function chitietTin(){
            $id_tin = $_GET['id_tin'];
            $m_sanpham = new M_sanpham();
            $chitietTin = $m_sanpham-> getChiTietTin($id_tin);
            $idLoaiSanPham = $chitietTin->idLoaiSanPham;
            $idSanPhamCu = $chitietTin->id;
            $tinLienQuan= $m_sanpham->getRelatedNews($idLoaiSanPham, $idSanPhamCu);
            return array('chitietTin'=>$chitietTin, 'tinlienquan'=>$tinLienQuan);
        }
        function timkiem($key){
            $m_sanpham = new M_sanpham();
            $tin = $m_sanpham->search($key);
            return $tin;
        }

        // 
        function addCart($id_user, $tensanpham, $idsanpham, $soluong, $gia){
            $m_giohang = new M_sanpham();
            $id_giohang = $m_giohang->them($id_user, $tensanpham, $idsanpham, $soluong, $gia, $soluong*$gia);
            if($id_giohang>0){
                $_SESSION['addcart_success']="THÀNH CÔNG!";
                header("location:chitiet.php?id_tin=$idsanpham");
                
            }
            else{
                $_SESSION['addcart_error']="THẤT BẠI!";
            }
        }
        function getCart($id_user){
            $m_sanpham = new M_sanpham();
            $giohang = $m_sanpham->getCart($id_user);
            return array('giohang'=>$giohang);
        }
        function deleteCart($id_cart){
            $m_sanpham = new M_sanpham();
            $m_sanpham->deleteCart($id_cart);
        }
        function updateCart($id, $soluong, $gia){
            $m_sanpham = new M_sanpham();
            $tongtien = $soluong*$gia;
            $m_sanpham->updateCart($id, $soluong, $tongtien);
        }
        function getCartsByAdmin(){
            $m_sanpham = new M_sanpham();
            $giohang = $m_sanpham->getCartsByAdmin();
            return array('giohang'=>$giohang);
        }
        function addProduct($loai, $tieude, $noidung, $image, $gia, $tomtat){
            $m_sanpham = new M_sanpham();
            $id_product = $m_sanpham->addProduct($loai, $tieude, $noidung, $image, $gia, $tomtat);
            if($id_product>0){
                $_SESSION['addsuccess'] = "Thêm Sản Phẩm Thành Công";
            }
        }
        function getAllProduct(){
            $m_sanpham = new M_sanpham();
            $sanpham = $m_sanpham->getAllProduct();
            return array('sanpham'=>$sanpham);
        }
        function deleteProduct($id){
            $m_sanpham = new M_sanpham();
            $m_sanpham->deleteProduct($id);
        }
        // 
    }
    
?>