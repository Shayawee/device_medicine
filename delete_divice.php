<?php 
include 'connect.php';

$id=$_GET['med_id'];
$sql="DELETE FROM med_device WHERE med_id ='$id' ";

if(mysqli_query($conn,$sql)){
    echo "<script>alert('ลบข้อมูลเครื่องมือแพทย์แล้ว');</script>";
    echo "<script>window.location='user_device.php';</script>";
}else{
    echo "Error : ". $sql . "<br>" . mysqli_error($conn);
    echo "<script>alert('ไม่ลบข้อมูลเครื่องมือแพทย์');</script>";
}

mysqli_close($conn);

?>