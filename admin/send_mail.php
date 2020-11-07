<?php session_start();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');	
	$admin = json_decode(file_get_contents("data.json"), true);
	if(!((isset($_SESSION['username']) && $_SESSION['username'] == $admin['username'])))
		header("Location: index.php"); 
	if (isset($_POST['firstname']) && !empty($_POST['firstname']) 
	   && !empty($_POST['email'])) {
	    $fullname = $_POST['firstname']+ ' ' + $_POST['lastname'];
		$email = $_POST['email'];
		$mail_type = $_POST['mail_type'];
		$message = $_POST['message'];
		
	}
	?>
<html>
    <head>
        <title>Metsive Admin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    </head>
	<style>
	.container {
		
	}
	</style>
    <body>

        <div class="container">
		<h1>Send Email</h1>
<form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" role="form">

    <div class="messages"></div>

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">To Firstname *</label>
                    <input id="form_name" type="text" name="firstname" class="form-control" placeholder="Please enter firstname *" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_lastname">To Lastname *</label>
                    <input id="form_lastname" type="text" name="lastname" class="form-control" placeholder="Please enter lastname *" required="required" data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">To Email *</label>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter email *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_need">Please specify the mail type *</label>
                    <select id="form_need" name="mail_type" class="form-control" required="required" data-error="Please specify mail type" >
                        <option value="Request quotation">Introduction</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Message *</label>
                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for the Client *" rows="4" required="required" data-error="Please, leave a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Send message">
            </div>
        </div>
    </div>

</form>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
    </body>
</html>