<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Log in</h5>
                <!-- <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="btn btn-danger">&times;</span>
                </button> -->
                <button type="button" class="btn-close btn-danger close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                <div id="LoginError" class="alert alert-danger alert-dismissible fade show collapse" role="alert">
                    <span class="Login-error"></span>
                     
                    <button type="button" class="btn-close" id="close-alert" aria-label="Close"></button>
                </div>
                    <form action="<?= $base_url."?controller=User&function=Login"?>" method="POST" id="Login">
                        <div class="form-group ImageTextBox mb-2">
                            <span class="bi bi-person-fill icon"></span>
                            <input type="email" class="form-control check_emailLogin" id="emailAddressLogin" placeholder="Email" name="EmailAddress"
                               value="<?php 
                                    if(isset($_COOKIE['EmailAddressCookie'])){
                                        echo $_COOKIE['EmailAddressCookie'];
                                    }
                               ?>" >
                        </div>
                        <div class="form-group ImageTextBox mb-2">
                            <span class="bi bi-lock-fill icon"></span>
                            <input type="password" class="form-control check_passwordLogin" minlength="8" maxlength="14" id="password" placeholder="Password" name="Password"
                               value="<?php 
                                    if(isset($_COOKIE['PasswordCookie'])){
                                        echo $_COOKIE['PasswordCookie'];
                                    }
                               ?>" >
                        </div>
                        <div class="form-group mb-2">
                            <?php  if(isset($_COOKIE)) { ?>
                                <label><input type="checkbox" name="ChkRemember" checked id="ckeckSave"> Remember Me</label>
                            <?php } ?>
                                
                            <?php  if(!isset($_COOKIE)) { ?>
                                <label><input type="checkbox" name="ChkRemember" id="ckeckSave"> Remember Me</label>
                            <?php } ?>

                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn rounded-pill active font-white LLL" id="Login-btn" style="width: 100%;">Log
                                in</button>
                        </div>
                    </form>
                    <div class="form-group mb-2 text-center pt-2">
                        <span class="text-center">
                            <a href="#ForgotModal" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#ForgotModal" data-dismiss="modal" onclick="ForgotModal()" class="style-none">Forgot your password</a>
                        </span>
                    </div>
                    <div class="form-group mb-2 text-center">
                        <span>
                            Don't have account yet?
                            <a href="<?= $base_url."?controller=Helperland&function=CreateAccount"?>" class="style-none">Create an Account</a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>