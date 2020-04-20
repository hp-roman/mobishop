<?php
class database
{
    public $_dbh = '';
    public $_sql = '';
    public $_cursor = NULL;
    
    public function database() {
        $this->_dbh = new PDO('mysql:host=localhost; dbname=mobishop','root','Hoa2851998');
        $this->_dbh->query('set names "utf8"');
    }
    public function setQuery($sql) {
        $this->_sql = $sql; 
    }
    
    //Function execute the query 
    public function execute($options=array()) {
        $this->_cursor = $this->_dbh->prepare($this->_sql);
        //neu co tham so
        if($options) {  //If have $options then system will be tranmission parameters
            for($i=0;$i<count($options);$i++) {
                $this->_cursor->bindParam($i+1,$options[$i]);
            }
        }
        $this->_cursor->execute();
        return $this->_cursor;
    }
    
    //Funtion load datas on table
    public function loadAllRows($options=array()) {
        //neu khong co tham so
        if(!$options) {
            // neu truy van loi
            if(!$result = $this->execute())
                return false;
        }
        //neu co tham so
        else {
            //neu truy van loi
            if(!$result = $this->execute($options))
                return false;
        }
        // fetchAll la lay nhieu dong du lieu, FETCH_OBJ la tra ve 1 object cua stdClass
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    
    //Funtion load 1 data on the table
    public function loadRow($option=array()) {
        //neu khong co tham so
        if(!$option) {
            //neu truy van loi
            if(!$result = $this->execute())
                return false;
        }
        else {
            //neu truy van loi
            if(!$result = $this->execute($option))
                return false;
        }
        //truy van thanh cong
        return $result->fetch(PDO::FETCH_OBJ);//tra ve 1 object cua stdClass
    }
    
    //Function count the record on the table
    public function loadRecord($option=array()) {
        if(!$option) {
            if(!$result = $this->execute())
                return false;
        }
        else {
            if(!$result = $this->execute($option))
                return false;
        }
        return $result->fetch(PDO::FETCH_COLUMN);
    }
    
    public function getLastId() {
        return $this->_dbh->lastInsertId();
    }
    
    public function disconnect() {
        $this->_dbh = NULL;
    }
}
?>  