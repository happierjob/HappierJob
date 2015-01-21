<?php
header("Content-Type:text/html;charset=utf-8");
// 禁止非 POST 方式访问
if(!isset($_POST['submit'])){
    exit('非法访问!');
}
// 表单信息处理
$content = $_POST['content'];
$contact = $_POST['contact'];


echo $content;
echo $contact;
// 数据写入库表
require("config/conn.php");
$createtime = time();
$insert_sql = "INSERT INTO suggestion(content,contact,createtime) VALUES";
$insert_sql .= "('$content','$contact',$createtime)";

if(mysql_query($insert_sql)){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtm
l1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Refresh" content="2;url=../index.php">
<title>留言成功</title>
</head>
<body>
<div class="refresh">
<p>留言成功！非常感谢您的留言。<br />请稍后，页面正在返回...</p>
</div>
</body>
</html>
<?php
} else {
    echo '留言失败：',mysql_error(),'[ <a href="javascript:history.back()">返 回</a> ]';
}
?>