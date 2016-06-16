<?php
require_once "Mail.php";
		$destinationmail = "muhammadbasri444@gmail.com";
		$subject="Pemberitahuan";
		$body = "hantu ini genkk";
		$source =$destinationmail;
		//INITIALIZE 
		$host = "ssl://smtp.gmail.com";
		$port = "465";
		$username = "basribasbes@gmail.com";
   
		//passwordmu waktu login gmail
		$password = "basri1198corse";
		$headers = array('From' => $username, 'To' => $destinationmail,'Subject' => $subject,'Reply-To'=>$source);
		
		$smtp = Mail::factory('smtp', array('host' => $host,'port' => $port, 'auth' => true,'username' => $username, 'password' => $password));
		
		 $mail = $smtp -> send($destinationmail, $headers, $body);
		 if (PEAR::isError($mail)) {
				print json_encode($mail -> getMessage());
		}else{
				print json_encode(2);
		}	