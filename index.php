<?php

	//server-side validation
	
	$error = ""; $successMessage = "";
	
	if($_POST) {
		
		if(!$_POST["email"]) {
			
			$error .= "The email address cannot be empty.<br>";
			
		}
		
		if(!$_POST["content"]) {
			
			$error .= "The content field cannot be empty.<br>";
		}
	
		if(!$_POST["subject"]) {
			
			$error .= "The subject cannot be empty.<br>";
		}
		
		// Validate e-mail
		if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {

		$error .= "The entered email address is invalid.<br>";
		
		}
		
		//if the error string is no longer empty
		
		if ($error != "") {
			
			$error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error .'</div>';
		} else {
			
			$emailTo = "me@mydomain.com";
			
			$subject = $_POST['subject'];
			
			$content = $_POST['content'];
			
			$headers = "From: ".$_POST['email'];
			
			if (mail($emailTo, $subject, $content, $headers)) {
				
				$successMessage = '<div class="alert alert-success" role="alert">Your message was sent,we\'ll get back to you ASAP!</div>';
			
			} else {
				
				$error = '<div class="alert alert-danger" role="alert">Your message couldn\'t be sent - please try again later </div>';
				
			}
			

			}
			
		
	}
	
	
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
  
  <div class="container">
    <h1>Get in touch!</h1>
	
	<div id="error"><?php echo $error.$successMessage ;?></div>
	
	<form method="post">
  <fieldset class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter your email address">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </fieldset>
  <fieldset class="form-group">
    <label for="subject">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject">
  </fieldset>
    <fieldset class="form-group">
    <label for="content">What would you like to ask us?</label>
    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
  </fieldset>
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	
	
		<!-- stop form submitting jQuery--->
		<script type="text/javascript">
		
		$("form").submit(function (e) {
			
				//e.preventDefault();
	  // this will prevent from submitting the form.
	  
				var error = "";
	  
	  if ($("#email").val() == "") {
		  
				error += "The email address field is required.<br>";
	  }if ($("#subject").val() == "") {
		  
				error += "The subject field is required.<br>";
	  }
	  
	  if ($("#content").val() == "") {
		  
				error += "The content field is required.";
	  }
	  
	  <!--if there is an error message ,the error variable is empty,then html have a string to dispaly the error message-->
	  
	  if(error != "") {
		  
		  $("#error").html('<div class="alert alert-danger" role="alert"><p><strong> There were error(s) in your form:</strong></p>' + error +'</div>' );
		  
		  return false;
		  
		  //its a javascript way of saying something is gonna wrong,so we don't want to submit the form

	  } else {
		  
		  return true;
		  
		  
		  //$("form").unbind("submit").submit();
		  
		  <!--unbind() command to revert to the default behaviour.-->
	  }
	  
		});
		
		</script>
  </body>
</html>
