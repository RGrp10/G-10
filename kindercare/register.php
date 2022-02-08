<?php
    require_once 'includes/header.php';
?>
<div class="container">
	<div class="screen">
<center>
<div  class="container" style="margin-top: 200px;">
			<form class="login" action="teacherdetails.php" method="post">
				<div class="login__field">
					<label for="">First Name</label>
					<input type="text" class="login__input" name="fname" class="form-control" style="width: 250px">
				</div>
                <div class="login__field">
					<label for="">Last Name</label>
					<input type="text" class="login__input" name="lname" class="form-control" style="width: 250px">
				</div>
                <div class="login__field">
					<label for="">Username</label>
					<input type="text" class="login__input" name="username" class="form-control" style="width: 250px">
				</div>
				<div class="login__field">
                    <label for="">Password</label>
					<input type="password" class="login__input" name="password1" class="form-control" style="width: 250px">
				</div>
				<div class="login__field">
                    <label for=""> Confirm Password</label>
					<input type="password" class="login__input" name="password2" class="form-control" style="width: 250px">
				</div>
				<br>
				<button class="button login__submit" type="submit" name="regButton" class="btn btn-primary">
					<span class="button__text">Register</span>
				</button>
                <p>Already have an account? <a href="index.php">Login!</a></p>				
			</form>
			</div>

</center>
		

<?php
    require_once 'includes/footer.php';
?>