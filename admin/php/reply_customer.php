<?php
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\SMTP;
      use PHPMailer\PHPMailer\Exception;
     include ('db_conn.php');
     if($_POST){
          $name=mysqli_escape_string($mysqli,$_POST['name']);
          $email=mysqli_escape_string($mysqli,$_POST['email']);
          $subject=mysqli_escape_string($mysqli,$_POST['subject']);

          require_once "../../vendor/autoload.php";

          $mail = new PHPMailer(true);

          //Enable SMTP debugging.
          $mail->SMTPDebug = 3;
          //Set PHPMailer to use SMTP.
          $mail->isSMTP();
          //Set SMTP host name
          $mail->Host = "smtp.gmail.com";
          //Set this to true if SMTP host requires authentication to send email
          $mail->SMTPAuth = true;
          //Provide username and password
          $mail->Username = "palsnpartnerscln@gmail.com";
          $mail->Password = "Pals@Partners1";
          //If SMTP requires TLS encryption then set it
          $mail->SMTPSecure = "tls";
          //Set TCP port to connect to
          $mail->Port = 587;

          $mail->From = "palsnpartnerscln@gmail.com";
          $mail->FromName = "Pals and Partners";

          //$mail->addAddress($email, $name);
          $mail->addAddress('helpnepalintas@gmail.com', $name);

          $mail->isHTML(true);

          $mail->Subject = $subject;
          $mail->Body = "<i>Mail body in HTML</i>";
          $mail->AltBody = "This is the plain text version of the email content";

          try {
              $mail->send();
              echo "Message has been sent successfully";
          } catch (Exception $e) {
              echo "Mailer Error: " . $mail->ErrorInfo;
          }

    }
    else{
        echo 'No Data';
     }
    ?>
