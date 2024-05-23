<?php
//change settings here
$your_email = "test@bkbambalaj.com";
$your_smtp = "wph1.trdns.com";
$your_smtp_user = "test@bkbambalaj.com";
$your_smtp_pass = "hg9sR1#42";
$your_website = "http://bkbambalaj.com";


require("phpmailer/class.phpmailer.php");


//function to check properly formed email address
function isEmailValid($email)
{
  // checks proper syntax
  if( !preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email))
  {
    return false;
  } 
  
  return true;
  
}


//get contact form details
$name = $_POST['name'];
$email = $_POST['email'];
$url = $_POST['url'];
$comments = $_POST['comments'];


//validate email address, if it is invalid, then returns error

if (!isEmailValid($email)) {
	die('Invalid email address');
}

//start phpmailer code 

$ip = $_SERVER["REMOTE_ADDR"];
$user_agent = $_SERVER['HTTP_USER_AGENT'];



$response="Date: " . date("d F, Y h:i:s A",time()+ 16 * 3600 - 600) ."\n" . "IP Address: $ip\nURL: $url\nUser-agent:$user_agent\nName: $name\nContents:\n$comments\n";
//mail("info@mypapit.net","Contact form fakapster",$response, $headers);

$mail = new PHPmailer();
$mail->SetLanguage("en", "phpmailer/language");
$mail->From = $your_email;
$mail->FromName = $your_website;
$mail->Host = $your_smtp;
$mail->Mailer   = "smtp";
$mail->Password = $your_smtp_pass;
$mail->Username = $your_smtp_user;
$mail->Subject = "$your_website feedback";
$mail->SMTPAuth  =  "true";

$mail->Body = $response;
$mail->AddAddress($your_email,"$your_website admin");
$mail->AddReplyTo($email,$name);


if (!$mail->Send()) {
echo "<p>There was an error in sending mail, please try again at a later time</p>";
echo "<p>".$mail->ErrorInfo."</p>";
} else {
	echo "<p>Thanks for your feedback, <em>$name</em>! We will contact you soon!</p>";
}

$mail->ClearAddresses();
$mail->ClearAttachments();

?>