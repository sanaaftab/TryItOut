<!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!DOCTYPE html>
<html>
<head>
	  <link rel="icon" href="icon.png" type="image/png">
	<title>Login</title>

	<!--Bootsrap 4.3.0-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">

    <!--Fontawesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!--Our own stylesheet-->
  <link href="login.css" rel="stylesheet">
</head>

<body>
	<div class="containerlogin">
		<div class="d-flex justify-content-center h-100">
			<div class="cardlogin">
				<div class="card-header">
					<h3>Sign In</h3>

				</div>
				<div class="card-body">
					<form action="checkMyLogin.php" method="post">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input id="loginEmail" type="text" name="EmailPost" class="form-control" placeholder="Email">

						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input id="loginPass" type="password" name="PasswordPost" class="form-control" placeholder="Password">
						</div>
						<div class="form-group" style="padding-bottom: 3px">
							<input id="loginBtn" type="submit" value="Login" class="btn float-right login_btn">
						</div>
					</form>
				</div>

				<div class="card-header">
					<h3>Don't have an account? Sign Up</h3>
				</div>

				<div class="card-body">
					<form action="Register.php" method="post">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="UsernamePost" class="form-control" placeholder="Create a Username">
						</div>

						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>
							</div>
							<input type="text" name="EmailPost" class="form-control" placeholder="Enter your Email">

						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="PasswordPost" class="form-control" placeholder="Enter a Password">
						</div>

						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="PasswordCheckPost"class="form-control" placeholder="Confirm Password">
						</div>
						<div class="row align-items-center remember" style="padding-bottom: 10px">
							<input type="checkbox" onchange="document.getElementById('createBtn').disabled = !this.checked;">I agree to the &nbsp;<a href="Termandconditions.html" target="_blank" style="color: #cccccc">term and conditions</a> .
						</div>

						<div class="form-group">
							<input id="createBtn" type="submit" value="Create" class="btn float-right login_btn" disabled="true">
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
