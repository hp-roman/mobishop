<?php
    include('database.php');
    class M_sanpham extends database{
        function getMenu(){
        	$sql = "SELECT mh.*, GROUP_CONCAT(lsp.id, ':', lsp.ten) AS LoaiSanPham FROM mathang mh INNER JOIN loaisanpham lsp ON lsp.idMatHang = mh.id GROUP BY mh.id";
        	$this->setQuery($sql);
        	return $this->loadAllRows();
        }
        // function getTinTucByIdLoai($id_loaitin){
        //     $sql = "SELECT * FROM tintuc WHERE idLoaiTin = $id_loaitin";
        //     $this->setQuery($sql);
        //     return $this->loadAllRows(array($id_loaitin));
        // }
        function getSanPhamNoiBat(){
            $sql = "SELECT mathang.ten, sanpham.* FROM sanpham JOIN loaisanpham ON loaisanpham.id = sanpham.idLoaiSanPham JOIN mathang ON loaisanpham.idMatHang = mathang.id WHERE sanpham.id = (SELECT sanpham.id FROM sanpham JOIN loaisanpham ON sanpham.idLoaiSanPham = loaisanpham.id WHERE loaisanpham.idMatHang = 1 AND sanpham.id LIMIT 0,1) OR sanpham.id = (SELECT sanpham.id FROM sanpham JOIN loaisanpham ON sanpham.idLoaiSanPham = loaisanpham.id WHERE loaisanpham.idMatHang = 2 AND sanpham.id LIMIT 0,1) OR sanpham.id = (SELECT sanpham.id FROM sanpham JOIN loaisanpham ON sanpham.idLoaiSanPham = loaisanpham.id WHERE loaisanpham.idMatHang = 3 AND sanpham.id LIMIT 0,1)";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        function getTinTucByIdLoai($id_loaitin, $vitri=-1, $limit=-1){
            $sql = "SELECT * FROM sanpham WHERE idLoaiSanPham = $id_loaitin";
            if($vitri>-1 && $limit>1){
                $sql .= " limit $vitri,$limit";
            }
            $this->setQuery($sql);
            return $this->loadAllRows(array($id_loaitin));
        }

        function getTitlebyId($id_loaitin){
            $sql = "SELECT ten FROM loaisanpham WHERE id = $id_loaitin";
            $this->setQuery($sql);
            return $this->loadRow(array($id_loaitin));
        }
        function getChiTietTin($id){
            $sql = "SELECT * FROM sanpham WHERE id = $id";
            $this-> setQuery($sql);
            return $this->loadRow(array($id));
        }
        function getRelatedNews($alias, $idsanphamcu){
            $sql = "select * from sanpham where id != $idsanphamcu and idLoaiSanPham = $alias LIMIT 0,4";
            $this->setQuery($sql);
            return $this->loadAllRows(array($alias, $idsanphamcu));
        }
        function search($key){
            $sql = "SELECT sp.* FROM sanpham sp INNER JOIN loaisanpham lsp ON sp.idLoaiSanPham = lsp.id 
            WHERE sp.tieude like '%$key%'";
            $this ->setQuery($sql);
            return $this->loadAllRows(array($key));
        }
        // 
        function them($id_user, $tensanpham, $idsanpham, $soluong, $gia, $tongtien){
            $tien = (int)$tongtien;
            $sql = "INSERT INTO giohang (iduser, tensanpham, idsanpham, soluong, gia, tongtien) VALUES (?,?,?,?,?,?)";
            $this-> setQuery($sql);
            $result = $this->execute(array($id_user, $tensanpham, $idsanpham, $soluong, $gia, $tien));
            if($result){
                return $this->getLastId();
            }
            else{
                return false;
            }
        }
        function getCart($id_user){
            $sql = "SELECT * FROM giohang WHERE iduser = $id_user";
        	$this->setQuery($sql);
            return $this->loadAllRows(array($id_user));
        }
        function deleteCart($id_cart){
            $sql = "DELETE FROM giohang WHERE id = $id_cart";
            $this->setQuery($sql);
            $this->execute(array($id_cart));
        }
        function updateCart($id, $soluong, $tongtien){
            $sql = "UPDATE giohang SET soluong = $soluong, tongtien = $tongtien WHERE id =$id";
            $this->setQuery($sql);
            $this->execute(array($soluong, $tongtien, $id));
        }
        function getCartsByAdmin(){
            $sql = "SELECT giohang.id, email, tensanpham, soluong, gia, tongtien, ngaydat from giohang JOIN user on iduser = user.id";
        	$this->setQuery($sql);
            return $this->loadAllRows();
        }
        function addProduct($loai, $tieude, $noidung, $image, $gia, $tomtat){
            $sql = "INSERT INTO sanpham (idLoaiSanPham, tieude, noidung, image, gia, tomtat) VALUES (?,?,?,?,?,?)";
            $this-> setQuery($sql);
            $result = $this->execute(array($loai, $tieude, $noidung, $image, $gia, $tomtat));
            if($result){
                return $this->getLastId();
            }
            else{
                return false;
            }
        }
        function getAllProduct(){
            $sql = "SELECT sanpham.*, loaisanpham.ten FROM sanpham JOIN loaisanpham on idLoaiSanPham = loaisanpham.id";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        function deleteProduct($id){
            $sql = "DELETE FROM sanpham WHERE id = $id";
            $this->setQuery($sql);
            $this->execute(array($id));
        }
        // 
    }
?>