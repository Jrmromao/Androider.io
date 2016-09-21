<?php
require_once 'CORE/init.php';
$user = new User();
$user->logout();

Redirect::to('index.php');

?>