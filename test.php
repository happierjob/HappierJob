<?php
header("Content-Type:text/html;charset=utf-8");

// 数据写入库表
require("conn.php");

$result = mysql_query("select * from suggestion");
while($row = mysql_fetch_array($result))
  {
  echo $row['content'] . " " . $row['contact'];
  echo "<br />";
}

?>
