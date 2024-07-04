<?php
$conn = mysqli_connect("localhost","root","","grade");
if(!$conn){
  die("Error : ".mysqli_connect_error());
}
$sql = "SELECT * from `department`";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Form</title>
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  *{
  padding: 0;
  margin: 0;
}
body{
  background: url(img.jpg) no-repeat center fixed;
  background-size: cover;
  overflow: hidden;
}

.container{
  background: #2d3e3f;
  border-radius: 10%;
  width: 350px;
  height: 360px;
  padding-bottom: 20px;
  position: absolute;
  top:50%;
  left: 50%;
  transform: translate(-50%, -50%);
  margin: auto;
  padding: 50px 70px 140px 50px;
  box-shadow: 0px 0px 24px #5C5696;
}


.fl{
  float: left;
  width: 110px;
  line-height: 35px;
}

.fontLabel{
  color: white;
}

.fr{
  float: right;
}

.clr{
  clear: both;
}

.fa{
  color: #fff;
  padding-top: 30%;
}

.box{
  width: 360px;
  height: 50px;
  margin-top: 15px;
  font-family: verdana;
  font-size: 12px;
}

.textBox{
  height: 35px;
  width: 190px;
  border: none;
  padding-left: 20px;
}

.new{
  float: left;
}

.iconBox{
  height: 35px;
  width: 40px;
  line-height: 38px;
  text-align: center;
  background: #ff6600;
}

.radio{
  color: white;
  background: #2d3e3f;
  line-height: 38px;
  cursor: pointer;
  top: 30px;
}

.submit{
  margin-top: 20px;
  float: right;
  border: none;
  color: white;
  width: 110px;
  height: 35px;
  background: #ff6600;
  text-transform: uppercase;
  cursor: pointer;
}

.logo{
  background: url(user.jpg);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  height: 100px;
  width: 100px;
  border-radius: 50%;
  position: relative;
  left: 40%;
  bottom: 5%;
}

.form{
  margin-top: 35px;
}

/*.terms{
  line-height: 20px;
  text-align: center;
  background: #2d3e3f;
  color: white;
}*/

</style>
  </head>
  <body>
  	<div class="container">
      <div class="logo"> 
      </div>
      <form method="post" id="form" action="insert.php" class="form">
        <!--name-->
    		<div class="box">
          <label for="name" class="fl fontLabel"> Name :</label>
    			<div class="new iconBox">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
    			<div class="fr">
    					<input type="text" name="name" autocomplete="off" placeholder="Full Name"
              class="textBox" autofocus="on" required>
    			</div>
    			<div class="clr"></div>
    		</div>

    		<div class="box">
          <label for="reg_no" class="fl fontLabel"> Register No. : </label>
    			<div class="fl iconBox"><i class="fa fa-user" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="text" required name="reg_no" autocomplete="off" 
              placeholder="Admission Number" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>

    		<div class="box">
          <label for="class" class="fl fontLabel"> Department : </label>
    			<div class="fl iconBox"><i class="fa fa-home" aria-hidden="true"></i></div>
    			<div class="fr">
    					<!--input type="number" required name="class" maxlength="10" autocomplete="off"  placeholder="Class" class="textBox"-->
              <select class="textBox" name="dept">
              <option disabled selected value> -- select an option -- </option>
                <?php
                  if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                      $c = $row["dept_name"];
                      $r = $row["dept_id"];
                ?>
                <option value=<?php echo $r; ?>><?php echo $c; ?></option>
                <?php
                    }
                  }
                  else{
                    echo "<center>No Courses Added</center>";
                  }
                ?>
              </select>
    			</div>
    			<div class="clr"></div>
    		</div>

    		<!-- <div class="box">
          <label for="section" class="fl fontLabel"> Specification : </label>
    			<div class="fl iconBox"><i class="fa fa-home" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="text" required name="section" autocomplete="off"  placeholder="Section" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div> -->
    		<!--Section----->


    		<!---Password------
    		<div class="box">
          <label for="password" class="fl fontLabel"> Password </label>
    			<div class="fl iconBox"><i class="fa fa-key" aria-hidden="true"></i></div>
    			<div class="fr">
    					<input type="Password" required name="password" placeholder="Password" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>
    		<---Password---->

    		<div class="box radio">
          <label for="gender" class="fl fontLabel"> Gender: </label>
    				<input type="radio" name="Gender" value="male" required> Male &nbsp; &nbsp; &nbsp; &nbsp;
    				<input type="radio" name="Gender" value="female" required> Female
    		</div>

        <!--div class="box radio">
          <label for="role" class="fl fontLabel"> Role: </label>
            <input type="radio" name="role" value="student" required> Student &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="radio" name="role" value="teacher" required> Teacher
        </div-->

        <!--<div class="box terms">
            <input type="checkbox" name="role" value="teacher"> &nbsp; Account Role as Teacher
        </div>-->

    		<div class="box" style="background: #2d3e3f">
    				<input type="Submit" name="Submit" class="submit" value="SUBMIT">
    		</div>
      </form>
  </div>
  </body>
</html>