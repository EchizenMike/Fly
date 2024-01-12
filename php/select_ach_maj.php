<?php
header('Access-Control-Allow-Origin:*');
include ("./global_config.php");
$user = $_POST['user'];
////$phone =$_POST['Phonenum'];
class RESOBJ {
  	public $stu_maj_type;
    public $stu_maj;
    public $stu_maj_type2;
    public $stu_maj2;
    public $stu_maj_type3;
    public $stu_maj3;
    public $stu_maj_type4;
    public $stu_maj4;
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
$result = mysqli_query($conn, "SELECT stu_maj_type,stu_maj,stu_maj_type2,stu_maj2,stu_maj_type3,stu_maj3,stu_maj_type4,stu_maj4 FROM stu_info WHERE username = '$user'");
if ($result->num_rows > 0) {//判断结果集是否为空
  //  echo "OK" . " ";
    while ($row = mysqli_fetch_assoc($result)) {
        //  echo "结果为：" . $row['Fileid'] . " ".$row['Filename']." ".$row['Fileform']." ".$row['Filesize']." ".$row['Sharename']."\n"
        $resobj = new RESOBJ();
        $resobj->stu_maj_type = $row['stu_maj_type'];
        $resobj->stu_maj = $row['stu_maj'];
        $resobj->stu_maj_type2 = $row['stu_maj_type2'];
        $resobj->stu_maj2 = $row['stu_maj2'];
        $resobj->stu_maj_type3 = $row['stu_maj_type3'];
        $resobj->stu_maj3 = $row['stu_maj3'];
        $resobj->stu_maj_type4 = $row['stu_maj_type4'];
        $resobj->stu_maj4 = $row['stu_maj4'];
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