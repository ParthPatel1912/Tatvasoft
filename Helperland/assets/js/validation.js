$(document).ready(function() {

    var URL = "http://localhost:8088/";

    // Contact section

    $('#FirstName').on('input', function() {
        var FirstName = $(this).val();
        var validName = /^[a-zA-Z ]*$/;
        if (FirstName.length == 0) {
            $('.FirstName-error').addClass('text-red').text("First Name is required");
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (FirstName.trim().length == 0) {
            $('.FirstName-error').addClass('text-red').text("First Name is required without space");
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!validName.test(FirstName)) {
            $('.FirstName-error').addClass('text-red').text('only characters & Whitespace are allowed');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else {
            $('.FirstName-error').empty();
            $(this).removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        }
    });

    $('#LastName').on('input', function() {
        var LastName = $(this).val();
        var validName = /^[a-zA-Z ]*$/;
        if (LastName.length == '') {
            $('.LastName-error').addClass('text-red').text("Last Name is required");
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (LastName.trim().length == 0) {
            $('.LastName-error').addClass('text-red').text("Last Name is required without space");
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!validName.test(LastName)) {
            $('.LastName-error').addClass('text-red').text('Only characters & Whitespace are allowed');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else {
            $('.LastName-error').empty();
            $(this).removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        }
    });

    $('#PhoneNumber').on('input', function() {
        var PhoneNumber = $(this).val();
        var validNumber = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
        if (PhoneNumber.length == 0) {
            $('.PhoneNumber-error').addClass('text-red').text('Mobile Number is required');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (PhoneNumber.trim().length == 0) {
            $('.PhoneNumber-error').addClass('text-red').text('Mobile Number is required without space');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!validNumber.test(PhoneNumber)) {
            $('.PhoneNumber-error').addClass('text-red').text('Invalid Mobile Number');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else {
            $('.PhoneNumber-error').empty();
            $(this).removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        }
    });

    $('#EmailAddress').on('input', function() {
        var EmailAddress = $(this).val();
        var validEmailAddress = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (EmailAddress.length == 0) {
            $('.Email-error').addClass('text-red').text('Email is required');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (EmailAddress.trim().length == 0) {
            $('.Email-error').addClass('text-red').text('Email is required without space');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!validEmailAddress.test(EmailAddress)) {
            $('.Email-error').addClass('text-red').text('Invalid Email');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else {
            $('.Email-error').empty();
            $(this).removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        }
    });

    $('#Message').on('input', function() {
        var Message = $(this).val();
        var validName = /^[a-zA-Z0-9]*$/;
        if (Message.length == 0) {
            $('.Message-error').addClass('text-red').text("Message is required");
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (Message.trim().length == 0) {
            $('.Message-error').addClass('text-red').text("Message is required without space");
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else {
            $('.Message-error').empty();
            $(this).removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        }
    });


    // Create account

    $(".check_email").keyup(function() {
        var EmailAddress = $(".check_email").val();

        $.ajax({
            type: 'POST',
            url: URL + "?controller=User&function=CheckEmail",
            data: {
                "check_emails": 1,
                "EmailAddress": EmailAddress,
            },
            success: function(response) {
                if ($.trim(response) == "Email You can Use") {
                    $('.Email-valid-error').removeClass('text-red').addClass('text-blue').text(response);
                } else {
                    $('.Email-valid-error').removeClass('text-blue').addClass('text-red').text(response);
                    $('#EmailAddress').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
                }
            }
        });
    });

    $('#Password').on('input', function() {
        var Password = $(this).val();
        var ConfirmPassword = $('#ConfirmPassword').val();
        var uppercasePassword = /(?=.*?[A-Z])/;
        var lowercasePassword = /(?=.*?[a-z])/;
        var digitPassword = /(?=.*?[0-9])/;
        var spacesPassword = /^$|\s+/;
        var symbolPassword = /(?=.*?[#?!@$%^&*-])/;
        var minEightPassword = /.{8,}/;
        if (Password.length == 0) {
            $('.Password-error').addClass('text-red').text('Password is required');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (Password.trim().length == 0) {
            $('.Password-error').addClass('text-red').text("Password is required without space");
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!uppercasePassword.test(Password)) {
            $('.Password-error').addClass('text-red').text('At least one Uppercase');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!lowercasePassword.test(Password)) {
            $('.Password-error').addClass('text-red').text('At least one Lowercase');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!digitPassword.test(Password)) {
            $('.Password-error').addClass('text-red').text('At least one digit');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!symbolPassword.test(Password)) {
            $('.Password-error').addClass('text-red').text('At least one special character');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (spacesPassword.test(Password)) {
            $('.Password-error').addClass('text-red').text('Whitespaces are not allowed');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!minEightPassword.test(Password)) {
            $('.Password-error').addClass('text-red').text('Minimum 8 length password');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (ConfirmPassword.length > 0) {
            if (Password != ConfirmPassword) {
                $('.ConfirmPassword-error').addClass('text-red').text('must be matched');
                $('#ConfirmPassword').addClass('invalid-inputBorder').removeClass('valid-inputBorder');

            } else {
                $('.ConfirmPassword-error').empty();
                $('#ConfirmPassword').addClass('valid-inputBorder').removeClass('invalid-inputBorder');

            }
            $(this).addClass('valid-inputBorder').removeClass('invalid-inputBorder');
            $('.Password-error').empty();

        } else {
            $('.Password-error').empty();
            $(this).addClass('valid-inputBorder').removeClass('invalid-inputBorder');

        }
    });

    $('#ConfirmPassword').on('input', function() {
        var Password = $('#Password').val();
        var ConfirmPassword = $(this).val();
        if (ConfirmPassword.length == 0) {
            $('.ConfirmPassword-error').addClass('text-red').text('Confirm Password is required');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');
        } else if (ConfirmPassword != Password) {
            $('.ConfirmPassword-error').addClass('text-red').text('must be matched');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');
        } else {
            $('.ConfirmPassword-error').empty();
            $(this).addClass('valid-inputBorder').removeClass('invalid-inputBorder');
        }
    });

    $("#chkPrivacy").on('input', function() {
        if ($('input[type=checkbox]:checked').length == 1) {
            $('.Checkbox-error').addClass('text-red').text("You Must agree with Privacy");
        } else {
            $('.Checkbox-error').removeClass('text-red').text("");
        }
    });

    if (window.location.href.indexOf('CreateAccount.php') != -1) {
        $('input').on('input', function(e) {
            if ($('input[type=checkbox]:checked').length != 1) {
                if ($('#CreateAccount').find('.valid-inputBorder').length == 6) {
                    $('#Register-btn').removeAttr('disabled');

                }
            } else {
                e.preventDefault();
                $('#Register-btn').attr('disabled', 'disabled')
            }
        });
    }


    // become service provider

    if (window.location.href.indexOf('ServiceProvider.php') != -1) {
        $('input').on('input', function(e) {
            if ($('input[type=checkbox]:checked').length != 1) {

                if ($('#serviceProvider').find('.valid-inputBorder').length == 6) {
                    $('#GetStarted-btn').removeAttr('disabled');

                }
            } else {
                e.preventDefault();
                $('#GetStarted-btn').attr('disabled', 'disabled')
            }
        });
    }


    // login

    $('#password').on('input', function() {
        var password = $(this).val();
        var minEightPassword = /.{8,}/;
        if (password.length == 0) {
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (password.trim().length == 0) {
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!minEightPassword.test(password)) {
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else {
            $(this).removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        }
    });

    $('#emailAddressLogin').on('input', function() {
        var emailAddress = $(this).val();
        if (emailAddress.length == 0) {
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (emailAddress.trim().length == 0) {
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else {
            $(this).removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        }
    });

    $('.check_emailLogin').add('.check_passwordLogin').keyup(function() {
        var EmailAddress = $(".check_emailLogin").val();
        var Password = $(".check_passwordLogin").val();

        $.ajax({
            type: 'POST',
            url: URL + "?controller=User&function=CheckEmailPassword",
            data: {
                "check_emailLogin": 1,
                "check_passwordLogin": 1,
                "EmailAddress": EmailAddress,
                "Password": Password,
            },
            success: function(response) {
                $('#LoginError').show('fade');
                if ($.trim(response) == "Email and Password both match") {
                    // $('#LoginError').removeClass('alert-danger').addClass('alert-success');
                    $('#LoginError').hide('fade');
                } else {
                    $('#LoginError').addClass('alert-danger').removeClass('alert-success');
                }
                $('.Login-error').text(response);
            }
        });
    });


    // forgot

    $('#emailAddressForgot').on('input', function() {
        var emailAddressForgot = $(this).val();
        if (emailAddressForgot.length == 0) {
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (emailAddressForgot.trim().length == 0) {
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else {
            $(this).removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        }
    });

    $(".check_emailForgot").keyup(function() {
        var EmailAddress = $(".check_emailForgot").val();

        $.ajax({
            type: 'POST',
            url: URL + "?controller=User&function=CheckEmailForgot",
            data: {
                "check_emails": 1,
                "EmailAddress": EmailAddress,
            },
            success: function(response) {
                $('#ForgotError').show('fade');
                if ($.trim(response) == "Email Exist") {
                    // $('#ForgotError').removeClass('alert-danger').addClass('alert-success');
                    $('#ForgotError').hide('fade');
                } else {
                    $('#ForgotError').addClass('alert-danger').removeClass('alert-success');
                }
                $('.Forgot-error').text(response);
            }
        });
    });


    // reset

    $('#Password-reset').on('input', function() {
        var Password = $(this).val();
        var ConfirmPassword = $('#ConfirmPassword-reset').val();
        var uppercasePassword = /(?=.*?[A-Z])/;
        var lowercasePassword = /(?=.*?[a-z])/;
        var digitPassword = /(?=.*?[0-9])/;
        var spacesPassword = /^$|\s+/;
        var symbolPassword = /(?=.*?[#?!@$%^&*-])/;
        var minEightPassword = /.{8,}/;
        $('#ResetError').show('fade');
        if (Password.length == 0) {
            $('.Reset-error').text('Password is required');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (Password.trim().length == 0) {
            $('.Reset-error').text("Password is required without space");
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!uppercasePassword.test(Password)) {
            $('.Reset-error').text('At least one Uppercase');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!lowercasePassword.test(Password)) {
            $('.Reset-error').text('At least one Lowercase');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!digitPassword.test(Password)) {
            $('.Reset-error').text('At least one digit');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!symbolPassword.test(Password)) {
            $('.Reset-error').text('At least one special character');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (spacesPassword.test(Password)) {
            $('.Reset-error').text('Whitespaces are not allowed');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!minEightPassword.test(Password)) {
            $('.Reset-error').text('Minimum 8 length password');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (ConfirmPassword.length > 0) {
            if (Password != ConfirmPassword) {
                $('.Reset-error').text('must be matched');
                $('#ConfirmPassword-reset').addClass('invalid-inputBorder').removeClass('valid-inputBorder');

            } else {
                $('#ResetError').hide('fade');
                $('#ConfirmPassword-reset').addClass('valid-inputBorder').removeClass('invalid-inputBorder');

            }
            $(this).addClass('valid-inputBorder').removeClass('invalid-inputBorder');
            $('#ResetError').hide('fade');

        } else {
            $('#ResetError').hide('fade');
            $(this).addClass('valid-inputBorder').removeClass('invalid-inputBorder');

        }
    });

    $('#ConfirmPassword-reset').on('input', function() {
        var Password = $('#Password-reset').val();
        var ConfirmPassword = $(this).val();
        $('#ResetError').show('fade');
        if (ConfirmPassword.length == 0) {
            $('.Reset-error').text('Confirm Password is required');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');
        } else if (ConfirmPassword != Password) {
            $('.Reset-error').text('must be matched');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');
        } else {
            $('#ResetError').hide('fade');
            $(this).addClass('valid-inputBorder').removeClass('invalid-inputBorder');
        }
    });

});