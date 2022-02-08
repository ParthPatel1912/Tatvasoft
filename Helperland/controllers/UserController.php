<?php require '/tatvasoft/Project/PHP/views/message_error.php' ?>

<?php 

class UserController{
    function __construct()
    {
        include('models/User.php');
        $this->model = new UserModel();
        if(!isset($_SESSION))
        {
            session_start();
        }
    }

    public function CheckEmail()
    {
        if(isset($_POST)){
            $EmailAddress = trim($_POST['EmailAddress']);
            $result = $this->model->checkEmail('user',$EmailAddress);

            if($result > 0){
                echo "Email Already Exists. Please Try Another Email";
            } else {
                echo "Email You can Use";
            }
        }
    }

    public function InsertCoustomer()
    {
        $base_url = '?controller=Helperland&function=CreateAccount#LoginModal';
        $base_url_createAccount = '?controller=Helperland&function=CreateAccount';

        if(isset($_POST)){
            $FirstName = trim($_POST['FirstName']);
            $LastName  = trim($_POST['LastName']);
            $EmailAddress = trim($_POST['EmailAddress']);
            $PhoneNumber = trim($_POST['PhoneNumber']);
            $Password = trim($_POST['Password']);
            $ConfirmPassword = trim($_POST['ConfirmPassword']);
            $chkPrivacy = trim( $_POST['chkPrivacy']);

            $PasswordCrypt = password_hash($Password, PASSWORD_BCRYPT);

            $error = "";

            if($FirstName == "") {
                $error .= "<li>Please enter first name.</li>";
            }
            if($LastName == "") {
                $error .= "<li>Please enter last name.</li>";
            }
            if($EmailAddress == ""){
                $error .= "<li>Please enter email address.</li>";
            } 
            else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $EmailAddress)){
                $error .= '<li>Enter a valid email.</li>';
            }
            if($PhoneNumber == "") {
                $error .= "<li>Please enter phone number.</li>";
            }
            else if(strlen($PhoneNumber)<10){
                $error .= "<li>Phone number shoud be 10 digit.</li>";
            }
            if($Password == ""){
                $error .= '<li>Please enter Password.</li>';
            }
            else if(!preg_match("/(?=.*?[A-Z])/", $Password)){
                $error .= '<li>At least one Uppercase.</li>';
            }
            else if(!preg_match("/(?=.*?[a-z])/", $Password)){
                $error .= '<li>At least one Lowwercase.</li>';
            }
            else if(!preg_match("/(?=.*?[0-9])/", $Password)){
                $error .= '<li>At least one Digit.</li>';
            }
            else if(!preg_match("/(?=.*?[#?!@$%^&*-])/", $Password)){
                $error .= '<li>At least one Special Character.</li>';
            }
            else if(strlen($Password)<8){
                $error .= '<li>Password must be minimum 8 Character.</li>';
            }
            else if(strlen($Password)>14){
                $error .= '<li>Password must be maximum 14 Character.</li>';
            }
            if($ConfirmPassword == ""){
                $error .= '<li>Please enter Confirm password</li>';
            }
            else if($ConfirmPassword != $Password){
                $error .= '<li>Password must be same.</li>';
            }
            if($chkPrivacy == ""){
                $error .= '<li>Please select check mark of Privacy</li>';
            }

            if($error != ""){
                
                flash('createAccount',$error);
                redirect($base_url_createAccount);

            }
            else{

                $resetkey = bin2hex(random_bytes(15));
                $count = $this->model->checkEmail('user',$EmailAddress);
                if($count == 0){
                    $array = [
                        'FirstName' => $FirstName,
                        'LastName' => $LastName,
                        'EmailAddress' => $EmailAddress,
                        'PhoneNumber' => $PhoneNumber,
                        'Password' => $PasswordCrypt,
                        'Resetkey' => $resetkey,
                        'UserTypeId' => '3',
                        'Status' => 'New',
                        'IsActive' => 'Yes',
                        'IsRegisteredUser' => 'yes'
                    ];
                    $result = $this->model->insert_user('user', $array);

                    if ($result) {
                        $_SESSION['message_title'] = "Your Account has been Created";
                        $_SESSION['message_text'] = "Please Login now";
                        $_SESSION['message_icon'] = "success";
                        header('Location: ' . $base_url);
                    } else {
                        $_SESSION['message_title'] = "Your Account is not Created";
                        $_SESSION['message_text'] = "Please Try Again";
                        $_SESSION['message_icon'] = "alert";
                        header('Location: ' . $base_url_createAccount);
                    }
                }
                else{
                    $_SESSION['message_title'] = "Email Already Exists";
                    $_SESSION['message_text'] = "Try Another Email";
                    $_SESSION['message_icon'] = "error";
                    header('Location: ' . $base_url_createAccount);
                }
            }
        }
        else{
            $_SESSION['message_title'] = "Your Message is not Sent";
            $_SESSION['message_text'] = "Please Try Again";
            $_SESSION['message_icon'] = "error";
            header('Location: ' . $base_url_createAccount);
        }
    }

    public function InsertServiceProvider()
    {
        $base_url = '?controller=Helperland&function=ServiceProvider#LoginModal';
        $base_url_serviceProvider = '?controller=Helperland&function=ServiceProvider';
        
        if(isset($_POST)){
            $FirstName = trim($_POST['FirstName']);
            $LastName  = trim($_POST['LastName']);
            $EmailAddress = trim($_POST['EmailAddress']);
            $PhoneNumber = trim($_POST['PhoneNumber']);
            $Password = trim($_POST['Password']);
            $ConfirmPassword = trim($_POST['ConfirmPassword']);
            $chkPrivacy = trim($_POST['chkPrivacy']);

            $PasswordCrypt = password_hash($Password, PASSWORD_BCRYPT);

            $error = "";

            if($FirstName == "") {
                $error .= "<li>Please enter first name.</li>";
            }
            if($LastName == "") {
                $error .= "<li>Please enter last name.</li>";
            }
            if($EmailAddress == ""){
                $error .= "<li>Please enter email address.</li>";
            } 
            else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $EmailAddress)){
                $error .= '<li>Enter a valid email.</li>';
            }
            if($PhoneNumber == "") {
                $error .= "<li>Please enter phone number.</li>";
            }
            else if(strlen($PhoneNumber)<10){
                $error .= "Phone number shoud be 10 digit.</li>";
            }
            if($Password == ""){
                $error .= '<li>Please enter Password.</li>';
            }
            else if(!preg_match("/(?=.*?[A-Z])/", $Password)){
                $error .= '<li>At least one Uppercase.</li>';
            }
            else if(!preg_match("/(?=.*?[a-z])/", $Password)){
                $error .= '<li>At least one Lowwercase.</li>';
            }
            else if(!preg_match("/(?=.*?[0-9])/", $Password)){
                $error .= '<li>At least one Digit.</li>';
            }
            else if(!preg_match("/(?=.*?[#?!@$%^&*-])/", $Password)){
                $error .= '<li>At least one Special Character.</li>';
            }
            else if(strlen($Password)<8){
                $error .= '<li>Password must be minimum 8 Character.</li>';
            }
            else if(strlen($Password)>14){
                $error .= '<li>Password must be maximum 14 Character.</li>';
            }
            if($ConfirmPassword == ""){
                $error .= '<li>Please enter Confirm password</li>';
            }
            else if($ConfirmPassword != $Password){
                $error .= '<li>Password must be same.</li>';
            }
            if($chkPrivacy == ""){
                $error .= '<li>Please select check mark of Privacy</li>';
            }

            if($error != ""){
                
                flash('serviceProvider',$error);
                redirect($base_url_serviceProvider);

            }

            else{

                $Resetkey = bin2hex(random_bytes(15));
                $count = $this->model->checkEmail('user',$EmailAddress);
                if($count == 0){
                    $array = [
                        'FirstName' => $FirstName,
                        'LastName' => $LastName,
                        'EmailAddress' => $EmailAddress,
                        'PhoneNumber' => $PhoneNumber,
                        'Password' => $PasswordCrypt,
                        'Resetkey' => $Resetkey,
                        'UserTypeId' => '2',
                        'Status' => 'New',
                        'IsActive' => 'No',
                        'IsRegisteredUser' => 'yes'
                    ];
                    $result = $this->model->insert_user('user', $array);
                    if ($result) {
                        $_SESSION['message_title'] = "Your Account has been Created";
                        $_SESSION['message_text'] = "Please Verify Your Email";
                        $_SESSION['message_icon'] = "success";
                        include('ActivationAccount.php');
                        header('Location: ' . $base_url);
                    } else {
                        $_SESSION['message_title'] = "Your Account is not Created";
                        $_SESSION['message_text'] = "Please Try Again";
                        $_SESSION['message_icon'] = "alert";
                        header('Location: ' . $base_url_serviceProvider);
                    }
                }
                else{
                    $_SESSION['message_title'] = "Email Already Exists";
                    $_SESSION['message_text'] = "Try Another Email";
                    $_SESSION['message_icon'] = "error";
                    header('Location: ' . $base_url_serviceProvider);
                }
            }
        }
        else{
            $_SESSION['message_title'] = "Your Message is not Sent";
            $_SESSION['message_text'] = "Please Try Again";
            $_SESSION['message_icon'] = "error";
            header('Location: ' . $base_url_serviceProvider);
        }
    }

    public function Login()
    {
        $base_urlCoustomer = "?controller=Helperland&function=ServiceHistory";
        $base_urlService = "?controller=Helperland&function=UpcomingServices";
        $base_urlAdmin = "?controller=Helperland&function=UserManagement";
        $base_urlLoginModal = $_SESSION['base_url'].'#LoginModal';

        if (isset($_POST)) {
            $EmailAddress = trim($_POST['EmailAddress']);
            $Password = trim($_POST['Password']);

            if (isset($_POST['ChkRemember'])) {
                setcookie('EmailAddressCookie', $EmailAddress, time() + 2592000, '/');
                setcookie('PasswordCookie', $Password, time() + 2592000, '/');
            }

            $result = $this->model->CheckLogin('user',$EmailAddress, $Password);

            $count = $result[0];
            $UserTypeId = $result[1];
            $Name = $result[2];
            $IsActive = $result[3];

            if ($count == 1){

                if($IsActive == "Yes"){

                    if($UserTypeId == 1){
                        $_SESSION['user_title'] = "Welcome, Admin";
                        $_SESSION['user_text'] = $Name;
                        $_SESSION['user_icon'] = "success";
                        header('Location: '. $base_urlAdmin);
                    }
                    else if($UserTypeId == 2){
                        $_SESSION['user_title'] = "Welcome, Service Provider";
                        $_SESSION['user_text'] = $Name;
                        $_SESSION['user_icon'] = "success";
                        header('Location: '. $base_urlService);
                    }
                    else{
                        $_SESSION['user_title'] = "Welcome, Coustomer";
                        $_SESSION['user_text'] = $Name;
                        $_SESSION['user_icon'] = "success";
                        header('Location: '. $base_urlCoustomer);
                    }
                }
                else{
                    $_SESSION['user_title'] = "Please Active your Account";
                    $_SESSION['user_text'] = "Mail sent in ".$EmailAddress;
                    $_SESSION['user_icon'] = "error";
                    header('Location: '. $base_urlLoginModal);
                }
            }
            else {

                $_SESSION['user_title'] = "User does not exists";
                $_SESSION['user_text'] = "Please Enter Valid User";
                $_SESSION['user_icon'] = "error";
                header('Location: '. $base_urlLoginModal);
            }
        }
        else{
            $_SESSION['message_title'] = "Your Message is not Sent";
            $_SESSION['message_text'] = "Please Try Again";
            $_SESSION['message_icon'] = "error";
            header('Location: ' . $base_urlLoginModal);
        }
    }

    public function CheckEmailPassword()
    {
        if (isset($_POST)) {
            $EmailAddress = trim($_POST['EmailAddress']);
            $Password = $_POST['Password'];

            $result = $this->model->CheckEmailPassword('user',$EmailAddress, $Password);

            if ($result == 1) {
                echo "Email and Password both match";
            }
            else {
                echo "Please enter valid Email and Password";
            }
        }
        else{
           echo "Your Message is not Sent";
        }
    }

    public function CheckEmailForgot()
    {
        if(isset($_POST)){
            $EmailAddress = trim($_POST['EmailAddress']);
            $result = $this->model->checkEmailForgot('user',$EmailAddress);

            if($result == 1){
                echo "Email Exist";
            } else {
                echo "Email doesn't Exists. Please Try Another Email";
            }
        }
        else{
            echo "Message is not sent";
        }
    }

    public function Forgot()
    {
        $base_url = $_SESSION['base_url'];
        $base_urlForgot = '?controller=Helperland&function=HomePage#ForgotModal';

        if (isset($_POST)) {
            $EmailAddress = trim($_POST['EmailAddress']);
            $result = $this->model->forgot('user',$EmailAddress);

            $count = $result[0];
            $Name = $result[1]; 
            $resetkey = $result[2];

            if($count == 1){
                include('ForgotPassword.php');
                $_SESSION['message_title'] = "Reset Password Link has been sent successfully on!";
                $_SESSION['message_text'] = $EmailAddress;
                $_SESSION['message_icon'] = "success";
                header('Location:' . $base_url);
                
            }
            else{
                $_SESSION['message_title'] = "Please Enter Valid Email OR";
                $_SESSION['message_text'] = "First Varify your Email ID";
                $_SESSION['message_icon'] = "error";
                header('Location:' . $base_urlForgot);
            }
        }
        else{
            $_SESSION['message_title'] = "Your Message is not Sent";
            $_SESSION['message_text'] = "Please Try Again";
            $_SESSION['message_icon'] = "error";
            header('Location: ' . $base_urlForgot);
        }
    }

    public function ResetPasswordwithKey()
    {
        $base_urlLoginModal = '?controller=Helperland&function=HomePage#LoginModal';
        $base_urlResetModal = '?controller=Helperland&function=HomePage#ResetModal';

        if(isset($_POST)){ 
            $Resetkey = trim($_POST['Resetkey']);
            $Password = trim($_POST['Password']);
            $ConfirmPassword = trim($_POST['ConfirmPassword']);

            $PasswordCrypt = password_hash($Password, PASSWORD_BCRYPT);

            $error = "";

            if($Password == ""){
                $error .= '<li>Please enter Password.</li>';
            }
            else if(!preg_match("/(?=.*?[A-Z])/", $Password)){
                $error .= '<li>At least one Uppercase.</li>';
            }
            else if(!preg_match("/(?=.*?[a-z])/", $Password)){
                $error .= '<li>At least one Lowwercase.</li>';
            }
            else if(!preg_match("/(?=.*?[0-9])/", $Password)){
                $error .= '<li>At least one Digit.</li>';
            }
            else if(!preg_match("/(?=.*?[#?!@$%^&*-])/", $Password)){
                $error .= '<li>At least one Special Character.</li>';
            }
            else if(strlen($Password)<8){
                $error .= '<li>Password must be minimum 8 Character.</li>';
            }
            else if(strlen($Password)>14){
                $error .= '<li>Password must be maximum 14 Character.</li>';
            }
            if($ConfirmPassword == ""){
                $error .= '<li>Please enter Confirm password</li>';
            }
            else if($ConfirmPassword != $Password){
                $error .= '<li>Password must be same.</li>';
            }

            if($error != ""){
                echo $error;
            }
            else{
            
                if($Password == $ConfirmPassword)
                {
                    $array = [
                        'Password' => $PasswordCrypt,
                        'Resetkey' => $Resetkey,
                    ];
                    $result = $this->model->ResetPassword('user',$array,$Resetkey);

                    if ($result) {
                        $_SESSION['message_title'] = "Password Updated Successfully";
                        $_SESSION['message_text'] = "";
                        $_SESSION['message_icon'] = "success";
                    } else {
                        $_SESSION['message_title'] = "Password Not Updated OR ";
                        $_SESSION['message_text'] = "First Varify your Email ID";
                        $_SESSION['message_icon'] = "warning";
                    }
                    header('Location:' . $base_urlLoginModal);
                }
                else {
                    $_SESSION['message_title'] = "Password Not Match";
                    $_SESSION['message_text'] = "Please Try Again"; 
                    $_SESSION['message_icon'] = "warning";
                    header('Location:' . $base_urlResetModal);
                }
            }
        }
        else{
            $_SESSION['message_title'] = "Your Message is not Sent";
            $_SESSION['message_text'] = "Please Try Again";
            $_SESSION['message_icon'] = "error";
            header('Location: ' . $base_urlResetModal);
        }
    }

    public function ActivateAccount()
    {
        $base_urlLoginModal = '?controller=Helperland&function=HomePage#LoginModal';
        $base_url_createAccount = '?controller=Helperland&function=CreateAccount';

        if (isset($_GET)) {
            $Resetkey = $_GET['resetkey'];
            $result = $this->model->ActivationAccount('user',$Resetkey);

            if ($result) {
                $_SESSION['message_title'] = "Congratulation, Your Account verification is successfull!! ";
                $_SESSION['message_text'] = "You Can Login Now";
                $_SESSION['message_icon'] = "success";
                header('Location:' . $base_urlLoginModal);
            } else {
                $_SESSION['message_title'] = "You alredy Varified it";
                $_SESSION['message_text'] = "Your account is not need Varification";
                $_SESSION['message_icon'] = "error";
                header('Location:' . $base_url_createAccount);
            }
        }
        else{
            $_SESSION['message_title'] = "Your Message is not Sent";
            $_SESSION['message_text'] = "Please Try Again";
            $_SESSION['message_icon'] = "error";
            header('Location: ' . $base_url_createAccount);
        }
    }

    public function Logout()
    {
        $base_urlLoginModal = '?controller=Helperland&function=HomePage#LoginModal';
        
        if(isset($_POST)){
            unset($_SESSION['UserName']);
            $_SESSION['message_title'] = "You are Logged Out";
            $_SESSION['message_text'] = "";
            $_SESSION['message_icon'] = "success";
            // $_SESSION['msg'] = "You are Logged Out"; 
            header('Location:'.$base_urlLoginModal);
        }
        else{
            $_SESSION['message_title'] = "Your Message is not Sent";
            $_SESSION['message_text'] = "Please Try Again";
            $_SESSION['message_icon'] = "error";
            header('Location: ' . $base_urlLoginModal);
        }
    }

}

?>