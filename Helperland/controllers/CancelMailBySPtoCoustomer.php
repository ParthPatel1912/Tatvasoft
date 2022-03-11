<?php

    $to = $UserEmail;
    $subject = "Your Service Request has been Canceled By Service Provider";

    $body = "<h4 style='font-size:17px;'>Service Request Id is : <span style='color:blue;'>$ServiceRequestId</span></h4>
             <h4>Your Service is Cancelled by $SpName</h4>
             <br>
             <h4>More Details You can show from Customer Dashboard Section.</h4>
             <h4>You book new service for complete your service";

       //Set content-type header for sending HTML email
    $headers[] = 'From: Parth Shobhana';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-Type: text/html; utf-8';

       // $headers = "MIME-Version: 1.0" . "\r\n";
       // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to, $subject, $body, implode("\r\n", $headers));
?>