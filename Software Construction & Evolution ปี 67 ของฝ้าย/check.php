<?php
session_start();

require_once('script/Myscript.php');
$db_handle = new myDBControl();

if(isset($_SESSION['flag'])) {
    if($_SESSION["flag"]=='2'){
    $id     =$_SESSION['id'];
    $fname  =$_SESSION['Fname'];
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('คุณไม่ได้เป็นเจ้าหน้าที่!!!!');";
        echo "window.location = 'login.php';";
        echo "</script>";
    }
} else{
    echo "<script type='text/javascript'>";
    echo "alert('คุณไม่มีสิทธิ์เข้าทำงาน!!!!');";
    echo "window.location = 'login.php';";
    echo "</script>";
}

?>