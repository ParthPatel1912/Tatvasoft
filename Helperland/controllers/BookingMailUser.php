<?php

    if($HasPets == 0){
        $HasPets = 'No';
    }else{
        $HasPets = "Yes";
    }

    $to = $UserEmail;
    $subject = "Your Service has been Booked Succesfully!!";

    $body = "<h5 style='font-size:22px;'>Your Helperland Booking Has Been Completed Successfully.</h5>
      
            <table border='1'>
                <thead>
                    <tr>
                        <th> Field </th>
                        <th> Details</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Service Request Id </td>
                        <td> $result </td>
                    </tr>

                    <tr>
                        <td>Name </td>
                        <td> $UserName </td>
                    </tr>

                    <tr>
                        <td>Email </td>
                        <td> $UserEmail </td>
                    </tr>
                    
                    <tr>
                        <td>Service Book Date </td>
                        <td> $ServiceStartDate </td>
                    </tr>
                    
                    <tr>
                        <td> Time </td>
                        <td> $SelectTime </td>
                    </tr>
                    
                    <tr>
                        <td>ZipCode </td>
                        <td> $ZipCode </td>
                    </tr>

                    <tr>
                        <td>Total Hours </td>
                        <td> $TotalHour </td>
                    </tr>
                    
                    <tr>
                        <td>Service Hourly Rate </td>
                        <td> $ServiceHourlyRate </td>
                    </tr>
                    
                    <tr>
                        <td>Service Hours </td>
                        <td> $ServiceHours Hrs</td>
                    </tr>

                    <tr>
                        <td>Extra Hours </td>
                        <td> $ExtraHours Hrs</td>
                    </tr>

                    <tr>
                        <td> Bed </td>
                        <td> $Bed </td>
                    </tr>
                        
                    <tr>
                        <td> Bath </td>
                        <td> $Bath </td>
                    </tr>

                    <tr>
                        <td>Total Cost </td>
                        <td> $TotalCost </td>
                    </tr>

                    <tr>
                        <td>Extra Services count </td> 
                        <td> $ExtraServicesCount</td>
                    </tr>

                    <tr>
                        <td>Extra selected Services  </td> 
                        <td> $allExtraServices </td>
                    </tr>
                        
                    <tr>
                        <td>Comments </td>
                        <td> $Comments </td>
                    </tr>

                    <tr>
                        <td>Address </td>
                        <td> $Address </td>
                    </tr>

                    <tr>
                        <td>Mobile Number </td>
                        <td> $MobileNo </td>
                    </tr>
                    
                    <tr>
                        <td>Payment Refrence No. </td>
                        <td> $PaymentTransactionRefNo </td>
                    </tr>

                    <tr>
                        <td>Has Pets </td>
                        <td> $HasPets </td>
                    </tr>
                        
                    <tr>
                        <td>Payment Status </td>
                        <td> Success </td>
                    </tr>
                </tbody>
            </table>
            <br>

            <p>Please Do Not Share This Details Anyone.</p>";

        //Set content-type header for sending HTML email
    $headers[] = 'From: Parth Shobhana';
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-Type: text/html; utf-8';

      // $headers = "MIME-Version: 1.0" . "\r\n";
      // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to, $subject, $body, implode("\r\n", $headers));
?>