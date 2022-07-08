<?php
            require 'class.smtp.php';
            require 'class.phpmailer.php';

            $name=$_POST['name'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $message =$_POST['message'];
            require 'PHPMailerAutoload.php';
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 3;                                  // Enable verbose debug output  
            $mail->isSMTP();                                       // Set mailer to use SMTP  
            $mail->Host = 'smtp.gmail.com;';                       // Specify main and backup SMTP servers  
            $mail->SMTPAuth = true;                                // Enable SMTP authentication  
            $mail->Username = 'hue2000tn@gmail.com';               // your SMTP username  
            $mail->Password = 'gqzkjhnxhzpniqjn';                      // your SMTP password  
            $mail->SMTPSecure = 'tls';                             // Enable TLS encryption, `ssl` also accepted  
            $mail->Port = 587;                                     // TCP port to connect to  
            $mail->setFrom(''.$email.'', 'NgoThiHue');  
            $mail->addAddress('hue2000tn@gmail.com');  
            $mail->Subject = '[Web CV - Ngo Thi Hue]';  
            // set your BCC email address  
            $mail->isHTML(true);   
            $mail->Body  = "<h3>Có người để lại lời nhắn cho bạn</h3>";
            $mail->Body  .= "$name <br> $phone <br> $email";
            $mail->Body  .= "<br>Với lời nhắn: '$message'";

            if($mail->send()) {  
            echo 'Message has been sent';  
            } else {  
            echo 'Message could not be sent';  
            }  
            header("Location:contact.php");
    ?>