<?php include "../classes/Adminclass.php"; ?>
<?php session_start(); ?>
<?php 
if(isset($_SESSION['admin'])){
	header('Location: index.php'); 
  }

?>
<?php 

if(isset($_POST['submit'])){
	$admin = new Adminclass;

	$adminlogin = $admin->adminlogin($_POST);

}

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">

		<form action="" method="POST">
			<h1>Admin Login</h1>
            <?php 
			if(isset($adminlogin)){
				echo $adminlogin;
			}
			
			?>
		  
			<div>
			

				<input type="text" placeholder="E-mail" required="" name="email"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" name="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Website Generator</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>