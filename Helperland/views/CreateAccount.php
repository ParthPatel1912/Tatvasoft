    <?php include 'header.php';?>
    <title>Create Account</title>

    <section id="createaccount" class="mb-5">
        <div class="text-center">
            <div class=" justify-content-center align-self-center">
                <h2 class="headingfont"> Create an Account</h2>
                <div class="separator-line"></div>
                <img src="../assets/img/forma-1-copy-5.png" style="padding-top: 5px;">
                <div class="separator-line"></div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row justify-content-center margin-top-50">
                <div class="col-md-6">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="inputEmail4" placeholder="First Name">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="col-6">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+46</div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="inputEmail4" placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control" placeholder="Cofirm Password">
                        </div>
                        <div class="col-12">
                            <input type="checkbox" name="" id="">I have read the <span class="text-blue">privacy policy.</span>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn rounded-pill btnBlue"><b>Register</b></button>
                        </div>
                        <div class="mt-4 text-center">
                            Already registerd?
                            <a class="text-blue style-none" href="">Login Now</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <?php include 'footer.php';?>