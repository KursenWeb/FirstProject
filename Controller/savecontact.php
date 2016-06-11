<?php
 session_start();
if(isset($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['remarks'])){
	if($_SESSION['Captcha'] !=$_POST['captchatext']){
		print json_encode(3);
	}else{
	require('../Model/config.php');
	$name=$_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$remarks = $_POST['remarks'];
	$datereceive =date("Y-m-d H:i:s");
	$query ="insert into contact(name,email,phone,remarks,status,datereceive) values('$name','$email',
	'$phone','$remarks','D','$datereceive')";
	
	$executequery=mysqli_query($connection,$query);
	if(!$executequery){
		print json_encode("0"."Gagal menginput data");
	}else{
		//mail initialize
		mysqli_close($connection);
		require_once "Mail.php";
		$destinationmail = "cvkursendotcom@gmail.com";
		$subject="Pemberitahuan";
		$body = $remarks;
		$source =$email;
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
	}
}
	
}else{
	print "Data Tidak Lengkap";
}
?>