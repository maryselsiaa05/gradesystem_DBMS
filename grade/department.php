<html>
  <head>
    <meta charset="utf-8">
    <title>Department</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  *{
  padding: 0;
  margin: 0;
}
body{
  background: url(img.jpg) no-repeat center fixed;
  background-size: cover;
}

.container{
  background: #2d3e3f;
  border-radius: 10%;
  width: 350px;
  height: 440px;
  padding-bottom: 20px;
  position: absolute;
  top:50%;
  left: 50%;
  transform: translate(-50%, -50%);
  margin: auto;
  padding: 80px 70px 0px 50px;
  box-shadow: 0px 0px 24px #5C5696;
}


.fl{
  float: ;
  margin-left: 10%;
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

.box{
  width: 360px;
  height: 70px;
  margin-top: 10px;
  font-family: verdana;
  font-size: 12px;
}

.textBox{
  height: 35px;
  width: 190px;
  border: none;
  padding-left: 20px;
}

.submit{
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

.whole_container{
    margin-top: 50px;
}
.head{
    margin-left: 43%;
    color: #fff;
}

</style>
  </head>
  <body>
  	<div class="container">
      <div class="logo"> 
      </div>
      <div>
            <h1 class="head">ADMIN</h1>
        </div>
      <form method="post" action="addDepartment.php">
        <div class="whole_container">
        <!--name-->
    		<div class="box">
          <label class="fl fontLabel"> Department ID : </label>
    			<div class="fr">
    					<input type="text" name="id" autocomplete="off" placeholder="ID"
              class="textBox" autofocus="on" required>
    			</div>
    			<div class="clr"></div>
    		</div>

    		<div class="box">
          <label class="fl fontLabel">&nbsp; &nbsp; Department :</label>
    			
    			<div class="fr">
    					<input type="text" required name="name" autocomplete="off" 
              placeholder="NAME" class="textBox">
    			</div>
    			<div class="clr"></div>
    		</div>

    		<div class="box" style="background: #2d3e3f">
    				<input type="Submit" name="Submit" class="submit" value="SUBMIT">
    		</div>
        </div>
      </form>
  </div>
  </body>
</html>