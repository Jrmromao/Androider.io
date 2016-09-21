<?php 
class DB
{
    //variables
    private static $_instance = null;
    private $_pdo
          , $_query
          , $_error = false
          , $_results
          , $_count = 0;
   
   //constructor
    public function __construct()
    {
        try{
            $this->_pdo = new PDO('mysql: host='.Config::get('mysql/host').
            ';dbname='.Config::get('mysql/db'),
            Config::get('mysql/username'), 
            Config::get('mysql/password'));
            
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }





    //methods
    public static function getInstance(){
     
     if(!isset(self::$_instance)){
         self::$_instance = new DB();
     }
        return self::$_instance;
    }

    //sql query
       
    //sql query
    public function query($sql, $params = array()){
        $this->error = false;
        if($this->_query=$this->_pdo->prepare($sql)){
            $x = 1;
            if(count($params)){
                foreach ($params as $param) {
					$this->_query->bindValue($x, $param);		
					$x++;
                }
            }
            if($this->_query->execute()){
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            }
            else{
			 $this->_error = true;
		 }
         
        }
    return $this;
    }
    
    
     public function queryForum($sql, $params = array()){
        $this->error = false;
        if($this->_query=$this->_pdo->prepare($sql)){
            $x = 1;
            if(count($params)){
                foreach ($params as $param) {
					$this->_query->bindValue($x, $param);		
					$x++;
                }
            }
            if($this->_query->execute()){
                $this->_results = $this->_query->setFetchMode(PDO::FETCH_ASSOC);
                $this->_count = $this->_query->rowCount();
            }
            else{
			 $this->_error = true;
		 }
         
        }
    return $this;
    }
    
 
    //action method    
    public function action($action, $table, $where = array()){
        if(count($where)===3){
            $operators = array('=', '>', '<', '>=', '<=');
            
            $field= $where[0];
            $operator = $where[1];
            $value = $where[2];
            
            
            if(in_array($operator, $operators)){
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                if(!$this->query($sql, array($value))->error()){
                    return $this;
                }        
           
            }
            
        }
        return false;
    }
    
    
    //get method
    public function get($table, $where){
        return $this->action('SELECT *', $table, $where);
    }
    
    
    
    
    public function getALL($table){
       return $sql = "SELECT * FROM '$table'";
    }
    



    //delete methos    
    public function delete($table, $where){
        return $this->action('DELETE', $table, $where);
    }
    
    
    
    
    
    //insert method, to insert new data in the DB
    public function insert($table, $fields = array()){
        if(count($fields)){
            $keys =array_keys($fields); 
            $values = '';
            $x = 1;
            
            foreach ($fields as $field){
                $values .='?';
            if($x < count($fields)){
                $values .=', ';
            }
            $x++;
         }
    
           $sql = "INSERT INTO {$table} (`" .implode('`,`', $keys). "`) VALUES ({$values})";
            if(!$this->query($sql, $fields)->error()) {
               return true;
            }
		}
       return false;
    }




    //method to update the table
    public function updateGroup($table, $username, $fields){
       $set = '';
       $x = 1;

        foreach ($fields as $name => $value) {
            $set .="{$name} = ?";
            if($x < count($fields)){    
                $set.=', ';
            }
            $x++;
        } 

       $sql = "UPDATE {$table} SET {$set} WHERE users_username = {$username}";

             if(!$this->query($sql, $fields)->error()) {
                 return true;
            }
       return false;
    }


    //method to update the table
    public function update($table, $id, $fields){
       $set = '';
       $x = 1;

        foreach ($fields as $name => $value) {
            $set .="{$name} = ?";
            if($x < count($fields)){    
                $set.=', ';
            }
            $x++;
        } 

       $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

             if(!$this->query($sql, $fields)->error()) {
                 return true;
            }
       return false;
    }






    //result method
    public function results(){
        return $this->_results;
    }
    
    //first 
    public function first(){
        return $this->results()[0];
    }
    
     public function error(){
        return $this->_error;
    }
    
        public function count(){        
        return $this->_count;
    }
	
}
?>


