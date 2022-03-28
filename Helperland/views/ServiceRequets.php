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
                    <div class="border-bottom-admin selectdiv-sidemenu" data-toggle="collapse" href="#collapseExample"
                        role="button" aria-expanded="false" aria-controls="collapseExample">
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
                        <a class="side-menu-link"
                            href="<?= $base_url."?controller=Helperland&function=UserManagement"?>">User Management</a>
                    </div>
                    <div class="border-bottom-admin selectdiv-sidemenu" data-toggle="collapse" href="#collapseExample2"
                        role="button" aria-expanded="false" aria-controls="collapseExample2">
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
                    <div class="border-bottom-admin selectdiv-sidemenu" data-toggle="collapse" href="#collapseExample3"
                        role="button" aria-expanded="false" aria-controls="collapseExample3">
                        Content Management
                        <div class="collapse" id="collapseExample3">
                            <div>
                                <div class="content" href="#">Blog</div>
                                <a class="content side-menu-link"
                                    href="<?= $base_url."?controller=Helperland&function=FAQ"?>">FAQs</a>
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
                                <input type="number" class="form-control" id="ServiceID" placeholder="Service ID">
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" id="pincode" placeholder="Zipcode"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                maxlength="6">
                            </div>
                            <div class="col-md-3 selectdiv">
                                <select id="customername" name="Customer" class="form-control text-color-gray">
                                    <option selected="true" value="" disabled="disabled">Customer </option>
                                    <!-- <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option> -->
                                </select>
                            </div>
                            <div class="col-md-3 selectdiv">
                                <select id="serviceprovider" name="Service Provider"
                                    class="form-control text-color-gray">
                                    <option selected="true" value="" disabled="disabled">Service Provider </option>
                                    <!-- <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option> -->
                                </select>
                            </div>
                            <div class="col-md-2 selectdiv">
                                <select id='status' class="status form-control text-color-gray">
                                    <option value="" selected="true" disabled="disabled">Status</option>
                                    <option value='Pending'>New</option>
                                    <option value='Approved'>Pending</option>
                                    <option value='Completed'>Completed</option>
                                    <option value='Cancelled'>Cancelled</option>

                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <!-- <input type="date" name="fromdate" value="" class="form-control text-color-gray" placeholder="From Date"> -->
                                <input type="text" id="fromDate" placeholder="From Date" class="form-control"
                                    onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
                            <div class="col-md-2">
                                <!-- <input type="date" name="todate" value="" class="form-control text-color-gray" placeholder="To Date"> -->
                                <input type="text" id="toDate" placeholder="To Date" class="form-control"
                                    onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" id="searchSR" class="btn btn-md btn-admin">Search</button>
                            </div>
                            <div class="col-md-1">
                                <button id="cleanSR" class="btn btn white-background btn-md btn-outline-dark"
                                    type="reset" id="reset">Clear</button>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive-lg table-responsive-md table-responsive-sm table-responsive row"
                        style="width:100%">
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
                                        <td></td>
                                        <td class="text-center"> <span class="New" id="new">New</span></td>
                                        <td class="text-center">
                                        

                                            <a class="Actions text-center" href="#" id="navbarDropdowns"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu tooltiptext" style="color: black;" aria-labelledby="navbarDropdowns">
                                                <a class="dropdown-item" style="cursor:pointer;">Edit & Reschedule</a>
                                                <a class="dropdown-item" style="cursor:pointer;">Refund</a>
                                                <a class="dropdown-item" href="#">Cancel </a>
                                                <a class="dropdown-item" href="#">Change SP</a>
                                                <a class="dropdown-item" href="#">Escalate </a>
                                                <a class="dropdown-item" href="#">History Log</a>
                                                <a class="dropdown-item" href="#">Download Invoice </a>
                                            </div>
                                        </td>
                                    </tr> -->

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- edit & reschedule model -->

    <div class="modal fade" id="editReschedulebyAdmin" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="">
                        Edi & Reschedule Service Request
                    </h4>
                    <button type="button" class="btn-close btn-danger close" data-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="totaltime" hidden></div>
                    <div class="error21Hour text-red"></div>
                    <label for="" class="mb-2">Select New Time & Date</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" id="rescheduleDate" name="date" class="form-control" value="">
                        </div>
                        <div class="col-md-6 selectdiv">
                            <select class="form-control" id="rescheduleTime">
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

                    <div class="form-row row">
                        <div class="form-group col-md-6">
                            <label class="street">Street</label>
                            <input type="text" class="form-control" id="AddressLine1" name="AddressLine1"
                                placeholder="Street">
                            <div class="AddressLine1-error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="houseno">House number</label>
                            <input type="text" class="form-control" id="AddressLine2" name="AddressLine2"
                                placeholder="House Number">
                            <div class="AddressLine2-error"></div>

                        </div>
                    </div>

                    <div class="form-row row">
                        <div class="form-group pin col-md-6 postalcodenumber">
                            <label class="pincode">Postal Code</label>
                            <input type="number" minlength="6" maxlength="6"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                id="Zipcode" class="form-control check_zipcode" placeholder="Postal Code"
                                name="Zipcode">
                            <div class="Zipcode-error"></div>
                        </div>
                        <div class="form-group col-md-6 citylocation">
                            <label class="location">Location</label>
                            <select class='form-control' name='CityId' id='CityName' readonly>
                            </select>
                            <select class='form-control' name='StateId' id='StateName' readonly hidden>
                            </select>
                        </div>

                    </div>

                    <div class="form-row row mt-2">
                        <label for="" class="mb-2">Why do you want to reschedule the service</label>
                        <div class="row">
                            <div class="me-3">
                                <textarea id="rescheduleComment" cols="55" rows="3" placeholder="Why do you want to reschedule service request?"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="errorComment text-red"></div>

                    <input type="button" data-dismiss="modal"
                        class="btn rounded-pill active font-white mt-3 col-md-12 UPDATE" data-dismiss="modal" id=""
                        value="Update">
                </div>
            </div>
        </div>
    </div>

    <!-- Full details model -->

    <div class="modal fade" id="ServiceAllDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="">
                        Service Details
                    </h4>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                        aria-label="Close"></button>
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

    <!--Refund Modal -->
    <div class="modal fade" id="refundmodal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="">
                        Refund Amount
                    </h4>
                    <button type="button" class="btn-close btn-danger close" data-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-row row">
                        <div class="row">
                            <div class="mx-2">
                                <label>Paid Amount</label> - 
                                <label class="paid">54</label> €

                            </div>
                            <div class="mx-2">
                                <label>Refunded Amount</label> - 
                                <label class="refunded">54</label> €

                            </div>
                            <div class="mx-2">
                                <label>In Balance Amount</label> - 
                                <label class="accountbalance">54</label> €

                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Amount</label>
                            <div style="display: flex;">
                                <input type="number" class="form-control pricesinput">
                                <select class="form-control percentage">
                                    <option value="Percentage" selected>Percentage</option>
                                    <option value="Fixed">Fixed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label>Calculate</label>
                            <div style="display: flex;">
                                <button class="btn btn-outline-info calculate">calculate</button>
                                <input type="text" class="form-control finalValue" readonly style="cursor: not-allowed;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="error" class="amountError text-red"></label>
                        </div>

                    </div>
                    <div class="form-group mt-2">
                        <label>Why do you want to refund this service request?</label>
                        <textarea class="form-control refundComment"
                            placeholder="Why do you want to refund this service request?" rows="3"></textarea>
                    </div>
                    <div class="form-row">
                        <button type="submit" data-dismiss="modal" class="btn rounded-pill active font-white mt-3 col-md-12 refundamount">Refund</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <?php include 'footer_admin.php';?>