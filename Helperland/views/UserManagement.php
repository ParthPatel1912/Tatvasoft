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
                        <a class="side-menu-link" href="../10 Service Request/ServiceRequets.html">Service Requests</a>
                    </div>
                    <div class="border-bottom-admin">
                        Service Providers
                    </div>
                    <div class="border-bottom-admin">
                        <a class="side-menu-link font-blue" style="color: #1D7A8C;" href="#">User Management</a>
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
                        <h2 class="d-inline"> User Management </h2>
                        <div class="float-right">
                            <a href="#" class="btn-admin btn btn-sm">
                                <img src="../assets/img/plus.png"> Add New User
                            </a>
                        </div>

                    </div>
                    <div class="p-3 mb-3 white-background">
                        <div class="row ">
                            <div class="col-md-3 selectdiv">
                                <select name="User name" class="form-control">
                                    <option value="name">User Name </option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                  </select>
                            </div>
                            <div class="col-md-3">
                                <select name="User Role" class="form-control">
                                    <option value="role">User Role </option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                  </select>
                            </div>
                            <div class="col-md-2">
                                <div class="col-auto">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+49</div>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="zipcode">
                            </div>
                            <div class="col-md-1">
                                <a href="#" class="btn btn-admin btn-md">Search</a>
                            </div>
                            <div class="col-md-1">
                                <a href="#" class="btn white-background btn-md btn-outline-dark">Clear</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive row">
                        <div class="col-md-12">
                            <table id="user-management" class="table">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>User Type</th>
                                        <th>Role</th>
                                        <th>Postal Code</th>
                                        <th>City</th>
                                        <th>Redius</th>
                                        <th>User Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Smith </td>
                                        <td> Service Provider</td>
                                        <td> </td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Call Center</td>
                                        <td> Inquiry Manager</td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td>10 km</td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Call Center</td>
                                        <td> </td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center"><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Call Center</td>
                                        <td> Inquiry Manager</td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center"><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Customer</td>
                                        <td> </td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="InActive" id="inactive">Inactive</span></td>
                                        <td class="text-center"><img src="../assets/img/group-38.png" class="context-menu_inactive"> </td>
                                    </tr>
                                    <tr>
                                        <td>John Smith </td>
                                        <td> Service Provider</td>
                                        <td> </td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Call Center</td>
                                        <td> Inquiry Manager</td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td>10 km</td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Call Center</td>
                                        <td> </td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center"><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Call Center</td>
                                        <td> Inquiry Manager</td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center"><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Customer</td>
                                        <td> </td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="InActive" id="inactive">Inactive</span></td>
                                        <td class="text-center"><img src="../assets/img/group-38.png" class="context-menu_inactive"> </td>
                                    </tr>
                                    <tr>
                                        <td>John Smith </td>
                                        <td> Service Provider</td>
                                        <td> </td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Call Center</td>
                                        <td> Inquiry Manager</td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td>10 km</td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Call Center</td>
                                        <td> </td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center"><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Call Center</td>
                                        <td> Inquiry Manager</td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center"><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Customer</td>
                                        <td> </td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="InActive" id="inactive">Inactive</span></td>
                                        <td class="text-center"><img src="../assets/img/group-38.png" class="context-menu_inactive"> </td>
                                    </tr>
                                    <tr>
                                        <td>John Smith </td>
                                        <td> Service Provider</td>
                                        <td> </td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Call Center</td>
                                        <td> Inquiry Manager</td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td>10 km</td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center "><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Call Center</td>
                                        <td> </td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center"><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Call Center</td>
                                        <td> Inquiry Manager</td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="Active" id="active">Active</span></td>
                                        <td class="text-center"><img src="../assets/img/group-38.png" class="context-menu_active"> </td>

                                    </tr>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td> Customer</td>
                                        <td> </td>
                                        <td>123456</td>
                                        <td> Berlin</td>
                                        <td></td>
                                        <td class="text-center"> <span class="InActive" id="inactive">Inactive</span></td>
                                        <td class="text-center"><img src="../assets/img/group-38.png" class="context-menu_inactive"> </td>
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