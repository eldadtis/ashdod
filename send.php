<?php
    // email script example
    if( isset($_POST['phone']) && !empty($_POST['phone']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['full_name']) && !empty($_POST['full_name'])) {
        // insert form data to parameters
        $phone   = $_POST['phone'];
        $email  = $_POST['email'];
        $full_name  = $_POST['full_name'];
    
        // build email text
        $subject = 'דף נחיתה נויה';
        $msg = 'היי, קיבלתם ליד חדש מהדף נחיתה' . '<br>';
        $msg .= $phone."<br>".$email.'<br>'.$full_name;

        //prepare important stuff that need to be in email
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
        //send email
          mail("itsitzik@gmail.com",$subject, $msg, $headers);

          header("HTTP/1.1 200 OK");
          echo 'ok';
    } else {
        header("HTTP/1.1 400 Bad Request");
    }
?>