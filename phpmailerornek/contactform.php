<?php
?>

<html>
<head>
<title>Contact form demo</title>
<link href="contact.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div id="content">
	
<h2>Contact me</h2>
<p>Feel free to use the form to contact me.</p>

<div id="theform">
<form name="contactform" id="contactform" action="contact.php" method="POST" onsubmit="xajax_processForm(xajax.getFormValues('contactform')); return false;">
<label for="name">Name</label>
<input type="text" id="name" name="name" maxlength="50" size="30" /> (required)<br />
<label for="email">E-Mail</label>
<input type="text" id="email" name="email" maxlength="50" size="30" /> (required) <br />
<label for="url">Website url</label>
<input type="text" id="url" name="url" maxlength="150" size="30" value="http://" /> <br />
<label for="comments">Comments</label>
<textarea name="comments" id="comments" maxlength="1024" rows="10"></textarea><br />
<input type="Submit" value="Submit" id="submitbutton" />
</form>


</div>


</body>
</html>
