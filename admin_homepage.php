<?php 
// //session_start();
// if(!isset( $_SESSION["password"])){
//     header("location:Test_login.php");
// }
?>
<?php include('connect.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ห้องเครื่องมือแพทย์</title>
</head>
<body>
<?php 
include 'admin_menubar.php';
?>



    <div class="status_container">
    <div class="data_status">

  
    <?php 
    $sql = "SELECT ms.status_id,ms.med_id,ms.date_time,ms.status,ms.note,ms.em_id,
    md.med_id,md.med_name,
    em.em_id,em.em_name
    FROM med_status ms
    LEFT JOIN  med_device md ON ms.med_id = md.med_id
    LEFT JOIN employee_med em ON ms.em_id = em.em_id
    ORDER BY ms.date_time DESC " ;

    $result = mysqli_query($conn,$sql);

    while($row=mysqli_fetch_array($result)) {
        ?>

      <div class = "status_con">
        <p>เครื่องมือแพทย์ :<?=$row['med_name']?> </p> <br>
        <p>วันที่ : <?=$row['date_time']?></p> <br>
        <p>สถานะเครื่องมือแพทย์: <?=$row['status']?></p> <br>
        <p>อาการ : <?=$row['note']?></p> <br>
        <p>ผู้บันทึก : <?=$row['em_name']?></p> 

      </div>  
      <?php 
    }

        mysqli_close($conn);
        ?>
    </div>   
    </div>


</body>
</html>