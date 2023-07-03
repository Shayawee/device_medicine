<?php 
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>รายชื่อสมาชิก</title>
</head>
<body>
    <div class="header_caontainer"></div>
    <?php 
include 'admin_menubar.php';
?>


    <div class="data_team">
        <head>รายชื่อสมาชิก</head> <br>
        <table>
            <tr>
                <th>รหัสพนักงาน</th>
                <th>ชื่อ-นามสกุล</th>
                <th>ตำแหน่ง</th>
                <th></th>
            </tr>

        <?php 
        $sql = "SELECT * FROM employee_med " ;
        $result = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){        
        ?>

            <tr>
                <td><?=$row["em_id"]?></td>
                <td><?=$row["em_name"]?></td>
                <td><?=$row["em_posision"]?></td>
                <td> <a href="delete_team.php?em_id=<?=$row["em_id"]?>" onclick="Del (this.href);return false;"><button>ลบสมาชิก</button></a></td>
            </tr>
        
        <?php 
        }
        mysqli_close($conn);
        ?>
        </table>
    </div>   
</body>
</html>

