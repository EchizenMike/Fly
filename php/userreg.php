<?php
header('Access-Control-Allow-Origin:*');	
include ("./global_config.php");

$user = $_POST['username'];
$pass = $_POST['password'];
//$user = 'Black';
//$pass = '666';
//$phone ='13299987763';
//$role = '0';

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}else{
	$checkUser = mysqli_query($conn,"SELECT username FROM user_table WHERE username='$user'");
	if($checkUser->num_rows>0){
//		echo "该用户名已被注册！请重新选择！（3s后跳转）";
//		sleep(5);
//		echo "<SCRIPT charset='utf-8' language='JavaScript'>";
//		echo "setTimeout(function(){ window.location.href = 'http://127.0.0.1:8020/PrintStore/reg.html';}, 3000);";
//  	echo "</SCRIPT>";
 	$json = array();
    $json['result']="0";
    echo json_encode($json);
		return false;
	}
    if(!(($user=="")||($pass==""))){//防止空白项插入
      $result = mysqli_query($conn,"INSERT INTO user_table (username,password,lognum) VALUES ('{$user}','{$pass}','0')");
      $result2 = mysqli_query($conn,"INSERT INTO stu_info values('{$user}',null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null)");
      $result3 =mysqli_query($conn,"INSERT INTO stu_gk_ach values ('$user',null,null,null,null,null,null,null,null,null)");
    }
    if($result&&$result2&&$result3){
//      echo "注册成功！3s后自动跳转<br>";
//      sleep(3);
//      echo "<SCRIPT charset='utf-8' language='JavaScript'>";
//  	echo "setTimeout(function(){ window.location.href = 'http://127.0.0.1:8020/PrintStore/login.html';}, 3000);";
//  	echo "</SCRIPT>";
    $json = array();
    $json['result']="1";
    echo json_encode($json);
    }else{
//      echo '参数错误！<br><br>';
//      echo '错误代码：';
//      echo mysqli_error();
 	$json = array();
    $json['result']="2";
    echo json_encode($json);
    }
}
$conn->close();
?>