    <?php
        if(!isset($_SESSION))
        {
            session_start();
        }
        
        if (!isset($_SESSION['UserName'])) {
            include 'header.php';
        }
        if (isset($_SESSION['UserName'])) { 
            include 'header_notification.php';
        }
        
        require_once 'message_error.php';

        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=Contact";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=Contact";
        }
    ?>
    <title>Contact</title>

    <section class="bannerimage" id="bannerImage">
        <div class="img-fluid">
            <img src="../assets/img/group-16_2.png" class="img-fluid" height="370px" width="1560px">
        </div>
    </section>

    <section class="row w-100 container-fluid text-center justify-content-center">
        <div class="text-center">
            <div class=" justify-content-center align-self-center">
                <h2 class="headingfont"> Contact Us</h2>
                <div class="separator-line"></div>
                <img src="../assets/img/forma-1-copy-5.png" style="padding-top: 5px;">
                <div class="separator-line"></div>
            </div>
        </div>

        <div class="row col-md-10 text-center justify-content-center">
            <div class="contactus-box col-md-3">
                <div class="circle-margin">
                    <img src="../assets/img/forma-1_2.png" alt="" class="img-fluid">
                </div>
                <h6 class="circle-contain text-color-darkgray mb-0">111 Lorem ipsum text 100</h6>
                <h6 class="circle-contain_line text-color-darkgray">Lorem ipsum AB</h6>
            </div>
            <div class="contactus-box col-md-3">
                <div class="circle-margin">
                    <img src="../assets/img/phone-call.png" alt="" class="img-fluid">
                </div>
                <h6 class="circle-contain text-color-darkgray mb-0">+49 (40) 123 56 7890</h6>
                <h6 class="circle-contain_line text-color-darkgray">+49 (40) 123 56 0000</h6>
            </div>
            <div class="contactus-box col-md-3">
                <div class="circle-margin">
                    <img src="../assets/img/vector-smart-object.png" alt="" class="img-fluid pb-3">
                </div>
                <h6 class="circle-contain text-color-darkgray mb-0">info@helperland.com</h6>
            </div>

    </section>

    <section class="row container-fluid text-center justify-content-center">
        <div class="text-center">
            <div class=" justify-content-center align-self-center">
                <div class="extraservicesline justify-content-center"></div>
            </div>
        </div>
    </section>

    <section id="getintouch">
        <h3 class="text-center headingfont"> Get in touch with us</h3>
        <div class="container">
            <div class="row justify-content-center margin-top-50">
                <div class="col-md-6">
                    <?php
                        flash('contact')
                    ?> 
                    <form action="<?= $base_url."?controller=Contact&function=Insert_Contact"?>" method="POST"
                        class="row g-3 mt-3" id="Contact">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="FirstName" placeholder="First Name"
                                 name="FirstName" value="<?php if(isset($_POST['FirstName'])){echo $_POST['FirstName'];} ?>" >
                            <div class="text-center FirstName-error"></div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="LastName" placeholder="Last Name"
                                 name="LastName">
                            <div class="text-center LastName-error"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+46</div>
                                </div>
                                <input type="number" class="form-control"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="10" id="PhoneNumber" placeholder="Phone Number"  name="PhoneNumber">
                            </div>
                            <div class="text-center PhoneNumber-error"></div>
                        </div>
                        <div class="col-md-6">
                            <!-- <input type="email" class="form-control" id="Email" placeholder="Email address" name="Email"> -->
                            <input type="email" class="form-control" name="Email" id="EmailAddress" placeholder="Email Address">
                            <div class="text-center Email-error"></div>
                        </div>
                        <div class="col-md-12">
                            <select onchange="location = this.value;" class="form-control"  name="Subject">
                                <option value="subject">Subject</option>
                            </select>
                            <div class="text-center Subject-error"></div>
                        </div>
                        <div class="col-12">
                            <textarea rows="4" cols="65" class="form-control" id="Message"  placeholder="message"
                                name="Message"></textarea>
                            <div class="text-center Message-error"></div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn rounded-pill btnBlue" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="mapimage">
        <div class="img-fluid">
            <img src="../assets/img/group-16.png" class="img-fluid" height="370px" width="1560px">
        </div>
    </section>

    <?php include 'newslatter-small.php' ?>

    <?php include 'footer.php';?>