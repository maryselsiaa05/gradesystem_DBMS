<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","","grade");
if(!$conn){
    die("Error : ".mysqli_connect_error());
}
session_start();
if(array_key_exists('button',$_POST)){
    $reg_no = $_REQUEST['reg_no'];
    $sql = "SELECT * from students where reg_no='$reg_no';";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION["stu_reg_no"] = $row["reg_no"];
        $_SESSION["stu_name"] = $row["name"];
        $_SESSION["stu_gender"] = $row["gender"];
        $dept_id = $row["dept_id"];
        $sql = "SELECT * from department where dept_id='$dept_id';";
        $result_get = mysqli_fetch_assoc(mysqli_query($conn,$sql));
        $_SESSION["stu_dept"] = $result_get["dept_name"];
        $done = true;   
    }
    else{
        echo "<center><h1>Invalid Register Number</h1></center>";
    }
}
mysqli_close($conn);
if($done){
    header("location:show_mark.php");
}

?>