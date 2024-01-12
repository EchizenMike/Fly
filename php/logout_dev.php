<?php
header('Access-Control-Allow-Origin:*');
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:*");
include ("./global_config.php");
$user = $_POST['username'];
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
  $result = mysqli_query($conn, "UPDATE admin_table SET log_dev = log_dev - 1 WHERE username = '$user'");
if ($result) {//判断结果集是否为空
  //  echo "OK" . " ";
    $inform = new INFORM();
    $inform->code = 0;
    $inform->msg = '已退出设备1台';
    $json = json_encode($inform);
  echo json_encode($inform);
    
} else {
	$inform = new INFORM();
    $inform->code = 1;
    $inform->msg = '退出失败';
    echo json_encode($inform);
}

	




?>