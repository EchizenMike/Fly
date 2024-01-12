<?php
header('Access-Control-Allow-Origin:*');
include ("./global_config.php");
$user = $_POST['user'];
$maj = $_POST['maj'];
////$phone =$_POST['Phonenum'];
class RESOBJ {
  	public $ach;
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
$result = mysqli_query($conn, "SELECT ach FROM stu_ach WHERE username = '$user' AND maj='$maj'");
if ($result->num_rows > 0) {//判断结果集是否为空
  //  echo "OK" . " ";
    while ($row = mysqli_fetch_assoc($result)) {
        //  echo "结果为：" . $row['Fileid'] . " ".$row['Filename']." ".$row['Fileform']." ".$row['Filesize']." ".$row['Sharename']."\n"
        $resobj = new RESOBJ();
        $resobj->ach = $row['ach'];
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