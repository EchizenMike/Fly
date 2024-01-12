<?php
header('Access-Control-Allow-Origin:*');
// 允许上传的图片后缀
$user = $_GET['username'];
$allowedExts = array("png");
$temp = explode(".", $_FILES["file"]["name"]);
//echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
if (($_FILES["file"]["size"] < 10240000)  // 小于 10 mb
&& in_array($extension, $allowedExts))
{
	if ($_FILES["file"]["error"] > 0)
	{
		echo "错误：: " . $_FILES["file"]["error"] . "<br>";
	}
	else
	{
//		echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
//		echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
//		echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//		echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
		
		// 判断当期目录下的 upload 目录是否存在该文件
		// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
		if (file_exists("../photo/".$user))
		{
//			echo $_FILES["file"]["name"] . " 文件已经存在。 ";
			$arr = array(
    		'code' => 1,
    		'msg'=>'文件已存在',
    		'data' =>array(
    		'src' => null,
    		'user' => $user
     )
   );  
  	echo json_encode($arr);  
		}
		else
		{
			// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
			if(!is_dir('../photo')){
				mkdir('../photo',0777,true);
		}
			move_uploaded_file($_FILES["file"]["tmp_name"], "../photo/".$user.".".$extension);
//			echo "文件存储在: " . "FileStore/" . $_FILES["file"]["name"];//相对路径固定写法
			$arr = array(
    		'code' => 0,
    		'msg'=>'文件上传成功',
    		'data' =>array(
    		'src' => null,
    		'user' => $user
    	 ),
   );  
  echo json_encode($arr);  
		}
	}
}
else
{
//	echo "非法的文件格式";
			$arr = array(
    		'code' => 3,
    		'msg'=>'非法的文件格式',
    		'data' =>array(
    		'src' => null,
 			'user' => $user
    	 ),
   );  
  echo json_encode($arr);
}
?>