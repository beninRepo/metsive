<?php session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	$admin = json_decode(file_get_contents("data.json"), true);
	if((isset($_SESSION['username']) && $_SESSION['username'] == $admin['username'])){
		header("Location: send_mail.php"); 
		exit;
	}
	if (isset($_POST['username']) && !empty($_POST['username']) 
	   && !empty($_POST['password'])) {
	   if ($_POST['username'] == $admin['username'] && 
		  $_POST['password'] == $admin['password']) {
		  $_SESSION['timeout'] = time();
		  $_SESSION['username'] = $admin['username'];
		  header('Location : /send_mail');
	   }else {
		  $_SESSION["error"] = "Invalid credentials";
	   }
	}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Metsive Admin</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    font-size: 15px;
    position: absolute;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>
<?php 
if(!(isset($_SESSION['username']) && $_SESSION['username'] == $admin['username'])) { ?>
<div class="login-form">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name="login">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password"  class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
		<p><?php if(isset($_SESSION["error"])) { echo $_SESSION["error"]; unset($_SESSION["error"]); } ?></p>
        </div>        
    </form>
</div>
<?php } else{
	//header('Location : /send_mail');
} ?>


</body>
</html>