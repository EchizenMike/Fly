<?php
header('Access-Control-Allow-Origin:*');	
include ("./global_config.php");

$id = $_POST['id'];//接收来自用户名密码form的表单信息
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$result = mysqli_query($conn,"DELETE FROM stu_ach where num = '$id'");
  if($result){
 	 $json = array();
   	 $json['result'] = '0';
   	 echo json_encode($json);
 }
?>