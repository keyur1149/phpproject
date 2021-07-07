<?php
$input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter your email.";
    // } elseif(!filter_var($input_email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-z0-9\s]+$/")))){
    //     $email_err = "Please enter a valid email.";
    }else if (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
        $email_err="not valid " ;
    }else{
        $email = $input_email;
    }
if(!empty($_POST['full']) && !empty($_POST['mess']) && empty($email_err)){
    $to = 'keyurpatel1149@gmail.com';
    $subject = $_POST['full'];
    
    $message = $_POST['mess'];
    
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    // More headers
     $headers .= 'From: <webmaster@example.com>' . "\r\n";
    //$headers .= 'Cc:mmmm' . "\r\n";
    
    
    if (mail($to, $subject, $message, $headers))
          echo "mail succesfully done.";
    else
        echo "try again";
}else{
    echo "fill all things";
}
?>