<?php

//Taking all values
$fname 		= $_POST['fname'];
$email 		= $_POST['email'];
$tele 	     = $_POST['tele'];
$subject 	= $_POST['subject'];

$output 	= "Name: ".$fname."\n\nSubject: ".$subject."\n\nPhone Number: ".$tele."\n\nEmail:".$email;

$to 		= 'vishnukushinagar@gmail.com';

 $headers = "From:" . $email;
$send		= mail($to, $subject, $output."\n\n***Enquiry***", $headers);