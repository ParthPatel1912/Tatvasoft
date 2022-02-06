<?php
  $to = $EmailAddress;
  $subject = "Forgot Password for Helperland";

  $body = "
  <div>
  <h5 style='font-size:22px;'>Hi, $Name .Click below Link for Reset Your Password</h5>

   <h6 style='font-size:18px;'>Please Click This and Reset Your Password </h6>
   <br/>

   <a href='http://localhost:8088/views/HomePage.php?controller=User&function=ResetPasswordwithKey&resetkey=$resetkey#ResetModal'> Reset password Link</a>
 </div>
    ";
  //Set content-type header for sending HTML email
  $headers[] = 'From: Parth Shobhana <pkl1122@gmail.com>';
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-Type: text/html; utf-8';

  // $headers = "MIME-Version: 1.0" . "\r\n";
  // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  mail($to, $subject, $body, implode("\r\n", $headers));

?>