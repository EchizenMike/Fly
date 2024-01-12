<?php
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:*");
header("Access-Control-Allow-Headers:*");
include ("./global_config.php");
//$user = "Amy";
//$pass = "113";
$user = $_POST['Username'];//接收来自用户名密码form的表单信息
$pass = $_POST['Password'];
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$result = mysqli_query($conn,"SELECT * FROM user_table WHERE BINARY Username='$user' and Password='$pass'");

if ($result->num_rows>0){//判断结果集是否为空
//  echo "OK 登录成功！"." ";
//	sleep(10); 
//  echo "<SCRIPT charset='utf-8' language='JavaScript'>";
//  echo "location.href='http://127.0.0.1:8020/PrintStore/index.html'";
//  echo "</SCRIPT>";
	 mysqli_query($conn,"UPDATE user_table SET lognum = lognum + 1 WHERE username = '$user'");
     $json = array();
   	 $json['result'] = '1';
   	 echo json_encode($json);
}else{
   // echo "fail 用户名或密码错误！";
   $json = array();
   $json['result'] = '0';
   echo json_encode($json);
}
//$sql = "SELECT * FROM info";
//$result2 = $conn->query($sql);
//if ($result2->num_rows > 0) {
//    // 输出数据
//    while($row = $result2->fetch_assoc()) {
//        echo $row["info"]." ";
//    }
//} else {
//    echo "0 结果 或用户名密码错误";
//}
$conn->close();
?>