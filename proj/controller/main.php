<?php
session_start();

if(!isset($_SESSION['username'])){
    header('Location:/');
    exit();
}
else{
    require "view/main.view.php";
}

?>