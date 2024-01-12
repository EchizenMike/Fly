<?php
header('Access-Control-Allow-Origin:*');
include ("./global_config.php");
$grade = $_POST['stu_grade'];
////$phone =$_POST['Phonenum'];
class RESOBJ {
  	public $username;
  	public $stu_id;
  	public $stu_self_id;
    public $stu_name;
    public $stu_sex;
    public $stu_nation;
    public $stu_date;
    public $stu_age;
    public $stu_grade;
    public $stu_class;
    public $stu_chuzhong;
    public $stu_premaj;
    public $stu_premaj_ach;
    public $stu_type;
    public $stu_maj_type;
    public $stu_maj;
    public $stu_maj_type2;
    public $stu_maj2;
    public $stu_maj_type3;
    public $stu_maj3;
    public $stu_maj_type4;
    public $stu_maj4;
    public $stu_con;
    public $stu_home_father_name;
    public $stu_home_father_phone;
    public $stu_home_mother_name;
    public $stu_home_mother_phone;
    public $stu_honor;
    public $stu_punish;
}
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
$result = mysqli_query($conn, "SELECT * FROM stu_info WHERE stu_grade = '$grade'");
if ($result->num_rows > 0) {//判断结果集是否为空
  //  echo "OK" . " ";
    while ($row = mysqli_fetch_assoc($result)) {
        //  echo "结果为：" . $row['Fileid'] . " ".$row['Filename']." ".$row['Fileform']." ".$row['Filesize']." ".$row['Sharename']."\n"
		$resobj = new RESOBJ();
        $resobj->username = $row['username'];
        $resobj->stu_id = $row['stu_id'];
        $resobj->stu_self_id = $row['stu_self_id'];
        $resobj->stu_name = $row['stu_name'];
        $resobj->stu_sex = $row['stu_sex'];
        $resobj->stu_nation = $row['stu_nation'];
        $resobj->stu_date = $row['stu_date'];
        $resobj->stu_age = $row['stu_age'];
        $resobj->stu_grade = $row['stu_grade'];
        $resobj->stu_class = $row['stu_class'];
        $resobj->stu_chuzhong = $row['stu_chuzhong'];
        $resobj->stu_premaj = $row['stu_premaj'];
        $resobj->stu_premaj_ach = $row['stu_premaj_ach'];
        $resobj->stu_type = $row['stu_type'];
        $resobj->stu_maj_type = $row['stu_maj_type'];
        $resobj->stu_maj = $row['stu_maj'];
        $resobj->stu_maj_type2 = $row['stu_maj_type2'];
        $resobj->stu_maj2 = $row['stu_maj2'];
        $resobj->stu_maj_type3 = $row['stu_maj_type3'];
        $resobj->stu_maj3 = $row['stu_maj3'];
        $resobj->stu_maj_type4 = $row['stu_maj_type4'];
        $resobj->stu_maj4 = $row['stu_maj4'];
        $resobj->stu_con = $row['stu_con'];
        $resobj->stu_home_father_name = $row['stu_home_father_name'];
        $resobj->stu_home_father_phone = $row['stu_home_father_phone'];
        $resobj->stu_home_mother_name = $row['stu_home_mother_name'];
        $resobj->stu_home_mother_phone = $row['stu_home_mother_phone'];
        $resobj->stu_honor = $row['stu_honor'];
        $resobj->stu_punish = $row['stu_punish'];
        $dataresult[] = $resobj;//数组遍历
    }
    $inform = new INFORM();
    $inform->code = 0;
    $inform->msg = null;
    $inform->count = count($dataresult);
    $inform ->data = $dataresult;
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
    $inform->msg = '无内容';
    $inform->count = 0;
    $inform ->data = null;
    echo json_encode($inform);
}



?>