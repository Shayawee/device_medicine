<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มวิธีใช้งานเครื่อง</title>
</head>
<body>
    <div class="addhowtouse_container">
        <form action="Insert_howtouse.php" method="post"enctype="multipart/form-data" >
            
        <label for="meddevice_addhowtouse">ชื่อเครื่องมือแพทย์</label><br>
        <input 
        name="meddevice_addhowtouse"
        type="text"
        class="meddevice_addhowtouse"
        id="meddevice_addhowtouse"
        onfocus="if(this.value=='ชื่อเครื่องมือแพทย์') this.value='';"
        onblur="if(this.value=='') this.value='ชื่อเครื่องมือแพทย์';"
        value="ชื่อเครื่องมือแพทย์"
        /> <br>



        <label for="desc_howtouse">คำอธิบายวิธีการใช้งาน</label><br>
        <textarea  
        name="desc_howtouse"
        type="text"
        class="desc_howtouse"
        id="desc_howtouse"
        onfocus="if(this.value=='Description') this.value='';"
        onblur="if(this.value=='') this.value='Description';"
        value="Description"
        > </textarea ><br>



        <label for="img_howtouse">เพิ่มรูปภาพอุปกรณ์ของเครื่อง</label><br>
        <input type="file" name="file1" id="file1"><br>

        <label for="img_howtouse">เพิ่มรูปภาพการต่อเครื่อง</label><br>
        <input type="file" name="file2" id="file12"><br>

        <label for="video_howtouse">เพิ่มคลิปที่เกี่ยวข้อง</label><br>
        <input type="url" name="video_howtouse"> <br>


        <label for="note_howtouse">หมายเหตุ</label><br>
        <textarea 
        name="note_howtouse"
        type="text"
        class="note_howtouse"
        id="note_howtouse"> </textarea><br>
         <button type="submit">บันทึกวิธีใช้งาน</button>

        
        </form>


    </div>
  
</body>
</html>