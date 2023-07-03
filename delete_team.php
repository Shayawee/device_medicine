<?php 
include 'connect.php';

$id=$_GET['em_id'];
$sql="DELETE FROM employee_med WHERE em_id ='$id' ";

if(mysqli_query($conn,$sql)){
    echo "<script>alert('ลบข้อมูลสมาชิกเรียบร้อย');</script>";
    echo "<script>window.location='admin_team.php';</script>";
}else{
    echo "Error : ". $sql . "<br>" . mysqli_error($conn);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
}

mysqli_close($conn);

?>