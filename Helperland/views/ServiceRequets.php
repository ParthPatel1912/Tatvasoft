    <?php 
        include 'header_admin.php';
    
        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=ServiceRequets";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=ServiceRequets";
        }
    ?>
    <title>Service Requests</title>

    <section id="admin-pannel">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 side-menu-bar">
                    <div class="border-bottom-admin">
                        Service Management
                    </div>
                    <div class="border-bottom-admin">
                        Role Management
                    </div>
                    <div class="border-bottom-admin selectdiv-sidemenu" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Coupon Code &nbsp;&nbsp; Management
                        <div class="collapse" id="collapseExample">
                            <div>
                                <div class="content">Coupon Code </div>
                                <div class="content">Usage History</div>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom-admin">
                        Escalation Management
                    </div>
                    <div class="border-bottom-admin">
                        <a class="side-menu-link font-blue" style="color: #1D7A8C;" href="#">Service Requests</a>
                    </div>
                    <div class="border-bottom-admin">
                        Service Providers
                    </div>
                    <div class="border-bottom-admin">
                        <a class="side-menu-link" href="../9 User Management/UserManagement.html">User Management</a>
                    </div>
                    <div class="border-bottom-admin selectdiv-sidemenu" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                        Finance Module
                        <div class="collapse" id="collapseExample2">
                            <div>
                                <div class="content">All Transactions</div>
                                <div class="content">Generate Payment</div>
                                <div class="content">Customer Invoices</div>
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom-admin">
                        Zip Code Management
                    </div>
                    <div class="border-bottom-admin">
                        Rating Management
                    </div>
                    <div class="border-bottom-admin">
                        Inquiry Management
                    </div>
                    <div class="border-bottom-admin">
                        Newsletter Management
                    </div>
                    <div class="border-bottom-admin selectdiv-sidemenu" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                        Content Management
                        <div class="collapse" id="collapseExample3">
                            <div>
                                <div class="content" href="#">Blog</div>
                                <a class="content side-menu-link" href="../2 FAQ/FAQ.html">FAQs</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-10 admin-pannel-content">
                    <div class="m-1">
                        <h2 class="d-inline"> Service Requests </h2>
                    </div>
                    <div class="p-3 mb-3 white-background">
                        <div class="row ">
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Service ID">
                            </div>
                            <div class="col-md-2 selectdiv">
                                <select name="Customer" class="form-control text-color-gray">
                                    <option value="customer">Customer </option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                  </select>
                            </div>
                            <div class="col-md-2 selectdiv">
                                <select name="Service Provider" class="form-control text-color-gray">
                                    <option value="serviceprovider">Service Provider </option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                  </select>
                            </div>
                            <div class="col-md-2">
                                <!-- <input type="date" name="fromdate" value="" class="form-control text-color-gray" placeholder="From Date"> -->
                                <input type="text" placeholder="From Date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
                            <div class="col-md-2">
                                <!-- <input type="date" name="todate" value="" class="form-control text-color-gray" placeholder="To Date"> -->
                                <input type="text" placeholder="To Date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
                            <div class="col-md-1">
                                <a href="#" class="btn btn-md btn-admin">Search</a>
                            </div>
                            <div class="col-md-1">
                                <a href="#" class="btn white-background btn-md btn-outline-dark">Clear</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-lg table-responsive-md table-responsive-sm table-responsive row" style="width:100%">
                        <div class="col-md-12">
                            <table id="service-requets" class="table">
                                <thead>
                                    <tr>
                                        <th>Service ID </th>
                                        <th>Service date</th>
                                        <th>Customer details</th>
                                        <th> Service provider</th>
                                        <th>Status </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
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
                                        <td></td>
                                        <td class="text-center"> <span class="New" id="new">New</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_new"> </td>

                                    </tr>
                                    <tr>
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
                                        <td></td>
                                        <td class="text-center"> <span class="New" id="new">New</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_new"> </td>

                                    </tr>
                                    <tr>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>
                                                <div><span class="d-block padding-star"> lyun Waston </span>
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
                                        <td class="text-center"> <span class="Pending" id="pending">Pending</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_pending"> </td>

                                    </tr>
                                    <tr>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>
                                                <div><span class="d-block padding-star"> lyun Waston </span>
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
                                        <td class="text-center"> <span class="Pending" id="pending">Pending</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_pending"> </td>

                                    </tr>
                                    <tr>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>
                                                <div><span class="d-block padding-star"> lyun Waston </span>
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
                                        <td class="text-center"> <span class="Completed" id="completed">Completed</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_completed"> </td>

                                    </tr>
                                    <tr>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>
                                                <div><span class="d-block padding-star"> lyun Waston </span>
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
                                        <td class="text-center"> <span class="Completed" id="completed">Completed</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_completed"> </td>

                                    </tr>
                                    <tr>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>
                                                <div><span class="d-block padding-star"> lyun Waston </span>
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
                                        <td class="text-center"> <span class="Cancelled" id="cancelled">Cancelled</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_cancelled"> </td>

                                    </tr>
                                    <tr>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>
                                                <div><span class="d-block padding-star"> lyun Waston </span>
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
                                        <td class="text-center"> <span class="Completed" id="completed">Completed</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_completed"> </td>

                                    </tr>
                                    <tr>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>
                                                <div><span class="d-block padding-star"> lyun Waston </span>
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
                                        <td class="text-center"> <span class="Cancelled" id="cancelled">Cancelled</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_cancelled"> </td>

                                    </tr>
                                    <tr>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>
                                                <div><span class="d-block padding-star"> lyun Waston </span>
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
                                        <td class="text-center"> <span class="Completed" id="completed">Completed</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_completed"> </td>

                                    </tr>
                                    <tr>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>
                                                <div><span class="d-block padding-star"> lyun Waston </span>
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
                                        <td class="text-center"> <span class="Completed" id="completed">Completed</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_completed"> </td>

                                    </tr>
                                    <tr>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>
                                                <div><span class="d-block padding-star"> lyun Waston </span>
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
                                        <td class="text-center"> <span class="Completed" id="completed">Completed</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_completed"> </td>

                                    </tr>
                                    <tr>
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
                                        <td>
                                            <div class="d-flex">
                                                <div class="service-history-icon d-flex"><img src="../assets/img/cap.png"></div>
                                                <div><span class="d-block padding-star"> lyun Waston </span>
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
                                        <td class="text-center "> <span class="Completed" id="completed">Completed</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_completed"> </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer_admin.php';?>