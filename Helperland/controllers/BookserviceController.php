<?php

class BookserviceController{
    function __construct()
    {
        include('models/Book.php');
        $this->model = new BookModel();
        if(!isset($_SESSION))
        {
            session_start();
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

    public function Zipcode()
    {
        $base_url= "?controller=Helperland&function=BookService";
        if(isset($_POST)){
            $Zipcode = trim($_POST['Zipcode']);

            $result = $this->model->checkZipcode('zipcode',$Zipcode);

            if($result == 1){
                header('Location: '. $base_url);
            }
        }
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
                echo "<select class='form-control' name='CityId' id='CityId' readonly>";
                echo "<option value='" . $CityId . "'>" . $CityName . "</option>";
                echo "</select>";
                echo "<select class='form-control' name='StateId' id='StateId' readonly >";
                echo "<option value='" . $StateId . "'>" . $StateId . "</option>";
                echo "</select>";
            }
        }
    }

    public function AddressList()
    {
        $result = $this->model->ListAddress('useraddress',$_SESSION['UserId']);

        foreach($result as $address){ ?>
            <div class="col-md-6 mb-2 border form-control" >
                <input type='radio' name="address" class="address" value='<?php echo $address['AddressId'] ?>' >
                    <b> Address:</b>
                    <?php echo " ".$address['AddressLine1']."  ".$address['AddressLine2'].", ".$address['CityName']."  ".$address['StateName']." - ".$address['PostalCode']." "; ?>
                    <br />
                    <b>Phone number:</b>
                    <?php echo " ".$address['Mobile']." "; ?>
                <br/>
            </div>
            <?php
        }

    }

    public function InsertAddress()
    {
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

                if($result){
                    echo 'Address added successfully';
                }
                else{
                    echo 'Address not inserted';
                }
            }
        }
    }

    public function FavouriteServiceProvider()
    {
        $result = $this->model->SelectFavouriteServiceProvider('favoriteandblocked',$_SESSION['UserId']);

        foreach($result as $favourite){ ?>

            <div class="service-box col-md-2" onclick="checkFavouriteSelected(<?= $favourite['FavouriteBlockId']?>)">
                <div class="btn round">
                    <input type="hidden" value="notselected" class="hidden-input-favourite">
                    <img src="../assets/img/cap.png" width="75%" alt="" class="">
                    <label class="mt-4"><?php echo $favourite['FirstName'] . " " . $favourite['LastName']?></label>
                    <button type="button" class="mt-2 btn border-info" id="<?= $favourite['TargetUserId']?>">Select</button>
                </div>
            </div>

        <?php
        }
    }

    public function AddServiceRequest()
    {
        if(isset($_POST)){
            $UserId = trim($_SESSION['UserId']);
            $ServiceStartDate = trim($_POST['ServiceStartDate']);
            $SelectTime = trim($_POST['SelectTime']);
            $TotalHour = trim($_POST['TotalHour']);
            $ZipCode = trim($_POST['ZipCode']);
            $ServiceHourlyRate = trim($_POST['ServiceHourlyRate']);
            $ServiceHours = trim($_POST['ServiceHours']);
            $ExtraHours = trim($_POST['ExtraHours']);
            $SubTotal = trim($_POST['SubTotal']);
            $Discount = trim($_POST['Discount']);
            $TotalCost = trim($_POST['TotalCost']);
            $Comments = trim($_POST['Comments']);
            $PaymentTransactionRefNo = trim($_POST['PaymentTransactionRefNo']);
            $ServiceProviderId = $_POST['ServiceProviderId'];
            $ExtraServicesCount = trim($_POST['ExtraServicesCount']);
            $ExtraService = $_POST['ExtraServices'];
            $HasPets = trim($_POST['HasPets']);
            $Bed = trim($_POST['Bed']);
            $Bath = trim($_POST['Bath']);
            $AddressId = trim($_POST['AddressId']);
            $Status = 'Pending';
            $PaymentDone = 1;
            $RecordVersion = 1;
            $RefundedAmount = 0;
            $PaymentDue = trim($_POST['PaymentDue']);

            $ServiceProvider = array_slice($ServiceProviderId,1);

            $FavouriteServiceProvider = implode(',',$ServiceProvider);

            $ExtraServices = array_slice($ExtraService,1);

            // $service = join(", ",$ExtraServices);

            $error = "";

            if($AddressId == ""){
                $error .= "<li>Select address.</li>";
            }

            if($error != ""){
                echo $error;
            }
            else{
            $array = [
                'UserId' => $UserId,
                'ServiceStartDate' => $ServiceStartDate,
                'SelectTime' => $SelectTime,
                'TotalHour' => $TotalHour,
                'ZipCode' => $ZipCode,
                'ServiceHourlyRate' => $ServiceHourlyRate,
                'ServiceHours' => $ServiceHours,
                'ExtraHours' => $ExtraHours,
                'SubTotal' => $SubTotal,
                'Discount' => $Discount,
                'TotalCost' => $TotalCost,
                'Comments' => $Comments,
                'PaymentTransactionRefNo' => $PaymentTransactionRefNo,
                'HasPets' => $HasPets,
                'ExtraServicesCount' => $ExtraServicesCount,
                'Bed' => $Bed,
                'Bath' => $Bath,
                'AddressId' => $AddressId,
                'Status' => $Status,
                'PaymentDone' => $PaymentDone,
                'RecordVersion' => $RecordVersion,
                'PaymentDue' => $PaymentDue,
                'RefundedAmount' => $RefundedAmount,
                'Favourite' => $FavouriteServiceProvider,
            ];

            $result = $this->model->InsertServiceRequest('servicerequest', $array);
            $Activeserviceprovider = $this->model->ActiveServiceProviderList('user');
            $UserDetails = $this->model->GetUserDetails('user',$UserId);
            $UserAddress = $this->model->GetUserAddress('useraddress',$AddressId);

            $UserEmail = $UserDetails['Email'];
            $firstname = $UserDetails['FirstName'];
            $lastname = $UserDetails['LastName'];
            $UserName = $firstname." ".$lastname;
            $Address = " ".$UserAddress['AddressLine1']."  ".$UserAddress['AddressLine2'].", ".$UserAddress['CityName']."  ".$UserAddress['StateName']." - ".$UserAddress['PostalCode']." ";
            $MobileNo = " ".$UserAddress['Mobile']." ";
            $allExtraServices = implode(", ",$ExtraServices);

            if($result){
                $this->model->InsertAddressIdByServiceRequestId('servicerequestaddress',$result,$AddressId);

                if(sizeof($ExtraServices)>0){
                    $allExtraServices = implode(", ",$ExtraServices);
                    $this->model->InsertExtraServiceByServiceRequesstId('servicerequestextra',$result,$allExtraServices);
                }

                include('BookingMailUser.php');

                if(sizeof($ServiceProvider)>0){
                    $userServiceprovider = $this->model->GetUsersServiceproviderList('user',$ServiceProvider);

                    if(count($userServiceprovider)){
                        foreach($userServiceprovider as $usp){
                            $ServiceRequestsId = $result;
                            $SPEmail = $usp['Email'];
                            include('BookingMailServiceProvider.php');
                        }
                    }

                    echo $result;
                }

                else{
                    if(count($Activeserviceprovider)){
                        foreach($Activeserviceprovider as $asp){
                            $ServiceRequestsId = $result;
                            $SPEmail = $asp['Email'];
                            include('BookingMailServiceProvider.php');
                        }
                    }

                    echo $result;
                }
            }
            else{
                echo 'data not inserted';
            }
            }
        }
    }

    
}

?>