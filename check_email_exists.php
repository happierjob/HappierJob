<?php
$action=$_GET['action'];
$email=$_GET['email'];
$flag=false;
include('conn.php');
//判断数据库中用户名和email是否已经存在
$query="select * from user where email='$email'";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
  while ($row){
   if ($row["email"]==$email){
    $flag=true;    
    break;
   }
  }
if($action=="signupCheckEmail" && $flag){
  echo "<div class='alert alert-danger alert-dismissible' role='alert'>
        <a class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></a>
        <strong> Hey !</strong> 此邮箱已经注册过啦 ！<a href='login.html'>马上登录</a></div></div>";
}else if ($action=="loginCheckEmail" && !$flag) {
  echo "<div class='alert alert-danger alert-dismissible' role='alert'>
        <a class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></a>
        <strong> Opps！</strong> 此邮箱尚未被注册 ！<a href='signup.html'>马上注册</a></div>";

}



?>