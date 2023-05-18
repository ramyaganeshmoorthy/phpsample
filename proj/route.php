<?php

$path=[
    "/"=>"controller/login.php",
    "/signup"=>"controller/signup.php",
    "/main"=>"controller/main.php"
];

if(array_key_exists($_SERVER["REQUEST_URI"],$path)){
    require $path[$_SERVER["REQUEST_URI"]];
}
else{
    require 'view/404.php';
}

?>