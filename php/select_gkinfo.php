<?php
header('Access-Control-Allow-Origin:*');
include ("./global_config.php");
$name = $_POST['stu_name'];
////$phone =$_POST['Phonenum'];
class RESOBJ {
  	public $stu_ach;
    public $stu_pro_name;
    public $stu_pro_ach;
    public $stu_type;
    public $stu_tj_100_ach;
    public $stu_tj_ldty_ach;
    public $stu_tj_qq_ach;
    public $stu_gk_pro ;
    public $stu_gk_pro_ach ;
    public $stu_gk_adm_sch ;
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
$result = mysqli_query($conn, "SELECT * FROM stu_gk_ach WHERE username = '$name'");
$res_self = mysqli_query($conn, "SELECT stu_type FROM stu_info WHERE username = '$name'");
if ($result->num_rows > 0) {//判断结果集是否为空
  //  echo "OK" . " ";
    while ($row = mysqli_fetch_assoc($result)) {
        //  echo "结果为：" . $row['Fileid'] . " ".$row['Filename']." ".$row['Fileform']." ".$row['Filesize']." ".$row['Sharename']."\n"
        $resobj = new RESOBJ();
        $resobj->stu_ach = $row['stu_ach'];
        $resobj->stu_pro_name = $row['stu_pro_name'];
        $resobj->stu_pro_ach = $row['stu_pro_ach'];
        $resobj->stu_tj_100_ach = $row['stu_tj_100_ach'];
        $resobj->stu_tj_ldty_ach = $row['stu_tj_ldty_ach'];
        $resobj->stu_tj_qq_ach = $row['stu_tj_qq_ach'];
        $resobj->stu_gk_pro = $row['stu_gk_pro'];
        $resobj->stu_gk_pro_ach = $row['stu_gk_pro_ach'];
        $resobj->stu_gk_adm_sch = $row['stu_gk_adm_sch'];
        if($res_self->num_rows>0){
        	while ($row2 = mysqli_fetch_assoc($res_self)){
        		$resobj->stu_type = $row2['stu_type'];
        	}
        }
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