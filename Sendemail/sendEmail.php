<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        require_once "PHPMailer/OAuth.php"

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Username = "hsswebdev@gmail.com"; //enter you email address
        $mail->Password = "Th1sisthepassword"; //enter you email password
        $mail->Port = "587";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom("hsswebdev@gmail.com ");
        $mail->addAddress("hsswebdev@gmail.com"); //enter you email address
        $mail->Subject = "Hope SS";
        $mail->Body = "This is plain text";

        if ($mail->send()) {
            $status = "success";
            $response = "Thanks for contacting us!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }
    $mail ->smtpClose()
?>
