

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>ดูแลเครื่องมือแพทย์</title>
</head>
<body>
<?php 
include 'user_menubar.php';
?>

    <div class="maintenance_container">
        <form action="insert_maintenance.php" method="post"  enctype="multipart/form-data">
        <label for="med_name">ชื่อเครื่องมือแพทย์</label> <br>


    <select name="med_id">
            
    <?php 
    include 'connect.php';

    $sql ="SELECT * FROM `med_device` ORDER BY med_name ";
    $hand = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($hand)){
        ?>
        <option value="<?=$row['med_id']?>"><?=$row['med_name']?></option>
        <?php
    }
    mysqli_close($conn);
    ?>

    </select>


        <select name="maintenance_dropdown" id="maintenance_dropdown">
            <option value="">เลือกประเภทการดูแลเครื่องมือแพทย์</option>
            <option value="ชาร์จแบต">ชาร์จแบต</option>
            <option value="อบเครื่อง">อบเครื่อง</option>     
        </select>  

        <div class="time_container">
        <label for="start_time">เวลาเริ่มต้น:</label>
        <input type="time" id="start_time" name="start_time"><br>
        <label for="end_time">เวลาสิ้นสุด:</label>
        <input type="time" id="end_time" name="end_time"><br>

        </div>

        
        <label for="record">ชื่อผู้บันทึก</label> <br>
            <input
            name="record"
            type="text"
            class="record"
            id="record"
            onfocus="if(this.value=='รหัสพนักงาน') this.value='';"
            onblur="if(this.value=='') this.value='รหัสพนักงาน';"
            value="รหัสพนักงาน"
            /><br>
            
        <button type="submit" class="maintenance_btn" onclick="return confirm('ยืนยันการการดูแลเครื่องมือแพทย์?');"   ,>บันทึก</button>
        </form>
       


    </div>
    
</body>
</html>
