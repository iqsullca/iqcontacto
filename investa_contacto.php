<?php


if(!$_POST) exit;

$email = "noreplay@qnet.pe";


//$error[] = preg_match('/\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i', $_POST['email']) ? '' : 'E-mail mal escrito';
if(!eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*" ."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$",$email )){
	$error.="El E-mail ingresado es incorrecto";
	$errors=1;
}
if($errors==1) echo $error;
else{
	$values = array ('name','email','subject','msg');
	$required = array ('name','email','subject','msg');
	//proyectos@investa.com.pe
	//$your_email = "investasab@investa.com.pe";
	$your_email = "proyectos@investa.com.pe";
	$email_subject = "Investa - Mensaje desde la Web";
	$email_content = "datos:\n";
	
	foreach($values as $key => $value){
	  if(in_array($value,$required)){
		$email_content .= $value.': '.$_POST[$value]."\n";
	  }
	}
	 
	if(@mail($your_email,$email_subject,$email_content)) {
		header("Location: gracias.html");
	} else {
		echo 'ERROR!';
	}
}
?>