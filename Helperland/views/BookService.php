    <?php include'header.php';?>
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
                    <div>
                        <button class="btn services-selected" id="setupservice" value="0" onclick="gotobacksetupservice()"><img src="../assets/img/setup-service-white.png"> Set up Service
                            <div class="arrow-down" id="arrow-setupservice"></div>
                        </button>
                        <button class="btn services" value="1" id="scheduleplan" onclick="gotobackscheduleplan()"><img src="../assets/img/schedule.png"> Schedule & Plan
                            <div class="arrow-down" id="arrow-scheduleplan"></div>
                        </button>
                        <button class="btn services" value="2" id="details" onclick="gotobackyourdetails()"><img src="../assets/img/details.png"> Details
                            <div class="arrow-down" id="arrow-detail"></div>
                        </button>
                        <button class="btn services" value="3" id="payment"><img src="../assets/img/payment.png"> Make Payment
                            <div class="arrow-down" id="arrow-payment"></div>
                        </button>
                    </div>
                </div>

                <section id="setupservicetab" class="container-fluid">
                    <div class="row mt-4">
                        <b>Please enter your postal code:</b>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Postal Code">
                        </div>
                        <div class="col-md-6">
                            <button type="button " class="btn rounded-pill active font-white" onclick="gotoscheduleplan()"><b>Check availability</b></button>
                        </div>
                    </div>
                </section>

                <section id="scheduleplantab" class="container-fluid">
                    <div class="row mt-4">
                        <b>Select numberof rooms and bath</b>
                        <div class="col-md-2">
                            <select class="form-control">
                                <option value="bed1">bed 1</option>
                                <option value="bed2">bed 2</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control">
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
                                <div class="col-md-4">
                                    <input type="text" placeholder="01/01/2018" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')">
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control">
                                        <option value="1">1:00</option>
                                        <option value="2">2:00</option>
                                        <option value="3">3:00</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <b>How long to you need for cleaner stay?</b>

                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control">
                                    <option value="1">1.0 Hrs</option>
                                    <option value="2">2.0 Hrs</option>
                                    <option value="3">3.0 Hrs</option>
                                    <option value="4">4.0 Hrs</option>
                                    <option value="5">5.0 Hrs</option>
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
                                    <input type="hidden" value="notselected" class="hidden-input">
                                    <img src="../assets/img/1.png" alt="" class="img-book-service">
                                </div>
                                <h6 class="circle_text mb-0">Inside cabinets</h6>

                            </div>
                            <div class="service-box col-md-2" onclick="checkIfSelected(1)" value="1">
                                <div class="btn circle">
                                    <input type="hidden" value="notselected" class="hidden-input">
                                    <img src="../assets/img/2.png" alt="" class="img-book-service">
                                </div>
                                <h6 class="circle_text mb-0">Inside fridge</h6>

                            </div>
                            <div class="service-box col-md-2" onclick="checkIfSelected(2)" value="1">
                                <div class="btn circle">
                                    <input type="hidden" value="notselected" class="hidden-input">
                                    <img src="../assets/img/3.png" style="padding-top:5px;" alt="" class="img-book-service">
                                </div>
                                <h6 class="circle_text mb-0">Inside oven</h6>

                            </div>
                            <div class="service-box col-md-2" onclick="checkIfSelected(3)" value="1">
                                <div class="btn circle">
                                    <input type="hidden" value="notselected" class="hidden-input">
                                    <img src="../assets/img/4.png" alt="" class="img-book-service">
                                </div>
                                <h6 class="circle_text mb-0">Laundry Wash dry</h6>

                            </div>
                            <div class="service-box col-md-2" onclick="checkIfSelected(4)" value="1">
                                <div class="btn circle">
                                    <input type="hidden" value="notselected" class="hidden-input">
                                    <img src="../assets/img/5.png" alt="" class="img-book-service">
                                </div>
                                <h6 class="circle_text mb-0">Interior windows</h6>

                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="mt-4">
                        <b>Comments</b>
                        <textarea name="comment" class="form-control" id="" cols="10" rows="3"></textarea>
                    </div>

                    <div class="mt-4">
                        <input type="checkbox"> I accept <span class="font-blue">I have pets at home</span>
                    </div>

                    <div class="mt-4 float-right">
                        <button type="button " class="btn rounded-pill active font-white" onclick="gotoyourDetails()"><b>Continue</b></button>
                    </div>

                </section>

                <section id="detailstab" class="container-fluid">
                    <div class="row mt-4">
                        <h6>Please enter your address so that your helper can find you.</h6>
                        <div class="col-md-6 border form-control">
                            <input type="radio" name="address" id="address">
                            <label for="address"> <b> Address:</b> street 2 40, Troisdorf 53844
                                <br/>
                               <b>Phone number:</b> 9988556644
                            </label>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="button " class="btn rounded-pill activehover "><b>+ Add new Address</b></button>
                    </div>

                    <div class="mt-4">
                        <input type="checkbox" name="" id="">My billing address is different from the address I provided.
                    </div>

                    <hr>

                    <div class="mt-4 float-right">
                        <button type="button " class="btn rounded-pill active font-white" onclick="gotomakepayment()"><b>Continue</b></button>
                    </div>
                </section>

                <section id="paymenttab" class="container-fluid">
                    <div class="mt-4">
                        <b>Choose one of the following payment methods.</b>
                    </div>

                    <div class="row mt-4">
                        <h6>Discount code (optional)</h6>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Do you have a discount code">
                        </div>
                        <div class="col-md-3">
                            <button type="button " class="btn rounded-pill activehover"><b>Apply</b></button>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-3">
                        <div>
                            <input type="text" class="form-control" placeholder="Card number                                   mm / dd / yyyy">
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
                        <input type="checkbox" name="" id=""> I accepted terms and conditions, the cancellation policy and the privacy policy. I confirm that Helperland begins with the execution of the contract before the expiry of the revocation period
                        and that I lose my right of withdrawal as a consumer with full fulfillment of the contract.
                    </div>

                    <hr>

                    <div class="float-right mt-4">
                        <button type="button " class="btn rounded-pill active font-white"><b>Complete Booking</b></button>

                    </div>
                </section>

            </div>

            <div class="col-md-4 payment">

                <section class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="card mb-3">
                            <span class="paymentheading"><b>Payment Overview</b></span>
                            <div class="card-body">
                                <div>12/01/2022 08:00</div>
                                <div>Duration</div>
                                <div class="row">
                                    <div>
                                        <span class="text-left">Basic</span>
                                        <span class="text-right">3 Hours</span>
                                    </div>
                                    <div>
                                        <span class="text-left">Basic Inside cabinets (extra)</span>
                                        <span class="text-right">30 Minutes</span>
                                    </div>
                                    <div class="text-center ">
                                        <div class=" justify-content-center align-self-center ">
                                            <div class="footer_line justify-content-center "></div>
                                        </div>
                                    </div>
                                    <b>
                                        <div class="mb-3">
                                            <span class="text-left">Total service time</span>
                                            <span class="text-right">35 Hours</span>
                                        </div> 
                                    </b>
                                    <hr>
                                    <div class="mb-3">
                                        <span class="text-left">Per cleaning</span>
                                        <span class="text-right"><b>€54.00</b></span>
                                    </div>
                                    <div>
                                        <span class="text-left">Discount</span>
                                        <span class="text-right"><b>- €15.00</b></span>
                                    </div>
                                    <hr>
                                    <div>
                                        <span class="text-left text-blue">Lump sum Price</span>
                                        <span class="text-right text-price-blue">€39.00</span>
                                    </div>
                                    <div>According to § 19 UStG, no value added tax is charged.</div>
                                    <div class="mt-3">
                                        <span class="text-left">Effective Price</span>
                                        <span class="text-right"><b>€35.70</b></span>
                                    </div>
                                    <div class="mt-1">
                                        <span class="text-red">*</span>You will save 20% according to §35a EStG.
                                    </div>
                                </div>
                            </div>
                            <span class="basic-service"><img src="../assets/img/smiley.png">See what is always included</span>
                        </div>

                        <div class="mt-4">
                            <div class="text-center font-24">
                                <b>Questions?</b>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <ul class="ul-li">

                                    <li class="padded" onclick="rotateImage" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="true" aria-controls="collapseExample1">
                                        Which Helperland professional will my place? </li>

                                    <div class="collapse" id="collapseExample1" data-parent="#accordionExample">
                                        <div class="li-bottom-contain">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet porro ex atque, ipsam, quisquam eligendi, consectetur fugit perspiciatis quo explicabo aliquid accusantium! At, quisquam? Saepe sit quasi voluptas magnam ipsa.
                                        </div>
                                    </div>
                                    <hr>

                                    <li class="padded" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                        Which Helperland professional will my place? </li>

                                    <div class="collapse" id="collapseExample2" data-parent="#accordionExample">
                                        <div class="li-bottom-contain">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet porro ex atque, ipsam, quisquam eligendi, consectetur fugit perspiciatis quo explicabo aliquid accusantium! At, quisquam? Saepe sit quasi voluptas magnam ipsa.
                                        </div>
                                    </div>
                                    <hr>

                                    <li class="padded" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                                        Which Helperland professional will my place? </li>

                                    <div class="collapse" id="collapseExample3" data-parent="#accordionExample">
                                        <div class="li-bottom-contain">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet porro ex atque, ipsam, quisquam eligendi, consectetur fugit perspiciatis quo explicabo aliquid accusantium! At, quisquam? Saepe sit quasi voluptas magnam ipsa.
                                        </div>
                                    </div>
                                    <hr>

                                    <li class="padded" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                                        Which Helperland professional will my place? </li>

                                    <div class="collapse" id="collapseExample4" data-parent="#accordionExample">
                                        <div class="li-bottom-contain">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet porro ex atque, ipsam, quisquam eligendi, consectetur fugit perspiciatis quo explicabo aliquid accusantium! At, quisquam? Saepe sit quasi voluptas magnam ipsa.
                                        </div>
                                    </div>
                                    <hr>

                                    <li class="padded" data-toggle="collapse" href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample5">
                                        Which Helperland professional will my place? </li>

                                    <div class="collapse" id="collapseExample5" data-parent="#accordionExample">
                                        <div class="li-bottom-contain">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet porro ex atque, ipsam, quisquam eligendi, consectetur fugit perspiciatis quo explicabo aliquid accusantium! At, quisquam? Saepe sit quasi voluptas magnam ipsa.
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mt-2 font-18 text-blue">
                                        For more help
                                    </div>
                                </ul>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

        </div>
    </section>

    <section class="newslatter ">
        <div class="container-fluid ">
            <div class="row justify-content-center ">
                <div class="col-md-1 ">
                    <a href="#"><i class="bi bi-arrow-up-circle newslatter-size " style="height: 42px; "></i></a>
                </div>
                <div class="col-md-2 "></div>
                <div class="col-md-6 ">
                    <h3>Get Our Newsletter</h3>
                    <input type="email " placeholder="Your Email ">
                    <button class="btn btn-sm ">Submit</button>
                </div>
                <div class="col-md-2 "></div>
                <div class="col-md-1 ">
                    <img class="img-fluid " src="../assets/img/layer-598.png ">
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php';?>