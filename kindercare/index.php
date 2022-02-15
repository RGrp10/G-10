<?php
    require_once 'includes/header.php';
?>

<div class="container">
	<div class="screen">
		<div class="screen__content">
			<center style="margin-top: 200px;">
			<div class="container">
				<p>Welcome to KinderCare Character Draw System. Please register here.</p>
				<form class="login" method="post" action="authourize.php">
					<div class="login__field" >
						<label for="">Username</label>
						<input type="text"  name="username" class="form-control" style="width: 250px">
					</div>
					<div class="login__field">
						<label for="">Password</label>
						<input type="password"  name="password" class="form-control" style="width: 250px"><br>
					</div>
					<button  type="submit" name="logButton" class="btn btn-primary">
						<span class="button__text">Log In</span>
					</button>
					<p>Don't have an account? <a href="register.php">Register!</a></p>				
				</form>
			</div>
		</div>
	</div>
</div>
</center>

<?php
    require_once 'includes/footer.php';
?>