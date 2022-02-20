    <?php
        if(!isset($_SESSION))
        {
            session_start();
        }

        if (!isset($_SESSION['UserName'])) { 
            include 'header_transparent.php';
        }
        if (isset($_SESSION['UserName'])) { 
            include 'header_notification.php';
        }
        
        require_once 'message_error.php';

        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=ServiceProvider";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=ServiceProvider";
        }
    ?>
    <title>Service Provider</title>

    <section class="home home-service-provider ">
        <div class="home-content">
            <div class="d-flex flex-wrap login-form p-3">
                <div class="container">
                    <h3 class="text-center mb-3">Register Now!</h3>
                    <?php
                        flash('serviceProvider')
                    ?>
                    <form class="form-inline mt-2" style="height:max-content" action="<?= $base_url."?controller=User&function=InsertServiceProvider"?>" method="POST" id="serviceProvider">
                        <div class="form-group mb-2">
                            <input class="form-control" type="text" id="FirstName" placeholder="First Name"  name="FirstName">
                            <div class="text-center FirstName-error"></div>
                        </div>
                        <div class="form-group mb-2">
                            <input class="form-control" type="text" id="LastName" placeholder="Last Name"  name="LastName">
                            <div class="text-center LastName-error"></div>
                        </div>
                        <div class="form-group mb-2">
                            <input class="form-control check_email" type="email" id="EmailAddress" placeholder="Email Address"  name="EmailAddress">
                            <div class="text-center Email-error"></div>
                            <div class="text-center Email-valid-error"></div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="col-auto">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">+46</div>
                                    </div>
                                    <input type="number" class="form-control" id="PhoneNumber" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="10" placeholder="Phone Number"  name="PhoneNumber">
                                </div>
                            <div class="text-center PhoneNumber-error"></div>
                        </div>
                        <div class="form-group mb-2">
                            <input class="form-control" type="password" id="Password" minlength="8" maxlength="14" placeholder="Password"  name="Password">
                            <div class="text-center Password-error"></div>
                        </div>
                        <div class="form-group mb-2">
                            <input class="form-control" type="password" id="ConfirmPassword" minlength="8" maxlength="14" placeholder="Confirm Password"  name="ConfirmPassword">
                            <div class="text-center ConfirmPassword-error"></div>
                        </div>
                        <div class="form-group mb-2">
                            <label><input type="checkbox" id="chkNews" name="chkNews" > Send me newsletters from Helperland</label>
                            <div class="text-left CheckboxNews-error"></div>
                            <label><input type="checkbox" id="chkPrivacy" name="chkPrivacy" > I accept <a class="font-blue text-decoration-none" href="">terms and conditions & privacy policy</a></label>
                            <div class="text-left Checkbox-error"></div>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn rounded-pill active font-white" id="GetStarted-btn">Get Started</button>
                        </div>
                    </form>


                </div>

            </div>
            <div class="downarrow">
                <img src="../assets/img/group-18_5.png">
            </div>
        </div>
    </section>

    <section id="how-it-work">
        <div class="container-fluid">
            <img src="../assets/img/blog-left-bg.png" alt="blog-left-bg" class="position-absolute about_back back_left">
            <img src="../assets/img/blog-right-bg.png" alt="blog-right-bg" class="position-absolute about_back back_right">
            <h1 class="Roboto-48 text-center m-4">How it works</h1>

            <div class="row justify-content-center mt-5">
                <div class="col-md-2 col-sm-6 text-center order-sm-1">
                    <img src="../assets/img/group-18_1.png" class="img-fluid how-it-work-image">
                </div>
                <div class="col-md-5 col-sm-6 ">
                    <span class="Roboto-Bold-30 mb-4">Register yourself</span>
                    <p> Provide your basic information to register yourself as a service provider.</p>
                    <span>
                                Read more <img src="../assets/img/shape-2.png">
                              </span>
                </div>

            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-md-2 pl-4 col-sm-6 text-center">
                    <img src="../assets/img/group-19_2.png" class="img-fluid how-it-work-image">
                </div>
                <div class="col-md-5 col-sm-6">
                    <span class="Roboto-Bold-30 mb-4">Get service requests</span>
                    <p> You will get service requests from customes depend on service area and profile..</p>
                    <span>Read more <img src="../assets/img/shape-2.png"></span>
                </div>

            </div>


            <div class="row justify-content-center mt-5">
                <div class="col-md-2 col-sm-6 text-center order-sm-1">
                    <img src="../assets/img/group-19_3.png" class="img-fluid how-it-work-image">
                </div>
                <div class="col-md-5 col-sm-6">
                    <span class="Roboto-Bold-30 mb-4"> Complete service</span>
                    <p> Accept service requests from your customers and complete your work.</p>
                    <span>Read more <img src="../assets/img/shape-2.png"></span>
                </div>

            </div>
        </div>
    </section>

    <?php include 'newslatter-small.php' ?>

    <?php include 'footer.php';?>