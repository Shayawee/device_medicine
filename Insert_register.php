<?php
session_start();
include 'connect.php';


$name = $_POST['emname'];
$position = $_POST['emposition_dropdown'];
$username = $_POST['emusername'];
$password = $_POST['empassword'];
$cfpassword = $_POST['cfpassword'];


$sql = "INSERT INTO employee_med (em_name,em_posision,username,em_password,em_status)
VALUE ('$name','$position','$username','$password','0')";
$result= mysqli_query($conn,$sql);

if(($_POST["empassword"])!=($_POST["cfpassword"])){
    echo "<script>
    alert('การยืนยันรหัสผ่านไม่ตรงกัน');
    document.location.href = 'register.php';
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


if (isset($_POST['submit'])){
	
    $name = $_POST['emname'];
    $position = $_POST['emposition_dropdown'];

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken="Lx34zadZZt2KSdeybLy0hYRIZP3viKLqG91jZHZDfzE";
	$sMessage = "มีสมาชิกใหม่\n";
    $sMessage .= "ชื่อ:".$name."\n";
    $sMessage .= "ตำแหน่ง:".$position."\n";
    

	
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