<?php
  session_start();
  include 'header.php';
  include 'nav.php';
?>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
    					<div class="card fat">
    						<div class="card-body">
    							<h4 class="card-title">Register Account</h4>


              <div id="register_form">

                  <form id="register_section1" action="../../controller/submit_register.php" method="POST">

                    <div class="form-group">
                      <label for="first_name">First Name</label>
                      <input id="first_name" type="text" class="form-control" name="first_name" required pattern="^\p{Lu}\p{L}+(?:[\s,.'-]\p{L}+)?$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
                    </div>

                    <div class="form-group">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="last_name" required pattern="^\p{Lu}\p{L}+(?:[\s,.'-]\p{L}+)?$" oninvalid="setCustomValidity('Incorrect format! First letter must be uppercase.')" oninput="setCustomValidity('')">
                    </div>


    								<div class="form-group">
    									<label for="username">E-mail Address</label>
    									<input id="username" type="email" class="form-control" name="username" onkeyup="checkemail();" required/>
    								</div>

              <div id="user_errDiv2"></div>

    								<div class="form-group">
    									<label for="password">Password</label>
    									<input id="password" type="password" class="form-control" name="password" data-eye required>
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
