<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ห้องเครื่องมือแพทย์</title>
    </head>
    <body>
    <div>
    <a href="user_device.php"><button><<</button></a>
    </div>
    <div>

    <?php 
    include 'connect.php';

    $ids=$_GET['how_id'];
    $sql = "SELECT *  FROM med_device,howtouse
    WHERE med_device.how_id=howtouse.how_id
    AND  med_device.how_id = '$ids' " ;

    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

    ?>

        <div class = "howtouse">
        <p><?=$row['how_name']?> </p> <br>
        <p><?=$row['how_description']?></p> <br>
        <p>ภาพเครื่องมือแพทย์ :</p> <br>
        <img src="img/<?=$row['img_device']?>" width="200px" height="200px" >><br>
        <p>เซ็ท และ สายเซอกิต :</p> <br>
        <img src="img/<?=$row['img_how']?>" width="200px" height="200px" ><br>
        <p>ข้อควรระวัง :<?=$row['short_note']?></p>
        <a href="<?=$row['clip_how']?>"><button>วิธีการต่อเครื่อง</button></a>

      </div>  

      <?php 
        mysqli_close($conn);
        ?>
        </div> 
    </body>
    </html>