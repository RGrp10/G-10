<?php
    require_once 'includes/header.php';
?>
<div class="container">
	<div class="screen">
		<div >
			<form class="login" action="teacherdetails.php" method="post">
				<div class="login__field">
					<label for="">First Name</label>
					<input type="text" class="login__input" name="fname">
				</div>
                <div class="login__field">
					<label for="">Last Name</label>
					<input type="text" class="login__input" name="lname">
				</div>
                <div class="login__field">
					<label for="">Username</label>
					<input type="text" class="login__input" name="username">
				</div>
				<div class="login__field">
                    <label for="">Password</label>
					<input type="password" class="login__input" name="password1">
				</div>
				<div class="login__field">
                    <label for=""> Confirm Password</label>
					<input type="password" class="login__input" name="password2">
				</div>
				<button class="button login__submit" type="submit" name="regButton">
					<span class="button__text">Register</span>
				</button>
                <p>Already have an account? <a href="index.php">Login!</a></p>				
			</form>


<?php
    require_once 'includes/footer.php';
?>