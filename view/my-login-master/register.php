<?php
  session_start();
  include '../html/nav.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>My Login Page &mdash; Bootstrap 4 Login Page Snippet</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
  <link rel="stylesheet" type="text/css" href="../css/one-page-wonder.css">

  <script src="js/jquery.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/my-login.js"></script>

</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<!-- <div class="brand">
						<img src="img/logo.jpg">
					</div> -->
    					<div class="card fat">
    						<div class="card-body">
    							<h4 class="card-title">Register Account</h4>

    <!--************************** FIRST PART OF REGISTRATION **************************-->
              <div id="register_form">

                  <form id="register_section1" action="../../controller/submit_register.php" method="POST">

                    <div class="form-group">
                      <label for="first_name">First Name</label>
                      <input id="first_name" type="text" class="form-control" name="first_name" required>
                    </div>

                    <div class="form-group">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="last_name" required>
                    </div>


    								<div class="form-group">
    									<label for="username">E-mail Address</label>
    									<input id="username" type="email" class="form-control" name="username" onkeyup="checkemail();" />
    								</div>

              <div id="user_errDiv2"></div>

    								<div class="form-group">
    									<label for="password">Password</label>
    									<input id="password" type="password" class="form-control" name="password" data-eye>
    								</div>

    								<div class="form-group">
    									<label>
    										<input type="checkbox" name="aggree" value="1"> I agree to the Terms and Conditions
    									</label>
    								</div>

    <input type="hidden" name="action_type" value="add"/>

    								<div class="form-group no-margin">
    									<button type="submit" class="btn btn-primary btn-block">
    										Sign Up
    									</button>
    								</div>

    								<div class="margin-top20 text-center">
    									Already have an account? <a href="login_page.php">Login</a>
    								</div>

                    <div id="email_status"></div>

                    <div id="user_errDiv">

                        <?php
                        if(!isset($_SESSION['error'])){
                          echo $_SESSION['message'] = '';
                        }

                        if(isset($_SESSION['error'])){
                          echo $_SESSION['error'];
                          unset($_SESSION['error']);
                        } else {
                          echo $_SESSION['message'];
                        }
                        ?>

                    </div>

    							</form>
            </div>


						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2018 &mdash; Your Company
					</div>
				</div>
			</div>
		</div>
	</section>


</body>
</html>
