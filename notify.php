<?php 
if (isset($_POST['submit'])){

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken="Lx34zadZZt2KSdeybLy0hYRIZP3viKLqG91jZHZDfzE";

	$sToken="RAZnQHIG1vFaSt6hLVUNUfLvN03SXXaQqITCHsXwpGS";
	
	$sToken="4UL5Tku2PI2EG07KVV4znKFVnIIcx4EbEuAETD7pZiF";


	$sMessage = "มีสมาชิกใหม่\n";
    $sMessage .= "ชื่อ"."\n";
    $sMessage .= "ตำแหน่ง"."\n";
    

	
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

	//Result error 
	/*if(curl_error($chOne)) 
	{ 
		echo 'error:' . curl_error($chOne); 
	} 
	else { 
		$result_ = json_decode($result, true); 
		echo "status : ".$result_['status']; echo "message : ". $result_['message'];
	} */
    if($result){
        $_SESSION['success']='บันทึกข้อมูลสำเร็จ กรุณารอการตอบกลับของ ';
        header("location : login.php");
    }else{
        $_SESSION['error']='ไม่สำเร็จ ';
        header("location : login.php");
    }

	curl_close( $chOne );   

}
?>