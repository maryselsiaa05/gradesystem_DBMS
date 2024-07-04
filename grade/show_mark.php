<?php
error_reporting(0);
session_start();

$conn = mysqli_connect("localhost","root","","grade");
if(!$conn){
    die("Error : ".mysqli_connect_error());
}

$reg_no = $_SESSION["stu_reg_no"];
// $sql = "SELECT * from  marks where reg_no='$reg_no' ORDER BY course_id;";
$sql = "SELECT * from marks join selected on marks.course_id=selected.course_id where marks.reg_no='$reg_no' ORDER BY marks.course_id;";
$result = mysqli_query($conn,$sql);

mysqli_close($conn);

function find_course_name($id){
    $conn = mysqli_connect("localhost","root","","grade");
    $sql = "SELECT * from course where course_id='$id';";
    $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    mysqli_close($conn);
    return $result["course_name"];
}

function find_credit($course_id){
    $conn = mysqli_connect("localhost","root","","grade");
    $sql = "SELECT course_credit from course where course_id='$course_id';";
    $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    mysqli_close($conn);
    return (int)$result["course_credit"];
}

function find_point($course_id,$total){
    $credit = find_credit($course_id);
    if($total>=40){
        return $credit*((int)$total/10);
    }
    else{
        return 0;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>RESULT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.topnav,footer{
    position: fixed;
    background-color: #000;
    color: white;
    overflow:hidden;
    width: 100%;
    z-index: 1;
}

.topnav{
    height: 70px;
}

.ele{
    float: left;
    text-align: center;
    padding: 14px 16px;
    font-size: 17px;
}

img{
    height: 100%;
    width: 80px;
    border-radius: 50%;
}

.admin{
    margin-top: 10px;
}

.content-area{
    display: flex;
    padding-top: 70px;
    z-index: -1;
}

.aside{
    width:500px;
    padding-left: 5vh;
    padding-right: 5vh;
    padding-bottom: 100px;
    background-color: ;
}

.aside h1{
    text-align: center;
    margin-top: 20px;
}

.content{
    width: 800px;
    background-color: ;
    border-left: 2px solid rgba(0,0,0,0.2);
    padding: 0px 20px;
    padding-bottom: 80px;
}

.content h1{
    text-align: center;
    margin-top: 20px;                  
}

footer{
    font-size: 10px;
    bottom: 0;
}

footer h2{
  float: right;
}

.info{
    background-color: ;
    padding:10px 10px;
    margin-top: 60px;
    margin-left: 20px;
}

.points{
    display: flex;
    background-color: ;
    margin-bottom: 30px;
}

.left{
    height: 40px;
    width: 40%;
    background-color: ;
    text-align: right;
}

.right{
    background-color: ;
    margin-left: 30px;
    font-style: italic;
}

.container{
    padding: 20px 20px;
    background-color: ;
    margin-top: 30px;
    background-color: lightgrey;
}

.each_mark{
    padding: 10px 10px;
    background-color: grey;
    display: flex;
    margin-bottom: 20px;
}

.subject{
    background-color: ;
    width: 50%;
    margin-right: 10px;
    text-align: center;
    padding-right: 15px;
}

.head{
    text-align: center;
}

.top{
    background-color: transparent;
}

.mark{
    background-color: ;
    width: 25%;
    margin-right: 10px;
    text-align: center;
}

.grade{
    background-color: ;
    margin-top: 60px;
}

.save{
  border-radius: 10px;
  color: #fff;
  background: #036;
  width: 90px;
  height:45px;
  font-size:15px;
}

.save_btn{
  top: 1.5vh;
  right: 2vh;
  position: absolute;
  top:10px;
}

</style>
</head>
<body>
    <div class="topnav">
        <img src="user.jpg" class="ele">
        <h1 class="ele admin">Student Portal</h1>
        <form class="save_btn" method="post" action="logout.php">
            <input type="submit" class="save" name="get" value="Sign Out">
        </form>  
    </div>

    <div class="content-area">
        <div class="aside">
            <h1>INFO</h1>
            <div class="info">
                <div class="points">
                    <h3 class="left">Register No</h3>
                    <h2 class="right"><?php echo $_SESSION["stu_reg_no"]; ?></h2>
                </div>
                <div class="points">
                    <h3 class="left">Student Name</h3>
                    <h2 class="right"><?php echo $_SESSION["stu_name"]; ?></h2>
                </div>
                <div class="points">
                    <h3 class="left">Gender</h3>
                    <h2 class="right"><?php echo strtoupper($_SESSION["stu_gender"]); ?></h2>
                </div>
                <div class="points">
                    <h3 class="left">Department</h3>
                    <h2 class="right"><?php echo $_SESSION["stu_dept"]; ?></h2>
                </div>
            </div>
        </div>
        <div class="content">
            <h1>Result</h1>
            <div class="container">
                <div class="each_mark top">
                    <h2 class="subject head">Course</h2>
                    <h2 class="mark">Total</h2>
                    <h2 class="mark">Grade</h2>
                </div>
                <?php
                    $sgpa_total = 0;
                    $overall = 0;
                    while($row=mysqli_fetch_assoc($result)){
                        $course_id = $row["course_id"];
                        echo '<div class="each_mark">';
                        echo '<h3 class="subject">'.find_course_name($course_id).'</h3>';
                        echo '<h2 class="mark">'.$row["total"].'</h2>';
                        echo '<h2 class="mark">'.$row["grade"].'</h2>';
                        echo '</div>';
                        $sgpa_total = $sgpa_total+find_point($course_id,$row["total"]);
                        $overall = $overall+find_credit($course_id);
                    }
                    $sgpa = round($sgpa_total/$overall,2);
                ?>
                
            </div>
            <div class="grade">
                <h1>SGPA : <?php echo $sgpa; ?></h1>
            </div>
        </div>
    </div>

    <footer>
        <h2>&copy; Copyrights Reserved.</h2>
    </footer>
</body>
</html>