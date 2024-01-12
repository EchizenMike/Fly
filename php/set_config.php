<?php
header('Access-Control-Allow-Origin:*');
include ("./global_config.php");
$set = $_POST['set'];
$value = $_POST['value'];
////$phone =$_POST['Phonenum'];
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
$result = mysqli_query($conn, "UPDATE config SET ".$set."=".$value);
if ($result) {//判断结果集是否为空
    $inform = new INFORM();
    $inform->code = 0;
    $inform->msg = "修改配置成功";
    $json = json_encode($inform);

  echo json_encode($inform);
    
} else {

	$inform = new INFORM();
    $inform->code = 1;
    $inform->msg = '修改失败';
    echo json_encode($inform);
}



?>