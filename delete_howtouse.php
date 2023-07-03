<?php 
include 'connect.php';

$id=$_GET['how_id'];
$sql="DELETE FROM howtouse WHERE how_id='$id' ";

if(mysqli_query($conn,$sql)){
    echo "<script>alert('ลบข้อมูลวิธีการใช้งานเรียบร้อย');</script>";
    echo "<script>window.location='how_to_use.php';</script>";
}else{
    echo "Error : ". $sql . "<br>" . mysqli_error($conn);
    echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
}

mysqli_close($conn);

?>