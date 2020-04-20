<?php
    session_start();
    include('model/m_user.php');
    class C_user{
        function dangkiTK($name, $phone, $email, $password){
            $m_user = new M_user();
            $id_user = $m_user->dangki($name, $phone, $email, $password);
            if($id_user>0){
                $_SESSION['success'] = "Đăng ký thành công";
                $_SESSION['user_name']= $name;
                $_SESSION['email_user']= $email;
                $_SESSION['id_user'] = $id_user;
                header('location:index.php');
                if(isset($_SESSION['error'])){
                    unset($_SESSION['error']);
                }
            }
            else{
                $_SESSION['error'] = "Đăng ký thất bại";
                header('location:dangki.php');
            }
        }
        public function dangnhap($email, $password){
            $m_user = new M_user();
            $user = $m_user->dangnhap($email, $password);
            if($user == true){
                $_SESSION['user_name'] = $user->name;
                $_SESSION['email_user'] = $user->email;
                $_SESSION['id_user'] = $user->id;
                header('location:index.php');
                if(isset($_SESSION['user_error'])){
                    unset($_SESSION['user_error']);
                }
            }
            else{
                $_SESSION['user_error']="Đăng nhập thất bại";
                header('location:dangnhap.php');
            }
        }
        public function dangnhapAdmin($email, $password){
            $m_user = new M_user();
            $admin = $m_user->dangnhapAdmin($email, $password);
            if($admin == true){
                $_SESSION['admin'] = $admin->email;
                if(isset($_SESSION['admin_error'])){
                    unset($_SESSION['admin_error']);
                }
                header('location:dashboard-user.php');
            }
            else{
                $_SESSION['admin_error']="Đăng nhập thất bại";
                header('location:admin.php');
            }
        }
        function dangxuat(){
            session_destroy();
            header('location:index.php');
        }
        function getUsers(){
            $m_user = new M_user();
            $users = $m_user->getUsers();
            return array('users'=>$users);
        }
        function deleteUser($id){
            $m_user = new M_user();
            $m_user->deleteUser($id);
        }
        function updateUser($id, $name, $phone){
            $m_user = new M_user();
            $m_user->updateUser($id, $name, $phone);
        }
    }
?>