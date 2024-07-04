<?php
error_reporting(0);
session_start();
$conn = mysqli_connect("localhost","root","","grade");
if(!$conn){
  die("Error : ".mysqli_connect_error());
}

$dept = $_SESSION["dept_entry1"];
$sql = "SELECT * from selected where dept_id='$dept';";
$result = mysqli_query($conn,$sql);
$sql = "SELECT dept_name from department where dept_id='$dept';";
$dept_name=mysqli_fetch_assoc(mysqli_query($conn,$sql));
mysqli_close($conn);

if(isset($_POST["course"])){
    $conn = mysqli_connect("localhost","root","","grade");
    $value = $_POST["course"];
    $_SESSION["course"] = $value;
    $sql = "SELECT * from course where course_id='$value';";
    $course_name = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    mysqli_close($conn);
}

function find_course_name($id){
    $conn = mysqli_connect("localhost","root","","grade");
    $sql = "SELECT * from course where course_id='$id';";
    $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    return $result["course_name"];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $dept_name["dept_name"] ?></title>
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
    width:30%;
    padding-bottom: 100px;
    background-color: ;
}

.aside h1{
    text-align: center;
    margin-top: 10px;
}

.content{
    width: 70%;
    background-color: ;
    border-left: 2px solid rgba(0,0,0,0.2);
    background-color: ;
}

.content h1{
    text-align:center;
    margin-top: 50px;
}

footer{
    font-size: 10px;
    bottom:0px;
}

footer h2{
  float: right;
}

.select_option{
  list-style: none;
  margin-top: 7vh;
  background-color: ;
}

.select_option li{
  padding: 2vh 5vh;
  display:flex;
  justify-content: center;
}

.options{
  padding: 15px;
  width: 90%;
  font-size: 17px;
  border-radius: 10px;
  border: 3px solid #0367fd;
  background: none;
}

.options:hover{
  border: 3px solid #ffc400ec;
}

.options:active{
  border: 3px solid #ffc400ec;
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

.center{
    width:85%;
    background-color:;
    text-align: center;
    margin-top: 10px;
    font-size: 20px;
    margin-top:2%;
}

.stu_mark{
    position: absolute;
    width: 50rem;
    background-color:;
    margin-top: 20px;
    margin-left: 25px;
}

.stu_mark li{
    display: flex;
    list-style: none;
    position: relative;
    padding: 20px 20px;
    /* border: 2px solid #0367fd; */
    border-radius: 10px;
    top: 20px;
    left: 20px;
}

.stu_mark li:last-child{
    padding-bottom: 70px;
}

.stu_mark h1{
    text-align: center;
    margin-left: 30%;
}

.mark_set{
    width: 550px;
    border: 2px solid #0367fd;
    padding: 20px 20px;
    border-radius: 10px;
}

.name{
    display: flex;
    align-items: center;
    justify-content: right;
    width: 350px;
}

.name h3{
    margin-right: 50px;
    font-size: 18px;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button{
    -webkit-appearance: none;
}

input[type=number]{
    -moz-appearance: textfield;
}

.marks{
    padding:10px 10px;
    border: 2px solid #ffc400ec;
    width: 29%;
    height: 35px;
    margin-left: 2%;
    margin-right: 2%;
    border-radius: 10px;
    text-align: right;
    font-size:18px;
}

.back{
    width:60px;
    height: 30px;
    border-radius: 10px;
    color: #fff;
    background: #036;
    font-size:10px;
    margin-top: 10px;
    margin-left: 10px;
}

.aside input[type=submit]{
    width:60px;
    height: 30px;
    border-radius: 10px;
    color: #fff;
    background: #036;
    font-size:10px;
    margin-top: 10px;
    margin-left: 10px;
}

</style>
</head>
<body>
    <div class="topnav">
        <img src="user.jpg" class="ele">
        <h1 class="ele admin">ADMIN</h1>   
        <h1 class="center"><?php echo $dept_name["dept_name"] ?></h1>
          <div class="save_btn">
            <input type="submit" class="save" name="get" value="Save" form="together">
          </div>
        <?php
            if(isset($_POST["back"])){
                header("location:entry1.php");
            }
        ?>
        
    </div>

    <div class="content-area">
        <div class="aside">
          <input type="submit" value="Back" form="back" name="back">  
          <h1 class="head">Course</h1>
            <form method='post' id="back">
              <ul class="select_option">
                <?php
                while($row=mysqli_fetch_assoc($result)){
                // $dept_name = $row["course_name"];
                $dept_id = $row["course_id"];
                $dept_name = find_course_name($dept_id);
                echo '<li><button class="options" name="course" value="'.$dept_id.'">'.$dept_name.'</button></li>';
                }
                ?>
              </ul>  
            </form>
        </div>
        <div class="content">
          <?php 
           if(isset($_POST["course"])){
            echo "<h1 form='together'>".$course_name["course_name"]."</h1>";
           }
          ?>
          <form method="post" id="together" action="setmark.php">
            <ul class="stu_mark">
                <!-- <li>
                    <div class="name">
                        <h3>Student 1</h3>
                    </div>
                    <div class="mark_set">
                    <input type="number" class="marks" name="mark[]" placeholder="SE 1">
                    <input type="number" class="marks" name="mark[]" placeholder="SE 2">
                    <input type="number" class="marks" name="mark[]" placeholder="END SEM">
                    </div>
                </li> -->
                <?php
                    if(isset($_POST["course"])){
                        $conn = mysqli_connect("localhost","root","","grade");
                        $sql = "SELECT * from students where dept_id='$dept';";
                        $rows = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($rows)>0){
                            while($row=mysqli_fetch_assoc($rows)){
                                $course = $course_name['course_id'];
                                $reg_no = $row["reg_no"];
                                $sql = "SELECT * from marks where course_id='$course' and reg_no='$reg_no';";
                                $row_mark = mysqli_fetch_assoc(mysqli_query($conn,$sql));
                                $se1 = $row_mark["se1"];
                                $se2 = $row_mark["se2"];
                                $end = $row_mark["end"];
                                echo '<li>';
                                echo '<div class="name">';
                                echo '<h3>'.$row["name"].'</h3>';
                                echo '</div><div class="mark_set">';
                                echo '<input type="number" class="marks" name="'.$row["reg_no"].'[]" placeholder="SE 1" min="0" max="50" step="0.01" value='.$se1.'>';
                                echo '<input type="number" class="marks" name="'.$row["reg_no"].'[]" placeholder="SE 2" min="0" max="50" step="0.01" value='.$se2.'>';
                                echo '<input type="number" class="marks" name="'.$row["reg_no"].'[]" placeholder="END SEM" min="0" max="100" step="0.01" value='.$end.'>';
                                echo '</div>';
                                echo '</li>';
                            }
                        }
                        else{
                            echo "<h1>No Student Records</h1>";
                        }
                    }
                ?>
            </ul>
          </form>
        </div>
    </div>

    <footer>
        <h2>&copy; Copyrights Reserved.</h2>
    </footer>
</body>

</html>