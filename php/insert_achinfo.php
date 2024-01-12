<?php
header('Access-Control-Allow-Origin:*');
include ("./global_config.php");

$name = $_POST['username'];
$stu_id = $_POST['stu_id'];
$stu_name = $_POST['stu_name'];
$maj = $_POST['maj'];
$ls = $_POST['ls'];
$ach = $_POST['ach'];
$time = $_POST['time'];
////$phone =$_POST['Phonenum'];

class INFORM {
    public $code;
    public $msg;
    public $count;
    public $data;
}
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn, 'set names utf8');
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$result = mysqli_query($conn,"INSERT INTO stu_ach (username,stu_id,stu_name,maj,ls,ach,time) VALUES ('{$name}','{$stu_id}','{$stu_name}','{$maj}','{$ls}','{$ach}','{$time}')");
if ($result) {//判断结果集是否为空
  //  echo "OK" . " ";
    $inform = new INFORM();
    $inform->code = 0;
    $inform->msg = null;
    $inform->count = 0;
    $inform ->data = null;
    $json = json_encode($inform);
//    file_put_contents('C:\Users\zhang\Documents\HBuilderProjects\PrintStore\json\table.json',$json) ;
//  $flag = array();
//  $flag['result']='1';
  echo json_encode($inform);
    
} else {
//	$flag = array();
//  $flag['result']="0";
	$inform = new INFORM();
    $inform->code = 1;
    $inform->msg = '';
    $inform ->data = null;
    $inform->count = 0;
    echo json_encode($inform);
}



?>