<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>งานตรวจสอบสิทธิ์</title>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Login.css">
</head>
<body>
    <div class="main">
        <div class="Left">
            <form action="loginProcess.php" method="post" enctype="multipart/form-data">
            <p class="htxt">ยินดีต้อนรับ</p>
            <p class="txt1">ชื่อเข้าใช้ระบบ/e-mail</p>
            <input type="text"class="itxt" name="Uname" value="E0011">
            <p class="txt1">รหัสผ่าน</p>
            <input type="password"class="itxt" name="Passwd" value="12345">
            <p class="ichk">
                <input type="checkbox" name id>
                "ลืมรหัสผ่าน ?"
            </p>
            <button type="submit" >Login</button>
            <p class="txt2">ต้องการสมัครสมาชิกใหม่,คลิก!</p> 
            </form>                
        </div>
        <div class="Right">
            <img src="img/main1.jpg"alt>
        </div>
    </div>
</body>
</html>