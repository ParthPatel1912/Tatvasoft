<?php 
        include 'header_notification.php';
        
        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=CustomerServiceDashboard";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=CustomerServiceDashboard";
        }
    ?>
<title>Service History</title>

<section id="service-history-welcome">
    <div class="container">
        <div class="row text-center">
            <h1> Welcome, <b>
                    <?php 
                        if (isset($_SESSION['UserName'])) { 
                            echo $_SESSION['UserName'];   
                        }
                        else{
                            echo 'Coustomer';
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
                <div class="side-menu-item  side-menu-item-active">
                    
                        Dashboard
                </div>
                <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=ServiceHistory"?>"
                        class="style-none text-white">
                        Service History
                    </a>
                </div>
                <div class="side-menu-item">
                    Service Schedule
                </div>
                <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=FavouriteProns"?>"
                        class="style-none text-white">
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
            <div class="col-md-8 table-responsive-lg table-responsive-md table-responsive-sm table-responsive">
                <div>
                    <span class="font-24"> <b> Current Service Requests </b> </span>
                    <span class="float-right">
                        <a href="<?= $base_url."?controller=Helperland&function=BookService"?>">
                            <input type="button" class="btn dark-blue btn-sm rounded-pill"
                                value="Add new Service Request"></td>
                        </a>
                    </span>
                </div>
                <table id="customer-service-dashboard"
                    class="table table-responsive-lg table-responsive-md table-responsive-sm table-responsive"
                    style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Service ID</th>
                            <th>Service Date</th>
                            <th>Service Provider</th>
                            <th>Payment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="DashboardData">
                        <!-- <tr>
                            <td>1</td>
                            <td class="flex text-left">
                                <div><img src="../assets/img/calendar2.png"><b> 09/04/2018</b> </div>
                                <span>12:00 - 18:00</span>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>
                                    <div><span class="d-block"> lyun Waston </span>
                                        <div class="padding-star">
                                            <img src="../assets/img/star1.png" class="service-history-star-icon">
                                            <img src="../assets/img/star1.png" class="service-history-star-icon">
                                            <img src="../assets/img/star1.png" class="service-history-star-icon">
                                            <img src="../assets/img/star1.png" class="service-history-star-icon">
                                            <img src="../assets/img/star2.png" class="service-history-star-icon"> 4
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="font-blue font-18">
                                <div class="bold-blue"> <b>€63</b> </div>
                            </td>
                            <td>
                                <input type="button" class="btn dark-blue btn-sm rounded-pill Reschedule"
                                    value="Reschedule">
                                <input type="button" class="btn lite-red btn-sm rounded-pill Cancel" value="Cancel">
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Full details model -->

<div class="modal fade" id="fullDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="">
                    Service Details
                </h4>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <b>
                    <span id="ServiceStartDate"></span>&nbsp;
                    <span id="ServiceTime"></span>
                </b>
                <div>Duration : 
                    <span id="TotalHour"></span>
                </div>

                <hr>

                <div>Service ID : 
                    <span id="ServiceRequestId"></span>
                </div>
                <div>Extra service : 
                    <span id="service"></span>
                </div>
                <div>net amount : 
                    <span class="text-price-blue" id="TotalCost"></span>
                </div>

                <hr>

                <div>Service Address : 
                    <span id="Address"></span>
                </div>
                <div>Billing Address : 
                    <span>Same as cleaning Address</span>
                </div>
                <div>Phone no: 
                    <span id="Mobile"></span>
                </div>
                <div>Email : 
                    <span id="Email"></span>
                </div>
                <div>Coments : 
                    <span id="Comments"></span>
                </div>
                <div>
                    <span id="HasPets"></span>
                </div>

                <hr>

                <input type="button" id="" data-target="#rescheduleTimeDate" data-toggle="modal" data-dismiss="modal" class="btn dark-blue btn-sm rounded-pill Reschedule" value="Reschedule">
                <input type="button" id="" data-target="#cancelService" data-toggle="modal" data-dismiss="modal" class="btn lite-red btn-sm rounded-pill Cancel" value="Cancel">
            </div>

        </div>
    </div>
</div>

<!-- reschedule time -->

<div class="modal fade" id="rescheduleTimeDate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="">
                    Reschedule Service Request
                </h4>
                <button type="button" class="btn-close btn-danger close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="totaltime" hidden></div>
                <div class="error21Hour text-red"></div>
                <label for="" class="mb-2">Select New Time & Date</label>
                <div class="row">
                    <div class="col-md-7">
                        <input type="date" id="date" name="date" class="form-control"
                            value="">
                    </div>
                    <div class="col-md-5 selectdiv">
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
                <input type="button" data-dismiss="modal" class="btn rounded-pill active font-white mt-3 col-md-12 update" data-dismiss="modal" id="" value="Update">
            </div>
        </div>
    </div>
</div>

<!-- cancel service -->

<div class="modal fade" id="cancelService" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="">
                    Cancel Service Request
                </h4>
                <button type="button" class="btn-close btn-danger close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="totaltime" hidden></div>
                <div class="error21Hour text-red"></div>
                <label for="" class="mb-2">Why do you want to cancel the service</label>
                <div class="row">
                    <div class="col-md-6 me-3">
                        <textarea id="cancelComment" cols="30" rows="3"></textarea>
                    </div>
                </div>
                <input type="button" id="" data-dismiss="modal" class="btn rounded-pill active font-white mt-3 col-md-12 cancel" data-dismiss="modal" value="Cancel Now">
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';?>