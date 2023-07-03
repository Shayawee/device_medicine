<?php 
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>วิธีการใช้งานเครื่อง</title>
  </head>
  <body>
    <div class="book_container">
       
      <div class="howtouse_container">

      <a href="user_device.php"><button><<</button></a> <br><br>
      <head>วิธีการใช้งานเครื่อง</head>  
      <a href="add_howtouse.php"><button>เพิ่มวิธีการใช้งานเครื่อง</button></a><br><br>
      <table>
            <tr>
                <th>รหัสวิธีการใช้งาน</th>
                <th>คำอธิบายการใช้งาน</th>
                <th>รูปภาพอุปกรณ์</th>
                <th>รูปภาพการต่อเครื่อง</th>
                <th>คลิปวีดีโอการใช้งาน</th>
                <th>หมายเหตุ</th>
                
            </tr>

        <?php 
        $sql = "SELECT * FROM howtouse " ;
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){        
        ?>

            <tr>
                <td><?=$row["how_id"]?></td>
                <td><?=$row["how_description"]?></td>
                <td><img src="img/<?=$row['img_device']?>" width="100px" height="100px" ></td>
                <td><img src="img/<?=$row['img_how']?>" width="100px" height="100px" ></td>
                <td> <a href="<?=$row["clip_how"]?>"> <button> เปิดคลิปวีดีโอ </button> </a> </td>
                <td><?=$row["short_note"]?></td>
              
            </tr>
        
        <?php 
        }
        mysqli_close($conn);
        ?>
        </table>


      </div>
    </div>
  </body>
</html>
