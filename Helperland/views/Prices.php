    <?php 
        include 'header.php';

        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=Prices";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=Prices";
        }
    ?>
    <title>Prices</title>

    <section class="bannerimage" id="bannerimage">
        <div class="img-fluid">
            <img src="../assets/img/group-18.png" class="img-fluid" height="370px" width="1560px">
        </div>
    </section>

    <section class="container-fluid">
        <div class="text-center">
            <div class=" justify-content-center align-self-center">
                <h2 class="headingfont"> Prices</h2>
                <div class="separator-line"></div>
                <img src="../assets/img/forma-1-copy-5.png" style="padding-top: 5px;">
                <div class="separator-line"></div>
            </div>
        </div>

        <div class="row text-center justify-content-center">
            <div class="col-md-4 pt-3">
                <div class="card mb-3">
                    <span class="onetime">ONE TIME</span>
                    <div class="card-body">
                        <span class="card-text euro">
                            € 20/hr
                        </span>

                        <ul class="ul-li-right">
                            <li>
                                Lower prices
                            </li>
                            <li>
                                Easy online & secure payment
                            </li>
                            <li>
                                Easy amendment
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row w-100 container-fluid text-center justify-content-center">
        <div class="text-center">
            <div class=" justify-content-center align-self-center">
                <div class="extraservicesline justify-content-center"></div>
            </div>
        </div>

        <div class="text-center">
            <div class=" justify-content-center align-self-center">
                <h2 class="headingfont"> Extra services</h2>
                <div class="separator-line"></div>
                <img src="../assets/img/forma-1-copy-5.png" style="padding-top: 5px;">
                <div class="separator-line"></div>
            </div>
        </div>

        <div class="row col-md-10 text-center justify-content-center">
            <div class="service-box col-md-2">
                <div class="circle">
                    <img src="../assets/img/1.png" alt="">
                </div>
                <h6 class="circle_contain mb-0">Inside cabinets</h6>
                <h6 class="circle_contain_blue">30 minutes</h6>
            </div>
            <div class="service-box col-md-2">
                <div class="circle">
                    <img src="../assets/img/2.png" alt="">
                </div>
                <h6 class="circle_contain mb-0">Inside fridge</h6>
                <h6 class="circle_contain_blue">30 minutes</h6>
            </div>
            <div class="service-box col-md-2">
                <div class="circle">
                    <img src="../assets/img/3.png" style="padding-top:5px;" alt="">
                </div>
                <h6 class="circle_contain mb-0">Inside oven</h6>
                <h6 class="circle_contain_blue">30 minutes</h6>
            </div>
            <div class="service-box col-md-2">
                <div class="circle">
                    <img src="../assets/img/4.png" alt="">
                </div>
                <h6 class="circle_contain mb-0">Laundry Wash dry</h6>
                <h6 class="circle_contain_blue">30 minutes</h6>
            </div>
            <div class="service-box col-md-2">
                <div class="circle">
                    <img src="../assets/img/5.png" alt="">
                </div>
                <h6 class="circle_contain mb-0">Interior windows</h6>
                <h6 class="circle_contain_blue">30 minutes</h6>
            </div>
        </div>
    </section>

    <section class="whatweinclude container-fluid justify-content-center">
        <div class="text-center" style="padding-top: 70px;">
            <div class=" justify-content-center align-self-center">
                <h2 class="headingfont"> What we include in cleaning</h2>
                <div class="separator-line"></div>
                <img src="../assets/img/forma-1-copy-5.png" style="padding-top: 5px;">
                <div class="separator-line"></div>
            </div>
        </div>

        <div class="row justify-content-center pt-5">
            <div class="col-md-3 whatweinclude_col">
                <div class="">
                    <img src="../assets/img/group-18_3.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-color-gray">Bedroom and Living Room</h5>
                        <p class="xxx">
                            <ul class="ul-li-arrow">
                                <li>Dust all accessible surfaces</li>
                                <li>Wipe down all mirrors and glass fixtures</li>
                                <li> Clean all floor surfaces </li>
                                <li>Take out garbage and recycling</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <img src="../assets/img/group-18_4.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-color-gray">Bathrooms</h5>
                        <p class="card-text">
                            <ul class="ul-li-arrow">
                                <li>Wash and sanitize the toilet, shower, tub</li>
                                <li>Dust all accessible surfaces </li>
                                <li>Wipe down all mirrors and glass fixtures </li>
                                <li>Clean all floor surfaces </li>
                                <li>Take out garbage and recycling</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 whatweinclude_col">
                <div class="">
                    <img src="../assets/img/group-18_2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-color-gray">Kitchen</h5>
                        <p class="card-text">
                            <ul class="ul-li-arrow">
                                <li>Empty sink and load up dishwasher </li>
                                <li>Dust all accessible surfaces</li>
                                <li>Wipe down all mirrors and glass fixtures</li>
                                <li> Clean all floor surfaces </li>
                                <li>Take out garbage and recycling</li>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="whyhyperland">
        <div class="text-center">
            <div class=" justify-content-center align-self-center">
                <h2 class="headingfont"> Why Helperland</h2>
                <div class="separator-line"></div>
                <img src="../assets/img/forma-1-copy-5.png" style="padding-top: 5px;">
                <div class="separator-line"></div>
            </div>
        </div>

        <div class="container">
            <br>
            <div class="row justify-content-center">
                <div class="col-md-3 text-right">
                    <h6 class="text-right-gray text-bold-gray">Experienced and vetted professionals</h6>
                    <p class="text-right-gray font-14"> dominate the industry in scale and scope with an adaptable, extensive network that consistently delivers exceptional results.</p>

                    <h6 class="text-right-gray text-bold-gray">Dedicated customer service</h6>
                    <p class="text-right-gray font-14"> to our customers and are guided in all we do by their needs. The team is always happy to support you and offer all the information. you need.</p>

                </div>
                <div class="col-md-3 text-center">
                    <img src="../assets/img/the-best-img-1.png" class="img-fluid">
                </div>
                <div class="col-md-3">
                    <h6 class="text-left-gray text-bold-gray">Every cleaning is insured</h6>
                    <p class="text-left-gray font-14"> and seek to provide exceptional service and engage in proactive behavior. We‘d be happy to clean your homes.</p>
                    <h6 class="text-left-gray text-bold-gray">Secure online payment</h6>
                    <p class="text-left-gray font-14"> Payment is processed securely online. Customers pay safely online and manage the booking.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'newslatter.php' ?>

    <?php include 'footer.php';?>