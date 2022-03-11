<?php

    $to = $UserEmail;
    $subject = "Your Service Request has been Approved Successfully";

    $body = "<h4 style='font-size:17px;'>Service Request Id is : <span style='color:blue;'>$ServiceRequestId</span></h4>
             <h4>Your Service is Approved by $SpName</h4>
             <br>
             <h4>More Reschedule Details You can show from Customer Dashboard Section.</h4>";

       //Set content-type header for sending HTML email
    $headers[] = 'From: Parth Shobhana';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-Type: text/html; utf-8';

       // $headers = "MIME-Version: 1.0" . "\r\n";
       // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to, $subject, $body, implode("\r\n", $headers));
?>