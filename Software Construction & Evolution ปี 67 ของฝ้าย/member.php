<!DOCTYPE html>

<?php
session_start();

require_once('script/Myscript.php');
$db_handle = new myDBControl();

include('check.php');

$id     =$_SESSION['id'];
$fname  =$_SESSION['Fname'];
?>

<html lang="en">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include('headAdmin.php');?>
    <title>การจัดการข้อมูลสมาชิก (Member Management)</title>
</head>

<body>
    <?php include('menuAdmin.php');?>
    <div class="main">
        <div class = "topic">
            <b>
                <h3>จัดการข้อมูลสมาชิก</h3>
            </b>
                <button type = "button" class="btn btn-success" onclick ="InsertClick()">เพิ่มสมาชิกใหม่</button>
        </div>
        <div class = "work">
                <table class="memberTable">
                    <tr>
                        <th>รหัสสมาชิก</th>
                        <th>ชื่อ-สกุล</th>
                        <th>วันเดือนปีเกิด</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>ดำเนินการ</th>
                    </tr>
                    <?php
                    $data = $db_handle->Textquery("SELECT * FROM MEMBER");
                    if (!empty($data)) {

                        foreach ($data as $key => $value) {
                            $mid = $data[$key]['Cust_id']; ?>
                    <tr>
                        <td><?php echo $data[$key]['Cust_id']; ?></td>
                        <td class = "name"><?php echo $data[$key]['New_name']; ?></td>
                        <td><?php echo $data[$key]['Cust_birth']; ?></td>
                        <td><?php echo $data[$key]['Cust_tel']; ?></td>
                        <td><button type="button" class="btn btn-warning" id="edit[<?php echo $key;?>]" onclick="editClick(<?php echo $key;?>);"
                            cid="<?php echo $data[$key]['Cust_id']; ?>"
                            pname="<?php echo $data[$key]['Cust_prename']; ?>"
                            fname="<?php echo $data[$key]['Cust_firstname']; ?>"
                            lname="<?php echo $data[$key]['Cust_lastname']; ?>"
                            level="<?php echo $data[$key]['Cust_level']; ?>"
                            address="<?php echo $data[$key]['Cust_address']; ?>"
                            bdate="<?php echo $data[$key]['Cust_birth']; ?>"
                            tel="<?php echo $data[$key]['Cust_tel']; ?>"
                            un="<?php echo $data[$key]['Cust_UN']; ?>"
                            pw="<?php echo $data[$key]['Cust_PW']; ?>"
                            img="<?php echo $data[$key]['Cust_picture']; ?>"
                            >แก้ไขข้อมูล</button>
                        <!-- <button type="button" class="btn btn-danger" >ลบข้อมูล</button> -->
                        <button type="button" class="btn btn-danger" onclick="return confirm('กรุณายืนยันการลบข้อมูล ? ** ห้ามลบข้อมูลเดิม! **')"><a href="memberProcess.php?st=D&cid=<?php echo $data[$key]['Cust_id']; ?>">ลบข้อมูล</a></button>
                        </td>
                    </tr>
                    <?php }
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "alert('ไม่พบสมาชิกในปัจจุบัน...');";
                        echo "</script>";
                    } ?>
                </table>
        </div>
    </div>
    <form action="memberProcess.php" method="post" enctype="multipart/form-data">
    <div id="info1" class="info_Member">
        <div class="info_Detail">
        <p>
            <h4 id="topicname">เพิ่มข้อมูลสมาชิกใหม่</h4>
        </p>
            <div class="infoLeft">
                <input type="text" id="st" name="st" hidden>
                <div class="row">
                    <div class="col-3"><label>รหัสสมาชิก</label></div>
                    <div class="col-4"><input type ="text" id="cid" name="cid" maxlength="5"></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label>คำนำหน้าชื่อ</label>
                    </div>
                    <div class="col-8"><input type ="text" id="pname" name="pname" maxlength="50"></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label>ชื่อ - นามสกุล</label>
                    </div>
                    <div class="col-4"><input type ="text" id="fname" name="fname" maxlength="50"></div>
                    <div class="col-4"><input type ="text" id="lname" name="lname" maxlength="50"></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label>ระดับสมาชิก</label>
                    </div>
                    <div class="col-8"><input type ="text" id="level" name="level" maxlength="3"></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label>ที่อยู่</label>
                    </div>
                    <div class="col-8"><textarea rows="5" id="address" name="address" maxlength="200"></textarea></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label>วันเดือนปีเกิด</label>
                    </div>
                    <div class="col-4"><input type ="text" id="bdate" name="bdate" maxlength="10"></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label>เบอร์โทรศัพท์</label>
                    </div>
                    <div class="col-4"><input type ="text" id="tel" name="tel" maxlength="20"></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label>User Name</label>
                    </div>
                    <div class="col-4"><input type ="text" id="un" name="un" maxlength="5"></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label>Password</label>
                    </div>
                    <div class="col-4"><input type ="text" id="pw" name="pw" maxlength="6"></div>
                </div>
            </div>
            <div class="infoRight">
                <p>รูปสมาชิก</p>
                <p><img src="img/me.jpg" id="myImg"></p>
                <p><input type="file" name="memberImg" Class="btImg" accept="image/jpeg"></p>

                <!-- <button type="button" class="btn btn-primary">อัปโหลดรูป</button></br> -->
                <button type="submit" class="btn btn-success" >บันทึกข้อมูล</button>
                <button type="reset" class="btn btn-secondary" onclick = "cancelClick()">ยกเลิก</button>
            </div>
        </div>
    </div>
    </form>
    <script>
        function InsertClick(){
            document.getElementById("info1").style.display = "flex";
            document.getElementById("topicname").innerText = "เพิ่มข้อมูลสมาชิกใหม่";
            document.getElementById("st").value ='A';            
            document.getElementById("cid").value ='';            
            document.getElementById("pname").value ='';            
            document.getElementById("fname").value ='';            
            document.getElementById("lname").value ='';            
            document.getElementById("level").value ='';            
            document.getElementById("address").value ='-';            
            document.getElementById("bdate").value ='';
            document.getElementById("tel").value ='';
            document.getElementById("un").value ='';
            document.getElementById("pw").value ='';
            document.getElementById("myImg").src ='img/myPicture.png';
            document.getElementById("cid").removeAttribute("readonly");
            document.getElementById("un").removeAttribute("readonly");
            document.getElementById("pw").removeAttribute("readonly");
            document.getElementById("memberImg").setAttribute("required",true);
        }
        function cancelClick(){
            document.getElementById("info1").style.display = "none";
        }
        function editClick(k){
            var data = document.getElementById("edit["+k+"]");
            document.getElementById("info1").style.display = "flex";
            document.getElementById("topicname").innerText = "แก้ไขข้อมูลสมาชิก";
            document.getElementById("st").value ='V';
            document.getElementById("cid").value = data.getAttribute("cid");
            document.getElementById("pname").value = data.getAttribute("pname");
            document.getElementById("fname").value = data.getAttribute("fname");
            document.getElementById("lname").value = data.getAttribute("lname");
            document.getElementById("level").value = data.getAttribute("level");
            document.getElementById("address").value = data.getAttribute("address");
            document.getElementById("bdate").value = data.getAttribute("bdate");
            document.getElementById("tel").value = data.getAttribute("tel");
            document.getElementById("un").value = data.getAttribute("un");
            document.getElementById("pw").value = data.getAttribute("pw");
            document.getElementById("myImg").src = data.getAttribute("img");
            document.getElementById("cid").setAttribute("readonly",true);
            document.getElementById("un").setAttribute("readonly",true);
            document.getElementById("pw").setAttribute("readonly",true);
            document.getElementById("memberImg").removeAttribute("required");
        }
    </script>

</body>

</html>