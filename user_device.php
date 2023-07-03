<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ห้องเครื่องมือแพทย์</title>
    </head>
    <body>
    <?php 
include 'user_menubar.php';
?>


    <div>
    <a href="how_to_use.php"><button>วิธีการใช้งาน</button></a>
    <a href="add_device.php"><button>เพิ่มเครื่องมือแพทย์</button></a>
    </div>
    <div>
        
      <?php 
    include 'connect.php';
    
    $sql = "SELECT md.med_id,md.med_name,md.type_id,md.med_number,md.med_img,md.contact,md.how_id,
    tm.type_id,tm.type_name
    FROM med_device md
    LEFT JOIN type_med tm ON tm.type_id = md.type_id
    ORDER BY med_id  " ;


    $result = mysqli_query($conn,$sql);

    while($row=mysqli_fetch_array($result)) {
        ?>

      <div class = "device">
        <p>เครื่องมือแพทย์ :<?=$row['med_name']?> </p> <br>
        <p>SerealNumber : <?=$row['med_number']?></p> <br>
        <p>ประเภทเครื่องมือแพทย์: <?=$row['type_name']?></p> <br>
        <p>ติดต่อผู้ขาย : <?=$row['contact']?></p> <br>
        <p><?=$row['med_img']?></p> 

        <a href="show_how_to_use.php?how_id=<?=$row["how_id"]?>"><button>วิธีการใช้งาน</button></a><br><br>

        <a href="detail_device.php?med_id=<?=$row["med_id"]?>"><button>ประวัติเครื่องมือแพทย์</button></a><br><br>
        
        <a href="delete_divice.php" onclick="Del (this.href);return false;"><button>ลบเครื่องมือแพทย์</button></a>

        <a href="edit_device.php?med_id=<?=$row["med_id"]?>"><button>แก้ไข</button></a><br><br>

      </div>  
      <?php 
    }

        mysqli_close($conn);
        ?>
    </div>
    </body>
</html>