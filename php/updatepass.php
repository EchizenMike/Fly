<?php
header('Access-Control-Allow-Origin:*');
include ("./global_config.php");

$user = $_POST['username'];
$pass1 = $_POST['pass1'];
$pass2 =$_POST['pass2'];

//$user = "Mike";
//$pass1 = "1234";
//$pass2 ="456";
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$check = mysqli_query($conn, "SELECT count(*) as total FROM user_table WHERE username='$user' and password='$pass1'");
$res = mysqli_fetch_array($check);
$count = $res['total'];
if ($count==1) {
    $update = mysqli_query($conn,"UPDATE user_table SET passWord = '$pass2' WHERE UserName = '$user'");
    if ($update==1){
        $json = array();
        $json['result']="1";
        echo json_encode($json);
    }
} else {
    $json = array();
    $json['result']="0";
    echo json_encode($json);
//        echo "<SCRIPT charset='utf-8' language='JavaScript'>";
//        echo "alert(\"fail!\");";
//        echo "history.back()";
//        echo "</SCRIPT>";
}
$conn->close();


?>