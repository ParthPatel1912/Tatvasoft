<?php include 'ForgotPassword.php' ?>

<div class="modal fade" id="LoginModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Log in</h5>
                    <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="btn btn-danger">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control" name="Email" id="Email" placeholder="E-mail">
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" class="form-control" name="Password" id="password"
                                    placeholder="Password">
                            </div>
                            <div class="form-group mb-2">
                                <input type="checkbox" name="Check" id="ckeck"> Save
                            </div>
                            <div class="container text-center">
                                <button type="button" class="btn rounded-pill active font-white" style="width: 100%;">Log in</button>
                            </div>
                        </form>
                        <div class="form-group mb-2 text-center pt-2">
                            <span class="text-center">
                                <a href="" data-toggle="modal" data-target="#ForgotModel" data-dismiss="modal" class="style-none">Forgot your password</a>
                            </span>
                        </div>
                        <div class="form-group mb-2 text-center">
                            <span>
                                Don't have account yet?
                                <a href="CreateAccount.php" class="style-none">Create an Account</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>