<?php
require_once('script/Myscript.php');
$db_handle = new myDBControl();

$st = $_REQUEST["st"];
if ($st== 'A' ){
    $eid        = $_POST["eid"];
    $pname      = $_POST["pname"];
    $fname      = $_POST["fname"];
    $lname      = $_POST["lname"];
    $posid      = $_POST["posid"];
    $code1      = $_POST["code1"];
    $code2      = $_POST["code2"];
    $bank       = $_POST["bank"];
    $salary     = $_POST["salary"];
    $un         = $_POST["un"];
    $pw         = $_POST["pw"];
    $img        = "img/Employee/".$eid.".jpg";

    echo $eid.' '.$pname.' '.$fname;

    $tquery = "INSERT INTO EMPLOYEE VALUES('$un', '$pw', '$eid', '$pname', '$fname', '$lname', '$posid', '$code1', '$code2', '$bank','$salary', '$img')";
    echo $tquery;
    
    $tcheck     = "SELECT * FROM EMPLOYEE WHERE (Emp_id = '$eid' AND Cust_UN = '$un' AND Cust_PW = '$pw')";
    $check      =$db_handle->Textquery($tcheck);

    if (empty($check)) {
        $tquery = "INSERT INTO EMPLOYEE VALUES('$un', '$pw', '$eid', '$pname', '$fname', '$lname', '$posid', '$code1', '$code2', '$bank','$salary', '$img')";
        $check      =$db_handle->Execquery($tquery);
        echo "<script type='text/javascript'>";
        echo "alert('พนักงานรหัส " . $eid . " ได้ถูกบันทึกข้อมูลแล้ว');";
        echo "window.location = 'employee.php';";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('พบข้อมูลซ้ำซ้อน กรุณาตรวจสอบ');";
        echo "window.history.back();";
        echo "</script>";
    }

    // echo  'name=' . $_FILES['memberImg']['name'] . "<br>";
    // echo  'temp_name=' . $_FILES['memberImg']['temp_name'] . "<br>";
    // echo  'size=' . $_FILES['memberImg']['size'] . "<br>";
    // echo  'error=' . $_FILES['memberImg']['error'] . "<br>";

    //สร้างแหล่งที่จะ upload file เข้าไปเก็บ
    if (isset($_FILES['employeeImg'])) {
        //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์ => Host
        move_uploaded_file($_FILES['employeeImg']['tmp_name'], $img);
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('ไม่พบ Image file " . $_FILES['employeeImg']['name'] . "');";
        echo "</script>";
    }
}
if ($st == 'D') {
    $cid        = $_GET["cid"];
    $img = "img/Employee/" . $cid . ".jpg";
    unlink($img); //ลบไฟล์เดิมก่อน    
    
    $tquery = "DELETE FROM EMPLOYEE WHERE (Emp_id = '$eid') AND (Emp_id NOT LIKE 'E00%')";
    echo $tquery;
    $delData    = $db_handle->Execquery($tquery);
    echo "<script type='text/javascript'>";
    echo "alert('พนักงานรหัส " . $cid . " ได้ถูกลบข้อมูลแล้ว');";
    echo "window.location = 'employee.php';";
    echo "</script>";
}

if ($st == 'V'){
    $eid        = $_POST["eid"];
    $pname      = $_POST["pname"];
    $fname      = $_POST["fname"];
    $lname      = $_POST["lname"];
    $posid      = $_POST["posid"];
    $code1      = $_POST["code1"];
    $code2      = $_POST["code2"];
    $bank       = $_POST["bank"];
    $salary     = $_POST["salary"];
    $un         = $_POST["un"];
    $pw         = $_POST["pw"];
    $img        = "img/Employee/".$eid.".jpg";

    $tquery     = "UPDATE EMPLOYEE SET 
        Emp_prename    ='$pname',
        Emp_firstname  ='$fname',
        Emp_lastname   ='$lname',
        Emp_pos_id     ='$posid',
        Emp_code1      ='$code1',
        Emp_code2      ='$code2',
        Emp_bank       ='$bank',
        Emp_salary     ='$salary',
    WHERE (Emp_id = '$eid')";
    echo $tquery;
    $UpData      =$db_handle->Execquery($tquery);

    echo "<script type='text/javascript'>";
    echo "alert('พนักงานรหัส " . $cid . " ได้ถูกบันทึกข้อมูลแล้ว');";
    echo "window.location = 'employee.php';";
    echo "</script>";
}
?>