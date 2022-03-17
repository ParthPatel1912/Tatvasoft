<?php require '/tatvasoft/Project/PHP/views/message_error.php' ?>

<?php 
class CustomerController{
    function __construct()
    {
        include('models/Customer.php');
        $this->model = new CustomerModel();
        if(!isset($_SESSION))
        {
            session_start();
        } 
    }

    public function FillCoustomerData()
    {
        $result = $this->model->CheckUser('user',$_SESSION['UserId']);

        if($result){
            foreach($result as $data){
                $firstname = $data['FirstName'];
                $lastname = $data['LastName'];
                $email = $data['Email'];
                $mobile = $data['Mobile'];
                $date = $data['DateOfBirth'];
                $languageid = $data['LanguageId'];
            }

            if (!empty($date)) {

                list($year, $month, $day) = explode("-", $date);
            } else {
                $year = "Year";
                $month = "Month";
                $day = "Day";
            }
        
            $result = [$firstname, $lastname, $email, $mobile, $day, $month, $year, $languageid];
            echo json_encode($result);
        }
    }

    public function AddressList()
    {
        $result = $this->model->ListAddress('useraddress',$_SESSION['UserId']);

        foreach($result as $address){ ?>

            <tr class="border-bottom">
                <td>
                    <b>Address : </b>
                    <?php echo " ".$address['AddressLine1']."  ".$address['AddressLine2'].", ".$address['CityName']."  ".$address['StateName']." - ".$address['PostalCode']." "; ?>
                    <br />
                    <b>Phone Number : </b>
                    <?php echo " ".$address['Mobile']." "; ?>
                </td>
                <td>
                    <a href="" id='<?= $address['AddressId'] ?>' data-target="#address" data-backdrop="static" data-keyboard="false" data-toggle="modal" class="Editaddress"><i
                            class="bi bi-pencil-square me-4"></i></a>
                    <a href="" id='<?= $address['AddressId'] ?>' data-target="#deleteaddress" data-backdrop="static" data-keyboard="false" data-toggle="modal"
                        class="Deleteaddress"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
        <?php
        }

    }
    
    public function EditAddressData()
    {
        if(isset($_POST)){
            $AddressId = trim($_POST['AddressId']);
        }

        $result = $this->model->FindAdsressByAddressId('useraddress',$AddressId);

        if (count($result)) {
            foreach ($result as $row) {
                $street = $row['AddressLine1'];
                $houseno = $row['AddressLine2'];
                $cityId = $row['CityId'];
                $pincode = $row['PostalCode'];
                $mobile = $row['Mobile'];
            }
        }

        $Zipcode = $pincode;
        $result2 = $this->model->findCityUsingZipcode('zipcode',$Zipcode);

        $CityId = $result2[0];
        $CityName = $result2[1];
        $StateId = $result2[2];

        $city = "<option value='" . $CityId . "'>" . $CityName . "</option>";

        $state = "<option value='" . $StateId . "'>" . $StateId . "</option>";

        $output = [$street, $houseno, $pincode, $mobile,$city, $AddressId,$state];

        echo json_encode($output);
    }

    public function CheckCity()
    {
        if(isset($_POST)){
            $Zipcode = trim(($_POST['Zipcode']));

            $result = $this->model->findCityUsingZipcode('zipcode',$Zipcode);

            $CityId = $result[0];
            $CityName = $result[1];
            $StateId = $result[2];

            if($result){
                $city =  "<option value='" . $CityId . "'>" . $CityName . "</option>";
                $state =  "<option value='" . $StateId . "'>" . $StateId . "</option>";
            }

            $output = [$city,$state];

            echo json_encode($output);
        }
    }

    public function CheckAvaibility()
    {
        if(isset($_POST)){
            $Zipcode = trim($_POST['Zipcode']);

            $result = $this->model->checkZipcode('zipcode',$Zipcode);

            if($result == 1){
                echo 'Sevice Available';
            }
            else{
                echo 'Service Facility not Available now';
            }
        }
    }

    public function UpdateUserDetail()
    {
        $base_url = '?controller=Helperland&function=CustomerSetting';
        $UserId = trim($_SESSION['UserId']);

        if(isset($_POST)){
            $FirstName = trim($_POST['FirstName']);
            $LastName  = trim($_POST['LastName']);
            $PhoneNumber = trim($_POST['PhoneNumber']);
            $day = trim($_POST['day']);
            $month = trim($_POST['month']);
            $year  = trim($_POST['year']);
            $Language = trim($_POST['Language']);
            $dob = $year . "-" . $month . "-" . $day;

            $error = "";

            if($FirstName == "") {
                $error .= "<li>Please enter first name.</li>";
            }
            elseif(!preg_match("/^[a-zA-Z]*$/",$FirstName)){
                $error .= "<li>Please enter first name without space.</li>";
            }
            if($LastName == "") {
                $error .= "<li>Please enter last name.</li>";
            }
            elseif(!preg_match("/^[a-zA-Z]*$/",$LastName)){
                $error .= "<li>Please enter last name without space.</li>";
            }
            if($PhoneNumber == "") {
                $error .= "<li>Please enter phone number.</li>";
            }
            else if(strlen($PhoneNumber)<10){
                $error .= "<li>Phone number shoud be 10 digit.</li>";
            }
            else if(strlen($PhoneNumber)>10){
                $error .= "<li>Phone number shoud be 10 digit.</li>";
            }
            if($day == 'Day'){
                $error .= "<li>Select Date.</li>";
            }
            if($month == 'Month'){
                $error .= "<li>Select Month.</li>";
            }
            if($year == 'Year'){
                $error .= "<li>Select Year.</li>";
            }
            if($Language == "") {
                $error .= "<li>Please select Language.</li>";
            }

            if($error != ""){
                
                flash('CustomerDetail',$error);
                redirect($base_url);
            }
            else{

                $array = [
                    'FirstName' => $FirstName,
                    'LastName' => $LastName,
                    'PhoneNumber' => $PhoneNumber,
                    'Language' => $Language,
                    'dob' => $dob,
                ];

                $result = $this->model->updateUser('user',$array,$UserId);

                if($result){
                    $_SESSION['message_title'] = "Data updated Succesfully";
                    $_SESSION['message_text'] = "";
                    $_SESSION['message_icon'] = "success";
                }
                else {
                    $_SESSION['message_title'] = "Data is not updated";
                    $_SESSION['message_text'] = "Please Try Again";
                    $_SESSION['message_icon'] = "error";
                }
                header('Location: ' . $base_url);
            }
        }
    }

    public function UpdateAddress()
    {
        $UserId = trim($_SESSION['UserId']);
        if(isset($_POST)){
            
            $AddressLine1  = trim($_POST['AddressLine1']);
            $AddressLine2 = trim($_POST['AddressLine2']);
            $CityId = trim($_POST['CityId']);
            $StateId = trim($_POST['StateId']);
            $PostalCode = trim($_POST['PostalCode']);
            $Mobile = trim($_POST['Mobile']);
            $AddressId = trim($_POST['AddressId']);

            $error = "";

            if($AddressLine1 == "") {
                $error .= "<li>Please enter street name.</li>";
            }
            else if(!preg_match("/^[a-zA-Z0-9- ]*$/", $AddressLine1)){
                $error .= '<li>Enter a valid street name.</li>';
            }
            if($AddressLine2 == "") {
                $error .= "<li>Please enter house name.</li>";
            }
            else if(!preg_match("/^[a-zA-Z0-9- ]*$/", $AddressLine2)){
                $error .= '<li>Enter a valid house name.</li>';
            }
            if($Mobile == "") {
                $error .= "<li>Please enter phone number.</li>";
            }
            else if(strlen($Mobile)<10){
                $error .= "<li>Phone number shoud be 10 digit.</li>";
            }
            if($PostalCode == "") {
                $error .= "<li>Please enter postal code.</li>";
            }
            else if(strlen($PostalCode)<6){
                $error .= "<li>Postal should be 6 digit.</li>";
            }
            else if(strlen($PostalCode)>6){
                $error .= "<li>Postal should be 6 digit.</li>";
            }
            if($AddressLine1 == "") {
                $error .= "<li>Please enter street name.</li>";
            }
            if($CityId == "") {
                $error .= "<li>Please enter City Id.</li>";
            }
            if($StateId == "") {
                $error .= "<li>Please enter state Id.</li>";
            }
            if($AddressId == "") {
                $error .= "<li>Please select adress Id.</li>";
            }

            if($error != ""){
                echo $error;
            }
            else{

                $array = [
                    'AddressLine1' => $AddressLine1,
                    'AddressLine2'=> $AddressLine2,
                    'CityId' => $CityId,
                    'StateId' => $StateId,
                    'PostalCode' => $PostalCode,
                    'Mobile' => $Mobile,
                ];

                $result = $this->model->UpdateAddressbyUserId('useraddress', $array, $UserId, $AddressId);
                $this->model->UpdateZipcodebyUserId('user',$PostalCode , $UserId);

                if($result){
                    echo 'Address updated successfully';
                    // print_r($result);
                    
                }
                else{
                    echo 'Address not updated';

                }

            }
        }
    }

    public function InsertAddress()
    {
        $UserId = $_SESSION['UserId'];
        if(isset($_POST)){
            
            $AddressLine1  = trim($_POST['AddressLine1']);
            $AddressLine2 = trim($_POST['AddressLine2']);
            $CityId = trim($_POST['CityId']);
            $StateId = trim($_POST['StateId']);
            $PostalCode = trim($_POST['PostalCode']);
            $Mobile = trim($_POST['Mobile']);

            $error = "";

            if($AddressLine1 == "") {
                $error .= "<li>Please enter street name.</li>";
            }
            else if(!preg_match("/^[a-zA-Z0-9- ]*$/", $AddressLine1)){
                $error .= '<li>Enter a valid street name.</li>';
            }
            if($AddressLine2 == "") {
                $error .= "<li>Please enter house name.</li>";
            }
            else if(!preg_match("/^[a-zA-Z0-9- ]*$/", $AddressLine2)){
                $error .= '<li>Enter a valid house name.</li>';
            }
            if($Mobile == "") {
                $error .= "<li>Please enter phone number.</li>";
            }
            else if(strlen($Mobile)<10){
                $error .= "<li>Phone number shoud be 10 digit.</li>";
            }
            if($PostalCode == "") {
                $error .= "<li>Please enter postal code.</li>";
            }
            else if(strlen($PostalCode)<6){
                $error .= "<li>Postal should be 6 digit.</li>";
            }
            else if(strlen($PostalCode)>6){
                $error .= "<li>Postal should be 6 digit.</li>";
            }

            if($error != ""){
                echo $error;
            }
            else{

                $array = [
                    'UserId' => $_SESSION['UserId'],
                    'AddressLine1' => $AddressLine1,
                    'AddressLine2'=> $AddressLine2,
                    'CityId' => $CityId,
                    'StateId' => $StateId,
                    'PostalCode' => $PostalCode,
                    'Mobile' => $Mobile,
                ];

                $result = $this->model->AddAddress('useraddress', $array);
                $this->model->UpdateZipcodebyUserId('user',$PostalCode , $UserId);

                if($result){
                    echo 'Address added successfully';

                }
                else{
                    echo 'Address not inserted';

                }
            }
        }
    }

    public function DeleteAddress()
    {
        if(isset($_POST)){
            
            $AddressId  = trim($_POST['AddressId']);

            $result = $this->model->DeleteAddress('useraddress', $AddressId);

            if($result){
                echo 'Address deleted successfully';

            }
            else{
                echo 'Address not deleted';

            }
        }
    }

    public function UpdateUserPassword()
    {
        $base_url = '?controller=Helperland&function=CustomerSetting';
        $base_urlLoginModal = '?controller=Helperland&function=HomePage#LoginModal';
        $UserId = trim($_SESSION['UserId']);

        if(isset($_POST)){
            $OldPassword = trim($_POST['OldPassword']);
            $NewPassword = trim($_POST['NewPassword']);
            $NewConfirmPassword = trim($_POST['NewConfirmPassword']);

            $PasswordCrypt = password_hash($NewPassword, PASSWORD_BCRYPT);

            $error = "";

            if($OldPassword == ""){
                $error .= '<li>Please enter Old Password.</li>';
            }
            else if(!preg_match("/(?=.*?[A-Z])/", $OldPassword)){
                $error .= '<li>At least one Uppercase.</li>';
            }
            else if(!preg_match("/(?=.*?[a-z])/", $OldPassword)){
                $error .= '<li>At least one Lowwercase.</li>';
            }
            else if(!preg_match("/(?=.*?[0-9])/", $OldPassword)){
                $error .= '<li>At least one Digit.</li>';
            }
            else if(!preg_match("/(?=.*?[#?!@$%^&*-])/", $OldPassword)){
                $error .= '<li>At least one Special Character.</li>';
            }
            else if(strlen($OldPassword)<8){
                $error .= '<li>Password must be minimum 8 Character.</li>';
            }
            else if(strlen($OldPassword)>14){
                $error .= '<li>Password must be maximum 14 Character.</li>';
            }
            
            if($NewPassword == ""){
                $error .= '<li>Please enter New Password.</li>';
            }
            else if(!preg_match("/(?=.*?[A-Z])/", $NewPassword)){
                $error .= '<li>At least one Uppercase.</li>';
            }
            else if(!preg_match("/(?=.*?[a-z])/", $NewPassword)){
                $error .= '<li>At least one Lowwercase.</li>';
            }
            else if(!preg_match("/(?=.*?[0-9])/", $NewPassword)){
                $error .= '<li>At least one Digit.</li>';
            }
            else if(!preg_match("/(?=.*?[#?!@$%^&*-])/", $NewPassword)){
                $error .= '<li>At least one Special Character.</li>';
            }
            else if(strlen($NewPassword)<8){
                $error .= '<li>Password must be minimum 8 Character.</li>';
            }
            else if(strlen($NewPassword)>14){
                $error .= '<li>Password must be maximum 14 Character.</li>';
            }
            if($NewConfirmPassword == ""){
                $error .= '<li>Please enter Confirm password</li>';
            }
            else if($NewConfirmPassword != $NewPassword){
                $error .= '<li>Password must be same.</li>';
            }

            if($error != ""){
                
                flash('CustomerDetail',$error);
                redirect($base_url);

            }

            else{

                $result = $this->model->UpdatePassword('user', $OldPassword, $PasswordCrypt, $UserId);

                if($result){
                    $_SESSION['message_title'] = "Password updated Succesfully";
                    $_SESSION['message_text'] = "Please login now";
                    $_SESSION['message_icon'] = "success";

                    unset($_SESSION['UserName']);
                    unset($_SESSION['UserId']);
                    unset($_SESSION['UserTypeId']);

                    header('Location: ' . $base_urlLoginModal);

                }
                else {
                    $_SESSION['message_title'] = "Password is not updated";
                    $_SESSION['message_text'] = "Please Try Again";
                    $_SESSION['message_icon'] = "error";
                    header('Location: ' . $base_url);
                }
            }
        }
    }

    public function ListCustomerServiceDashboard()
    {
        $UserId = $_SESSION['UserId'];
        $result = $this->model->ListCustomerServiceDashboard('servicerequest',$UserId);

        $json = array();

        foreach($result as $address) { 
            if ($address['Status'] != "Cancelled" && $address['Status'] != "Completed") {


                $startTime = $address['SelectTime'];
                $totalhour = $address['TotalHour'];
                $starttime = explode(":",$startTime);
                $totaltime = number_format($totalhour,1);
                $endtime = explode(".",$totaltime);

                $hour = $starttime[0] + $endtime[0];
                $minute = $starttime[1] + $endtime[1]*6;

                if($minute == 60){
                    $hour = $hour + 1;
                    $minute = '00';
                }
                else if($minute == 0){
                    $minute = '00';
                }

                $EndTime = $hour.':'.$minute;
                $fulltime = $address['SelectTime'] . " - " . $EndTime;

                $reschelestatus = '';
                $values = '';
                $Name = '';


                if ($address['Status'] == 'Pending') {
                    $reschelestatus = '';
                }
            
                if ($address['Status'] == 'Reschedule') {
                    $reschelestatus = '<p class="text-success serviceproviderblocks">You have rescheduled service request. Your SP will accept it soon.</p>';
                }

                if ($address['Status'] == 'Approved') {
                    $ServiceProviderId = $address['ServiceProviderId'];
                    $serviceProvider = $this->model->GetUserDetails('user',$ServiceProviderId);
                    if(count($serviceProvider)){
                        foreach($serviceProvider as $spdata){
                            $SPfirstname = $spdata['FirstName'];
                            $SPlastname = $spdata['LastName'];
                            $Name = $SPfirstname." ".$SPlastname;
                            $photo = $spdata['UserProfilePicture'];

                            $SPRating = $this->model->GetSPRattings('rating',$ServiceProviderId);
                            if (count($SPRating[0])) {
                                $sprate = 0;
                                $count = $SPRating[1];

                                foreach ($SPRating[0] as $sprating) {
                                    $sprate = ($sprate + $sprating['Ratings']);
                                }
                                $sprate = round(($sprate / $count), 2);
                                $spratings = ceil($sprate);
                                $halfstar = $spratings-$sprate;
                                $blankstar = 5-$spratings;
                            }
                            else{
                                $sprate = 0;
                                $halfstar = 0;
                                $blankstar = 5;
                            }

                            if($photo == null){

                                $reschelestatus = $reschelestatus.'<div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>';
                            } 
                            
                            else{
                                $reschelestatus = $reschelestatus.'<div class="service-history-icon-fav d-flex"><img src="../assets/img/'.$photo.'.jpeg"></div>';
                            }
                            
                            for($i=1; $i<=$sprate; $i++){
                                $values = $values.'<i class="bi bi-star-fill golden-star" id=""></i> ';
                            }

                            if($halfstar > 0){ 
                                for($i=0; $i<$halfstar; $i++){
                            
                                    $values = $values.'<i class="bi bi-star-half golden-star" id=""></i> ';
                                }
                            }

                            if($blankstar > 0){ 
                                for($i=0; $i<$blankstar; $i++){
                            
                                    $values = $values.'<i class="bi bi-star-fill" id=""></i> ';
                                }
                            }
                        }
                    }
                }


                            $serviceid = '<td id="'.$address['ServiceRequestId'].'">'.$address['ServiceRequestId'].'</td>';
                            $datetime = '<td id="'.$address['ServiceRequestId'].'" class="flex text-left">
                                <div><img src="../assets/img/calendar2.png"><b> '.$address['ServiceStartDate'].'</b> </div>
                                <span>
                                    '.$fulltime.'
                                </span>
                            </td>';
                            $SPdeatil = '<td id="'.$address['ServiceRequestId'].'">
                                                    
                                        <div class="d-flex">
                                            '.$reschelestatus.'
                                            <div><span class="d-block">'.$Name.'</span>
                                                <div class="padding-star">
                                                
                                                    '.$values.'

                                                </div>
                                            </div>
                                        </div>
                                
                            </td>';
                            $serviceaddress = '<td id="'.$address['ServiceRequestId'].'" class="font-blue font-18">
                                <div class="bold-blue"> <b>€'. $address['TotalCost'].'</b> </div>
                            </td>';
                            $action = '<td>
                                <div class="d-flex">
                                    <button type="submit" id="'.$address['ServiceRequestId'].'" data-backdrop="static" data-keyboard="false" data-target="#rescheduleTimeDate" data-toggle="modal" class="btn dark-blue btn-sm rounded-pill Reschedule">Reschedule</button>
                                    <button type="submit" id="'.$address['ServiceRequestId'].'" data-backdrop="static" data-keyboard="false" data-target="#cancelService" data-toggle="modal" class="btn lite-red btn-sm rounded-pill Cancel">Cancel</button>
                                </div>
                            </td>';

                    $results = array();
                    $results['serviceid'] = $serviceid;
                    $results['datetime'] = $datetime;
                    $results['SPnamewithstar'] = $SPdeatil;
                    $results['address'] = $serviceaddress;
                    $results['action'] = $action;

                    array_push($json, $results);
            }
        }

        echo json_encode($json);
    }

    public function ServiceDetailForModel()
    {
        if(isset($_POST)){

            $ServiceRequestId = trim($_POST['ServiceRequestId']);

            $result = $this->model->DetailofServiceRequest('servicerequest',$ServiceRequestId);

            $array = [];

            foreach($result as $row){
                $array[] = $row['ServiceExtra'];

            }
            $service = join(", ",$array);

            // $service = $result[0]['ServiceExtra'];

            $startTime = $result[0]['SelectTime'];
            $totalhour = $result[0]['TotalHour'];
            $starttime = explode(":",$startTime);
            $totaltime = number_format($totalhour,1);
            $endtime = explode(".",$totaltime);

            $hour = $starttime[0] + $endtime[0];
            $minute = $starttime[1] + $endtime[1]*6;

            if($minute == 60){
                $hour = $hour + 1;
                $minute = '00';
            }
            else if($minute == 0){
                $minute = '00';
            }

            $EndTime = $hour.':'.$minute;
            $ServiceTime = $result[0]['SelectTime'] . " - " . $EndTime;

            $Address = " ".$result[0]['AddressLine1']."  ".$result[0]['AddressLine2'].", ".$result[0]['City']."  ".$result[0]['State']." - ".$result[0]['PostalCode']." ";

            if($result[0]['HasPets'] == 0){
                $pets =  '<span><img src="../assets/img/not-included.png"></span> I haven\'t pets at home';
            }
            else{
                $pets =  '<span><img src="../assets/img/included.png"></span> I have pets at home';
            }

            $data = [$result[0]['ServiceStartDate'],$ServiceTime,$result[0]['TotalHour'],$result[0]['ServiceRequestId'],$service,$result[0]['TotalCost'],$Address,$result[0]['Mobile'],$result[0]['Email'],$result[0]['Comments'],$pets,$result[0]['SelectTime']];

            echo json_encode($data);
        }
    }

    public function UpdateServiceRequestTime()
    {
        if(isset($_POST)){

            $ServiceRequestId = $_POST['serviceid'];
            $newTime = trim($_POST['newtime']);
            $newDate = trim($_POST['newdate']);

            $result = $this->model->GetServiceHistoryUser('servicerequest',$ServiceRequestId);

            if (count($result)) {
                foreach ($result as $row) {
                    $recordversion = $row['RecordVersion'];
                    $UserId = intval($row['UserId']);
                    $ServiceProviderId = $row['ServiceProviderId'];
                    $FavouriteServiceProviderId = $row['FavouriteServiceProviderId'];
                }

                $recordversion = $recordversion + 1;

                $UserDetails = $this->model->GetUserDetails('user',$UserId);

                if (count($UserDetails)) {
                    foreach ($UserDetails as $emails) {
                        $UserEmail  = $emails['Email'];
                    }
                }
                
                $status = "Pending";
                if (!empty($ServiceProviderId)) {
                    $status = "Reschedule";
                }
                
                $array = [
                    'newtime' => $newTime,
                    'modifiedby' => $UserId,
                    'recordversion' => $recordversion,
                    'status' => $status,
                    'newdate' => $newDate,
                ];
                $updatedresult = $this->model->UpdateServiceTime('servicerequest',$array,$ServiceRequestId);

                if (!empty($ServiceProviderId)) {
                    $spDetails = $this->model->GetUserDetails('user',$ServiceProviderId);
                    if (count($spDetails)) {
                        foreach ($spDetails as $spemail) {
                            $ServiceRequestsId = $ServiceRequestId;
                            $SPEmail  = $spemail['Email'];
                            include('ServiceProviderReschedulMail.php');
                        }
                    }
                }

                if (empty($ServiceProviderId)) {
                    
                    if(!empty($FavouriteServiceProviderId)){
                        $Favourite = explode(',',$FavouriteServiceProviderId);

                        $userServiceprovider = $this->model->GetUsersServiceproviderList('user',$Favourite);

                        if(count($userServiceprovider)){
                            foreach($userServiceprovider as $usp){
                                $ServiceRequestsId = $ServiceRequestId;
                                $SPEmail = $usp['Email'];
                                include('ServiceProviderReschedulMail.php');
                            }
                        }
                    }

                    if(empty($FavouriteServiceProviderId)){
                        $Activeserviceprovider = $this->model->ActiveServiceProviderList('user');

                        if(count($Activeserviceprovider)){
                            foreach($Activeserviceprovider as $asp){
                                $ServiceRequestsId = $ServiceRequestId;
                                $SPEmail = $asp['Email'];
                                include('ServiceProviderReschedulMail.php');
                            }
                        }
                    }
                }

                if($updatedresult){
                    include("ClientRescheduleMail.php");
                }
                
                echo "Update successfully";
            }
            else{
                echo "Not updated";
            }

        }
    }

    public function CancelServiceRequest()
    {
        if(isset($_POST)){

            $ServiceRequestId = $_POST['serviceid'];
            $hasissue = $_POST['cancelReason'];

            $result = $this->model->GetServiceHistoryUser('servicerequest',$ServiceRequestId);

            if (count($result)) {
                foreach ($result as $row) {
                    $recordversion = $row['RecordVersion'];
                    $UserId = intval($row['UserId']);
                    $ServiceProviderId = $row['ServiceProviderId'];
                }

                $recordversion = $recordversion + 1;

                $UserDetails = $this->model->GetUserDetails('user',$UserId);

                if (count($UserDetails)) {
                    foreach ($UserDetails as $emails) {
                        $UserEmail  = $emails['Email'];
                    }
                }
                $status = "Cancelled";
                $array = [
                    'hasissue' => $hasissue,
                    'modifiedby' => $UserId,
                    'recordversion' => $recordversion,
                    'status' => $status,
    
                ];
                $updatedresult = $this->model->CancelService('servicerequest',$array,$ServiceRequestId);

                if (!empty($ServiceProviderId)) {
                    $Spemail = $this->model->GetUserDetails('user',$ServiceProviderId);
                    if (count($Spemail)) {
                        foreach ($Spemail as $spemail) {
                            $ServiceRequestsId = $ServiceRequestId;
                            $SPEmail  = $spemail['Email'];
                            include('ServiceProviderCancelMail.php');
                        }
                    }
                }

                if (empty($ServiceProviderId)) {
                    
                    if(!empty($FavouriteServiceProviderId)){
                        $Favourite = explode(',',$FavouriteServiceProviderId);

                        $userServiceprovider = $this->model->GetUsersServiceproviderList('user',$Favourite);

                        if(count($userServiceprovider)){
                            foreach($userServiceprovider as $usp){
                                $ServiceRequestsId = $ServiceRequestId;
                                $SPEmail = $usp['Email'];
                                include('ServiceProviderCancelMail.php');
                            }
                        }
                    }

                    if(empty($FavouriteServiceProviderId)){
                        $Activeserviceprovider = $this->model->ActiveServiceProviderList('user');

                        if(count($Activeserviceprovider)){
                            foreach($Activeserviceprovider as $asp){
                                $ServiceRequestsId = $ServiceRequestId;
                                $SPEmail = $asp['Email'];
                                include('ServiceProviderCancelMail.php');
                            }
                        }
                    }
                }

                if($updatedresult){
                    include("ClientCancelledBookingMail.php");   
                }
                echo "Cancelled successfully";
            }
            else{
                echo "Not cancelled";
            }

        }
    }

    public function ListCustomerServiceHistory()
    {
        $UserId = $_SESSION['UserId'];
        $result = $this->model->ListCustomerServiceDashboard('servicerequest',$UserId);

        $json = array();

        foreach($result as $address) { 
            if ($address['Status'] != "Pending" && $address['Status'] != "Approved" && $address['Status'] != "Reschedule") {

                $startTime = $address['SelectTime'];
                $totalhour = $address['TotalHour'];
                $starttime = explode(":",$startTime);
                $totaltime = number_format($totalhour,1);
                $endtime = explode(".",$totaltime);

                $hour = $starttime[0] + $endtime[0];
                $minute = $starttime[1] + $endtime[1]*6;

                if($minute == 60){
                    $hour = $hour + 1;
                    $minute = '00';
                }
                else if($minute == 0){
                    $minute = '00';
                }

                $EndTime = $hour.':'.$minute;
                $fulltime = $address['SelectTime'] . " - " . $EndTime;

                $reschelestatus = '';
                $values = '';
                $Name = '';


                $ServiceRequestId = $address['ServiceRequestId'];
                $countrating =  $this->model->CountRating('rating',$ServiceRequestId);

                $RatingCount = $countrating[1];

                if($RatingCount == 1){
                    $ServiceProviderId = $address['ServiceProviderId'];
                    $serviceProvider = $this->model->GetUserDetails('user',$ServiceProviderId);
                    if(count($serviceProvider)){
                        foreach($serviceProvider as $spdata){
                            $SPfirstname = $spdata['FirstName'];
                            $SPlastname = $spdata['LastName'];
                            $Name = $SPfirstname." ".$SPlastname;
                            $photo = $spdata['UserProfilePicture'];

                            $SPRating = $this->model->GetSPRattings('rating',$ServiceProviderId);
                            if (count($SPRating[0])) {
                                $sprate = 0;
                                $count = $SPRating[1];

                                foreach ($SPRating[0] as $sprating) {
                                    $sprate = ($sprate + $sprating['Ratings']);
                                }
                                $sprate = round(($sprate / $count), 2);
                                $spratings = ceil($sprate);
                                $halfstar = $spratings-$sprate;
                                $blankstar = 5-$spratings;
                            }
                            else{
                                $sprate = 0;
                                $halfstar = 0;
                                $blankstar = 5;
                            }

                            if($photo == null){

                                $reschelestatus = '<div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>';
                            } 
                            
                            else{
                                $reschelestatus = '<div class="service-history-icon-fav d-flex"><img src="../assets/img/'.$photo.'.jpeg"></div>';
                            }
                            
                            for($i=1; $i<=$sprate; $i++){
                                $values = $values.'<i class="bi bi-star-fill golden-star" id=""></i> ';
                            }

                            if($halfstar > 0){ 
                                for($i=0; $i<$halfstar; $i++){
                            
                                    $values = $values.'<i class="bi bi-star-half golden-star" id=""></i> ';
                                }
                            }

                            if($blankstar > 0){ 
                                for($i=0; $i<$blankstar; $i++){
                            
                                    $values = $values.'<i class="bi bi-star-fill" id=""></i> ';
                                }
                            }
                        }
                    }
                }

                if ($address['Status'] == "Completed") {
                    $servicestatus = '<td id="'.$address['ServiceRequestId'].'" ><span class="completed"> Completed </span></td>';

                }
                if ($address['Status'] == "Cancelled") {
                    $servicestatus = '<td id="'.$address['ServiceRequestId'].'" ><span class="cancelled"> Cancelled </span></td>';

                }


                    $serviceid = '<td>'.$address['ServiceRequestId'].'</td>';
                    $datetime = '<td  class="flex text-left">
                        <div><img src="../assets/img/calendar2.png"><b> '.$address['ServiceStartDate'].' </b> </div>
                        <span>
                        '.$fulltime.'
                        </span>
                        </td>';
                    $spDetails = '<td id="'.$address['ServiceRequestId'].'">
                                                    
                                    <div class="d-flex">
                                        '.$reschelestatus.'
                                        <div><span class="d-block">'.$Name.'</span>
                                            <div class="padding-star">
                                            
                                                '.$values.'

                                            </div>
                                        </div>
                                    </div>
                    </td>';
                    $totalcost = '<td class="active-font">
                        <div class="bold-blue"> <b>€ '.$address['TotalCost'].'</b> </div>
                    </td>';
                    
                    $action = '<td>
                        <button type="button" id="'.$address['ServiceRequestId'].'" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#RateSP" class="btn lite-blue btn-sm rounded-pill ratesp" value="">Rate SP</button>
                    </td>';


                $results = array();
                $results['serviceid'] = $serviceid;
                $results['datetime'] = $datetime;
                $results['spDetails'] = $spDetails;
                $results['totalcost'] = $totalcost;
                $results['serviceStatus'] = $servicestatus;
                $results['action'] = $action;

                array_push($json, $results);

            }
        }

        echo json_encode($json);
    }

    public function GetServiceProvideName()
    {
        if(isset($_POST)){
            $ServiceRequestId = trim($_POST['ServiceRequestId']);

            $result = $this->model->GetServiceProviderNameByServiceRequest('servicerequest',$ServiceRequestId);

            $firstname = $result[0]['FirstName'];
            $lastname = $result[0]['LastName'];

            $name = $firstname." ".$lastname;

            echo $name;
        }
    }

    public function CheckCountrating()
    {
        if(isset($_POST)){

            $ServiceRequestId = trim($_POST['ServiceRequestId']);
            $countrating =  $this->model->CountRating('rating',$ServiceRequestId);

            $RatingCount = $countrating[1];

            echo $RatingCount;
        }
    }

    public function InsertRatingtoSP()
    {
        $UserId = $_SESSION['UserId'];
        if(isset($_POST)){
            $OnTimeArrival = trim($_POST['timearrival']);
            $Friendly = trim($_POST['friendly']);
            $QualityOfService = trim($_POST['quality']);
            $ServiceRequestId = trim($_POST['ServiceRequestId']);
            $Ratings = trim($_POST['Ratings']);
            $rateComment = trim($_POST['rateComment']);

            $Ratings = round($Ratings,2);

            $result = $this->model->GetServiceHistoryUser('servicerequest',$ServiceRequestId);
            $countrating =  $this->model->CountRating('rating',$ServiceRequestId);

            $RatingCount = $countrating[1];

            if(!empty($result[0]['ServiceProviderId'])){

                $array = [
                    'OnTimeArrival' => $OnTimeArrival,
                    'Friendly' => $Friendly,
                    'QualityOfService' => $QualityOfService,
                    'ServiceRequestId' => $ServiceRequestId,
                    'Ratings' => $Ratings,
                    'rateComment' => $rateComment,
                    'ratingfrom' => $UserId,
                    'ratingto' => $result[0]['ServiceProviderId'],
                ];

                if ($RatingCount > 0) {
                    echo 'Already Done';
                }
                else{
                    $results = $this->model->InsertRating('rating',$array);

                    if ($results == 1) {
                        echo 'rating done';
                    } else {
                        echo 'rating not inserted';
                    }
                }

            }

            else{
                echo 'You cancelled before service accept';
            }
        }
    }

    public function FavouritePronsList()
    {
        $UserId = $_SESSION['UserId'];
        $result = $this->model->ListFavourite('favoriteandblocked',$UserId);

        foreach($result as $data){ 
            
            $serviceProvider = $this->model->GetUserDetails('user',$data['TargetUserId']);

            foreach($serviceProvider as $spname){
                $firstname = $spname['FirstName'];
                $lastname = $spname['LastName'];
                $name = $firstname." ".$lastname;
                $photo = $spname['UserProfilePicture'];
            }
            
            ?>
                    <div class="col-md-4">
                        <div class="favourite-border text-center">
                           
                                <?php 
                                    if($photo == null){ ?>
                                     <div class="round">
                                        <img src="../assets/img/cap.png" width="75%" alt="" class="">
                                        <?php
                                    }
                                    else{ ?>
                                     <div class="round-2">
                                        <img src="../assets/img/<?= $photo ?>.jpeg" alt="" class="">
                                        <?php
                                    }
                                ?>
                                <label class="mt-5"><b><?= $name  ?></b></label>
                            </div>
                            <div class="mt-1">

                                <?php 
                                
                                $SPRating = $this->model->GetSPRattings('rating',$data['TargetUserId']);
                                if (count($SPRating[0])) {
                                    $sprate = 0;
                                    $count = $SPRating[1];

                                    foreach ($SPRating[0] as $sprating) {
                                        $sprate = ($sprate + $sprating['Ratings']);
                                    }
                                    $sprate = round(($sprate / $count), 2);
                                    $spratings = ceil($sprate);
                                    $halfstar = $spratings-$sprate;
                                    $blankstar = 5-$spratings;

                                    for($i=1; $i<=$sprate; $i++){ ?>
                                        <i class="bi bi-star-fill golden-star" id=""></i>

                                        <?php
                                    }

                                    if($halfstar > 0){ 
                                        for($i=0; $i<$halfstar; $i++){ ?>
                                    
                                            <i class="bi bi-star-half golden-star" id=""></i>
                                        <?php
                                        }
                                    }

                                    if($blankstar > 0){ 
                                        for($i=0; $i<$blankstar; $i++){ ?>
                                    
                                            <i class="bi bi-star-fill" id=""></i>
                                        <?php
                                        }
                                    }
                                }

                                else{
                                    for($i=0; $i<5; $i++){ ?>
                                    
                                        <i class="bi bi-star-fill" id=""></i>
                                    <?php
                                    }
                                }

                                ?>

                                <!-- <img src="../assets/img/star1.png" class="service-history-star-icon">
                                <img src="../assets/img/star1.png" class="service-history-star-icon">
                                <img src="../assets/img/star1.png" class="service-history-star-icon">
                                <img src="../assets/img/star1.png" class="service-history-star-icon">
                                <img src="../assets/img/star2.png" class="service-history-star-icon"> 4 -->
                            </div>
                            <div class="mt-4 mb-3">

                                <?php

                                    if($data['IsFavorite'] == 0){ ?>
                                        <button type="button" class="btn dark-blue btn-sm rounded-pill Favourite" id="<?= $data['FavouriteBlockId'] ?>" value="Favourite">Favourite</button>

                                        <?php
                                    }
                                    
                                    else{ ?>
                                        <button type="button" class="btn dark-blue btn-sm rounded-pill Un-Favourite" id="<?= $data['FavouriteBlockId'] ?>" value="Un-Favourite">Un-Favourite</button>
                                        
                                        <?php
                                    }

                                    if($data['IsBlocked'] == 0){ ?>
                                        <button type="button" class="btn lite-red btn-sm rounded-pill Block" id="<?= $data['FavouriteBlockId'] ?>" value="Block">Block</button>

                                        <?php
                                    }

                                    else{ ?>
                                        <button type="button" class="btn lite-red btn-sm rounded-pill Un-Block" id="<?= $data['FavouriteBlockId'] ?>" value="Un-Block">Un-Block</button>

                                        <?php
                                    }

                                ?>
                            </div>
                        </div>
                    </div>
            <?php
        }
    }

    public function UpdateFavouriteSP()
    {
        if(isset($_POST)){
            $FavouriteBlockId = trim($_POST['FavouriteBlockId']);
            $IsFavourite = trim($_POST['IsFavourite']);

            $result = $this->model->updateIsfavourite('favoriteandblocked',$IsFavourite,$FavouriteBlockId);

            if($result){
                echo 'Favourite or un-favourite successfully';
            }
            else{
                echo 'Favourite or un-favourite not done';
            }
        }
    }

    public function UpdateBlockSP()
    {
        if(isset($_POST)){
            $FavouriteBlockId = trim($_POST['FavouriteBlockId']);
            $IsBlocked = trim($_POST['IsBlocked']);

            $result = $this->model->updateIsblock('favoriteandblocked',$IsBlocked,$FavouriteBlockId);

            if($result){
                echo 'Block or un-block successfully';
            }
            else{
                echo 'Block or un-block not done';
            }
        }
    }
    
}

?>