<?php
header("Content-Type:text/html;charset=utf-8");
session_start();
$action = $_GET['action'];

if($action == 'logout'){ //注销
  unset($_SESSION); 
  session_destroy(); 
  echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
  exit;
}

if(!isset($_POST['submit'])){
    exit('非法访问!');
}

include('../config/conn.php');


if ($action == 'login') {  //登录
  $email=trim($_POST['email']); 
  $password=md5($_POST["password"]);
  $check_query = mysql_query("select * from user where email='$email' and password='$password' limit 1");
  if($result = mysql_fetch_array($check_query)){//登录成功
    $_SESSION['email'] = $email;
    header("location: ../../index.php"); 
    exit; 
  }else{
    echo "密码错误，请<a href='login.html'>重新登录</a>";
  }
}

if($action == 'signup'){ //注册
  $email=trim($_POST['email']); 
  $password=md5($_POST["password"]);
  $time=time();
  $error=false;

  if(strlen($_POST["password"])<6){
    exit('错误：密码长度不能小于6位哦，让他长大吧！<a href="javascript:history.back(-1);">返回</a>');
  }

  if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email)){
    exit('错误：不是有效的电子邮件格式，修改一下吧~ <a href="javascript:history.back(-1);">返回</a>');
  }

  //判断数据库中用户名和email是否已经存在
  $query="select * from user where email='$email'";
  $result=mysql_query($query);
  $row=mysql_fetch_array($result);
  while ($row)
  {
   if ($row["email"]==$email)
   {
    $error=true;
    echo "用户邮箱已经注册<br>";
    break;
   }
  }

  if ($error==false) {
    $query="insert into user (email,password,regdate) values ('$email','$password','$time')";
    $result=mysql_query($query);
    $_SESSION['email'] = $email;
    header("location: ../../index.php"); 
    exit; 
  }
}
?>

