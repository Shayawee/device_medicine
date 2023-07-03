<?php 
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อสมาชิก</title>
</head>
<body>
    
<?php 
include 'user_menubar.php';
?>
    <div class="data_team">
        <head>รายชื่อสมาชิก</head> <br>
        <table>
            <tr>
                <th>รหัสพนักงาน</th>
                <th>ชื่อ-นามสกุล</th>
                <th>ตำแหน่ง</th>
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
            </tr>
        
        <?php 
        }
        mysqli_close($conn);
        ?>
        </table>
    </div>
  
    

    
   
</body>
</html>