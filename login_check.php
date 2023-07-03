<?php
include("connect.php");

session_start();

$username = $_POST['username_login'];
$password = $_POST['password_login'];


$sql = "SELECT * FROM employee_med  WHERE username='$username' and em_password = $password ";


$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($result);
$status = $row['em_status'];


if($row > 0){
    $_SESSION["username"]=$row['username'];
    $_SESSION["password"]=$row['em_password'];

    if($status == '0'){
        header("location:user_homepage.php");
    }elseif($status=='1'){
        header("location:admin_homepage.php");
    }
    
}else{
    $_SESSION["Error"]="<p>Username หรือ Password ไม่ถูกต้อง กรุณา Login ใหม่อีกครั้ง</p>";

    header("location:login.php");
}

?>
