<?php

    $to = $UserEmail;
    $subject = "Your Service Request has been Rescheduling Successfully";

    $body = "<h4 style='font-size:17px;'>Service Request Id is : <span style='color:blue;'>$ServiceRequestId</span></h4>

             <h4 style='font-size:17px;'> New Time and Date is : <span style='color:red;'> $newTime and $newDate </span>
             <br>
             More Reschedule Details You can show from Customer Dashboard Section.
            <br>
             When Service Provider Accept Your Reschedule Request Than You can show SP Details</h4>";

       //Set content-type header for sending HTML email
    $headers[] = 'From: Parth Shobhana';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-Type: text/html; utf-8';

       // $headers = "MIME-Version: 1.0" . "\r\n";
       // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to, $subject, $body, implode("\r\n", $headers));
?>