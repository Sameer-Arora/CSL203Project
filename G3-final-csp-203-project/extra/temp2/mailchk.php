<?php

function randomPassword() {
    $alphabet = '0abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $pass[] = $alphabet[0];
  
    return implode($pass); //turn the array into a string
}

include ('session.php');

$mail_sent=false;

if(!isset($_SESSION['person_id'])){
    header("Location:login.php?message=Please+login+session+timed+out");
}

include('./test/Databaseconnection.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'arora.sameer196@gmail.com';                 // SMTP username
    $mail->Password = 'sanjanae';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;  
    $mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);                                  // TCP port to connect to

    $rand_pass=randomPassword();
    echo $rand_pass;

    $message="";

    $email = mysqli_real_escape_string($connection,$_POST['email']);

    echo "$email";

    $strSQL = mysqli_query($connection," select auth.person_id from auth where email='".$email."'" ) ;

    $Results=mysqli_fetch_array($strSQL);

   // echo count($Results);
    echo "<br>".mysqli_num_rows($strSQL);

    if(mysqli_num_rows($strSQL)==0)
    {
        $message =" Sign up first Email not there!!";
        echo $message;
    }
    else
        {        

    //echo nl2br("Name: ".$_POST['Name']."\rEmail: ".$_POST['email']."\nMessage: ".$_POST['message']);
    //Recipients
    //$email = $_POST['email'];
    $mail->setFrom('arora.sameer196@gmail.com');
   // $mail->addAddress('prasad23kshirsagar@gmail.com');     // Add a recipient
   // $mail->addAddress('2016csb1124@iitrpr.ac.in');     // Add a recipient
    $mail->addAddress($email);     // Add a recipient
   // $mail->addAddress('2016csb1064@iitrpr.ac.in');     // Add a recipient
   // $mail->addAddress('2016csb1053@iitrpr.ac.in');     // Add a recipient
   
   
    $strSQL = mysqli_query($connection," update auth set password='".$rand_pass."' where email='".$email."'" ) ;

    if($strSQL)
    {
        $message = " Mailed you the new Password!!";
        echo $message;
        $mail_sent=true;

            //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Forgot Password Tnp Cell';
        $mail->Body    = nl2br("Name: ".$_SESSION['name']."\nNew Password: ".$rand_pass);
        $mail->AltBody = "Name: ".$_SESSION['name']."\nNew Password: ".$rand_pass;

        $mail->send();
        echo 'message=Mail has been sent';

    }
    else
        {        
        
        $message = "Cannot update the password!!";
        echo "Error".$connection->error;
  
         }
    }

} catch (Exception $e) {
    echo 'Mail could not be sent. Mailer Error: ', $mail->ErrorInfo;
    $message='Mail could not be sent. Mailer Error: ';
}


if($mail_sent){

    header("Location:reset.php?message=".$message."&mail_sent=".$mail_sent);
}
else{
    header("Location:reset.php?message=".$message);

}

?>







