<?php 
include 'connect.php';

$med_id= $_POST['med_id'];
$med_name= $_POST['med_name'];
$med_number= $_POST['med_number'];
$contact= $_POST['contact'];




$sql = " UPDATE med_device SET med_name='$med_name',med_number='$med_number',contact='$contact' WHERE med_id= '$med_id'";

$result = mysqli_query($conn,$sql);



if($result){
    echo "<script>alert('แก้ไขข้อมูลสำเร็จแล้ว')
    window.location.href = 'user_device.php'
   </script>";
  
}else{
    echo"<script>alert('แก้ไขข้อมูลไม่สำเร็จ')
    window.location.href = 'edit_device.php'
   </script>";
}

?>