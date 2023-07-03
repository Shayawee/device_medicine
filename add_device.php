<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มเครื่องมือแพทย์</title>
</head>
<body>
<div class="adddevice_form" id="adddevice_form" >
        <div class="head_adddevice">
            <h1 class="adddevice">เพิ่มเครื่องมือแพทย์</h1>
        </div>

        <div class="my_form" >
        <form action="insert_device.php" method="post" enctype="multipart/form-data" >

            <label for="med_name">ชื่อเครื่องมือแพทย์</label> <br>
            <input
            name="med_name"
            type="text"
            class="med_name"
            id="med_name"
            onfocus="if(this.value=='กรุณาระบุชื่อเครื่องมือแพทย์') this.value='';"
            onblur="if(this.value=='') this.value='กรุณาระบุชื่อเครื่องมือแพทย์';"
            value="กรุณาระบุชื่อเครื่องมือแพทย์"
            /><br>

            
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

            
            <label for="med_number">เลข Sereal Number</label> <br>
            <input
            name="med_number"
            type="text"
            class="med_number"
            id="med_number"
            onfocus="if(this.value=='กรุณาระบุเลข S/N') this.value='';"
            onblur="if(this.value=='') this.value='กรุณาระบุเลข S/N';"
            value="กรุณาระบุเลข S/N"
            /><br>


            <label for="pic_update">กรุณาเลือกรูปภาพ</label> <br>
        <input type="file" name="file" value='file'><br>

            
                    
        <label for="contact">เบอร์ติดต่อผู้ขาย</label> <br>
            <input
            name="contact"
            type="text"
            class="contact"
            id="contact"
            onfocus="if(this.value=='กรุณาระบุเบอร์ติดต่อผู้ขาย') this.value='';"
            onblur="if(this.value=='') this.value='กรุณาระบุเบอร์ติดต่อผู้ขาย';"
            value="กรุณาระบุเบอร์ติดต่อผู้ขาย"
            /><br>


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
            onclick="return confirm('ยืนยันการเพิ่มเครื่องมือแพทย์?');"
            >เพิ่มเครื่องมือแพทย์</button>
            
        </form>
        </div>
    </div>
</body>
</html>