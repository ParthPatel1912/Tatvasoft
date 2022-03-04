    <?php 
        include 'header_notification.php';
        
        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=ServiceHistory";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=ServiceHistory";
        }
    ?>
    <title>Service History</title>

    <section id="service-history-welcome">
        <div class="container">
            <div class="row text-center">
                <h1> Welcome, <b>Gaurang!</b></h1>
            </div>
        </div>
    </section>

    <section id="service-history-list">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-2 service-menu">
                    <div class="side-menu-item">
                        <a href="<?= $base_url."?controller=Helperland&function=CustomerServiceDashboard"?>" class="style-none text-white border-0">
                            Dashboard
                        </a>
                    </div>
                    <div class="side-menu-item  side-menu-item-active">
                        <a href="<?= $base_url."?controller=Helperland&function=ServiceHistory"?>" class="style-none text-white border-0">
                            Service History
                        </a>
                    </div>
                    <div class="side-menu-item">
                        Service Schedule
                    </div>
                    <div class="side-menu-item">
                        <a href="<?= $base_url."?controller=Helperland&function=FavouriteProns"?>" class="style-none text-white">
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
                        <span class="font-24"> <b> Service History </b> </span>
                        <span class="float-right">
                            <input type="button" class="btn dark-blue btn-sm rounded-pill" value="Export"></td>
                        </span>
                    </div>
                    <table id="service-history" class="table table-responsive-lg table-responsive-md table-responsive-sm table-responsive" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Service Id</th>
                                <th>Service Details</th>
                                <th>Service Provider</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Rate SP</th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-center" id="HistoryData">
                            <tr>
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
                                <td class="active-font">
                                    <div class="bold-blue"> <b>€63</b> </div>
                                </td>
                                <td><span class="completed"> Completed </span></td>
                                <td>
                                    <input type="button" class="btn lite-blue btn-sm rounded-pill" value="Rate SP"></td>
                            </tr>
                            <tr>
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
                                <td class="active-font">
                                    <div class="bold-blue"> <b>€63</b> </div>
                                </td>
                                <td><span class="cancelled"> Cancelled </span></td>
                                <td>
                                    <input type="button" class="btn lite-blue btn-sm rounded-pill" value="Rate SP"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Rate sp model -->

    <div class="modal fade" id="RateSP" tabindex="-1" role="dialog" aria-labelledby="RateSP" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" id="models">
                        <div class="spalldetails">
                            <div class="row ml-1">
                                <div class="col mt-3"><img src="../assets/img/forma-1-copy-19.png" class="service-provider-img"></div>
                                <div class="col">
                                    <div class="row m-3 font-18" style="width: 200px;" id="SPName"></div>
                                    <span class="STAR-AVG">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </span>
                                    <span class="info"></span>

                                </div>

                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-danger close" data-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form>
                        <h4 class="">
                            Rate Your Service Provider
                        </h4>
                        <hr class="reschedulehr">

                        <div class=" row col-md-5">
                            <label class="ratingtxt">On Time Arrival</label>

                            <span class="ratings1">
                                <i class="bi bi-star-fill" id="ratings1"></i>
                                <i class="bi bi-star-fill" id="ratings2"></i>
                                <i class="bi bi-star-fill" id="ratings3"></i>
                                <i class="bi bi-star-fill" id="ratings4"></i>
                                <i class="bi bi-star-fill" id="ratings5"></i>
                                <span class="timemsg"></span>
                            </span>
                        </div>

                        <div class=" row mt-2 col-md-5">
                            <label class="ratingtxt">Friendly</label>

                            <span class="ratings2">
                                <i class="bi bi-star-fill" id="friendly1"></i>
                                <i class="bi bi-star-fill" id="friendly2"></i>
                                <i class="bi bi-star-fill" id="friendly3"></i>
                                <i class="bi bi-star-fill" id="friendly4"></i>
                                <i class="bi bi-star-fill" id="friendly5"></i>
                                <span class="friendlymsg"></span>
                            </span>
                        </div>

                        <div class=" row mt-2 col-md-5">
                            <label for=""class="ratingtxt">Quality Of Service</label>

                            <span class="ratings3">
                                <i class="bi bi-star-fill" id="quality1"></i>
                                <i class="bi bi-star-fill" id="quality2"></i>
                                <i class="bi bi-star-fill" id="quality3"></i>
                                <i class="bi bi-star-fill" id="quality4"></i>
                                <i class="bi bi-star-fill" id="quality5"></i>
                                <span class="qualitymsg"></span>

                            </span>
                        </div>

                        <div class="form-group givefeedback mt-2">
                            <label for="feedbackcomment">Comments</label>
                            <textarea class="form-control" id="feedbackcomment" rows="2"></textarea>
                        </div>

                        <div class="col-md-4">
                            <button type="button" id="" data-dismiss="modal" class="btn rounded-pill active font-white mt-3 col-md-12 giveratting" value="">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <?php include 'footer.php';?>