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


        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=BookService";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=BookService";
        }
    ?>
    <title>Book Service</title>

    <section class="bannerimage" id="bannerimage">
        <div class="img-fluid">
            <img src="../assets/img/book-service-banner.jpg" class="img-fluid" height="370px" width="1560px">
        </div>
    </section>

    <section class="container-fluid">
        <div class="text-center">
            <div class=" justify-content-center align-self-center">
                <h2 class="headingfont"> Set up your cleaning service</h2>
                <div class="separator-line"></div>
                <img src="../assets/img/forma-1-copy-5.png" style="padding-top: 5px;">
                <div class="separator-line"></div>
            </div>
        </div>

        <div class="justify-content-center row mt-3 mb-4">

            <div class="col-md-8" id="bookservice">

                <div class="row text-center">
                    <div class="col-md-12">
                        <button class="btn services-selected" id="setupservice" value="0"
                            onclick="gotobacksetupservice()">
                            <img src="../assets/img/setup-service-white.png"> 
                            <label for="" class="display-non-sm"> Set up Service </label>
                            <div class="arrow-down" id="arrow-setupservice"></div>
                        </button>
                        <button class="btn services" value="1" id="scheduleplan" onclick="gotobackscheduleplan()"><img
                                src="../assets/img/schedule.png"> 
                               <label for="" class="display-non-sm"> Schedule & Plan </label>
                            <div class="arrow-down" id="arrow-scheduleplan"></div>
                        </button>
                        <button class="btn services" value="2" id="details" onclick="gotobackyourdetails()"><img
                                src="../assets/img/details.png"> 
                                <label class="display-non-sm">Details</label>
                            <div class="arrow-down" id="arrow-detail"></div>
                        </button>
                        <button class="btn services" value="3" id="payment"><img src="../assets/img/payment.png">
                            <label class="display-non-sm">Make Payment</label>
                            <div class="arrow-down" id="arrow-payment"></div>
                        </button>
                    </div>
                </div>

                <form method="POST" id="BookService">
                    <section id="setupservicetab" class="container-fluid">
                        <div class="row mt-4">
                            <b>Please enter your postal code:</b>
                            <div class="col-md-6">
                                <input type="number" minlength="6" maxlength="6"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    id="zipcode" class="form-control check_zipcode" placeholder="Postal Code"
                                    name="Zipcode">
                                <div class="text-center Zipcode-error"></div>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn rounded-pill active font-white"
                                    id="checkAvaibility-btn" onclick="gotoscheduleplan()"><b>Check
                                        availability</b></button>
                            </div>
                        </div>
                    </section>

                    <section id="scheduleplantab" class="container-fluid">
                        <div class="row mt-4">
                            <b>Select numberof rooms and bath</b>
                            <div class="col-md-2">
                                <select class="form-control" id="bed">
                                    <option value="bed1">bed 1</option>
                                    <option value="bed2">bed 2</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="bath">
                                    <option value="bath1">bath 1</option>
                                    <option value="bath2">bath 2</option>
                                </select>
                            </div>
                        </div>

                        <hr>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <b>When do you need the Cleaner?</b>

                                <div class="row">
                                    <div class="col-md-5 selectdiv-calendar">
                                        <!-- <input type="text" placeholder="01/01/2018" class="form-control"
                                            onfocus="(this.type='date')" onblur="(this.type='text')"> -->
                                        <input type="text" id="date" name="date" class="form-control"
                                            value="<?php echo date('d-m-Y', strtotime(' +1 day')); ?>" readonly>
                                    </div>
                                    <div class="col-md-4 selectdiv">
                                        <select class="form-control" id="time">
                                            <option value="8:00">8:00</option>
                                            <option value="8:30">8:30</option>
                                            <option value="9:00">9:00</option>
                                            <option value="9:30">9:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <b>How long to you need for cleaner stay?</b>

                                <div class="row">
                                    <div class="col-md-4 selectdiv">
                                        <select class="form-control" id="Hrs" name="Hrs">
                                            <option value="3">3.0 Hrs</option>
                                            <option value="3.5">3.5 Hrs</option>
                                            <option value="4">4.0 Hrs</option>
                                            <option value="4.5">4.5 Hrs</option>
                                            <option value="5">5.0 Hrs</option>
                                            <option value="5.5">5.5 Hrs</option>
                                            <option value="6">6.0 Hrs</option>
                                            <option value="6.5">6.5 Hrs</option>
                                            <option value="7">7.0 Hrs</option>
                                            <option value="7.5">7.5 Hrs</option>
                                            <option value="8">8.0 Hrs</option>
                                            <option value="8.5">8.5 Hrs</option>
                                            <option value="9">9.0 Hrs</option>
                                            <option value="9.5">9.5 Hrs</option>
                                            <option value="10">10.0 Hrs</option>
                                            <option value="10.5">10.5 Hrs</option>
                                            <option value="11">11.0 Hrs</option>
                                            <option value="11.5">11.5 Hrs</option>
                                            <option value="12">12.0 Hrs</option>
                                            <option value="12.5">12.5 Hrs</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr>

                        <div class="row mt-4 w-100 container-fluid">
                            <b>Extra Services</b>
                            <div class="row col-md-12 text-center justify-content-center">
                                <div class="service-box col-md-2" onclick="checkIfSelected(0)" value="1">
                                    <div class="btn circle">
                                        <input type="hidden" value="notselected" class="hidden-input" id="inside-cabinet">
                                        <img src="../assets/img/1.png" alt="" class="img-book-service">
                                    </div>
                                    <h6 class="circle_text mb-0">Inside cabinets</h6>

                                </div>
                                <div class="service-box col-md-2" onclick="checkIfSelected(1)" value="1">
                                    <div class="btn circle">
                                        <input type="hidden" value="notselected" class="hidden-input" id="inside-fridge">
                                        <img src="../assets/img/2.png" alt="" class="img-book-service">
                                    </div>
                                    <h6 class="circle_text mb-0">Inside fridge</h6>

                                </div>
                                <div class="service-box col-md-2" onclick="checkIfSelected(2)" value="1">
                                    <div class="btn circle">
                                        <input type="hidden" value="notselected" class="hidden-input" id="inside-oven">
                                        <img src="../assets/img/3.png" style="padding-top:5px;" alt=""
                                            class="img-book-service">
                                    </div>
                                    <h6 class="circle_text mb-0">Inside oven</h6>

                                </div>
                                <div class="service-box col-md-2" onclick="checkIfSelected(3)" value="1">
                                    <div class="btn circle">
                                        <input type="hidden" value="notselected" class="hidden-input" id="laundry-wash">
                                        <img src="../assets/img/4.png" alt="" class="img-book-service">
                                    </div>
                                    <h6 class="circle_text mb-0">Laundry Wash dry</h6>

                                </div>
                                <div class="service-box col-md-2" onclick="checkIfSelected(4)" value="1">
                                    <div class="btn circle">
                                        <input type="hidden" value="notselected" class="hidden-input" id="interior-window">
                                        <img src="../assets/img/5.png" alt="" class="img-book-service">
                                    </div>
                                    <h6 class="circle_text mb-0">Interior windows</h6>

                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="mt-4">
                            <b>Comments</b>
                            <textarea name="comment" class="form-control" cols="10" rows="3"
                                placeholder="Enter any comment for any suggestions." id="comment"></textarea>
                        </div>

                        <div class="mt-4">
                            <label><input type="checkbox" id="haspetsornot"> I accept <span class="font-blue">I have pets at home</span></label>
                        </div>

                        <div class="mt-4 float-right">
                            <button type="button" class="btn rounded-pill active font-white"
                                onclick="gotoyourDetails()"><b>Continue</b></button>
                        </div>
                    </section>

                    <section id="detailstab" class="container-fluid">
                        <div class="row mt-4">
                            <h6>Please enter your address so that your helper can find you.</h6>
                                <div id="address">

                                </div>
                                <div class="address-error"></div>
                        </div>

                        <div class="mt-4">
                            <button type="button" class="btn rounded-pill activehover" id="NewAddress"
                                onclick="showNewAddress()"><b>+ Add new
                                    Address</b></button>
                        </div>

                        <div class="mt-4" id="AddNewAddress">
                            <div class="border form-control">
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Street</b>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="AddressLine1" name="AddressLine1">
                                                <div class="text-center AddressLine1-error"></div>
                                            </div>
                                            <div class="col-md-4 ">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <b>House Number</b>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="AddressLine2" name="AddressLine2">
                                                <div class="text-center AddressLine2-error"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Postcode</b>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="PostalCode" name="PostalCode" readonly >
                                            </div>
                                            <div class="col-md-4 ">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <b>Location</b>

                                        <div class="row">
                                            <div class="col-md-12 selectdiv" id="city_name">
                                               
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>Phone Number</b>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+46</div>
                                            </div>
                                            <input type="number" class="form-control" id="PhoneNumber"
                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                maxlength="10" placeholder="Phone Number" name="ooo">
                                        </div>
                                        <div class="text-center PhoneNumber-error"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control"
                                                value="<?php
                                                    if (isset($_SESSION['UserId'])) {
                                                        echo $_SESSION['UserId'];
                                                    }
                                                ?>"
                                                id="UserId" name="UserId" readonly hidden >
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-4 float-left">
                                        <button type="button" class="btn rounded-pill active font-white" id="Save-btn" onclick="saveAddress()">
                                            <b>Save</b>
                                        </button>
                                        <button type="button" class="btn rounded-pill activehover"
                                            onclick="discardAddress()"><b>Discard</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label>Your favourite Service Provider</label>
                        </div>

                        <hr>

                        <div>
                            <label for="">You can choose your favoirite service provider from below list</label>
                        </div>

                        <div class="contrainer">
                            <div class="row col-md-12 text-center" id="Favourite">
                            </div>
                        </div>

                        <div class="mt-5 float-right">
                            <button type="button" id="CheckAdress" class="btn rounded-pill active font-white"
                                onclick="gotomakepayment()"><b>Continue</b></button>
                        </div>
                    </section>

                    <section id="paymenttab" class="container-fluid">
                        <div class="mt-4">
                            <b>Choose one of the following payment methods.</b>
                        </div>

                        <div class="row mt-4">
                            <h6>Discount code (optional)</h6>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="discount" placeholder="Do you have a discount code">
                                <div class="discount-error"></div>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn rounded-pill activehover" id="discount-btn"><b>Apply</b></button>
                            </div>
                        </div>

                        <hr>

                        <div class="row mt-3">
                            <div>
                                <input type="number" class="form-control" id="cardNumber" name="cardnumber" minlength="12" maxlength="12"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    placeholder="Card number                                   mm / dd / yyyy">
                                <div class="cardNumber-error"></div>
                            </div>
                        </div>

                        <div class="text-right mt-4">
                            Accepted cards:
                            <div>
                                <img src="../assets/img/ic-flag.png" alt="card">
                                <img src="../assets/img/ic-flag.png" alt="card">
                                <img src="../assets/img/ic-flag.png" alt="card">
                            </div>
                        </div>

                        <hr>

                        <div class="mt-4 mb-4">
                            <label><input type="checkbox" name="chkPrivacy" id="chkPrivacy"> I accepted terms and conditions, the cancellation
                            policy and the privacy policy. I confirm that Helperland begins with the execution of the
                            contract before the expiry of the revocation period
                            and that I lose my right of withdrawal as a consumer with full fulfillment of the contract.</label>
                        </div>

                        <hr>

                        <div class="float-right mt-4">
                            <button type="button" onclick="SubmitData()" id="Complete" class="btn rounded-pill active font-white"><b>Complete
                                    Booking</b></button>

                        </div>
                    </section>
                </form>

            </div>

            <div class="col-md-4 payment" id="Payment">

                <section class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="card mb-3">
                            <span class="paymentheading"><b>Payment Overview</b></span>
                            <div class="card-body">
                                <div>
                                    <span id="Date" class="text-left"></span>    
                                    <span id="Time" class="text-right"></span>
                                </div>
                                <div>
                                    <span id="Bath" class="text-left"></span>    
                                    <span id="Bed" class="text-right"></span>
                                </div>
                                <div>Duration</div>
                                <div class="row">
                                    <div>
                                        <span class="text-left">Basic</span>
                                        <span class="text-right" id="basicHour"></span>
                                    </div>
                                    <div id="extraservices">

                                        <div id="0">
                                            <span class="text-left">Basic Inside cabinets (extra)</span>
                                            <span class="text-right">30 Minutes</span>
                                        </div>

                                        <div id="1">
                                            <span class="text-left">Basic  Inside fridge (extra)</span>
                                            <span class="text-right">30 Minutes</span>
                                        </div>

                                        <div id="2">
                                            <span class="text-left">Basic Inside oven (extra)</span>
                                            <span class="text-right">30 Minutes</span>
                                        </div>

                                        <div id="3">
                                            <span class="text-left">Basic Laundry wash dry (extra)</span>
                                            <span class="text-right">30 Minutes</span>
                                        </div>

                                        <div id="4">
                                            <span class="text-left">Basic Interior windows (extra)</span>
                                            <span class="text-right">30 Minutes</span>
                                        </div>
                                    </div>
                                    <div class="text-center ">
                                        <div class=" justify-content-center align-self-center ">
                                            <div class="footer_line justify-content-center "></div>
                                        </div>
                                    </div>
                                    <b>
                                        <div class="mb-3">
                                            <span class="text-left">Total service time</span>
                                            <span class="text-right TotalHour"></span>
                                        </div>
                                    </b>
                                    <hr>
                                    <div class="mb-3">
                                        <span class="text-left">Per cleaning</span>
                                        <span class="text-right"><b>€ 19.00</b></span>
                                    </div>
                                    <!-- <div>
                                        <span class="text-left">Discount</span>
                                        <span class="text-right"><b>- €15.00</b></span>
                                    </div> -->
                                    <hr>
                                    <div>
                                        <span class="text-left text-blue">Lump sum Price</span>
                                        <span class="text-right text-price-blue">
                                            <label for="" id="TotalPrice"></label>
                                        </span>
                                    </div>
                                    <div>According to § 19 UStG, no value added tax is charged.</div>
                                    <!-- <div class="mt-3">
                                        <span class="text-left">Effective Price</span>
                                        <span class="text-right"><b>€35.70</b></span>
                                    </div>
                                    <div class="mt-1">
                                        <span class="text-red">*</span>You will save 20% according to §35a EStG.
                                    </div> -->
                                </div>
                            </div>
                            <span class="basic-service"><img src="../assets/img/smiley.png"> See what is always
                                included</span>
                        </div>

                        <div class="mt-4">
                            <div class="text-center font-24">
                                <b>Questions?</b>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <ul class="ul-li">

                                    <li class="padded" onclick="rotateImage" data-toggle="collapse"
                                        href="#collapseExample1" role="button" aria-expanded="true"
                                        aria-controls="collapseExample1">
                                        Which Helperland professional will my place? </li>

                                    <div class="collapse" id="collapseExample1" data-parent="#accordionExample">
                                        <div class="li-bottom-contain">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet porro ex
                                            atque, ipsam, quisquam eligendi, consectetur fugit perspiciatis quo
                                            explicabo aliquid accusantium! At, quisquam? Saepe sit quasi voluptas magnam
                                            ipsa.
                                        </div>
                                    </div>
                                    <hr>

                                    <li class="padded" data-toggle="collapse" href="#collapseExample2" role="button"
                                        aria-expanded="false" aria-controls="collapseExample2">
                                        Which Helperland professional will my place? </li>

                                    <div class="collapse" id="collapseExample2" data-parent="#accordionExample">
                                        <div class="li-bottom-contain">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet porro ex
                                            atque, ipsam, quisquam eligendi, consectetur fugit perspiciatis quo
                                            explicabo aliquid accusantium! At, quisquam? Saepe sit quasi voluptas magnam
                                            ipsa.
                                        </div>
                                    </div>
                                    <hr>

                                    <li class="padded" data-toggle="collapse" href="#collapseExample3" role="button"
                                        aria-expanded="false" aria-controls="collapseExample3">
                                        Which Helperland professional will my place? </li>

                                    <div class="collapse" id="collapseExample3" data-parent="#accordionExample">
                                        <div class="li-bottom-contain">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet porro ex
                                            atque, ipsam, quisquam eligendi, consectetur fugit perspiciatis quo
                                            explicabo aliquid accusantium! At, quisquam? Saepe sit quasi voluptas magnam
                                            ipsa.
                                        </div>
                                    </div>
                                    <hr>

                                    <li class="padded" data-toggle="collapse" href="#collapseExample4" role="button"
                                        aria-expanded="false" aria-controls="collapseExample4">
                                        Which Helperland professional will my place? </li>

                                    <div class="collapse" id="collapseExample4" data-parent="#accordionExample">
                                        <div class="li-bottom-contain">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet porro ex
                                            atque, ipsam, quisquam eligendi, consectetur fugit perspiciatis quo
                                            explicabo aliquid accusantium! At, quisquam? Saepe sit quasi voluptas magnam
                                            ipsa.
                                        </div>
                                    </div>
                                    <hr>

                                    <li class="padded" data-toggle="collapse" href="#collapseExample5" role="button"
                                        aria-expanded="false" aria-controls="collapseExample5">
                                        Which Helperland professional will my place? </li>

                                    <div class="collapse" id="collapseExample5" data-parent="#accordionExample">
                                        <div class="li-bottom-contain">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet porro ex
                                            atque, ipsam, quisquam eligendi, consectetur fugit perspiciatis quo
                                            explicabo aliquid accusantium! At, quisquam? Saepe sit quasi voluptas magnam
                                            ipsa.
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mt-2 font-18 text-blue">
                                        <a href="<?= $base_url."?controller=Helperland&function=FAQ"?>"
                                            class="text-decoration-none">For more help</a>
                                    </div>
                                </ul>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

        </div>
    </section>

    <?php include 'newslatter.php' ?>

    <?php include 'footer.php';?>