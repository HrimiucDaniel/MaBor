<?php
    if(isset($_POST['sendMailButton'])){
        $emailFrom = "Mabor2022@yahoo.com";
        $emailTo = "florentin.razvan@yahoo.com";
        $subjectName = "Invitatie bal.";
        $message = "Esti invitat.";

        //mail($emailTo, $subjectName, $message);

        $to = $emailTo;
        $subject = $subjectName;
        $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: '.$emailFrom.'<'.$emailFrom.'>' . "\r\n".'Reply-To: '.$emailFrom."\r\n" . 'X-Mailer: PHP/' . phpversion();
        $message = '<!doctype html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport"
					  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge">
				<title>Document</title>
			</head>
			<body>
			<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$message.'</span>
				<div class="container">
                 '.$message.'<br/>
                    Regards<br/>
                  '.$emailFrom.'
				</div>
			</body>
			</html>';
        $result = @mail($to, $subject, $message, $headers);

        echo '<script>alert("Email sent successfully !")</script>';
        //echo '<script>window.location.href="index.php";</script>';
    }
?>