<?php
class DB {
    private static $_instance;
    private $_db, $_query, $_count, $__lastInsertID, $_results;

    private function __construct(){
        try{
            $this->_db = new PDO("mysql:host=localhost;dbname=test",'root','');
        } catch(PDOException $e){
            die($e->getMessage());
        }       
    }
    public static function getInstance(){
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;       
    }

    public function read($table=null,$sql=""){
         if ($table!=null){
           $sql = "SELECT * FROM $table";
         }
//die($sql);
          if ($this->_query = $this->_db->prepare($sql)) {
            if ($this->_query->execute()){
                $this->_results = $this->_query->fetchAll();
                $this->_count = $this->_query->rowCount();
              } else {
                die("somethings went wrong");
            }
          }
      return $this;   
    }

    private function insert($sql, $params=null) {
      //print_r($params);die();
      //die($sql);
        $this->_error = false;
        if($this->_query = $this->_db->prepare($sql)) {
          $x = 1;
          if(count($params)) {
            foreach($params as $param) {
              $this->_query->bindValue($x, $param);
              $x++;
            }
          }
          if($this->_query->execute()) {
            $this->_count = $this->_query->rowCount();
            $this->_lastInsertID = $this->_db->lastInsertId();
            return true;
          } else {
            return false;
          }
        }
    }

    public function delete($table,$param){
      $sql = "DELETE FROM $table WHERE productId=$param";
      $this->_query = $this->_db->prepare($sql);
      $this->_query->execute();
      return $this;
    }

    public function update($table,$params){

    }

    public function generateQuery($table,$keyValue) {
        $keyString = "";
        $fieldString = "";
        $values = [];
        
        foreach($keyValue as $key => $value) {
           $keyString .= '`'.$key.'`,';
           $fieldString .= '?,';
           $values[] = $value;         
        }
        $keyString = rtrim($keyString, ',');
        $fieldString = rtrim($fieldString, ',');

         
            $sql = "INSERT INTO `$table` ($keyString) VALUES ($fieldString)";

          //die($sql);
        if ($this->insert($sql, $values)){
            return true;
        }
        return false;
    }

    public function specialQuery($params, $tables, $conditions = [],$limit=null) {
      $sql = "";
      $sql .= 'SELECT ';
      if (is_array($params)) {
        foreach($params as $param) {
          $sql .= $param.',';
        }
        $sql = rtrim($sql, ',');
      } else {
        $sql .= $params;
      }
      $sql .= " FROM ";
      if(is_array($tables)){
        foreach ($tables as $table) {
          $sql .= $table. ' JOIN ';
        }
        $sql = rtrim($sql, ' JOIN ');
      } else{
        $sql .= $tables. ' ';
      }
      
      if(isset($conditions)) {
        $sql .= " WHERE ";
        for($i=0;$i<sizeof($conditions);$i++){
          $sql .= " $conditions[$i] AND ";
        }
        $sql = rtrim($sql, ' AND ');
        // if (count($conditions)==1) {
        //   $sql .= " WHERE $conditions[0]";
        // } else {
        //   $sql .= " WHERE $conditions[0] AND $conditions[1]";
        // }
      }
      if ($limit!=null){
        $sql .=" LIMIT $limit";
      }
//die($sql);
      return $this->read(null,$sql)->results();
    }

    public function results(){
      return $this->_results;
    }

    public function getCount(){
      return $this->_count;
    }

}