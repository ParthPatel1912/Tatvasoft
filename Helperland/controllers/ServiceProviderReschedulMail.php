<?php

    $to = $SPEmail;
    $subject = "Your coustomer Service Request $ServiceRequestsId has been Rescheduled, Please accept";

    $body = "<h4 style='font-size:17px;'>Service Request Id is : <span style='color:blue;'>$ServiceRequestsId</span></h4>

               New Date And Time is : <span style='color:red;'>$newTime and $newDate </span>
               <br>
               More Details you can show from ServiceHistory Section.
               <br>
               Please Check Service Details And Accept The Service Request for Service ID : $ServiceRequestsId";

       //Set content-type header for sending HTML email
    $headers[] = 'From: Parth Shobhana';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-Type: text/html; utf-8';

       // $headers = "MIME-Version: 1.0" . "\r\n";
       // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to, $subject, $body, implode("\r\n", $headers));
?>