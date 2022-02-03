<?php
    require_once 'includes/header.php';
	
?>
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="post" action="authourize.php">
				<div class="login__field">
					<label for="">Username</label>
					<input type="text" class="login__input" name="username">
				</div>
				<div class="login__field">
                    <label for="">Password</label>
					<input type="password" class="login__input" name="password" >
				</div>
				<button class="button login__submit" type="submit" name="logButton">
					<span class="button__text">Log In</span>
				</button>
                <p>Don't have an account? <a href="register.php">Register!</a></p>				
			</form>


<?php
    require_once 'includes/footer.php';
?>