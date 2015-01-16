<?php
session_start();

$email=$_POST["email"]; 
$password=md5($_POST["password"]);
$time=time();
$error=false;

//包含数据库连接文件
include('conn.php');

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
  header("location: index.php"); 
  exit; 
}
?>

