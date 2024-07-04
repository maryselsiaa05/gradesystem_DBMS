<?php

try{
    if(array_key_exists('Submit',$_POST)){
        $conn = mysqli_connect("localhost","root","","grade");
        $name = $_REQUEST['name'];
        $dept = $_REQUEST['dept'];
        $credit = $_REQUEST['credit'];
        $course_id = random_num($dept,$conn);
        // $sql = "SELECT dept_name from department where dept_id='$dept';";
        // $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
        // $dept_name = $row["dept_name"];
        try{
            $sql = "INSERT into course values('$course_id','$name',$credit,'$dept');";
            if(mysqli_query($conn,$sql)){
                echo "<center><h1>Course: $name has been Added</h1></center>";
            }
            else{
                echo "<center><h1>Adding Course has been Failed</h1></center>";
            }
        }
        catch(Exception $e){
            echo "<center><h1>Course Already Exists</h1></center>";
        }
        mysqli_close($conn);
    }
}
catch(Exception $e){
    echo "<center><h1>Not able to connect with DATABASE</h1></center>";
}

function random_num($dept,$conn){
    $conn = mysqli_connect("localhost","root","","grade");
    $course_id = $dept.rand(1001,1999);
    $sql = "SELECT count(course_id) from course where course_id='$course_id';";
    $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    $id = $row["count(course_id)"];
    mysqli_close($conn);
    if(!$id==0){
        random_num($dept,$conn);
    }
    return $course_id;   
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RESULT</title>
<style>
.save{
  border-radius: 10px;
  color: #fff;
  background: #036;
  width: 90px;
  height:45px;
  font-size:15px;
}
</style>
</head>
<body>
<form method="post" action="course.php">
  <center><button name="button" class="save">close</button></center>
</form>
</body>
</html>