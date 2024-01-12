<?php
header('Access-Control-Allow-Origin:*');
include ("./global_config.php");
$notice = $_POST['notice'];
class INFORM {
    public $code;
    public $msg;
}
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn, 'set names utf8');
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
if($notice != "")
  $result = mysqli_query($conn, "UPDATE notice SET notice = '$notice'");
else
  $result = null;  
 if ($result) {//判断结果集是否为空
  //  echo "OK" . " ";
    $inform = new INFORM();
    $inform->code = 0;
    $inform->msg = '已更新公告！';
    $json = json_encode($inform);
  echo json_encode($inform);
    
} else {
	$inform = new INFORM();
    $inform->code = 1;
    $inform->msg = '更新失败';
    echo json_encode($inform);
}

	




?>