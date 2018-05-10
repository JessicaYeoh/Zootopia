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
							<h4 class="card-title">Login</h4>
							<form action="../../controller/login_process.php" method="POST">

								<div class="form-group">
									<label for="email">E-Mail Address</label>

									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
								</div>

								<div id="user_errDiv">

										<?php
										// if there is no error set, do not return a message
										if(!isset($_SESSION['error'])) {
											$_SESSION['error'] = "";
										}
										?>

										<?php
										echo $_SESSION['error']; //show error message (couldn't login)
										unset ($_SESSION['error']); //this clears the cache to remove previous errors
										?>

								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="forgot.html" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								</div>

								<div class="form-group">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>

								<div class="form-group no-margin">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="margin-top20 text-center">
									Don't have an account? <a href="register.php">Create One</a>
								</div>
							</form>
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
