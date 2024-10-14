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
    <title>การจัดการข้อมูลสินค้า (Product Management)</title>
</head>

<body>
    <?php include('menuAdmin.php');?>
    <div class="main">
        <div class = "topic">
            <b>
                <h3>จัดการข้อมูลสินค้า</h3>
            </b>
                <button type = "button" class="btn btn-success" onclick ="InsertClick()">เพิ่มสินค้าใหม่</button>
        </div>
        <div class = "work">
                <table class="memberTable">
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ประเภทสินค้า</th>
                        <th>ราคาต่อหน่วย</th>
                        <th>จำนวนในคลัง</th>
                        <th>ดำเนินการ</th>
                    </tr>
                    <?php
                    $data = $db_handle->Textquery("SELECT * FROM ALLPRODUCT");
                    if (!empty($data)) {

                        foreach ($data as $key => $value) {
                            $mid = $data[$key]['Product_id']; ?>
                    <tr>
                        <td><?php echo $data[$key]['Product_id']; ?></td>
                        <td class = "name"><?php echo $data[$key]['Product_name']; ?></td>
                        <td><?php echo $data[$key]['New_type']; ?></td>
                        <td><?php echo $data[$key]['Product_price']; ?></td>
                        <td><?php echo $data[$key]['Product_count']; ?></td>
                        <td><button type="button" class="btn btn-warning" id="edit[<?php echo $key;?>]" onclick="editClick(<?php echo $key;?>);"
                            pid="<?php echo $data[$key]['Product_id']; ?>"
                            pname="<?php echo $data[$key]['Product_name']; ?>"
                            ptype="<?php echo $data[$key]['Product_type']; ?>"
                            pcost="<?php echo $data[$key]['Product_cost']; ?>"
                            pprice="<?php echo $data[$key]['Product_price']; ?>"
                            pcount="<?php echo $data[$key]['Product_count']; ?>"
                            punit="<?php echo $data[$key]['Product_unit']; ?>"
                            plow="<?php echo $data[$key]['Product_low']; ?>"
                            phigh="<?php echo $data[$key]['Product_high']; ?>"
                            pdetail="<?php echo $data[$key]['Product_detail']; ?>"
                            img="<?php echo $data[$key]['Product_picture']; ?>"
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
    <form action="productProcess.php" method="post" enctype="multipart/form-data">
    <div id="info1" class="info_Member">
        <div class="info_Detail">
        <p>
            <h4 id="topicname">เพิ่มข้อมูลสินค้าใหม่</h4>
        </p>
            <div class="infoLeft">
                <input type="text" id="st" name="st" hidden>
                <div class="row">
                    <div class="col-4"><label>รหัสสินค้า</label></div>
                    <div class="col-4"><input type ="text" id="pid" name="pid" maxlength="5"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>ชื่อสินค้า</label>
                    </div>
                    <div class="col-8"><input type ="text" id="pname" name="pname" maxlength="50"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>ประเภทสินค้า</label>
                    </div>
                    <div class="col-8"><input type ="text" id="ptype" name="ptype" maxlength="50"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>ราคาต้นทุน</label>
                    </div>
                    <div class="col-4"><input type ="text" id="pcost" name="pcost" maxlength="3"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>ราคาขาย</label>
                    </div>
                    <div class="col-4"><input type ="number" id="pprice" name="pprice" maxlength="3"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>จำนวนคลัง</label>
                    </div>
                    <div class="col-4"><input type ="number" id="pcount" name="pcount" maxlength="10"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>หน่วยนับ</label>
                    </div>
                    <div class="col-4"><input type ="text" id="punit" name="punit" maxlength="20"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>จำนวนต่ำสุด</label>
                    </div>
                    <div class="col-4"><input type ="number" id="plow" name="plow" maxlength="5"></div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>จำนวนสูงสุด</label>
                    </div>
                    <div class="col-4"><input type ="number" id="phigh" name="phigh" maxlength="6"></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <label>รายละเอียด</label>
                    </div>
                    <div class="col-8"><textarea rows="5" id="pdetail" name="pdetail" maxlength="200"></textarea></div>
                </div>
            </div>
            <div class="infoRight">
                <p>รูปสินค้า</p>
                <p><img src="img/me.jpg" id="myImg"></p>
                <p><input type="file" id="productImg" name="productImg" Class="btImg" accept="image/jpeg"></p>

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
            document.getElementById("topicname").innerText = "เพิ่มรายการสินค้าใหม่";
            document.getElementById("st").value ='A';            
            document.getElementById("pid").value ='';            
            document.getElementById("pname").value ='';            
            document.getElementById("ptype").value ='';            
            document.getElementById("pprice").value ='';            
            document.getElementById("pcount").value ='';            
            document.getElementById("punit").value ='-';            
            document.getElementById("pcost").value ='';
            document.getElementById("plow").value ='';
            document.getElementById("phigh").value ='';
            document.getElementById("pdetail").value ='';
            document.getElementById("myImg").src ='img/myPicture.png';
            document.getElementById("pid").removeAttribute("readonly");
            document.getElementById("productImg").setAttribute("required",true);
        }
        function cancelClick(){
            document.getElementById("info1").style.display = "none";
        }
        function editClick(k){
            var data = document.getElementById("edit["+k+"]");
            document.getElementById("info1").style.display = "flex";
            document.getElementById("topicname").innerText = "ปรับปรุงรายการสินค้า";
            document.getElementById("st").value ='V';
            document.getElementById("pid").value = data.getAttribute("pid");
            document.getElementById("pname").value = data.getAttribute("pname");
            document.getElementById("ptype").value = data.getAttribute("ptype");
            document.getElementById("pprice").value = data.getAttribute("pprice");
            document.getElementById("pcount").value = data.getAttribute("pcount");
            document.getElementById("punit").value = data.getAttribute("punit");
            document.getElementById("pcost").value = data.getAttribute("pcost");
            document.getElementById("plow").value = data.getAttribute("plow");
            document.getElementById("phigh").value = data.getAttribute("phigh");
            document.getElementById("pdetail").value = data.getAttribute("pdetail");
            document.getElementById("productImg").removeAttribute("required");
            document.getElementById("myImg").src = data.getAttribute("img");
        }
    </script>

</body>

</html>