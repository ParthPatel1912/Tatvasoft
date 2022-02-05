<?php require '/tatvasoft/Project/PHP/views/message_error.php' ?>

<?php 

class UserController{
    function __construct()
    {
        include('models/User.php');
        $this->model = new UserModel();
        session_start();
    }

    public function CheckEmail()
    {
        if(isset($_POST)){
            $EmailAddress = trim($_POST['EmailAddress']);
            $count = $this->model->checkEmail('user',$EmailAddress);

            if($count > 0){
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

            //'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),

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
                        'Password' => $Password,
                        'Resetkey' => $resetkey,
                        'UserTypeId' => '3',
                        'Status' => 'New',
                        'IsActive' => 'No',
                        'IsRegisteredUser' => 'yes'
                    ];
                    $result = $this->model->insert_customer('user', $array);
                    $_SESSION['status_msg'] = $result[0];
                    $_SESSION['status_txt'] = $result[1]; 
                    $_SESSION['status'] = $result[2];
                    header('Location: ' . $base_url);
                }
                else{
                    $_SESSION['status_msg'] = "Email Already Exists";
                    $_SESSION['status_txt'] = "Try Another Email";
                    $_SESSION['status'] = "error";
                    header('Location: ' . $base_url_createAccount);
                }
            }
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

                $resetkey = bin2hex(random_bytes(15));
                $count = $this->model->checkEmail('user',$EmailAddress);
                if($count == 0){
                    $array = [
                        'FirstName' => $FirstName,
                        'LastName' => $LastName,
                        'EmailAddress' => $EmailAddress,
                        'PhoneNumber' => $PhoneNumber,
                        'Password' => $Password,
                        'Resetkey' => $resetkey,
                        'UserTypeId' => '2',
                        'Status' => 'New',
                        'IsActive' => 'No',
                        'IsRegisteredUser' => 'yes'
                    ];
                    $result = $this->model->insert_customer('user', $array);
                    $_SESSION['status_msg'] = $result[0];
                    $_SESSION['status_txt'] = $result[1]; 
                    $_SESSION['status'] = $result[2];
                    header('Location: ' . $base_url);
                }
                else{
                    $_SESSION['status_msg'] = "Email Already Exists";
                    $_SESSION['status_txt'] = "Try Another Email";
                    $_SESSION['status'] = "error";
                    header('Location: ' . $base_url_serviceProvider);
                }
            }
        }
    }

    public function Login()
    {
        if (isset($_POST)) {
            $EmailAddress = trim($_POST['EmailAddress']);
            $Password = trim($_POST['Password']);
            $result = $this->model->CheckLogin('user',$EmailAddress, $Password);

            $_SESSION['user_msg'] = $result[0];
            $_SESSION['user_txt'] = $result[1]; 
            $_SESSION['user_status'] = $result[2];
        }
    }

    public function CheckEmailPassword()
    {
        if (isset($_POST)) {
            $EmailAddress = trim($_POST['EmailAddress']);
            $Password = $_POST['Password'];
            $count = $this->model->CheckEmailPassword('user',$EmailAddress, $Password);

            if ($count == 1) {
                echo "Email and Password both match";
            }
            else {
                echo "Please enter valid Email and Password";
            }
        }
    }

    public function CheckEmailForgot()
    {
        if(isset($_POST)){
            $EmailAddress = trim($_POST['EmailAddress']);
            $count = $this->model->checkEmailForgot('user',$EmailAddress);

            if($count == 1){
                echo "Email Exist";
            } else {
                echo "Email doesn't Exists. Please Try Another Email";
            }
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
                $_SESSION['status_msg'] = "Reset Password Link has been sent successfully on!";
                $_SESSION['status_txt'] = $EmailAddress;
                $_SESSION['status'] = "success";
                header('Location:' . $base_url);
                
            }
            else{
                $_SESSION['status_msg'] = "Please Enter Valid Email";
                $_SESSION['status_txt'] = "";
                $_SESSION['status'] = "error";
                header('Location:' . $base_urlForgot);
            }
        }
    }

    public function ResetPassword()
    {
        $Resetkey = $_GET['resetkey'];
        include('./views/ResetPassword.php');
    }

    public function ResetPasswordwithKey()
    {
        $base_urlLoginModal = '?controller=Helperland&function=HomePage#LoginModal';
        $base_urlResetModal = '?controller=Helperland&function=HomePage#ResetModal';

        if(isset($_POST)){ 
            $Resetkey = trim($_POST['Resetkey']);
            $Password = trim($_POST['Password']);
            $ConfirmPassword = trim($_POST['ConfirmPassword']);

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

            // echo("<script>alert('".$Resetkey."')</script>");
            
                if($Password == $ConfirmPassword)
                {
                    $array = [
                        'Password' => $Password,
                        'Resetkey' => $Resetkey,
                    ];
                    $result = $this->model->ResetPassword('user',$array);
                    $_SESSION['status_msg'] = $result[0];
                    $_SESSION['status_txt'] = $result[1]; 
                    $_SESSION['status'] = $result[2];
                    header('Location:' . $base_urlLoginModal);
                }
                else {
                    $_SESSION['status_msg'] = "Password Not Match";
                    $_SESSION['status_txt'] = "Please Try Again"; 
                    $_SESSION['status'] = "warning";
                    header('Location:' . $base_urlResetModal);
                }
            }
        }
    }
}

?>