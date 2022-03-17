<div class="modal fade" id="ForgotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Forgot password</h5>
                <!-- <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="btn btn-danger">&times;</span>
                </button> -->
                <button type="button" class="btn-close btn-danger close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                <div id="ForgotError" class="alert alert-danger alert-dismissible fade show collapse" role="alert">
                    <span class="Forgot-error"></span>
                    <button type="button" class="btn-close" id="close-alert-forgot" aria-label="Close"></button>
                </div>
                    <form action="<?= $base_url."?controller=User&function=Forgot"?>" method="POST" id="Forgot">
                    <div class="form-group ImageTextBox mb-2">
                            <span class="bi bi-person-fill icon"></span>
                            <input type="email" class="form-control check_emailForgot" id="emailAddressForgot" placeholder="Email" name="EmailAddress">
                        </div>
                        <div class="container text-center">
                            <button type="submit" data-dismiss="modal" class="btn rounded-pill active font-white" style="width: 100%;">Send</button>
                        </div>
                    </form>
                    <div class="form-group mb-2 text-center pt-2">
                            <span class="text-center">
                                <a href="#LoginModal" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#LoginModal" data-dismiss="modal" onclick="LoginModal()" class="style-none">Login in Now</a>
                            </span>
                        </div>
                </div>
            </div>
            <!-- <div class="modal-footer justify-content-between">
                <button type="button" class="close btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>