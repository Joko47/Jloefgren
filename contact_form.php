<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "admin@SiteName.com";
     
    $email_subject = "SiteName contact form submission";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['subject'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $subject = $_POST['subject']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-zÆØÅæøå .'-]+$/";
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(strlen($subject) < 2) {
    $error_message .= 'The message you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n\n";
    $email_message .= "Message: ".clean_string($subject)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- place your own success html below -->
<!doctype html>
<html><!-- InstanceBegin template="/Templates/SiteName.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta name="viewport" content="width=device.width, initial-scale=1">

<link rel="stylesheet" href="css/base.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<meta charset="utf-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Message Sent!</title>
<!-- InstanceEndEditable -->
	
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<meta name="robots" content="noindex, nofollow"/>
</head>

<body>

	<div class="wrapper" style="height: auto !important; min-height: 100%;">
		<!-- Navigation -->
		<nav class="navbar">
			<!-- Navigation buttons -->
			<section class="navbar-box">
  				<a href="index.html" class="navbutton">Home</a>
  				<a href="projects.html" class="navbutton">Projects</a>
  				<a href="about.html" class="navbutton">About</a>
  				<a href="contact.html" class="navbutton">Contact</a>
			</section>
		
			<!-- Social buttons -->
			<section class="navbar-box">
  				<a href="https://github.com/alias/" class="navbutton social"><i class="fa fa-github fa-2x"></i></a>
  				<a href="https://www.linkedin.com/in/johnDoe/" class="navbutton social"><i class="fa fa-linkedin-square fa-2x"></i></a>
				<a href="https://twitter.com/alias" class="navbutton social"><i class="fa fa-twitter fa-2x"></i></a>
				<a href="https://www.facebook.com/alias" class="navbutton social"><i class="fa fa-facebook-official fa-2x"></i></a>
			</section>
			<!--
  			<a href="#"><i class="fa fa-pinterest-p"></i></a>
  			<a href="#"><i class="fa fa-flickr"></i></a>
			-->
		</nav> 

<!-- InstanceBeginEditable name="body" -->

<!-- Welcome message -->
	<section class="container">
		<p>&nbsp;</p>
		<h2 class="spacedhead highlight">SUCCES!</h2>
  		<p class="subline"><i>Your message has been sent, and i will return to you, at my earliest convenience</i></p>
  		<p>&nbsp;</p>
  		<p>&nbsp;</p>
  		<p class="body centered">Now feel free to go wherever you like, you don't have to wait here for me to respond</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
	</section>
</center>
	
<!-- InstanceEndEditable -->
<!-- Footer -->
		<footer class="footer">
	
			<section class="footer-box">
  				<p class="footertxt"><a href="mailto:admin@site.com" target="_top">admin@site.com</a></p>
			</section>
	
			<section class="footer-box">
  				<p></p>
			</section>
	
			<section class="footer-box">
  				<p class="footertxt"><a href="index.html">
				&copy; <script>new Date().getFullYear()>2010&&document.write(""+new Date().getFullYear());</script> - SiteName.com.
  				</a></p>
  			</section>
			<section style="padding-bottom: 64px!important; width: 100%"></section>
		</footer> 
	</div>

</body>
<!-- InstanceEnd --></html>

<?php
}
die();
?>