<?php
header('Access-Control-Allow-Origin:*');
include ("./global_config.php");

$name = $_POST['stu_name'];
$stu_ach = $_POST['stu_ach'];
$stu_pro_name = $_POST['stu_pro_name'];
$stu_pro_ach = $_POST['stu_pro_ach'];
$stu_tj_100_ach = $_POST['stu_tj_100_ach'];
$stu_tj_ldty_ach = $_POST['stu_tj_ldty_ach'];
$stu_tj_qq_ach = $_POST['stu_tj_qq_ach'];
$stu_gk_pro = $_POST['stu_gk_pro'];
$stu_gk_pro_ach = $_POST['stu_gk_pro_ach'];
$stu_gk_adm_sch = $_POST['stu_gk_adm_sch'];
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
$result = mysqli_query($conn, "SELECT * FROM stu_gk_ach WHERE username = '$name'");
if ($result->num_rows > 0) {//判断结果集是否为空
  //  echo "OK" . " ";
    mysqli_query($conn,"UPDATE stu_gk_ach SET stu_ach = '$stu_ach',stu_pro_name ='$stu_pro_name',stu_pro_ach = '$stu_pro_ach',stu_tj_100_ach = '$stu_tj_100_ach',stu_tj_ldty_ach = '$stu_tj_ldty_ach',stu_tj_qq_ach = '$stu_tj_qq_ach',stu_gk_pro = '$stu_gk_pro',stu_gk_pro_ach = '$stu_gk_pro_ach', stu_gk_adm_sch = '$stu_gk_adm_sch' WHERE username = '$name'");
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
////  $flag['result']="0";
//  mysqli_query($conn,"INSERT INTO stu_gk_ach (username,stu_ach,stu_pro_name,stu_pro_ach) VALUES ('{$name}','{$stu_ach}','{$stu_pro_name}','{$stu_pro_ach}')");
	$inform = new INFORM();
    $inform->code = 1;
    $inform->msg = '查询失败！';
    $inform ->data = null;
    $inform->count = 0;
    echo json_encode($inform);
}



?>