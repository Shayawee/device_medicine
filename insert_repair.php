<?php 
session_start();
include 'connect.php';


$med_id = $_POST['med_id'];
date_default_timezone_set("Asia/Bangkok");
$date = date("Y-m-d H:i:s");
$happenning = $_POST['happenning'];
$record=$_POST['record'];

$id_med = $_POST['med_id'];
date_default_timezone_set("Asia/Bangkok");
$today = date("Y-m-d H:i:s");
$happen= $_POST['happenning'];
$em_id=$_POST['record'];


if(is_uploaded_file($_FILES['file']['tmp_name'])){
    $new_img_name ='re_'.uniqid().".".pathinfo(basename($_FILES['file']['name']),PATHINFO_EXTENSION);

     $imq_upload_path = "./img/".$new_img_name;
     move_uploaded_file($_FILES['file']['tmp_name'],$imq_upload_path);
}else{
    $new_img_name="";
}

$sql1 = "INSERT INTO med_repair (re_date,happening,img,med_id,em_id) VALUE ('$date','$happenning','$new_img_name','$med_id','$record')";

$sql2 = "INSERT INTO med_status (med_id,date_time,status,note,em_id)  VALUE ('$id_med','$today','ส่งซ่อม','$happen','$em_id')";


$result = mysqli_query($conn,$sql1);
$result = mysqli_query($conn,$sql2);



if($result){
    echo "<script>alert('บันทึกข้อมูลสำเร็จแล้ว')
    window.location.href = 'user_homepage.php'
   </script>";
  
}else{
    echo"<script>alert('บันทึกข้อมูลไม่สำเร็จ')
    window.location.href = 'repair.php'
   </script>";
}
if ($result){
	

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken="4UL5Tku2PI2EG07KVV4znKFVnIIcx4EbEuAETD7pZiF";
	$sMessage = "มีการส่งซ่อม";
    

	
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	curl_close( $chOne );   

}
?>