<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username=='admin' && $password=='123456'){
        $_SESSION['user'] = $_POST['username'];
        if(isset($_POST['remember']) && $_POST['remember']==1){
            setcookie('user',$_POST['username'],time()+180);
        }
        header('Location:home.php');
    }
    else if($username==''){
        $_SESSION['error'] = "Bạn chưa điền username";
        header('Location:login.php');
    }
    else if($password==''){
        $_SESSION['error'] = "Bạn chưa điền password";
        header('Location:login.php');
    }
    else{
        $_SESSION['error'] = "Sai thông tin đăng nhập";
        header('Location:login.php');
    }
}
?>