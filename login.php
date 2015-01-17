<?php
session_start();

include('conn.php');

$action = $_GET['action'];

if ($action == 'login') {  //登录
  $email=$_POST["email"]; 
  $password=md5($_POST["password"]);
  $check_query = mysql_query("select * from user where email='$email' and password='$password' limit 1");
  if($result = mysql_fetch_array($check_query)){//登录成功
    $_SESSION['email'] = $email;
    header("location: index.php"); 
    exit; 
  }else{
    echo "密码错误，请<a href='login.html'>重新登录</a>";
  }
}else if($action == 'logout'){ //注销
  unset($_SESSION); 
  session_destroy(); 
  echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
}







?>

