<?php 
// include("post_new.html");

// mysql account
include ("db_conn.php");


/*echo "string";
echo "subject : ".$_POST['subject'];
echo "message : ".$_POST['message'];
echo "link : ".$_POST['link'];*/

function run_query($connection,$query){
    $strSQL=mysqli_query($connection,$query);
    $executed=false;
    if($strSQL){
        $exectued=true;
    }else{
        echo "Error".$connection->error;
    }
          
    return $executed;
}


$name       = mysqli_real_escape_string($connection,$_POST['name']);
$email      = mysqli_real_escape_string($connection,$_POST['email']);
$message = mysqli_real_escape_string($connection,$_POST['message']);

$sql = "INSERT INTO feedbacks (name, email, content) VALUES ('".$name."','".$email."','".$message."')"; 
$executed=run_query($connection,$sql);

include('./TnpCell/test/Databaseconnection.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './TnpCell/vendor/autoload.php';

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

//echo nl2br("Name: ".$_POST['Name']."\rEmail: ".$_POST['email']."\nMessage: ".$_POST['message']);
//Recipients
//$email = $_POST['email'];
$mail->setFrom('arora.sameer196@gmail.com');
// $mail->addAddress('prasad23kshirsagar@gmail.com');     // Add a recipient
// $mail->addAddress('2016csb1124@iitrpr.ac.in');     // Add a recipient
$mail->addAddress('shreyanshushekhar007@gmail.com');     // Add a recipient
// $mail->addAddress('2016csb1064@iitrpr.ac.in');     // Add a recipient
// $mail->addAddress('2016csb1053@iitrpr.ac.in');     // Add a recipient

    //Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'feedback';
$mail->Body    = nl2br($message);
$mail->AltBody = $message;

$mail->send();
echo 'message=Mail has been sent';


} catch (Exception $e) {
    echo 'Mail could not be sent. Mailer Error: ', $mail->ErrorInfo;
    $message='Mail could not be sent. Mailer Error: ';
}

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

redirect("contact.php")



 ?>