    <?php include 'header.php';?>
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
                    <form action="<?= $base_url."?controller=Helperland&function=Insert_ContactUs"?>" method="POST" class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="inputFirstName" placeholder="First Name" required name="FirstName">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Last Name" required name="LastName">
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+46</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Phone Number" required name="PhoneNumber">
                            </div>
                        </div>
                        <div class="col-6">
                            <input type="email" class="form-control" placeholder="Email" required name="Email">
                        </div>
                        <div class="col-md-12">
                            <select onchange="location = this.value;" class="form-control" required name="Subject">
                                <option value="subject">Subject</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <textarea rows="4" cols="65" class="form-control" placeholder="message" required name="Message"></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn rounded-pill btnBlue">Submit</button>
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

    <section class="newslatter">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-1 ">
                </div>
                <div class="col-md-2 "></div>
                <div class="col-md-6 ">
                    <h3 class="headingfont">Get Our Newsletter</h3>
                    <input type="email " placeholder="Your Email ">
                    <button class="btn btn-sm ">Submit</button>
                </div>
                <div class="col-md-2 "></div>
                <div class="col-md-1 ">

                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php';?>