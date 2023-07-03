<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงทะเบียนเข้าใช้งาน</title>
  </head>
  <body>
  <div class="register_container">
        <form action="Insert_register.php" method="post"  id="register_form" enctype="multipart/form-data">
            <h1 class="register_head">ลงทะเบียนเข้าใช้งาน</h1>

          <label for="emname">ชื่อ-นามสกุลเจ้าหน้าที่</label>
            <input
            type="text" name="emname" id="emname" class="form-control" required minlength="3" placeholder="กรุณากรอกชื่อ-นามสกุล"/> <br>

            <label for="emposition_dropdown">ตำแหน่งงาน</label>
            <select name="emposition_dropdown" id="emposition_dropdown">
              <option value="UM">หัวหน้าหอผู้ป่วย(UM)</option>
                <option value="RN">พยาบาลวิชาชีพ(RN)</option>
                <option value="PN">ผุ้ช่วยพยาบาล(PN)</option>
                <option value="NA ">พนักงานช่วยเหลือผู้ป่วย(NA)</option>            
            </select><br>

            <label for="emusername">ชื่อผู้ใช้</label>
            <input
            type="text" name="emusername" id="emusername" class="form-control" required minlength="3" placeholder="กรุณาระบุชื่อผู้ใช้(username)"
            /> <br>

            <label for="empassword">รหัสผ่าน</label>
            <input
            type="text" name="empassword" id="empassword" class="form-control" required minlength="4" placeholder="กรุณาสร้างรหัสผ่านตั้งแต่ 4 ตัวขึ้นไป"
            /> <br>

            <label for="cfpassword">ยืนยันรหัสผ่าน</label>
            <input type="text" name="cfpassword" id="cfpassword" class="form-control" required minlength="4" placeholder="กรุณายืนยันรหัสผ่านให้ตรงกับรหัสผ่านที่สร้างไว้"
            /> <br>

            <button type="submit" name="submit" value="ลงชื่อเข้าใช้">ลงทะเบียนเข้าใช้งาน</button>

            <a href="login.php"><button>LogIn</button></a>

            
            
  
        </form>
        
        
    </div>

    

    </html>  
