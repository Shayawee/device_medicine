 <?php 
session_start();
if(!isset( $_SESSION["password"])){
    header("location:login.php");
}
 ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ห้องเครื่องมือแพทย์</title>
    <style>
        .updatestatus_form {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}
    </style>
</head>
<body>


<?php 
include 'user_menubar.php';
?>

    <div class="updatestatus_container">
        <button  class="open-button" onclick="openForm()">Update Status</button>
    </div>

    <div class="updatestatus_form" id="status_form" >
        <div class="head_updatestatus">
            <h1 class="updatedtatus">Updatedtatus</h1>
        </div>

        <div class="my_form" >
        <form action="insert_status.php" method="post" enctype="multipart/form-data" >

                     
            <label for="medname_update">รหัสเครื่องมือแพทย์</label> <br>
            
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
            
            <label for="updatestatus_dropdown">สถานะเครื่องมือแพทย์</label> <br>
            <select name="updatestatus_dropdown" id="updatestatus_dropdown">
                
                <option value="รอการตรวจสอบ">รอการตรวจสอบ</option>
                <option value="ไม่พร้อมใช้งาน ">ไม่พร้อมใช้งาน</option>
                <option value="พร้อมใช้งาน">พร้อมใช้งาน</option>            
            </select><br>

            <label for="note_update">หมายเหตุ</label> <br>
            <input
            name="note_update"
            type="text"
            class="note_update"
            id="note_update"
            onfocus="if(this.value=='คำอธิบายกิจกรรม') this.value='';"
            onblur="if(this.value=='') this.value='คำอธิบายกิจกรรม';"
            value="คำอธิบายกิจกรรม"
            /><br>

            
            <label for="record_status">รหัสผู้บันทึก</label> <br>
            <input
            name="record_status"
            type="text"
            class="record_status"
            id="record_status"
            onfocus="if(this.value=='รหัสผู้บันทึก') this.value='';"
            onblur="if(this.value=='') this.value='รหัสผู้บันทึก';"
            value="รหัสผู้บันทึก"
            /><br>



            

            <button  type="submit" name="update"
            onclick="return confirm('ยืนยันการอัพเดตสถานะ?');"
            >อัพเดตสถานะ</button>
            
        </form>
        </div>
    </div>



    <div class="status_container">
    <div class="data_status">


      <?php 
    include 'connect.php';
    
    $sql = "SELECT ms.status_id,ms.med_id,ms.date_time,ms.status,ms.note,ms.em_id,
    md.med_id,md.med_name,
    em.em_id,em.em_name
    FROM med_status ms
    LEFT JOIN  med_device md ON ms.med_id = md.med_id
    LEFT JOIN employee_med em ON ms.em_id = em.em_id
    ORDER BY ms.date_time DESC " ;


    $result = mysqli_query($conn,$sql);

    while($row=mysqli_fetch_array($result)) {
        ?>

      <div class = "status_con">
        <p>เครื่องมือแพทย์ :<?=$row['med_name']?> </p> <br>
        <p>วันที่ : <?=$row['date_time']?></p> <br>
        <p>สถานะเครื่องมือแพทย์: <?=$row['status']?></p> <br>
        <p>อาการ : <?=$row['note']?></p> <br>
        <p>ผู้บันทึก : <?=$row['em_name']?></p> 

      </div>  
      <?php 
    }

        mysqli_close($conn);
        ?>
    </div>   
    </div>

</body>
</html>

<script>
function openForm() {
  document.getElementById("status_form").style.display = "block";
}

</script>

</script>