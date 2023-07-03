<?php 
session_start();
include 'connect.php';

$med_id = $_POST['med_id'];

date_default_timezone_set("Asia/Bangkok");
$date =  date("Y-m-d H:i:s");

$med_statusd = $_POST['updatestatus_dropdown'];
$med_note = $_POST['note_update'];
$em_id = $_POST['record_status'];

$sql = "INSERT INTO med_status (med_id,date_time,status,note,em_id) VALUE ('$med_id','$date','$med_statusd','$med_note','$em_id')";

$result = mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('บันทึกข้อมูลสำเร็จแล้ว')
    window.location.href = 'user_homepage.php'
   </script>";
  
}else{
    echo"<script>alert('บันทึกข้อมูลไม่สำเร็จ')
    window.location.href = 'user_homepage.php'
   </script>";
}


//แจ้งเตือน

if ($result){
	

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken="4UL5Tku2PI2EG07KVV4znKFVnIIcx4EbEuAETD7pZiF";
	$sMessage = "มีการอัพเดตสถานะเครื่องมือแพทย์";
    

	
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
mysqli_close($conn);

?>