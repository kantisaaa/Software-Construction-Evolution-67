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
    <title>การจัดการข้อมูลเจ้าหน้าที่ (Employee Management)</title>
</head>

<body>
    <?php include('menuAdmin.php');?>
    <div class="main">
        <div class = "topic">
            <b>
                <h3>จัดการข้อมูลเจ้าหน้าที่</h3>
            </b>
                <button type = "button" class="btn btn-success" onclick ="InsertClick()">เพิ่มเจ้าหน้าที่ใหม่</button>
        </div>
        <div class = "work">
                <table class="memberTable">
                    <tr>
                        <th>รหัสเจ้าหน้าที่</th>
                        <th>ชื่อ-สกุล</th>
                        <th>ตำแหน่งงาน</th>
                        <th>เงินเดือน</th>
                        <th>บัญชีธนาคาร</th>
                        <th>ดำเนินการ</th>
                    </tr>
                    <?php
                    $data = $db_handle->Textquery("SELECT * FROM ALL_EMPLOYEE");
                    if (!empty($data)) {

                        foreach ($data as $key => $value) {
                            $mid = $data[$key]['Emp_id']; ?>
                    <tr>
                        <td><?php echo $data[$key]['Emp_id']; ?></td>
                        <td class = "name"><?php echo $data[$key]['New_name']; ?></td>
                        <td><?php echo $data[$key]['Emp_pos_id']; ?></td>
                        <td><?php echo $data[$key]['Emp_salary']; ?></td>
                        <td><?php echo $data[$key]['Emp_bank']; ?></td>
                        <td><button type="button" class="btn btn-warning" id="edit[<?php echo $key;?>]" onclick="editClick(<?php echo $key;?>);"
                            eid="<?php echo $data[$key]['Emp_id']; ?>"
                            pname="<?php echo $data[$key]['Emp_prename']; ?>"
                            fname="<?php echo $data[$key]['Emp_firstname']; ?>"
                            lname="<?php echo $data[$key]['Emp_lastname']; ?>"
                            posid="<?php echo $data[$key]['Emp_pos_id']; ?>"
                            code2="<?php echo $data[$key]['Emp_code2']; ?>"
                            code1="<?php echo $data[$key]['Emp_code1']; ?>"
                            bank="<?php echo $data[$key]['Emp_bank']; ?>"
                            salary="<?php echo $data[$key]['Emp_salary']; ?>"
                            un="<?php echo $data[$key]['Emp_UN']; ?>"
                            pw="<?php echo $data[$key]['Emp_PW']; ?>"
                            img="<?php echo $data[$key]['Emp_picture']; ?>"
                            >แก้ไขข้อมูล</button>
                        <!-- <button type="button" class="btn btn-danger" >ลบข้อมูล</button> -->
                        <button type="button" class="btn btn-danger" onclick="return confirm('กรุณายืนยันการลบข้อมูล ? ** ห้ามลบข้อมูลเดิม! **')"><a href="memberProcess.php?st=D&cid=<?php echo $data[$key]['Cust_id']; ?>">ลบข้อมูล</a></button>
                        </td>
                    </tr>
                    <?php }
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "alert('ไม่พบพนักงานในปัจจุบัน...');";
                        echo "</script>";
                    } ?>
                </table>
        </div>
    </div>
    <form action="employeeProcess.php" method="post" enctype="multipart/form-data">
    <div id="info1" class="info_Member">
        <div class="info_Detail">
        <p>
            <h4 id="topicname">เพิ่มข้อมูลเจ้าหน้าที่ใหม่</h4>
        </p>
            <div class="infoLeft">
                <input type="text" id="st" name="st" hidden>
                <div class="row">
                    <div class="col-4"><label>รหัสเจ้าหน้าที่</label></div>
                    <div class="col-4"><input type ="text" id="eid" name="eid" maxlength="5"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>คำนำหน้าชื่อ</label>
                    </div>
                    <div class="col-4"><input type ="text" id="pname" name="pname" maxlength="50"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>ชื่อ - นามสกุล</label>
                    </div>
                    <div class="col-4"><input type ="text" id="fname" name="fname" maxlength="50"></div>
                    <div class="col-4"><input type ="text" id="lname" name="lname" maxlength="50"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>ตำแหน่งงาน</label>
                    </div>
                    <div class="col-4"><input type ="text" id="posid" name="posid" maxlength="3"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>เลขที่บัตร ปชช.</label>
                    </div>
                    <div class="col-4"><input type ="text" id="code1" name="code1" maxlength="10"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>ประกันสังคม</label>
                    </div>
                    <div class="col-4"><input type ="text" id="code2" name="code2" maxlength="10"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>บัญชีธนาคาร</label>
                    </div>
                    <div class="col-4"><input type ="text" id="bank" name="bank" maxlength="20"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>เงินเดือน</label>
                    </div>
                    <div class="col-4"><input type ="text" id="salary" name="salary" maxlength="20"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>User Name</label>
                    </div>
                    <div class="col-4"><input type ="text" id="un" name="un" maxlength="5"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Password</label>
                    </div>
                    <div class="col-4"><input type ="text" id="pw" name="pw" maxlength="6"></div>
                </div>
            </div>
            <div class="infoRight">
                <p>รูปเจ้าหน้าที่</p>
                <p><img src="img/me.jpg" id="myImg"></p>
                <p><input type="file" id="staffImg" name="staffImg" Class="btImg" accept="image/jpeg"></p>

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
            document.getElementById("topicname").innerText = "เพิ่มข้อมูลเจ้าหน้าที่ใหม่";
            document.getElementById("st").value ='A';            
            document.getElementById("eid").value ='';            
            document.getElementById("pname").value ='';            
            document.getElementById("fname").value ='';            
            document.getElementById("lname").value ='';            
            document.getElementById("posid").value ='';            
            document.getElementById("code1").value ='-';            
            document.getElementById("code2").value ='';
            document.getElementById("bank").value ='';
            document.getElementById("salary").value ='';
            document.getElementById("un").value ='';
            document.getElementById("pw").value ='';
            document.getElementById("myImg").src ='img/wait2.png';
            document.getElementById("eid").removeAttribute("readonly");
            document.getElementById("un").removeAttribute("readonly");
            document.getElementById("pw").removeAttribute("readonly");
            document.getElementById("staffImg").setAttribute("required",true);
        }
        function cancelClick(){
            document.getElementById("info1").style.display = "none";
        }
        function editClick(k){
            var data = document.getElementById("edit["+k+"]");
            document.getElementById("info1").style.display = "flex";
            document.getElementById("topicname").innerText = "แก้ไขข้อมูลเจ้าหน้าที่";
            document.getElementById("st").value ='V';
            document.getElementById("eid").value = data.getAttribute("eid");
            document.getElementById("pname").value = data.getAttribute("pname");
            document.getElementById("fname").value = data.getAttribute("fname");
            document.getElementById("lname").value = data.getAttribute("lname");
            document.getElementById("posid").value = data.getAttribute("posid");
            document.getElementById("code1").value = data.getAttribute("code1");
            document.getElementById("code2").value = data.getAttribute("code2");
            document.getElementById("bank").value = data.getAttribute("bank");
            document.getElementById("salary").value = data.getAttribute("salary");
            document.getElementById("un").value = data.getAttribute("un");
            document.getElementById("pw").value = data.getAttribute("pw");
            document.getElementById("eid").setAttribute("readonly",false);
            document.getElementById("un").setAttribute("readonly",false);
            document.getElementById("pw").setAttribute("readonly",false);
            document.getElementById("staffImg").removeAttribute("required");
            document.getElementById("myImg").src = data.getAttribute("img");
        }
    </script>

</body>

</html>