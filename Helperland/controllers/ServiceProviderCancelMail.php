<?php

    $to = $SPEmail;
    $subject = "Your coustomer Service Request $ServiceRequestsId has been Cancelled";

    $body = "<h4 style='font-size:17px;'>Service Request Id is : <span style='color:blue;'>$ServiceRequestId</span></h4>

    <h4>Please Check coustomer issue for Cancellation Request</h4>
    <br>
    <h4>We hope this feedback is very helpful for You future progress</h4>
    <br>
    <h4>Feedback : <span style='color:green;'>$hasissue</span></h4>";

       //Set content-type header for sending HTML email
    $headers[] = 'From: Parth Shobhana';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-Type: text/html; utf-8';

       // $headers = "MIME-Version: 1.0" . "\r\n";
       // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to, $subject, $body, implode("\r\n", $headers));
?>