<?php

    $to = $SPEmail;
    $subject = "New Service Booked! Please Accept the Service";

    $body = "<h5 style='font-size:22px;'>You received this Email because you are ACTIVE service provider for helperland</h5>

             <h5 style='font-size:17px;'>Please Check Booked Service ana accept the request.</h5>
             <br>
             <h4 style='font-size:17px;'>Service Request Id is : <span style='color:blue;'>$ServiceRequestsId</span></h4>

             <h4 style='font-size:17px; color:red;'>Accept Request using Below Link</h4>
             <a href='http://localhost:8088/?controller=Helperland&function=LoginServiceProvider'> Click Here </a>";

       //Set content-type header for sending HTML email
    $headers[] = 'From: Parth Shobhana';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-Type: text/html; utf-8';

       // $headers = "MIME-Version: 1.0" . "\r\n";
       // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to, $subject, $body, implode("\r\n", $headers));
?>