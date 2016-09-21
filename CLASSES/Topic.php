<?php
class Topic{
    //atributes
    private $_db
            , $_data
            , $_sessionName
            , $_cookieName
            , $_isLoggedIn;
    
    
    //methods
    public function __construct($user = null){
      $this->_db= DB::getInstance();   
      $this->_sessionName = Config::get('session/session_name');
      $this->_cookieName = Config::get('remember/cookie_name');
         
    }
    
    public function creat($fields = array()){
        if(!$this->_db->insert('topics', $fields)){
            throw new Exception("There was a problem creating an account.");
         
        }
    }
}




?>