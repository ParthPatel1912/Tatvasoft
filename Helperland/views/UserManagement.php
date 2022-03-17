    <?php 
        include 'header_admin.php';
        
        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=UserManagement";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=UserManagement";
        }
    ?>
    <title>User Management</title>

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
                        <a class="side-menu-link"
                            href="<?= $base_url."?controller=Helperland&function=ServiceRequets"?>">Service Requests</a>
                    </div>
                    <div class="border-bottom-admin">
                        Service Providers
                    </div>
                    <div class="border-bottom-admin">
                        <a class="side-menu-link font-blue" style="color: #1D7A8C;" href="#">User Management</a>
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
                        <h2 class="d-inline"> User Management </h2>
                        <div class="float-right">
                            <a href="#" class="btn-admin btn btn-sm">
                                <img src="../assets/img/plus.png"> Add New User
                            </a>
                        </div>

                    </div>
                    <div class="p-3 mb-3 white-background">

                        <div class="row ">
                            <div class="col-md-2 selectdiv">
                                <select id="username" name="User name" class="form-control">
                                    <option selected="true" value="" disabled="disabled">User Name </option>
                                    <!-- <option value="saab">Saab</option>
                                        <option value="mercedes">Mercedes</option>
                                        <option value="audi">Audi</option> -->
                                </select>
                            </div>
                            <div class="col-md-2 selectdiv">
                                <select id="userrole" name="User Role" class="form-control">
                                    <option selected="true" value="" disabled="disabled">User role</option>
                                    <option value='1'>Admin</option>
                                    <option value='2'>Service Provider</option>
                                    <option value='3'>Customer </option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+49</div>
                                        </div>
                                        <input type="number" class="form-control" id="MobileNumber"
                                            placeholder="Phone Number"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            maxlength="10">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" placeholder="zipcode" id="Postal"
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    maxlength="6">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="E-mail" id="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <!-- <input type="date" name="fromdate" value="" class="form-control text-color-gray" placeholder="From Date"> -->
                                <input type="text" id="FromDate" placeholder="From Date" class="form-control"
                                    onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
                            <div class="col-md-2">
                                <!-- <input type="date" name="todate" value="" class="form-control text-color-gray" placeholder="To Date"> -->
                                <input type="text" id="ToDate" placeholder="To Date" class="form-control"
                                    onfocus="(this.type='date')" onblur="(this.type='text')">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" id="searchUM" class="btn btn-md btn-admin">Search</button>
                            </div>
                            <div class="col-md-1">
                                <button id="cleanUM" class="btn btn white-background btn-md btn-outline-dark"
                                    type="reset" id="reset">Clear</button>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive row">
                        <div class="col-md-12">
                            <table id="user-management" class="table">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Role</th>
                                        <th>Date of Registration</th>
                                        <th>User Type</th>
                                        <th>Phone Number</th>
                                        <th>Postal Code</th>
                                        <th>User Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer_admin.php';?>