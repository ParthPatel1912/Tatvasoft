<?php 
        include 'header_notification.php';

        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=UpcomingServices";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=UpcomingServices";
        }
    ?>
    <title>Service History</title>

    <section id="Upcoming-service-welcome">
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

    <section id="Upcoming-service-list">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-2 service-menu">
                    <div class="side-menu-item">
                        
                            Dashboard
                    </div>
                    <div class="side-menu-item">
                        <a href="<?= $base_url."?controller=Helperland&function=NewServiceRequests"?>"
                            class="style-none text-white">
                            New Service
                        </a>
                    </div>
                    <div class="side-menu-item">
                        <a href="<?= $base_url."?controller=Helperland&function=UpcomingServices"?>"
                                class="style-none text-white">
                            Upcoming Services
                        </a>
                    </div>
                    <div class="side-menu-item">
                        Service Schedule
                    </div>
                    <div class="side-menu-item side-menu-item-active">
                       Service History 
                    </div>
                    <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=ServiceProviderRating"?>" class="style-none text-white border-0">My Ratings</a>
                    </div>
                    <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=BlockCustomer"?>" class="style-none text-white border-0">Block Customer</a>
                    </div>
                </div>
                <div class="col-md-8 table-responsive-lg table-responsive-md table-responsive-sm table-responsive">
                    <div>
                        <span class="float-right">
                            <button type="button" class="btn dark-blue btn-sm rounded-pill" id="btnExport" value="Export">Export</button>
                        </span>
                    </div>
                    <table id="service-history-SP" class="display table-responsive-lg table-responsive-md table-responsive-sm table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>Service ID</th>
                                <th>Service Data</th>
                                <th>Coustomre details</th>
                            </tr>
                        </thead>
                        <tbody id="ServiceHistoryforSP">
                            <!-- <tr>
                                <td>323436 </td>
                                <td class="flex">
                                    <div class="bold"><img src="../assets/img/calendar2.png">
                                        <span class="padding">09/04/2018</span>
                                    </div>
                                    <div><img src="../assets/img/layer-14.png">
                                        <span class="padding">12:00 - 18:00 </span>
                                    </div>
                                </td>
                                <td>
                                    David Bough
                                    <div><img src="../assets/img/layer-719.png">
                                        <span class="padding">Musterstrabe 5,12345 Bonn</span>
                                    </div>
                                </td>
                            </tr> -->
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Full details model -->

    <div class="modal fade" id="ServiceHistoryDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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

                    <div>Coustomer Name : 
                        <span id="coustomerName"></span>
                    </div>
                    <div>Service Address : 
                        <span id="Address"></span>
                    </div>
                    <div>Coments : 
                        <span id="Comments"></span>
                    </div>
                    <div>
                        <span id="HasPets"></span>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <?php include 'footer.php';?>