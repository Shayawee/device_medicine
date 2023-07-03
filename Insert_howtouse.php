<?php 
include 'connect.php';

$med_device = $_POST[ 'meddevice_addhowtouse'];
$description  = $_POST[ 'desc_howtouse'];
$short_note = $_POST[ 'note_howtouse'];
$clip_how = $_POST['video_howtouse'];

if(is_uploaded_file($_FILES['file1']['tmp_name'])){
    $new_imgdevice_name ='device_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']),PATHINFO_EXTENSION);

     $imq_upload_path = "./img/".$new_imgdevice_name;
     move_uploaded_file($_FILES['file1']['tmp_name'],$imq_upload_path);
}else{
    $new_imgdevice_name="";
}

if(is_uploaded_file($_FILES['file2']['tmp_name'])){
    $new_imghow_name ='how_'.uniqid().".".pathinfo(basename($_FILES['file2']['name']),PATHINFO_EXTENSION);

     $imq_upload_path = "./img/".$new_imghow_name;
     move_uploaded_file($_FILES['file1']['tmp_name'],$imq_upload_path);
}else{
    $new_imghow_name="";
}

$sql = "INSERT INTO howtouse (how_name,how_description,img_device ,img_how ,clip_how ,short_note) VALUE ('$med_device','$description',' $new_imgdevice_name',' $new_imghow_name','$clip_how','$short_note')";

$result = mysqli_query($conn,$sql);

if($result){
    echo "<script>alert('บันทึกข้อมูลสำเร็จแล้ว')
    window.location.href = 'how_to_use.php'
   </script>";
}else{
    echo"<script>alert('บันทึกข้อมูลไม่สำเร็จ')
    window.location.href = 'add_howtouse.php'
   </script>";
}
if ($result){
	

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken="4UL5Tku2PI2EG07KVV4znKFVnIIcx4EbEuAETD7pZiF";
	$sMessage = "มีการเพิ่มวิธีการใช้งาน";
    

	
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