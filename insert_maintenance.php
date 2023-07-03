<?php
session_start();
include 'connect.php';



$med_id=$_POST['med_id'];
$status=$_POST['maintenance_dropdown'];
date_default_timezone_set("Asia/Bangkok");
$date_time=date("Y-m-d H:i:s");
$start_time=$_POST['start_time'];
$end_time=$_POST['end_time'];
$em_id=$_POST['record'];  


$sql1 = "INSERT INTO med_maintenance (med_id,med_status,date_time,start_time,end_time,em_id) VALUE ('$med_id','$status','$date_time','$start_time','$end_time','$em_id')";

$sql2 = "INSERT INTO med_status (med_id,date_time,status,note,em_id) VALUE ('$med_id','$date_time','$status','การดูแลเครื่องมือแพทย์','$em_id')";



$result = mysqli_query($conn,$sql1);
$result = mysqli_query($conn,$sql2);


if($result){
    echo "<script>
    alert('บันทึกข้อมูลสำเร็จแล้ว')
    window.location.href = 'user_homepage.php'
   </script>";
  
}else{
    echo "Error:",$sql ,"<br>",mysqli_error($conn);
    echo"<script>alert('บันทึกข้อมูลไม่สำเร็จ')
    window.location.href = 'maintenance.php'
   </script>";
}


if($result){
    echo "<script>
    alert('บันทึกข้อมูลสำเร็จ กรุณารอการตอบกลับของ Admin')
    document.location.href = 'login.php';
    </script> ";
}else{
    echo "Error:",$sql ,"<br>",mysqli_error($conn);
    echo  "<script>
    alert('ไม่สามารถบันทึกข้อมูลได้');
    </script> ";
}
//----Notify Line

if ($result){
	

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken="4UL5Tku2PI2EG07KVV4znKFVnIIcx4EbEuAETD7pZiF";
	$sMessage = "มีการชาร์ตแบต/อบเครื่อง";
    

	
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