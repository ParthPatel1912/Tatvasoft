<div class="modal fade" id="ResetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Reset passoword</h5>
                <!-- <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="btn btn-danger">&times;</span>
                </button> -->
                <button type="button" class="btn-close btn-danger close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                <div id="ResetError" class="alert alert-danger alert-dismissible fade show collapse" role="alert">
                    <span class="Reset-error"></span>
                    <button type="button" class="btn-close" id="close-alert-reset" aria-label="Close"></button>
                </div>
                    <form action="<?= $base_url."?controller=User&function=ResetPasswordwithKey"?>" method="POST">
                        
                        <input type="text" class="form-control" id="Resetkey" name="Resetkey" placeholder="Reset key" value="<?php if(isset($_GET['resetkey'])){echo $_GET['resetkey'];} ?>"   >

                        <div class="form-group ImageTextBox mb-2">
                            <span class="bi bi-lock-fill icon"></span>
                            <input type="password" class="form-control" minlength="8" maxlength="14" name="Password" id="Password-reset" placeholder="Password">
                        </div>
                        <div class="form-group ImageTextBox mb-2">
                            <span class="bi bi-lock-fill icon"></span>
                            <input type="password" class="form-control" minlength="8" maxlength="14" name="ConfirmPassword" id="ConfirmPassword-reset" placeholder="Confirm Password">
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn rounded-pill active font-white" style="width: 100%;">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>