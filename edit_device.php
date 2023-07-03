<?php 
include 'connect.php';
$ids=$_GET['med_id'];
$sql="SELECT * FROM `med_device` WHERE med_id=$ids";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลเครื่องมือแพทย์</title>
</head>
<body>
<div class="adddevice_form" id="adddevice_form" >
        <div class="head_adddevice">
            <h1 class="adddevice">แก้ไขข้อมูลเครื่องมือแพทย์</h1>
        </div>


        

        <div class="my_form" >
        <form action="update_device.php" method="post" enctype="multipart/form-data" >

            <label for="med_id">รหัสเครื่องมือแพทย์</label> <br>
            <input type="text" name="med_id" readonly value="<?=$row["med_id"]?>" /><br>

            <label for="med_name">ชื่อเครื่องมือแพทย์</label> <br>
            <input type="text" name="med_name" value="<?=$row["med_name"]?>" /><br>

            <label for="med_number">หมายเลข S/N</label> <br>
            <input type="text" name="med_number" value="<?=$row["med_number"]?>" /><br>

            <label for="contact">เบอร์ติดต่อผู้ขาย</label> <br>
            <input type="text" name="contact" value="<?=$row["contact"]?>" /><br>

            
            <label for="type_med">ประเภทเครื่องมือแพทย์</label> <br>
        <select name="type_med">
            <?php 
    include 'connect.php';

    $sql ="SELECT * FROM `type_med`ORDER BY type_id DESC ";
    $hand = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($hand)){
        ?>
        <option  value="<?=$row['type_id']?>"><?=$row['type_name']?></option>
        <?php
    }
    mysqli_close($conn);
    ?>

    </select> <br>


            <label for="how_id">วิธีการใช้งาน</label> <br>
        <select name="how_id">
            
    <?php 
    include 'connect.php';

    $sql ="SELECT * FROM `howtouse` ORDER BY how_id DESC ";
    $hand = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($hand)){
        ?>
        <option  value="<?=$row['how_id']?>"><?=$row['how_name']?></option>
        <?php
    }
    mysqli_close($conn);
    ?>

    </select> <br>

            <button  type="submit" name="update"
            onclick="return confirm('ยืนยันการแก้ไขข้อมูลเครื่องมือแพทย์?');"
            >อัพเดต</button>
            
        </form>
        </div>
    </div>
</body>
</html>
