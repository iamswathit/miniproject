# miniproject
Synopsis
  This is a bootstrap based contact form which uses emailAddress,Subject of the message and the content of the message.
  Included jQuery form validation,if the form is submitted incorrectly,it gives the eoor messages which shows the field to be entered and if all the fields are entered correctly it displays success message.
  It also includes Server side validation with PHP by checking whether the email address is entered correctly,checking with the subject and content side validation as well.
  
Code Example

		// Validate e-mail
		if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {

		$error .= "The email address is invalid.<br>";
		
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
  

  
