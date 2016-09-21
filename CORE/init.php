<?php
session_start();
date_default_timezone_set("UTC"); 
//global variables
$GLOBALS['config'] = array(
                     'mysql' => array(
                         'host' => '127.0.0.1',
                         'username' => 'root',
                         'password'=>'',
                         'db'=>'androida_login'
                     )
                     
                     ,'remember' => array(
                         'cookie_name'=>'hash',
                         'cookie_expiry' => 604800,
                     )
                     
                     ,'session'=>array(
                         'session_name' => 'user',
                         'token_name' => 'token'
                     ));
                        



spl_autoload_register(function($class){
require_once 'CLASSES/'.$class.'.php';
});

require_once 'FUNCTIONS\Sanitize.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
        $hash = Cookie::get(Config::get('remember/cookie_name'));
        $hashCheck = DB::getInstance()->get('user_session', array('hash', '=', $hash));

           
             if($hashCheck->count()){
               $user = new User($hashCheck->first()->user_id);
                 $user->Login();
             }
}

$DBServer = 'localhost';
$DBUser   = 'root';
$DBPass   = '';
$DBName   = 'androida_login';

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);  

?>