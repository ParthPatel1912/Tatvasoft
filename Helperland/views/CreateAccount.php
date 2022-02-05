    <?php 
        include 'header.php';
        require_once 'message_error.php';
        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=CreateAccount";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=CreateAccount";
        }
    ?>
    <title>Create Account</title>

    <section id="createaccount" class="mb-5">
        <div class="text-center">
            <div class=" justify-content-center align-self-center">
                <h2 class="headingfont"> Create an Account</h2>
                <div class="separator-line"></div>
                <img src="../assets/img/forma-1-copy-5.png" style="padding-top: 5px;">
                <div class="separator-line"></div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row justify-content-center margin-top-50">
                <div class="col-md-6">
                    <?php
                        flash('createAccount')
                    ?>
                    <form class="row g-3 mt-3" action="<?= $base_url."?controller=User&function=InsertCoustomer"?>" method="POST" id="CreateAccount">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="FirstName" placeholder="First Name"  name="FirstName">
                            <div class="text-center FirstName-error"></div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="LastName" placeholder="Last Name"  name="LastName">
                            <div class="text-center LastName-error"></div>
                        </div>
                        <div class="col-6">
                            <input type="email" class="form-control check_email" id="EmailAddress" placeholder="Email"  name="EmailAddress">
                            <div class="text-center Email-error"></div>
                            <div class="text-center Email-valid-error"></div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+46</div>
                                </div>
                                <input type="number" class="form-control" id="PhoneNumber" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="10" placeholder="Phone Number"  name="PhoneNumber">
                            </div>
                            <div class="text-center PhoneNumber-error"></div>
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="Password" minlength="8" maxlength="14" placeholder="Password"  name="Password">
                            <div class="text-center Password-error"></div>
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="ConfirmPassword" minlength="8" maxlength="14" placeholder="Confirm Password"  name="ConfirmPassword">
                            <div class="text-center ConfirmPassword-error"></div>
                        </div>
                        <div class="col-12">
                            <input type="checkbox" id="chkPrivacy" name="chkPrivacy" > 
                            I have read the <a class="text-blue text-decoration-none" href="">privacy policy.</a>
                            <div class="text-left Checkbox-error"></div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn rounded-pill btnBlue" id="Register-btn"><b>Register</b></button>
                        </div>
                        <div class="mt-4 text-center">
                            Already registerd?
                            <a class="text-blue style-none" href="<?= $base_url."?controller=Helperland&function=CreateAccount#LoginModal"?>">Login Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <?php include 'footer.php';?>