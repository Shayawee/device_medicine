
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกการส่งซ่อม</title>
</head>
<body>
<?php 
include 'user_menubar.php';
?>

    <div class="repair_container">
        
    <form action="insert_repair.php" method="post" 
    enctype="multipart/form-data">
        
        
        
    <label for="med_name">ชื่อเครื่องมือแพทย์</label> <br>
        <select name="med_id">
            
    <?php 
    include 'connect.php';

    $sql ="SELECT * FROM `med_device` ORDER BY med_name ";
    $hand = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($hand)){
        ?>
        <option  value="<?=$row['med_id']?>"><?=$row['med_name']?></option>
        <?php
    }
    mysqli_close($conn);
    ?>

    </select>

       

        <br>

        <label for="happenning">อาการ</label> <br>
        <input 
        name="happenning"
        type="text"
        class="happening"
        id="happening"
        onfocus="if(this.value=='อาการ') this.value='';"
        onblur="if(this.value=='') this.value='อาการ';"
        value="อาการ"
        /> <br>

        <label for="pic_update">กรุณาเลือกรูปภาพ</label> <br>
        <input type="file" name="file" value='file'><br>


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

         <button type="submit" class="repair_container" onclick="return confirm('ยืนยันการการส่งซ่อมเครื่องมือแพทย์?');">ส่งซ่อม</button>

        </form>

       
</body>
</html>