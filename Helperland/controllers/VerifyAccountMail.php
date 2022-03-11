<?php
  $to = $EmailAddress;
  $subject = "Activation Account for Helperland";

  $body = "
  <div>

   <h5 style='font-size:22px;'>Click below Link and Active Your Account </h6>
   <br/>
   <br/>
   <br/>

   <a href='http://localhost:8088/?controller=User&function=ActivateAccount&resetkey=$Resetkey'> Active account Link</a>

   <h6 style='font-size:18px;'>Thanks For registering in Helperland!</h6>
 </div>
    ";
  //Set content-type header for sending HTML email
  $headers[] = 'From: Parth Shobhana';
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-Type: text/html; utf-8';

  // $headers = "MIME-Version: 1.0" . "\r\n";
  // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  mail($to, $subject, $body, implode("\r\n", $headers));

?>