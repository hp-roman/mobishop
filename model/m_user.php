<?php
    include('database.php');
    class M_user extends database{
        function dangki($name, $phone, $email, $password){
            $sql = "INSERT INTO user (name, phone, email, password) VALUES (?,?,?,?)";
            $this-> setQuery($sql);
            $result = $this->execute(array($name, $phone, $email, md5($password)));
            if($result){
                return $this->getLastId();
            }
            else{
                return false;
            }
        }
        function dangnhap($email, $password){
            $sql = "SELECT * FROM user WHERE email= '$email' AND password ='$password'";
            $this -> setQuery($sql);
            return $this->loadRow(array($email, $password));
        }
        function dangnhapAdmin($email, $password){
            $sql = "SELECT * FROM admin WHERE email= '$email' AND password = '$password'";
            $this -> setQuery($sql);
            return $this->loadRow(array($email, $password));
        }
        function getUsers(){
            $sql = "SELECT * FROM user";
        	$this->setQuery($sql);
            return $this->loadAllRows();
        }
        function deleteUser($id){
            $sql = "DELETE FROM user WHERE id = $id";
            $this->setQuery($sql);
            $this->execute(array($id));
        }
        function updateUser($id, $name, $phone){
            $sql = "UPDATE user SET name = '$name', phone = '$phone' WHERE id =$id";
            $this->setQuery($sql);
            $this->execute(array($name, $phone, $id));
        }
    }

?>