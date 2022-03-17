<?php

class AdminController{
    function __construct()
    {
        include('models/Admin.php');
        $this->model = new AdminModel();
        if(!isset($_SESSION))
        {
            session_start();
        }
    }

    public function ServiceRequestList()
    {
        if(isset($_POST)){

            $result = $this->model->ListAllRequest('servicerequest');

            $json = array();

            foreach($result as $address) {

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
                $SPName = '';


                $ServiceRequestId = $address['ServiceRequestId'];
                // $countrating =  $this->model->CountRating('rating',$ServiceRequestId);

                // $RatingCount = $countrating[1];

                // if($RatingCount == 1){
                    $ServiceProviderId = $address['ServiceProviderId'];
                    if($ServiceProviderId != ''){
                        $serviceProvider = $this->model->GetUserDetails('user',$ServiceProviderId);
                        if(count($serviceProvider)){
                            foreach($serviceProvider as $spdata){
                                $SPfirstname = $spdata['FirstName'];
                                $SPlastname = $spdata['LastName'];
                                $SPName = $SPfirstname." ".$SPlastname;
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
                // }

                $firstname = $address['FirstName'];
                $lastname = $address['LastName'];
                $userid = $address['UserId'];
                $status = $address['ServiceStatus'];
                $CUSTOMERname = $firstname.' '.$lastname;
                $Address = " ".$address['AddressLine1']."  ".$address['AddressLine2'].", ".$address['City']."  ".$address['State']." - ".$address['PostalCode']." ";

                if ($status == 'Pending') {
                    $statues = '<span class="New" id="new">New</span>';
                }
                if ($status == 'Approved') {
                    $statues = '<span class="Pending" id="pending">Pending</span>';
                }
                if ($status == 'Reschedule') {
                    $statues = '<span class="New" id="new">New</span>';
                }
                if ($status == 'Refunded') {
                    $statues = '<span class="Completed" id="completed">Refunded</span>';
                }
                if ($status == 'Completed') {
                    $statues = '<span class="Completed" id="completed">Completed</span>';
                }
                if ($status == 'Cancelled') {
                    $statues = '<span class="Cancelled" id="cancelled">Cancelled</span>';
                }


                if ($status == 'Pending' || $status == 'Approved' || $status == 'Reschedule') {
                    $action = '
                    <a class="Actions text-center" href="#" id="navbarDropdowns"
                    role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                        <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu tooltiptext" style="color: black;" aria-labelledby="navbarDropdowns">
                        <a class="dropdown-item editReschedule" data-backdrop="static" data-keyboard="false" data-target="#editReschedulebyAdmin" data-toggle="modal" data-dismiss="modal" id="'.$ServiceRequestId.'" style="cursor:pointer;">Edit & Reschedule</a>
                        <a class="dropdown-item Cancel" id="'.$ServiceRequestId.'" href="#">Cancel </a>
                        <a class="dropdown-item" href="#">Change SP</a>
                        <a class="dropdown-item" href="#">Escalate </a>
                        <a class="dropdown-item" href="#">History Log</a>
                        <a class="dropdown-item" href="#">Download Invoice </a>
                    </div>';
                }

                if ($status == 'Completed' || $status == 'Cancelled' || $status == 'Refunded') {
                    $action = '     
                    <a class="Actions text-center" href="#" id="navbarDropdowns"
                    role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                        <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu tooltiptext" aria-labelledby="navbarDropdowns">
                        <a class="dropdown-item refund" data-backdrop="static" data-keyboard="false" data-target="#refundmodal" data-toggle="modal" data-dismiss="modal" id="'.$ServiceRequestId.'" style="cursor:pointer;">Refund</a>
                        <a class="dropdown-item" href="#">Escalate </a>
                        <a class="dropdown-item" href="#">History Log</a>
                        <a class="dropdown-item" href="#">Download Invoice </a>
                    </div>';
                }


                $serviceid = '<td id="'.$ServiceRequestId.'">'.$ServiceRequestId.'</td>';
                $datetime = '<td id="'.$ServiceRequestId.'" class="flex">
                    <div class="bold"><img src="../assets/img/calendar2.png">
                        <span class="padding"> '.$address['ServiceStartDate'].' </span>
                    </div>
                    <div><img src="../assets/img/layer-14.png">
                        <span class="padding"> '.$fulltime.' </span>
                    </div>
                </td>';
                $nameaddress = '<td id="'.$ServiceRequestId.'">
                    '.$CUSTOMERname.'
                    <div><img src="../assets/img/layer-719.png">
                        <span class="padding">'.$Address.'</span>
                    </div>
                </td>';
                $SPdeatil = '<td id="'.$address['ServiceRequestId'].'">
                                                        
                                <div class="d-flex">'.$reschelestatus.'
                                    <div><span class="d-block"> '.$SPName.'</span>
                                        <div class="padding-star">'.$values.'</div>
                                    </div>
                                </div>
                            </td>';
                $rowstatus = '<td id="'.$ServiceRequestId.'" class="text-center">'.$statues.'</td>';
                $rowaction = '<td class="text-center">'.$action.'</td>';

                $results = array();
                $results['serviceid'] = $serviceid;
                $results['datetime'] = $datetime;
                $results['nameaddress'] = $nameaddress;
                $results['SPdeatil'] = $SPdeatil;
                $results['rowstatus'] = $rowstatus;
                $results['rowaction'] = $rowaction;

                array_push($json, $results);

            }

            echo json_encode($json);
        }
    }

    public function GetSearchedSR()
    {
        if(isset($_POST)){
            $sid = trim($_POST['ServiceID']);
            $uid = trim($_POST['userid']);
            $spid = trim($_POST['serviceproviderid']);
            $states = trim($_POST['statues']);
            $fromdate = trim($_POST['fromdate']);
            $todate = trim($_POST['todate']);

            if($todate == '' || $todate == null){
                $todate = date("Y-m-d");
            }
            if($fromdate == '' || $fromdate == null){
                $fromdate = '2020-01-01';
            }

            if($sid == '' && $uid == '' && $spid == '' && $states == ''){
                $result = $this->model->ListAllRequest('servicerequest');
            }

            else{
                $result = $this->model->SearchServiceRequestList('servicerequest',$sid,$uid,$spid,$states,$fromdate,$todate);
            }

            $json = array();

            foreach($result as $address) { 

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
                $SPName = '';


                $ServiceRequestId = $address['ServiceRequestId'];
                // $countrating =  $this->model->CountRating('rating',$ServiceRequestId);

                // $RatingCount = $countrating[1];

                // if($RatingCount == 1){
                    $ServiceProviderId = $address['ServiceProviderId'];
                    if($ServiceProviderId != ''){
                        $serviceProvider = $this->model->GetUserDetails('user',$ServiceProviderId);
                        if(count($serviceProvider)){
                            foreach($serviceProvider as $spdata){
                                $SPfirstname = $spdata['FirstName'];
                                $SPlastname = $spdata['LastName'];
                                $SPName = $SPfirstname." ".$SPlastname;
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
                // }

                $firstname = $address['FirstName'];
                $lastname = $address['LastName'];
                $userid = $address['UserId'];
                $status = $address['ServiceStatus'];
                $CUSTOMERname = $firstname.' '.$lastname;
                $Address = " ".$address['AddressLine1']."  ".$address['AddressLine2'].", ".$address['City']."  ".$address['State']." - ".$address['PostalCode']." ";

                if ($status == 'Pending') {
                    $statues = '<span class="New" id="new">New</span>';
                }
                if ($status == 'Approved') {
                    $statues = '<span class="Pending" id="pending">Pending</span>';
                }
                if ($status == 'Reschedule') {
                    $statues = '<span class="New" id="new">New</span>';
                }
                if ($status == 'Refunded') {
                    $statues = '<span class="Completed" id="completed">Refunded</span>';
                }
                if ($status == 'Completed') {
                    $statues = '<span class="Completed" id="completed">Completed</span>';
                }
                if ($status == 'Cancelled') {
                    $statues = '<span class="Cancelled" id="cancelled">Cancelled</span>';
                }


                if ($status == 'Pending' || $status == 'Approved' || $status == 'Reschedule') {
                    $action = '
                    <a class="Actions text-center" href="#" id="navbarDropdowns"
                    role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                        <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu tooltiptext" style="color: black;" aria-labelledby="navbarDropdowns">
                        <a class="dropdown-item editReschedule" data-backdrop="static" data-keyboard="false" data-target="#editReschedulebyAdmin" data-toggle="modal" data-dismiss="modal" id="'.$ServiceRequestId.'" style="cursor:pointer;">Edit & Reschedule</a>
                        <a class="dropdown-item refund" data-backdrop="static" data-keyboard="false" data-target="#refundmodal" data-toggle="modal" data-dismiss="modal" id="'.$ServiceRequestId.'" style="cursor:pointer;">Refund</a>
                        <a class="dropdown-item Cancel" id="'.$ServiceRequestId.'" href="#">Cancel </a>
                        <a class="dropdown-item" href="#">Change SP</a>
                        <a class="dropdown-item" href="#">Escalate </a>
                        <a class="dropdown-item" href="#">History Log</a>
                        <a class="dropdown-item" href="#">Download Invoice </a>
                    </div>';
                }

                if ($status == 'Completed' || $status == 'Cancelled' || $status == 'Refunded') {
                    $action = '     
                    <a class="Actions text-center" href="#" id="navbarDropdowns"
                    role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                        <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu tooltiptext" aria-labelledby="navbarDropdowns">
                        <a class="dropdown-item refund" data-backdrop="static" data-keyboard="false" data-target="#refundmodal" data-toggle="modal" data-dismiss="modal" id="'.$ServiceRequestId.'" style="cursor:pointer;">Refund</a>
                        <a class="dropdown-item" href="#">Escalate </a>
                        <a class="dropdown-item" href="#">History Log</a>
                        <a class="dropdown-item" href="#">Download Invoice </a>
                    </div>';
                }


                $serviceid = '<td id="'.$ServiceRequestId.'">'.$ServiceRequestId.'</td>';
                $datetime = '<td id="'.$ServiceRequestId.'" class="flex">
                    <div class="bold"><img src="../assets/img/calendar2.png">
                        <span class="padding"> '.$address['ServiceStartDate'].' </span>
                    </div>
                    <div><img src="../assets/img/layer-14.png">
                        <span class="padding"> '.$fulltime.' </span>
                    </div>
                </td>';
                $nameaddress = '<td id="'.$ServiceRequestId.'">
                    '.$CUSTOMERname.'
                    <div><img src="../assets/img/layer-719.png">
                        <span class="padding">'.$Address.'</span>
                    </div>
                </td>';
                $SPdeatil = '<td id="'.$address['ServiceRequestId'].'">
                                                        
                                <div class="d-flex">'.$reschelestatus.'
                                    <div><span class="d-block"> '.$SPName.'</span>
                                        <div class="padding-star">'.$values.'</div>
                                    </div>
                                </div>
                            </td>';
                $rowstatus = '<td id="'.$ServiceRequestId.'" class="text-center">'.$statues.'</td>';
                $rowaction = '<td class="text-center">'.$action.'</td>';

                $results = array();
                $results['serviceid'] = $serviceid;
                $results['datetime'] = $datetime;
                $results['nameaddress'] = $nameaddress;
                $results['SPdeatil'] = $SPdeatil;
                $results['rowstatus'] = $rowstatus;
                $results['rowaction'] = $rowaction;

                array_push($json, $results);

            }

            echo json_encode($json);
        }
    }

    public function UserManagementList()
    {
        if(isset($_POST)){
            $result = $this->model->AllUser('user');

            $json = array();

            $postalcode = '';

            foreach($result as $address) { 

                // $alldetails = $this->model->AllUserDetails('user',$address['UserId']);

                if($address['UserTypeId'] == 1){
                    $typeofUser = "Admin";
                }
                if($address['UserTypeId'] == 2){
                    $typeofUser = "Service Provider";
                }
                if($address['UserTypeId'] == 3){
                    $typeofUser = "Coustomer";
                }

                $isactive = $address['IsActive'];
                $username = $address['UserName'];
                $uid = $address['UserId'];
                $postalcode = $address['ZipCode'];
                $dates = $address['CreatedDate'];
                $DATE = explode(" ",$dates);
                $newdate = $DATE[0];
                $cityname = '';

                if ($isactive == "Yes") {

                    $statuslabel = '<span class="Active" id="active">Active</span>';

                    $actions = '<a class="Actions text-center" href="#" id="navbarDropdowns"
                    role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                        <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu tooltiptext" style="color: black;" aria-labelledby="navbarDropdowns">
                        <a class="dropdown-item Deactivate" style="cursor:pointer;" id="'.$uid.'">Deactivate</a>
                    </div>';

                }

                else {

                    $statuslabel = '<span class="InActive" id="inactive">Inactive</span>';

                    $actions = '<a class="Actions text-center" href="#" id="navbarDropdowns"
                    role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                        <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu tooltiptext" style="color: black;" aria-labelledby="navbarDropdowns">
                        <a class="dropdown-item Activate" style="cursor:pointer;" id="'.$uid.'">Activate</a>
                    </div>';

                }

                // foreach($alldetails as $row){
                //     $postalcode = $row['PostalCode'];
                // }

                    $name = '<td>'.$username.'</td>';
                    $userrole = '<td></td>';
                    $date = '<td>
                        <div><img src="../assets/img/calendar2.png"><b> '.$newdate.' </b> </div>
                    </td>';
                    $usertype = '<td>'.$typeofUser.'</td>';
                    $phone = '<td>'.$address['Mobile'].'</td>';
                    $pincode = '<td>'.$postalcode.'</td>';
                    $city = '<td>'.$cityname.'</td>';
                    $radious = '<td></td>';
                    $userstatus = '<td class="text-center">'.$statuslabel.'</td>';
                    $action = '<td class="text-center ">
                        '.$actions.'
                    </td>';


                $results = array();
                $results['name'] = $name;
                $results['userrole'] = $userrole;
                $results['date'] = $date;
                $results['usertype'] = $usertype;
                $results['phone'] = $phone;
                $results['pincode'] = $pincode;
                $results['city'] = $city;
                $results['radious'] = $radious;
                $results['userstatus'] = $userstatus;
                $results['action'] = $action;

                array_push($json, $results);

            }

            echo json_encode($json);
        }
    }

    public function GetSearchedUM()
    {
        if(isset($_POST)){
            $username = trim($_POST['username']);
            $userrole = trim($_POST['userrole']);
            $mobilenumber = trim($_POST['mobilenumber']);
            $postal = trim($_POST['postal']);
            $email = trim($_POST['email']);
            $Fromdate = trim($_POST['fromdate']);
            $Todate = trim($_POST['todate']);

            if($Todate == '' || $Todate == null){
                $Todate = date("Y-m-d") . ' 00:00:00.000';
            }
            else{
                $Todate = $Todate ." 00:00:00.000";
            }

            if($Fromdate == '' || $Fromdate == null){
                $Fromdate = '2020-01-01 00:00:00.000';
            }
            else{
                $Fromdate =  $Fromdate ." 00:00:00.000";
            }

            
            $result = $this->model->SearchUserManageList('user',$username,$userrole,$mobilenumber,$postal,$email,$Fromdate,$Todate);

            $json = array();
            $postalcode = '';

            foreach($result as $address) {

                if($address['UserTypeId'] == 1){
                    $typeofUser = "Admin";
                }
                if($address['UserTypeId'] == 2){
                    $typeofUser = "Service Provider";
                }
                if($address['UserTypeId'] == 3){
                    $typeofUser = "Coustomer";
                }

                $isactive = $address['IsActive'];
                $username = $address['UserName'];
                $uid = $address['UserId'];
                $dates = $address['CreatedDate'];
                $DATE = explode(" ",$dates);
                $newdate = $DATE[0];

                $postalcode = $address['ZipCode'];
                $cityname = '';

                if ($isactive == "Yes") {

                    $statuslabel = '<span class="Active" id="active">Active</span>';

                    $actions = '<a class="Actions text-center" href="#" id="navbarDropdowns"
                    role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                        <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu tooltiptext" style="color: black;" aria-labelledby="navbarDropdowns">
                        <a class="dropdown-item Deactivate" style="cursor:pointer;" id="'.$uid.'">Deactivate</a>
                    </div>';

                }

                else {

                    $statuslabel = '<span class="InActive" id="inactive">Inactive</span>';

                    $actions = '<a class="Actions text-center" href="#" id="navbarDropdowns"
                    role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                        <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu tooltiptext" style="color: black;" aria-labelledby="navbarDropdowns">
                        <a class="dropdown-item Activate" style="cursor:pointer;" id="'.$uid.'">Activate</a>
                    </div>';

                }

                    $name = '<td>'.$username.'</td>';
                    $userrole = '<td></td>';
                    $date = '<td>
                        <div><img src="../assets/img/calendar2.png"><b> '.$newdate.' </b> </div>
                    </td>';
                    $usertype = '<td>'.$typeofUser.'</td>';
                    $phone = '<td>'.$address['Mobile'].'</td>';
                    $pincode = '<td>'.$postalcode.'</td>';
                    $city = '<td>'.$cityname.'</td>';
                    $radious = '<td></td>';
                    $userstatus = '<td class="text-center">'.$statuslabel.'</td>';
                    $action = '<td class="text-center ">
                        '.$actions.'
                    </td>';


                $results = array();
                $results['name'] = $name;
                $results['userrole'] = $userrole;
                $results['date'] = $date;
                $results['usertype'] = $usertype;
                $results['phone'] = $phone;
                $results['pincode'] = $pincode;
                $results['city'] = $city;
                $results['radious'] = $radious;
                $results['userstatus'] = $userstatus;
                $results['action'] = $action;

                array_push($json, $results);

            }

            echo json_encode($json);
        }
    }

    public function GetUserRole()
    {
        if (isset($_POST)) {
            $result = $this->model->AllUser('user');

            if (count($result)) {
                foreach ($result as $user) {
                    $username =  $user['UserName'];

                    $user = '<option value="'.$user['UserId'].'">' . $username . '</option>';

                    echo $user;
                }
            }
        }
    }

    public function GetCustomerList()
    {
        if (isset($_POST)) {
            $result = $this->model->AllUser('user');

            if (count($result)) {
                foreach ($result as $user) {
                    $username =  $user['UserName'];

                    if($user['UserTypeId'] == 3 && $user['IsActive'] == 'Yes'){

                        $user = '<option value="'.$user['UserId'].'">' . $username . '</option>';

                        echo $user;
                    }
                }
            }
        }
    }

    public function GetSPList()
    {
        if (isset($_POST)) {
            $result = $this->model->AllUser('user');

            if (count($result)) {
                foreach ($result as $user) {
                    $username =  $user['UserName'];

                    if($user['UserTypeId'] == 2 && $user['IsActive'] == 'Yes'){

                        $user = '<option value="'.$user['UserId'].'">' . $username . '</option>';

                        echo $user;
                    }
                }
            }
        }
    }

    public function DeactivateUser()
    {
        if(isset($_POST)){
            $uid = trim($_POST['uid']);

            $result = $this->model->DeactivateUser('user',$uid);

            if($result){
                echo 'deactive successfully';
            }
            else{
                echo 'deactivation not done';
            }
        }
    }

    public function ActivateUser()
    {
        if(isset($_POST)){
            $uid = trim($_POST['uid']);

            $result = $this->model->ActivateUser('user',$uid);

            if($result){
                echo 'active successfully';
            }
            else{
                echo 'activation not done';
            }
        }
    }

    public function ServiceDetailForModel()
    {
        $UserId = $_SESSION['UserId'];
        if(isset($_POST)){
            $ServiceRequestId = trim($_POST['servicerequestid']);

            $result = $this->model->DetailofServiceRequest('servicerequest',$ServiceRequestId);

            $startTime = $result[0]['SelectTime'];
            $totalhour = $result[0]['TotalHour'];

            $street = $result[0]['AddressLine1'];
            $house = $result[0]['AddressLine2'];
            $postal = $result[0]['PostalCode'];
            $city = "<option value='".$result[0]['City']."'>".$result[0]['City']."</option>";
            $state = "<option value='".$result[0]['City']."'>".$result[0]['State']."</option>";

            $data = [$result[0]['ServiceStartDate'],$startTime,$totalhour,$street,$house,$postal,$city,$state,$result[0]['TotalCost'],$result[0]['RefundedAmount']];

            echo json_encode($data);
        }
    }

    public function CheckCity()
    {
        if(isset($_POST)){
            $Zipcode = trim(($_POST['Zipcode']));

            $result = $this->model->findCityUsingZipcode('zipcode',$Zipcode);

            $CityId = $result[0];
            $CityName = $result[1];
            $StateName = $result[2];

            if($result){
                $city =  "<option value='" . $CityName . "'>" . $CityName . "</option>";
                $state =  "<option value='" . $StateName . "'>" . $StateName . "</option>";
            }

            $output = [$city,$state];

            echo json_encode($output);
        }
    }

    public function RescheduleService()
    {
        if(isset($_POST)){
            $dateNew = trim($_POST['dateNew']);
            $newAdminTime = trim($_POST['newAdminTime']);
            $addressline1 = trim($_POST['addressline1']);
            $addressline2 = trim($_POST['addressline2']);
            $zipcode = trim($_POST['zipcode']);
            $cityname = trim($_POST['cityname']);
            $statename = trim($_POST['statename']);
            $rescheduleComment = trim($_POST['rescheduleComment']);
            $serviceRequestId = trim($_POST['serviceRequestId']);

            $arrayServicerequest = [
                'dateNew' => $dateNew,
                'newAdminTime' => $newAdminTime,
                'rescheduleComment' => $rescheduleComment,
            ];

            $arrayServiceaddress = [
                'addressline1' => $addressline1,
                'addressline2' => $addressline2,
                'zipcode' => $zipcode,
                'cityname' => $cityname,
                'statename' => $statename,
            ];

            $result3 = $this->model->GetServiceHistoryUser('servicerequest',$serviceRequestId);
            if (count($result3)) {
                foreach ($result3 as $row) {
                    $UserId = intval($row['UserId']);
                    $ServiceProviderId = $row['ServiceProviderId'];
                    $FavouriteServiceProviderId = $row['FavouriteServiceProviderId'];
                }

                $result = $this->model->updateDateTime('servicerequest',$arrayServicerequest,$serviceRequestId);
                $result2 = $this->model->updateServiceAddress('servicerequestaddress',$arrayServiceaddress,$serviceRequestId);

                $UserDetails = $this->model->GetUserDetails('user',$UserId);
                if (count($UserDetails)) {
                    foreach ($UserDetails as $emails) {
                        $UserEmail  = $emails['Email'];
                    }
                }

                if (!empty($ServiceProviderId)) {
                    $spDetails = $this->model->GetUserDetails('user',$ServiceProviderId);
                    if (count($spDetails)) {
                        foreach ($spDetails as $spemail) {
                            $ServiceRequestsId = $serviceRequestId;
                            $SPEmail  = $spemail['Email'];
                            $newTime = $dateNew;
                            $newDate = $newAdminTime;
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
                                $newTime = $dateNew;
                                $newDate = $newAdminTime;
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
                                $newTime = $dateNew;
                                $newDate = $newAdminTime;
                                include('ServiceProviderReschedulMail.php');
                            }
                        }
                    }
                }

                if($result && $result2){
                    $newTime = $dateNew;
                    $newDate = $newAdminTime;
                    $ServiceRequestId = $serviceRequestId;
                    include("ClientRescheduleMail.php");
                }
                
                echo 'updated successfully';
            }
            else{
                echo 'not updated';
            }
        }
    }

    public function RefundAmount()
    {
        if(isset($_POST)){
            $serviceRequestId = trim($_POST['servicerequestid']);
            $refundamount = trim($_POST['refundamount']);
            $refundComment = trim($_POST['refundComment']);

            $result = $this->model->DetailofServiceRequest('servicerequest',$serviceRequestId);

            $refundamountOLD = $result[0]['RefundedAmount'];

            $refundamountNEW = $refundamountOLD + $refundamount;
            $refundamountNEW = number_format($refundamountNEW,2);

            $result2 = $this->model->UpdateRefundAmount('servicerequest',$serviceRequestId,$refundamountNEW,$refundComment);

            if($result2){
                echo 'Refund success';
            }
            else{
                echo 'Refund not done';
            }
        }
    }

    public function CancelService()
    {
        $UserId = $_SESSION['UserId'];
        if(isset($_POST)){
            $servicerequestid = trim($_POST['servicerequestid']);

            $result = $this->model->cancelationService('servicerequest',$servicerequestid,$UserId);

            $result3 = $this->model->GetServiceHistoryUser('servicerequest',$servicerequestid);
            if (count($result3)) {
                foreach ($result3 as $row) {
                    $coustomerId = intval($row['UserId']);
                }
            }

            $UserDetails = $this->model->GetUserDetails('user',$coustomerId);

            if (count($UserDetails)) {
                foreach ($UserDetails as $emails) {
                    $UserEmail  = $emails['Email'];
                }
            }

            if($result){
                $SpName = 'Admin';
                $ServiceRequestId = $servicerequestid;
                include("CancelMailBySPtoCoustomer.php");
                echo 'Service cancelled successfully';
            }
            else{
                echo 'Service not cancelled';
            }
        }
    }
}
?>