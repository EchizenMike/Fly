<?php
header('Access-Control-Allow-Origin:*');
include ("./global_config.php");

$name = $_POST['username'];
$character = $_POST['character'];//0为学生1为管理
$stu_id = $_POST['stu_id'];
$stu_self_id = $_POST['stu_self_id'];
$stu_name = $_POST['stu_name'];
$stu_sex = $_POST['stu_sex'];
$stu_nation = $_POST['stu_nation'];
$stu_date = $_POST['stu_date'];
$stu_age = $_POST['stu_age'];
$stu_grade = $_POST['stu_grade'];
$stu_class = $_POST['stu_class'];
$stu_chuzhong = $_POST['stu_chuzhong'];
$stu_premaj = $_POST['stu_premaj'];
$stu_premaj_ach = $_POST['stu_premaj_ach'];
$stu_maj_type = $_POST['stu_maj_type'];
$stu_maj = $_POST['stu_maj'];
$stu_maj_type2 = $_POST['stu_maj_type2'];
$stu_maj2 = $_POST['stu_maj2'];
$stu_maj_type3 = $_POST['stu_maj_type3'];
$stu_maj3 = $_POST['stu_maj3'];
$stu_maj_type4 = $_POST['stu_maj_type4'];
$stu_maj4 = $_POST['stu_maj4'];
$stu_type = $_POST['stu_type'];
$stu_con = $_POST['stu_con'];
$stu_home_father_name = $_POST['stu_home_father_name'];
$stu_home_father_phone = $_POST['stu_home_father_phone'];
$stu_home_mother_name = $_POST['stu_home_mother_name'];
$stu_home_mother_phone = $_POST['stu_home_mother_phone'];
$stu_honor = $_POST['stu_honor'];
$stu_punish = $_POST['stu_punish'];
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
$result = mysqli_query($conn, "SELECT * FROM stu_info WHERE username = '$name'");
 if ($result->num_rows > 0) {//判断结果集是否为空
  //  echo "OK" . " ";				
     if($character == '0'){
      	mysqli_query($conn,"UPDATE stu_info SET stu_id = '$stu_id',stu_self_id = '$stu_self_id',stu_name = '$stu_name',stu_sex = '$stu_sex',stu_nation = '$stu_nation',
    				stu_date = '$stu_date',stu_age = '$stu_age',stu_grade = '$stu_grade',stu_class = '$stu_class', stu_chuzhong = '$stu_chuzhong',stu_premaj = '$stu_premaj',stu_premaj_ach = '$stu_premaj_ach',stu_type = '$stu_type',
    				stu_maj = '$stu_maj',stu_home_father_name = '$stu_home_father_name',stu_home_father_phone = '$stu_home_father_phone',stu_con = '$stu_con',
    				stu_home_mother_name = '$stu_home_mother_name',stu_home_mother_phone = '$stu_home_mother_phone',stu_honor = '$stu_honor',stu_maj_type = '$stu_maj_type',stu_maj_type2 = '$stu_maj_type2',
    				stu_maj2 = '$stu_maj2',stu_maj_type3 = '$stu_maj_type3',stu_maj3 = '$stu_maj3',stu_maj_type4 = '$stu_maj_type4',stu_maj4 = '$stu_maj4' WHERE username = '$name'");
       $inform = new INFORM();
       $inform->code = 0;
       $inform->msg = '已更新记录！';
       $json = json_encode($inform);
  	   echo json_encode($inform);
  	}
     else if($character == 1){
     	mysqli_query($conn,"UPDATE stu_info SET stu_id = '$stu_id',stu_self_id = '$stu_self_id',stu_name = '$stu_name',stu_sex = '$stu_sex',stu_nation = '$stu_nation',
    				stu_date = '$stu_date',stu_age = '$stu_age',stu_grade = '$stu_grade',stu_class = '$stu_class', stu_chuzhong = '$stu_chuzhong',stu_premaj = '$stu_premaj',stu_premaj_ach = '$stu_premaj_ach',stu_type = '$stu_type',
    				stu_maj = '$stu_maj',stu_home_father_name = '$stu_home_father_name',stu_home_father_phone = '$stu_home_father_phone',stu_con = '$stu_con',
    				stu_home_mother_name = '$stu_home_mother_name',stu_home_mother_phone = '$stu_home_mother_phone',stu_honor = '$stu_honor',stu_maj_type = '$stu_maj_type',stu_maj_type2 = '$stu_maj_type2',
    				stu_maj2 = '$stu_maj2',stu_maj_type3 = '$stu_maj_type3',stu_maj3 = '$stu_maj3',stu_maj_type4 = '$stu_maj_type4',stu_maj4 = '$stu_maj4',stu_punish = '$stu_punish' WHERE username = '$name'");
   	     $inform = new INFORM();
    	 $inform->code = 0;
         $inform->msg = '已更新记录！';
         $json = json_encode($inform);
  	     echo json_encode($inform);
   	 }else{
   	 	$inform = new INFORM();
   	 	$inform->code = 1;
   	 	$inform->msg = '查询失败';
   	 	$json = json_encode($inform);
   	 	echo json_encode($inform);
   	 }
    
} else {
//	mysqli_query($conn,"INSERT INTO stu_info (username,stu_id,stu_name,stu_sex,stu_date,stu_age,stu_grade,stu_class,stu_premaj,stu_type,stu_maj,stu_home_father_name,stu_home_father_phone,stu_home_mother_name,stu_home_mother_name,stu_honor,stu_maj_type) VALUES ('{$name}','{$stu_id}','{$stu_name}','{$stu_sex}','{$stu_date}','{$stu_age}','{stu_grade},'{$stu_class}','{stu_premaj}','{stu_type}','{stu_home_father_name}','{stu_home_father_phone}','{$stu_home_mother_name}','{$stu_home_mother_phone}','{$stu_honor}','{$stu_maj_type}')");
////	$flag = array();
////  $flag['result']="0";
//	$inform = new INFORM();
//  $inform->code = 0;
//  $inform->msg = '无记录，已创建记录！';
//  echo json_encode($inform);
	$inform = new INFORM();
    $inform->code = 1;
    $inform->msg = '查询失败';
    echo json_encode($inform);
}

	




?>