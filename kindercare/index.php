<?php
    require_once 'includes/header.php';
	
?>

<div class="container"  >
	<div class="screen">
		<div class="screen__content">

<center style="margin-top: 200px;">
<div class="container">
	<h1>KINDERCARE CHARACTER DRAW</h1>
<div>

<form class="login-dark" method="post" action="authourize.php">
				<div class="login__field" >
					<label for="">Username</label>
					<input type="text"  name="username" class="form-control" style="width: 250px">
				</div>
				<div class="login__field">
                    <label for="">Password</label>
					<input type="password"  name="password" class="form-control" style="width: 250px">
				</div>
				
				<p style="text-align: center;"><button type="submit" class="btn btn-dark btn-sm" name="logButton" >
                                <i class="fa fa-dot-circle-o"></i>Log In
                            </button></p>
                <p>Don't have an account? <a href="register.php">Register!</a></p>				
			</form>
</div>
		</div>
</center>
		
			
			


<?php
    require_once 'includes/footer.php';
?>
