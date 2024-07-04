<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}

::placeholder{
	color: whitesmoke;
}

body {
	background: url(img.jpg) no-repeat center fixed;
	background-size: cover;
	overflow: hidden;	
}

.container {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
}

.screen {		
	position: relative;	
	height: 570px;
	width: 360px;	
	box-shadow: 0px 0px 24px #037;
	padding-top: 12px;
}

.screen__content {
	z-index: 1;
	position: relative;	
	height: 100%;
}

.screen__background {		
	position: absolute;
	background: whitesmoke;
	opacity: 70%;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	z-index: 0;
	-webkit-clip-path: inset(0 0 0 0);
	clip-path: inset(0 0 0 0);	
}

.screen__background__shape {
	transform: rotate(45deg);
	position: absolute;
}

.screen__background__shape1 {
	opacity: 100%;
	height: 520px;
	width: 520px;
	background: #037;	
	top: -50px;
	right: 120px;	
	border-radius: 0 72px 0 0;
}

.login {
	width: 320px;
	padding: 30px;
	padding-top: 190px;
}

.symbol {
	top: 5%;
	left: 50%;
	height: 110px;
	width: 110px;
	border-radius: 50%;
	position: absolute;
	background: url(user.jpg);
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	border: 3px solid #7875B5;
	box-shadow: 1px 2px 2px #037;
	overflow: hidden;
}

.login__field {
	font-size: 20px;
	padding: 20px 0px;	
	position: relative;		
}

.login__icon {
	position: absolute;
	top: 30px;
	color: ghostwhite;
}

.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	font-size: 14px;
	padding: 15px;
	padding-left: 28px;
	font-weight: 900;
	width: 75%;
	transition: .2s;
	color: ghostwhite;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
	outline: none;
	border-bottom-color: #6A679E;
}

.login__submit {
	background: ghostwhite;
	font-size: 18px;
	margin-top: 60px;
	padding: 16px 20px;
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 700;
	display: flex;
	align-items: center;
	width: 100%;
	color: #037;
	box-shadow: 0px 2px 2px #5C5696;
	cursor: pointer;
	opacity: 90%;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
	border-color: #6A679E;
	outline: none;
	background: linear-gradient(90deg,ghostwhite,70%,#037);
	color: #037;
	transition: .2s;
	opacity: 100%;
}

.button__icon {
	font-size: 24px;
	margin-left: auto;
	color: #037;
}

.social-login {	
	position: absolute;
	height: 140px;
	width: 160px;
	text-align: center;
	bottom: -40px;
	right: 0px;
	color: #037;
}

.social-icons {
	display: flex;
	align-items: center;
	justify-content: center;
}

.social-login__icon {
	padding: 20px 10px;
	color: #037;
	text-decoration: none;	
	text-shadow: 0px 0px 8px #7875B5;
}

.social-login__icon:hover {
	transform: scale(1.5);	
}

.name{
	position: absolute;
	top: 10%;
	left: 10%;
	color: #fff;
	text-shadow: 1px 2px 2px ghostwhite;
}
</style>
</head>
<body>

<div class="container">
	<div class="screen">
		<div class="screen__content">
			<div class="name">
				<h1>LOGIN<br>&nbsp;&nbsp;PORTAL</h1>
			</div>
			<div class="symbol">
			</div>
			<form class="login" action="verify.php" method="post" autocomplete="off">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" placeholder="Register Number" name="reg_no" required>
				</div>
				<!-- <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Password" name="password" id="pass" required>
				</div> -->
				<button class="button login__submit" name="button">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>	
			</form>
			<div class="social-login">
				<h3>Reach us via</h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-google"></a>
					<a href="#" class="social-login__icon fab fa-whatsapp"></a>
					<a href="#" class="social-login__icon fab fa-linkedin"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
</body>
</html>