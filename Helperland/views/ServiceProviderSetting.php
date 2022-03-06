<?php 
        include 'header_notification.php';
        
        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=ServiceProviderSetting";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=ServiceProviderSetting";
        }

        require_once 'message_error.php';
    ?>
<title>Service Provider Setting</title>

<section id="service-history-welcome">
    <div class="container">
        <div class="row text-center">
            <h1> Welcome, <b>
                    <?php 
                    if (isset($_SESSION['UserName'])) { 
                        echo $_SESSION['UserName'];   
                    }
                    else{
                        echo 'Service Provider';
                    }
                ?>
                </b></h1>
        </div>
    </div>
</section>

<section id="service-history-list">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2 service-menu">
                <div class="side-menu-item">
                    <!-- <a href="<?= $base_url."?controller=Helperland&function=ServiceProviderSetting"?>"
                        class="style-none text-white"> -->
                        Dashboard
                    <!-- </a> -->
                </div>
                <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=ppp"?>" class="style-none text-white">
                        Service History
                    </a>
                </div>
                <div class="side-menu-item">
                    Service Schedule
                </div>
                <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=ppp"?>" class="style-none text-white">
                        Favourite Pros
                    </a>
                </div>
                <div class="side-menu-item">
                    Invoices Notifications
                </div>
                <div class="side-menu-item">
                    Notifications
                </div>
            </div>
            <div class="col-md-8">

                <nav class="nav nav-tabs border-bottom" id="nav-tab" role="tablist">
                    <button data-toggle="tab" class="nav-link flex-sm-fill active border-bottom-blue text-blue"
                        type="button" role="tab" href="#Service-Details">My
                        Details</button>

                    <button data-toggle="tab" class="nav-link flex-sm-fill" type="button" role="tab"
                        href="#ChangePassword">Change
                        Password</button>
                </nav>


                <div class="tab-content mt-3" id="nav-tabContent">
                    <div class="tab-pane fade show active active-nav" id="Service-Details" role="tabpanel"
                        aria-labelledby="nav-home-tab">
                        <div class="row">
                            <label class="text-left text-color-gray"><b>Account Status :
                                    <label class="status"></label></b></label>
                            <label for="" class="mt-2"><b>Basic Details</b></label>

                            <div class="row col-md-12 text-right justify-content-end" style="margin-top: -70px;">
                                <div class="avtar col-md-1 text-right" onclick="" value="1">
                                    <div class="">
                                        <input type="hidden" value="notselected" class="hidden-input-avtar" id="">
                                        <img src="../assets/img/1-avtar.jpeg" alt="" class="img-avtar" id="img-avtar-main">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="w-75">

                        <form class="row g-3 mt-3 mb-4" method="POST">
                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <label for="" class="text-left text-color-gray">First Name</label>
                                    <input type="text" class="form-control" id="FirstName" placeholder="First Name"
                                        name="FirstName">
                                    <div class="text-center FirstName-error"></div>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="text-left text-color-gray">Last Name</label>
                                    <input type="text" class="form-control" id="LastName" placeholder="Last Name"
                                        name="LastName">
                                    <div class="text-center LastName-error"></div>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="text-left text-color-gray">Email Address</label>
                                    <input type="email" class="form-control " id="EmailAddress" placeholder="Email"
                                        name="EmailAddress" readonly>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <label for="" class="text-left text-color-gray">Mobile Number</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+46</div>
                                        </div>
                                        <input type="number" class="form-control" id="PhoneNumber"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            maxlength="10" placeholder="Phone Number" name="PhoneNumber">
                                    </div>
                                    <div class="text-center PhoneNumber-error"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="text-left text-color-gray">Date of Birth</label>

                                    <div class="row birth">
                                        <div class="col-md-4 selectdiv">
                                            <select id="day" class="form-control me-2" name="day">
                                                <option value="Day">Day</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 selectdiv">
                                            <select id="month" class="form-control me-2 " name="month">
                                                <option value="Month">Month</option>
                                                <option value="01">Jan</option>
                                                <option value="02">Feb</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">Aug</option>
                                                <option value="09">Sep</option>
                                                <option value="10">Oct</option>
                                                <option value="11">Nov</option>
                                                <option value="12">Dec</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 selectdiv">
                                            <select id="year" class="form-control" name="year">
                                                <option value="Year">Year</option>
                                                <option value="1940">1940</option>
                                                <option value="1941">1941</option>
                                                <option value="1942">1942</option>
                                                <option value="1943">1943</option>
                                                <option value="1944">1944</option>
                                                <option value="1945">1945</option>
                                                <option value="1946">1946</option>
                                                <option value="1947">1947</option>
                                                <option value="1948">1948</option>
                                                <option value="1949">1949</option>
                                                <option value="1950">1950</option>
                                                <option value="1951">1951</option>
                                                <option value="1952">1952</option>
                                                <option value="1953">1953</option>
                                                <option value="1954">1954</option>
                                                <option value="1955">1955</option>
                                                <option value="1956">1956</option>
                                                <option value="1957">1957</option>
                                                <option value="1958">1958</option>
                                                <option value="1959">1959</option>
                                                <option value="1960">1960</option>
                                                <option value="1961">1961</option>
                                                <option value="1962">1962</option>
                                                <option value="1963">1963</option>
                                                <option value="1964">1964</option>
                                                <option value="1965">1965</option>
                                                <option value="1966">1966</option>
                                                <option value="1967">1967</option>
                                                <option value="1968">1968</option>
                                                <option value="1969">1969</option>
                                                <option value="1970">1970</option>
                                                <option value="1971">1971</option>
                                                <option value="1972">1972</option>
                                                <option value="1973">1973</option>
                                                <option value="1974">1974</option>
                                                <option value="1975">1975</option>
                                                <option value="1976">1976</option>
                                                <option value="1977">1977</option>
                                                <option value="1978">1978</option>
                                                <option value="1979">1979</option>
                                                <option value="1980">1980</option>
                                                <option value="1981">1981</option>
                                                <option value="1982">1982</option>
                                                <option value="1983">1983</option>
                                                <option value="1984">1984</option>
                                                <option value="1985">1985</option>
                                                <option value="1986">1986</option>
                                                <option value="1987">1987</option>
                                                <option value="1988">1988</option>
                                                <option value="1989">1989</option>
                                                <option value="1990">1990</option>
                                                <option value="1991">1991</option>
                                                <option value="1992">1992</option>
                                                <option value="1993">1993</option>
                                                <option value="1994">1994</option>
                                                <option value="1995">1995</option>
                                                <option value="1996">1996</option>
                                                <option value="1997">1997</option>
                                                <option value="1998">1998</option>
                                                <option value="1999">1999</option>
                                                <option value="2000">2000</option>
                                                <option value="2001">2001</option>
                                                <option value="2002">2002</option>
                                                <option value="2003">2003</option>
                                                <option value="2004">2004</option>
                                                <option value="2005">2005</option>
                                                <option value="2006">2006</option>
                                                <option value="2007">2007</option>
                                                <option value="2008">2008</option>
                                                <option value="2009">2009</option>
                                                <option value="2010">2010</option>
                                                <option value="2011">2011</option>
                                                <option value="2012">2012</option>
                                                <option value="2013">2013</option>
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="text-center birth-error"></div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <label for="" class="text-left text-color-gray">Gender</label>
                                    <div class="gender">
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label for="male">Male</label>
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female">Femmale</label>
                                    <input type="radio" id="notdecide" name="gender" value="notdecide">
                                    <label for="notdecide">Rather not to say</label>
                                    </div>
                                    <div class="text-left gender-error"></div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12 Selectavtar">
                                    <label for="" class="text-left text-color-gray">Select Avtar</label>

                                    <div class="row col-md-12 container text-left">
                                        <div class="avtar-box col-md-1" onclick="checkavtar(0)" value="1">
                                            <div class="btn avtar">
                                                <input type="hidden" value="notselected" class="hidden-input-avtar" id="1-avtar">
                                                <img src="../assets/img/1-avtar.jpeg" alt="" class="img-avtar">
                                            </div>

                                        </div>
                                        <div class="avtar-box col-md-1" onclick="checkavtar(1)" value="1">
                                            <div class="btn avtar">
                                                <input type="hidden" value="notselected" class="hidden-input-avtar" id="2-avtar">
                                                <img src="../assets/img/2-avtar.jpeg" alt="" class="img-avtar">
                                            </div>

                                        </div>
                                        <div class="avtar-box col-md-1" onclick="checkavtar(2)" value="1">
                                            <div class="btn avtar">
                                                <input type="hidden" value="notselected" class="hidden-input-avtar" id="3-avtar">
                                                <img src="../assets/img/3-avtar.jpeg" style="padding-top:5px;" alt=""
                                                    class="img-avtar">
                                            </div>

                                        </div>
                                        <div class="avtar-box col-md-1" onclick="checkavtar(3)" value="1">
                                            <div class="btn avtar">
                                                <input type="hidden" value="notselected" class="hidden-input-avtar" id="4-avtar">
                                                <img src="../assets/img/4-avtar.jpeg" alt="" class="img-avtar">
                                            </div>

                                        </div>
                                        <div class="avtar-box col-md-1" onclick="checkavtar(4)" value="1">
                                            <div class="btn avtar">
                                                <input type="hidden" value="notselected" class="hidden-input-avtar" id="5-avtar">
                                                <img src="../assets/img/5-avtar.jpeg" alt=""
                                                    class="img-avtar">
                                            </div>
                                        </div>
                                        <div class="avtar-box col-md-1" onclick="checkavtar(5)" value="1">
                                            <div class="btn avtar">
                                                <input type="hidden" value="notselected" class="hidden-input-avtar" id="6-avtar">
                                                <img src="../assets/img/6-avtar.jpeg" alt=""
                                                    class="img-avtar">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <label for="" class="avtar-error"></label>
                            </div>

                            <hr class="mt-5">

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <label class="street">Street</label>
                                    <input type="text" class="form-control" id="AddressLine1" name="AddressLine1"
                                        placeholder="Street">
                                    <div class="AddressLine1-error"></div>
                                </div>
                                <div class="col-md-4">
                                    <label for="houseno">House number</label>
                                    <input type="text" class="form-control" id="AddressLine2" name="AddressLine2"
                                        placeholder="House Number">
                                    <div class="AddressLine2-error"></div>
                                </div>
                                <div class="col-md-4">
                                    <label class="pincode">Postal Code</label>
                                    <input type="number" minlength="6" maxlength="6"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        id="Zipcode" class="form-control" placeholder="Postal Code"
                                        name="Zipcode">
                                    <div class="Zipcode-error"></div>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-4">
                                    <label class="location">Location</label>
                                    <select class='form-control' name='CityId' id='CityId' readonly>
                                    </select>
                                    <select class='form-control' name='StateId' id='StateId' readonly hidden>
                                    </select>
                                </div>
                            </div>

                            <div class="row language mt-4">
                                <div class="col-md-4">
                                    <label for="" class="text-left text-color-gray">Prefered Language</label>
                                    <select id="Language" class="form-control" name="Language">
                                        <option value="">Language</option>
                                        <option value="1">English</option>
                                    </select>
                                    <div class="text-center language-error"></div>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="btn active rounded-pill text-white mt-3"
                                    id="save-detail" onclick="updateServiceProviderData()">Save</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade " id="ChangePassword" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <form class="row g-3 mt-3 mb-4"
                            action="<?= $base_url."?controller=ServiceProvider&function=UpdateSPPassword"?>" method="POST">
                            <div class="row mt-1">
                                <div class="col-md-5">
                                    <label for="" class="text-left text-color-gray">Old Password</label>
                                    <input type="password" class="form-control" minlength="8" maxlength="14"
                                        id="password-setting" placeholder="Old Password" name="OldPassword">
                                    <div class="text-center Password-setting-error"></div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-5">
                                    <label for="" class="text-left text-color-gray">New Password</label>
                                    <input type="password" class="form-control" minlength="8" maxlength="14"
                                        id="Password" placeholder="New Password" name="NewPassword">
                                    <div class="text-center Password-error"></div>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-5">
                                    <label for="" class="text-left text-color-gray">New Confirm Password</label>
                                    <input type="password" class="form-control" minlength="8" maxlength="14"
                                        id="ConfirmPassword" placeholder="New Confirm Password"
                                        name="NewConfirmPassword">
                                    <div class="text-center ConfirmPassword-error"></div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" id="change-password"
                                    class="btn active rounded-pill text-white mt-3">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?php include 'footer.php';?>