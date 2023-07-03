<?php 
session_start();
include 'connect.php';


$med_name= $_POST['med_name'];
$type_id= $_POST['type_id'];
$med_number= $_POST['med_number'];
$contact= $_POST['contact'];
$how_id= $_POST['how_id'];


if(is_uploaded_file($_FILES['file']['tmp_name'])){
    $new_img_name ='device_'.uniqid().".".pathinfo(basename($_FILES['file']['name']),PATHINFO_EXTENSION);

     $imq_upload_path = "./img/".$new_img_name;
     move_uploaded_file($_FILES['file']['tmp_name'],$imq_upload_path);
}else{
    $new_img_name="";
}

$sql = "INSERT INTO med_device (med_name,type_id,med_number,med_img,contact,how_id ) VALUE ('$med_name','$type_id',$med_number,'$new_img_name','$contact','$how_id')";

$result = mysqli_query($conn,$sql);



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
	$sMessage = "มีการเพิ่มเครื่องมือแพทย์";
    

	
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