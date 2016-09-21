<?php
class User {
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

         if(!$user){
                if(Session::exists($this->_sessionName)){
                    $user = Session::get($this->_sessionName);
                    if($this->find($user)){
                        $this->_isLoggedIn = true;
                    }else{
                        
                        $this->find($user);

                    }
                }
            }
    }
    
    public function creat($fields = array()){
        if(!$this->_db->insert('users', $fields)){
            throw new Exception("There was a problem creating an account.");
         
        }
    }
    
    public function find($user=null){
        if($user){
            $field = (is_numeric($user)) ? 'users_userID' : 'users_username';
        $data = $this->_db->get('users', array($field, '=', $user));
        
        if($data->count()){
            $this->_data = $data->first();
            return true;
             }
          }
      }


    public function login($username = null, $password = null, $remember){
  
     $user = $this->find($username);
  
    if($user){
        if($this->data()->users_password === Hash::make($password, $this->data()->users_salt)) {
             Session::put($this->_sessionName, $this->data()->users_userID);

             if($remember) {
             $hash =  Hash::unique();
             $hashCheck = $this->_db->get('user_session', array('user_id', '=', $this->data()->users_userID));
     
             if(!$hashCheck->count()){
                    $this->_db->insert('user_session', array(
                        'user_id' => $this->data()->users_userID
                       ,'hash'=>$hash
                        
                    ));    
             }
             else{
                 $hash = $hashCheck->first()->hash;
             }
             Cookie::put($this->$_cookieName, $hash, Config::get('remember/cookie_expiry'));
             
             
           }
             
             return true;
        }
    }
     return false;
     }
     
     
     public function logout(){
         Session::delete($this->_sessionName);
     }


     public function data(){
        return $this->_data;
    }
    
    
    
     public function isLoggedIn(){
        return $this->_isLoggedIn;
    }
 
}

?>