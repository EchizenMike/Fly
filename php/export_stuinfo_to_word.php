<?php
   //  Creating the new document...
$stu_photo = $_POST['stu_photo'];
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

require '../vendor/autoload.php';
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('../lib/model/model.docx');
$templateProcessor->setImageValue('stu_photo', $stu_photo);
$templateProcessor->setValue('stu_id',$stu_id);
$templateProcessor->setValue('stu_self_id',$stu_self_id);
$templateProcessor->setValue('stu_name',$stu_name);
$templateProcessor->setValue('stu_sex',$stu_sex);
$templateProcessor->setValue('stu_date',$stu_date);
$templateProcessor->setValue('stu_age',$stu_age);
$templateProcessor->setValue('stu_grade',$stu_grade);
$templateProcessor->setValue('stu_class',$stu_class);
$templateProcessor->setValue('stu_nation',$stu_nation);
$templateProcessor->setValue('stu_chuzhong',$stu_chuzhong);
$templateProcessor->setValue('stu_premaj',$stu_premaj);
$templateProcessor->setValue('stu_premaj_ach',$stu_premaj_ach);
$templateProcessor->setValue('stu_type',$stu_type);
$templateProcessor->setValue('stu_maj_type',$stu_maj_type);
$templateProcessor->setValue('stu_maj_type2',$stu_maj_type2);
$templateProcessor->setValue('stu_maj_type3',$stu_maj_type3);
$templateProcessor->setValue('stu_maj_type4',$stu_maj_type4);
$templateProcessor->setValue('stu_maj',$stu_maj);
$templateProcessor->setValue('stu_maj2',$stu_maj2);
$templateProcessor->setValue('stu_maj3',$stu_maj3);
$templateProcessor->setValue('stu_maj4',$stu_maj4);
$templateProcessor->setValue('stu_type',$stu_type);
$templateProcessor->setValue('stu_con',$stu_con);
$templateProcessor->setValue('stu_home_father_name',$stu_home_father_name);
$templateProcessor->setValue('stu_home_father_phone',$stu_home_father_phone);
$templateProcessor->setValue('stu_home_mother_name',$stu_home_mother_name);
$templateProcessor->setValue('stu_home_mother_phone',$stu_home_mother_phone);
$templateProcessor->setValue('stu_honor',$stu_honor);
$templateProcessor->setValue('stu_punish',$stu_punish);


//生成新的word
$templateProcessor->saveAs("../temp/".$stu_name."_person_inform.docx");

//从浏览器下载
ob_clean();
ob_start();
$fp = fopen('../temp/result.docx',"r");
$file_size = filesize('../temp/result.docx');
Header("Content-type:application/octet-stream");
Header("Accept-Ranges:bytes");
Header("Accept-Length:".$file_size);
Header("Content-Disposition:attchment; filename=".'个人信息导出.docx');
$buffer = 1024;
$file_count = 0;
while (!feof($fp) && $file_count < $file_size){
    $file_con = fread($fp,$buffer);
    $file_count += $buffer;
    echo $file_con;
}
fclose($fp);
ob_end_flush();
sleep(30);
unlink("../temp/".$stu_name."_person_inform.docx");
?>