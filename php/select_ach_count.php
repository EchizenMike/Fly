<?php
header('Access-Control-Allow-Origin:*');
include ("./global_config.php");
$user = $_POST['user'];
$maj_count = $_POST['maj_count'];
////$phone =$_POST['Phonenum'];
class RESOBJ {
  	public $count;
}

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn, 'set names utf8');
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$result = mysqli_query($conn, "SELECT COUNT(*) FROM stu_ach WHERE username='$user' AND maj='$maj_count'");
if ($result->num_rows > 0) {//判断结果集是否为空
      $resobj = new RESOBJ();
      $resobj->count = mysqli_fetch_row($result)[0];
      echo json_encode($resobj);
    
} else {
    $resobj->count = 0;
    echo json_encode($resobj);
}

$conn->close();

?>