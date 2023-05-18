<?php
require "view/login.view.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db=new DB();
    $result=$db->get("select * from Users");

    // var_dump($result);
    foreach($result as $r){
        if($r["username"]==$username && $r["userkey"]==$password){
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role']=$r["role"];
            header('Location:/main');
        }
        else {
            $error = 'Invalid username or password';
        }
    }
}
?>
