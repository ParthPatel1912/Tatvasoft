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
                    }
                    else{
                        $result3 = $this->model->UpdateAddressbyUserId('useraddress', $arrayAddress, $UserId, $AddressId);
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
}
?>