<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติเครื่องมือแพทย์</title>
</head>
<body>
<div class="detail_container">
       
       <div class="detail_container">
 
       <a href="user_device.php"><button><<</button></a> <br><br>
       <head>วิธีการใช้งานเครื่อง</head>  
       <button onclick="window.print()">Print this page</button><br><br>
       <table>
             <tr>
                 <th>รหัสใบบันทึกสถานะ</th>
                 <th>วันที่</th>
                 <th>กิจกรรม</th>
                 <th>คำอธิบาย</th>
                 <th>ผู้บันทึก</th>

             </tr>
 
         <?php 
        include 'connect.php';
        $ids=$_GET['med_id'];

        $sql= "SELECT *  FROM med_device,med_status
        WHERE med_device.med_id=med_status.med_id
        AND  med_device.med_id = '$ids' "  ;


        $result = mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);




         while($row=mysqli_fetch_array($result)){        
         ?>
 
             <tr>
                 <td><?=$row["status_id"]?></td>
                 <td><?=$row["date_time"]?></td>
                 <td><?=$row["status"]?></td>
                 <td><?=$row["note"]?></td>
                 <td><?=$row["em_id"]?></td>

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