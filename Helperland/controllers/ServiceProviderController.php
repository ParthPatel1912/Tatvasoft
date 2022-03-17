<?php

class ServiceProviderController{
    function __construct()
    {
        include('models/ServiceProvider.php');
        $this->model = new ServiceProviderModel();
        if(!isset($_SESSION))
        {
            session_start();
        }
    }

    public function getServiceProviderDetail()
    {
        $UserId = $_SESSION['UserId'];
        $result = $this->model->CheckUser('user',$UserId);

        if($result){
            foreach($result as $data){
                $firstname = $data['FirstName'];
                $lastname = $data['LastName'];
                $email = $data['Email'];
                $mobile = $data['Mobile'];
                $date = $data['DateOfBirth'];
                $languageid = $data['LanguageId'];
                $gender = $data['Gender'];
                $profilepicture = $data['UserProfilePicture'];
                $status = $data['IsActive'];

                $street = $data['AddressLine1'];
                $houseno = $data['AddressLine2'];
                $cityId = $data['CityId'];
                $pincode = $data['PostalCode'];
            }

            $Zipcode = $pincode;
            $city = null;
            $state = null;

            if($Zipcode != 0){
                $result2 = $this->model->findCityUsingZipcode('zipcode',$Zipcode);

                $CityId = $result2[0];
                $CityName = $result2[1];
                $StateId = $result2[2];

                $city = "<option value='" . $CityId . "'>" . $CityName . "</option>";

                $state = "<option value='" . $StateId . "'>" . $StateId . "</option>";
            }

            if (!empty($date)) {

                list($year, $month, $day) = explode("-", $date);
            } else {
                $year = "Year";
                $month = "Month";
                $day = "Day";
            }
        
            $result = [$firstname, $lastname, $email, $mobile, $day, $month, $year, $languageid,$street,$houseno,$pincode,$city,$state,$gender,$profilepicture,$status];
            echo json_encode($result);
        }

        // print_r($result);
    }

    public function UpdateServiceProvideDetails()
    {
        $UserId = trim($_SESSION['UserId']);
        if(isset($_POST)){
            $FirstName = trim($_POST['FirstName']);
            $LastName  = trim($_POST['LastName']);
            $PhoneNumber = trim($_POST['PhoneNumber']);
            $day = trim($_POST['day']);
            $month = trim($_POST['month']);
            $year  = trim($_POST['year']);
            $Language = trim($_POST['Language']);

            $AddressLine1  = trim($_POST['AddressLine1']);
            $AddressLine2 = trim($_POST['AddressLine2']);
            $CityId = trim($_POST['CityId']);
            $StateId = trim($_POST['StateId']);
            $PostalCode = trim($_POST['PostalCode']);

            $profilephoto = trim($_POST['profilephoto']);
            $gender = trim($_POST['gender']);

            $dob = $year . "-" . $month . "-" . $day;

            $error = '';

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
            if($PostalCode == "") {
                $error .= "<li>Please enter postal code.</li>";
            }
            else if(strlen($PostalCode)<6){
                $error .= "<li>Postal should be 6 digit.</li>";
            }
            else if(strlen($PostalCode)>6){
                $error .= "<li>Postal should be 6 digit.</li>";
            }
            if($CityId == "") {
                $error .= "<li>Please enter City Id.</li>";
            }
            if($StateId == "") {
                $error .= "<li>Please enter state Id.</li>";
            }

            if($error != ""){
                
                echo $error;
            }
            else{

                $arrayDetails = [
                    'FirstName' => $FirstName,
                    'LastName' => $LastName,
                    'PhoneNumber' => $PhoneNumber,
                    'Language' => $Language,
                    'dob' => $dob,
                    'gender' => $gender,
                    'profilephoto' => $profilephoto,
                ];

                $arrayAddress = [
                    'AddressLine1' => $AddressLine1,
                    'AddressLine2'=> $AddressLine2,
                    'CityId' => $CityId,
                    'StateId' => $StateId,
                    'PostalCode' => $PostalCode,
                    'Mobile' => $PhoneNumber,
                ];

                $result = $this->model->updateUser('user',$arrayDetails,$UserId);

                $result2 = $this->model->CheckUser('user',$UserId);

                if($result2){
                    foreach($result2 as $data){
                        $AddressId = $data['AddressId'];
                    }
                    
                    if($AddressId == null){
                        $result3 = $this->model->AddAddress('useraddress', $arrayAddress, $UserId);
                        $this->model->UpdateZipcodebyUserId('user',$PostalCode , $UserId);
                    }
                    else{
                        $result3 = $this->model->UpdateAddressbyUserId('useraddress', $arrayAddress, $UserId, $AddressId);
                        $this->model->UpdateZipcodebyUserId('user',$PostalCode , $UserId);
                    }
                }

                if($result && $result2 && $result3){
                    echo 'Data Update successfully';
                }
                else{
                    echo 'Data not updated';
                }
            }
        }
    }

    public function UpdateSPPassword()
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

    public function NewServiceRequest()
    {
        $UserId = $_SESSION['UserId'];
        $result = $this->model->findFavouriteSPservicerequest('servicerequest');

        $json = array();
        $block = array();
        $uniqueblock = array();

        foreach($result as $data){

            $favouriteblock = $this->model->ListBlocked('favoriteandblocked',$UserId);

            foreach ($favouriteblock as $row) {
                $blockuserid = $row['TargetUserId'];
                
                array_push($block, $blockuserid);
            }

            $uniqueblock = array_unique($block);

            foreach($uniqueblock as $data){
                if(!empty($uniqueblock)){
                    // $result3 = $this->model->NewServiceListByFavouriteSPwithBlock('servicerequest',$UserId,$data);
                }
            }

            // if($data['FavouriteServiceProviderId']!=null or $data['FavouriteServiceProviderId']!=""){
                
            //     $result2 = $this->model->NewServiceList('servicerequest');

            // }

            // else{
                $result3 = $this->model->NewServiceListByFavouriteSP('servicerequest',$UserId);

            // }

        }
        
        foreach($result3 as $row){


            $startTime = $row['SelectTime'];
            $totalhour = $row['TotalHour'];
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
            $fulltime = $row['SelectTime'] . " - " . $EndTime;

            $SPfirstname = $row['FirstName'];
            $SPlastname = $row['LastName'];
            $Name = $SPfirstname." ".$SPlastname;

            $Address = " ".$row['AddressLine1']."  ".$row['AddressLine2'].", ".$row['City']."  ".$row['State']." - ".$row['PostalCode']." ";


                $serviceid = '<td id="'.$row['ServiceRequestId'].'">'.$row['ServiceRequestId'].'</td>';
                $datetime = '<td id="'.$row['ServiceRequestId'].'" class="flex">
                    <div class="bold"><img src="../assets/img/calendar2.png">
                        <span class="padding">'.$row['ServiceStartDate'].'</span>
                    </div>
                    <div><img src="../assets/img/layer-14.png">
                        <span class="padding">
                        '.$fulltime.'
                        </span>
                    </div>
                </td>';
                $nameaddress = '<td id="'.$row['ServiceRequestId'].'">
                        '.$Name.'
                    <div><img src="../assets/img/layer-719.png">
                        <span class="padding">
                            '.$Address.'
                        </span>
                    </div>
                </td>';
                $totalcost = '<td id="'.$row['ServiceRequestId'].'">€ '.$row['TotalCost'].'</td>';
                $conflicttime = '<td id="'.$row['ServiceRequestId'].'">
                    
                </td>';
                $action = '<td>
                    <input type="button" id="'.$row['ServiceRequestId'].'" class="btn dark-blue btn-sm rounded-pill Accept" value="Accept">
                </td>';

            
                $results = array();
                $results['serviceid'] = $serviceid;
                $results['datetime'] = $datetime;
                $results['nameaddress'] = $nameaddress;
                $results['totalcost'] = $totalcost;
                $results['conflicttime'] = $conflicttime;
                $results['action'] = $action;

                array_push($json, $results);

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

            $firstname = $result[0]['FirstName'];
            $lastname = $result[0]['LastName'];
            $Name = $firstname." ".$lastname;

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

            $data = [$result[0]['ServiceStartDate'],$ServiceTime,$result[0]['TotalHour'],$result[0]['ServiceRequestId'],$service,$result[0]['TotalCost'],$Name,$Address,$result[0]['Comments'],$pets,$EndTime];

            echo json_encode($data);
        }
    }

    public function ApproveService()
    {
        $UserId = $_SESSION['UserId'];
        if(isset($_POST)){
            $ServiceRequestId = trim($_POST['ServiceRequestId']);
        
            $result = $this->model->DetailofServiceRequest('servicerequest',$ServiceRequestId);

            $ServiceStartDate = $result[0]['ServiceStartDate'];
            $recordVersion = $result[0]['RecordVersion'];
            $recordVersion = $recordVersion + 1;

            $coustomerId = $result[0]['UserId'];

            $result2 = $this->model->findAppovedRequestByDateSP('servicerequest',$ServiceStartDate,$UserId);

            $SPDetails = $this->model->GetUserDetails('user',$UserId);
            $UserDetails = $this->model->GetUserDetails('user',$coustomerId);

            if (count($UserDetails)) {
                foreach ($UserDetails as $emails) {
                    $UserEmail  = $emails['Email'];
                }
            }
            
            if (count($SPDetails)) {
                foreach ($SPDetails as $row) {
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $SpName = $firstname." ".$lastname;
                }
            }

            $favouriteblock = $this->model->ListFavourite('favoriteandblocked',$coustomerId,$UserId);

            $block = 0;
            if(!empty($favouriteblock)){
                $block = $favouriteblock[0]['IsBlocked'];
            }

            if(empty($favouriteblock) || $block == 0){
                if($result2){

                    foreach($result2 as $row){

                        $startTime = $row['SelectTime'];
                        $totalhour = $row['TotalHour'];
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

                        $EndTime = $hour;

                        $approvedTime = $this->model->checkForAppovalByTime('servicerequest',$ServiceRequestId,$ServiceStartDate,$starttime[0],$EndTime);

                        if($approvedTime){
                            $result3 = $this->model->approveNewRequest('servicerequest',$ServiceRequestId,$UserId,$recordVersion);
                            
                            if($result3){
                                include("ClientAppovalMail.php");
                            }
                            echo 'approved succefully';
                            return;
                        }
                        else{
                            echo 'You are busy in this time';
                        }
                    }
                }

                else{
                    $result3 = $this->model->approveNewRequest('servicerequest',$ServiceRequestId,$UserId,$recordVersion);
                    if($result3){
                        include("ClientAppovalMail.php");
                    }
                    echo 'approved succefully';

                }
            }
            else{
                echo 'You cannot accept service';
            }

        }
    }

    public function UpcominngServiceList()
    {
        $UserId = $_SESSION['UserId'];

        if(isset($_POST)){

            $result = $this->model->listUpcomming('servicerequest',$UserId);

            // $json['data'] = array();

            // foreach($result as $row){

            //     $startTime = $row['SelectTime'];
            //     $totalhour = $row['TotalHour'];
            //     $starttime = explode(":",$startTime);
            //     $totaltime = number_format($totalhour,1);
            //     $endtime = explode(".",$totaltime);

            //     $hour = $starttime[0] + $endtime[0];
            //     $minute = $starttime[1] + $endtime[1]*6;

            //     if($minute == 60){
            //         $hour = $hour + 1;
            //         $minute = '00';
            //     }
            //     else if($minute == 0){
            //         $minute = '00';
            //     }

            //     $EndTime = $hour.':'.$minute;

            //     $SPfirstname = $row['FirstName'];
            //     $SPlastname = $row['LastName'];
            //     $Name = $SPfirstname." ".$SPlastname;

            //     $Address = " ".$row['AddressLine1']."  ".$row['AddressLine2'].", ".$row['City']."  ".$row['State']." - ".$row['PostalCode']." ";


            //     $ServiceId = '<td id="'.$row['ServiceRequestId'].'">'. $row['ServiceRequestId'].'</td>';
                
            //     $time = '<td id="'.$row['ServiceRequestId'] .'" class="flex">
            //         <div class="bold"><img src="../assets/img/calendar2.png">
            //             <span class="padding">'.$row['ServiceStartDate'].'</span>
            //         </div>
            //         <div><img src="../assets/img/layer-14.png">
            //             <span class="padding">
            //                 '.$row['SelectTime'] . " - " . $EndTime.'
                            
            //             </span>
            //         </div>
            //     </td>';
                
            //     $nameAddress = '<td id="'.$row['ServiceRequestId'].'">
            //             '. $Name .'
            //         <div><img src="../assets/img/layer-719.png">
            //             <span class="padding">
            //             '. $Address .'
            //             </span>
            //         </div>
            //     </td>';
                
            //     $distance = '<td id="'. $row['ServiceRequestId'] .'">0 km</td>';
            //     $action = '<td id="'.$row['ServiceRequestId'].'">
            //         <input type="button" id="'.$row['ServiceRequestId'].'" class="btn lite-red btn-sm rounded-pill CancelUpcoming" value="Cancel"></td>';

                
            //     $results = array();
            //     $results['ServiceId'] = $ServiceId;
            //     $results['time'] = $time;
            //     $results['address'] = $nameAddress;
            //     $results['distance'] = $distance;
            //     $results['action'] = $action;

            //     array_push($json['data'], $results);

            // }

            // echo json_encode($json);

            $json = array();

            
            foreach($result as $row){

                $startTime = $row['SelectTime'];
                $totalhour = $row['TotalHour'];
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

                $fulltime = $row['SelectTime']. " - " . $EndTime;

                $startDate = $row['ServiceStartDate'];

                $SPfirstname = $row['FirstName'];
                $SPlastname = $row['LastName'];
                $Name = $SPfirstname." ".$SPlastname;

                $Address = " ".$row['AddressLine1']."  ".$row['AddressLine2'].", ".$row['City']."  ".$row['State']." - ".$row['PostalCode']." ";

                $ServiceId = $row['ServiceRequestId'];

                $results = array();
                $results['ServiceId'] = $ServiceId;
                $results['startDate'] = $startDate;
                $results['time'] = $fulltime;
                $results['name'] = $Name;
                $results['address'] = $Address;

                array_push($json, $results);

            }

            echo json_encode($json);
        }
    }

    public function CancelUpcomingService()
    {
        $UserId = $_SESSION['UserId'];
        if(isset($_POST)){
            $ServiceRequestId = trim($_POST['ServiceRequestId']);
        
            $result = $this->model->DetailofServiceRequest('servicerequest',$ServiceRequestId);

            $recordVersion = $result[0]['RecordVersion'];
            $recordVersion = $recordVersion + 1;

            $coustomerId = $result[0]['UserId'];

            $ServiceStartDate = $result[0]['ServiceStartDate'];

            $UserDetails = $this->model->GetUserDetails('user',$coustomerId);
            $SPDetails = $this->model->GetUserDetails('user',$UserId);

            if (count($UserDetails)) {
                foreach ($UserDetails as $emails) {
                    $UserEmail  = $emails['Email'];
                }
            }

            if (count($SPDetails)) {
                foreach ($SPDetails as $row) {
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $SpName = $firstname." ".$lastname;
                }
            }

            $nowDate = date("d-m-Y");
            
            if($ServiceStartDate > $nowDate){
                $status = "Pending";
                $cancelService = $this->model->CancelServicePending('servicerequest',$ServiceRequestId,$UserId,$recordVersion,$status);
                
            }
            else{
                $status = "Cancelled";
                $cancelService = $this->model->CancelService('servicerequest',$ServiceRequestId,$UserId,$UserId,$recordVersion,$status);
            }

            // $cancelService = $this->model->CancelService('servicerequest',$ServiceRequestId,$UserId,$recordVersion,$status);
            $favouriteblock = $this->model->ListFavourite('favoriteandblocked',$UserId,$coustomerId);

            if($cancelService){
                include("CancelMailBySPtoCoustomer.php");
            }

            if(!$favouriteblock){
                $newfavouriteblock = $this->model->insertfavouriteblock('favoriteandblocked',$coustomerId,$UserId);
            }

            if($cancelService){
                echo 'Cancellation successfully';
            }
            else{
                echo 'Not cancellation';
            }
        }
    }

    public function CompleteUpcomingService()
    {
        $UserId = $_SESSION['UserId'];
        if(isset($_POST)){
            $ServiceRequestId = trim($_POST['ServiceRequestId']);
        
            $result = $this->model->DetailofServiceRequest('servicerequest',$ServiceRequestId);

            $recordVersion = $result[0]['RecordVersion'];
            $recordVersion = $recordVersion + 1;

            $coustomerId = $result[0]['UserId'];

            $UserDetails = $this->model->GetUserDetails('user',$coustomerId);
            $SPDetails = $this->model->GetUserDetails('user',$UserId);

            if (count($UserDetails)) {
                foreach ($UserDetails as $emails) {
                    $UserEmail  = $emails['Email'];
                }
            }

            if (count($SPDetails)) {
                foreach ($SPDetails as $row) {
                    $firstname = $row['FirstName'];
                    $lastname = $row['LastName'];
                    $SpName = $firstname." ".$lastname;
                }
            }

            $status = "Completed";

            $CompleteService = $this->model->CompleteService('servicerequest',$ServiceRequestId,$UserId,$recordVersion,$status);
            $favouriteblock = $this->model->ListFavourite('favoriteandblocked',$UserId,$coustomerId);

            $favouriteblockCoustomer = $this->model->ListFavourite('favoriteandblocked',$coustomerId,$UserId);

            if($CompleteService){
                include("CompletionMailtoCoustomer.php");
            }

            if(!$favouriteblock){
                $newfavouriteblock = $this->model->insertfavouriteblock('favoriteandblocked',$coustomerId,$UserId);
            }

            if(!$favouriteblockCoustomer){
                $newfavouriteblockCoustomer = $this->model->insertfavouriteblock('favoriteandblocked',$UserId,$coustomerId);
            }
            
            if($CompleteService){
                echo 'Completion successfully';
            }
            else{
                echo 'Not Completion';
            }
        }
    }

    public function ServiceRequestRating()
    {
        $UserId = $_SESSION['UserId'];
        $SPRating = $this->model->GetSPRattings('rating',$UserId);

        $json = array();

        foreach($SPRating as $row){ 
            
            $firstname = $row['FirstName'];
            $lastname = $row['LastName'];
            $name = $firstname." ".$lastname;

            $startTime = $row['SelectTime'];
            $totalhour = $row['TotalHour'];
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
            $fulltime = $row['SelectTime'] . " - " . $EndTime;

            $values = '';
            $ratestatus = '';

            $sprate =  $row['Ratings'];
            $spratings = ceil($sprate);
            $halfstar = $spratings-$sprate;
            $blankstar = 5-$spratings;

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

            if ($sprate > 0.0 && $sprate <= 1.0 ) {
                $ratestatus = 'Very Bad';
            }
            else if ($sprate > 1.0 && $sprate <= 2.0 ) {
                $ratestatus =  'Bad';
            }
            else if ($sprate > 2.0 && $sprate <= 3.0 ) {
                $ratestatus =  'Good';
            }
            else if ($sprate > 3.0 && $sprate <= 4.0 ) {
                $ratestatus =  'Very Good';
            }
            else if ($sprate > 4.0 && $sprate <= 5.0 ) {
                $ratestatus =  'Excellent';
            }


                $ratingrow = '<td>
                    <div class="row p-2 mb-3" style="border:1px solid grey">
                        <div class="col-md-3 mb-2">
                            <span class="bold">'.$row['ServiceRequestId'].'</span> <br />
                            <span class="bold"> 
                            '. $name.'   
                            </span>
                        </div>
                        <div class="col-md-5 mb-2">
                            <div><img src="../assets/img/calendar2.png"><b><span class="padding">'.$row['ServiceStartDate'].'</span></b> </div>
                            <div><img src="../assets/img/layer-14.png"> 
                                <span class="padding">
                                '.$fulltime.'
                                </span> 
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <span class="bold">Ratings </span><br />
                            <div>
                                '.$values . $ratestatus.'
                            </div>
                        </div>
                        <hr class="mt-2" />
                        <div class="col-md-12">
                            <span class="bold"> Customer Comments: </span> '.$row['comment'].'
                        </div>
                    </div>
                </td>';


                $results = array();
                $results['raterow'] = $ratingrow;

                array_push($json, $results);

        }

        echo json_encode($json);
    }
    
    public function ServiceHistory()
    {
        $UserId = $_SESSION['UserId'];

        $result = $this->model->listServiceHistory('servicerequest',$UserId);

        $json = array();

        foreach($result as $row){

            $startTime = $row['SelectTime'];
            $totalhour = $row['TotalHour'];
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
            $fulltime = $row['SelectTime'] . " - " . $EndTime;

            $SPfirstname = $row['FirstName'];
            $SPlastname = $row['LastName'];
            $Name = $SPfirstname." ".$SPlastname;

            $Address = " ".$row['AddressLine1']."  ".$row['AddressLine2'].", ".$row['City']."  ".$row['State']." - ".$row['PostalCode']." ";

                
                    $serviId = '<td id="'.$row['ServiceRequestId'].'">'.$row['ServiceRequestId'].'</td>';
                    $datetime = '<td id="'.$row['ServiceRequestId'].'" class="flex">
                        <div class="bold"><img src="../assets/img/calendar2.png">
                            <span class="padding">'.$row['ServiceStartDate'] .'</span>
                        </div>
                        <div><img src="../assets/img/layer-14.png">
                            <span class="padding">
                                '.$fulltime.'
                            </span>
                        </div>
                    </td>';
                    $nameaddress = '<td id="'.$row['ServiceRequestId'].'">
                        '.$Name.'
                        <div><img src="../assets/img/layer-719.png">
                            <span class="padding">
                                '.$Address.'
                            </span>
                        </div>
                    </td>';

                    $results = array();
                    $results['serviId'] = $serviId;
                    $results['datetime'] = $datetime;
                    $results['nameaddress'] = $nameaddress;
    
                    array_push($json, $results);

        }

        echo json_encode($json);
    }

    public function BlockCoustomerList()
    {
        $UserId = $_SESSION['UserId'];
        $result = $this->model->ListBlock('favoriteandblocked',$UserId);

        foreach($result as $data){ 
            
            $coustomer = $this->model->GetUserDetails('user',$data['TargetUserId']);

            foreach($coustomer as $coustname){
                $firstname = $coustname['FirstName'];
                $lastname = $coustname['LastName'];
                $name = $firstname." ".$lastname;
            }

            ?>

                <div class="col-md-3">
                    <div class="favourite-border text-center">
                        <div class="btn round">
                            <img src="../assets/img/cap.png" width="75%" alt="" class="">
                            <label class="mt-5"><b><?= $name  ?></b></label>
                        </div>
                        <div class="mt-4 mb-3">
                            <?php 
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

    public function UpdateBlockCoust()
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