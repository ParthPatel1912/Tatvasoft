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
        var validName = /^[a-zA-Z]*$/;
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

    if (window.location.href.indexOf('Contact.php') != -1) {
        $('input, textarea').on('input', function(e) {
            if ($('#Contact').find('.valid-inputBorder').length == 5) {
                $('#submit').removeAttr('disabled');
            } else {
                e.preventDefault();
                $('#submit').attr('disabled', 'disabled');
            }
        });
    }


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
            if ($('input[type=checkbox][name="chkPrivacy"]:checked').length == 1) {
                if ($('#CreateAccount').find('.valid-inputBorder').length == 6) {
                    $('#Register-btn').removeAttr('disabled');

                }
            } else {
                e.preventDefault();
                $('#Register-btn').attr('disabled', 'disabled');
            }
        });
    }


    // become service provider

    if (window.location.href.indexOf('ServiceProvider.php') != -1) {
        $('input').on('input', function(e) {
            if ($('input[type=checkbox][name="chkPrivacy"]:checked').length == 1) {
                if ($('#serviceProvider').find('.valid-inputBorder').length == 6) {
                    $('#GetStarted-btn').removeAttr('disabled');

                }
            } else {
                e.preventDefault();
                $('#GetStarted-btn').attr('disabled', 'disabled');
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


    // book service

    $('#AddressLine1').on('input', function() {
        var AddressLine1 = $(this).val();
        var validAddress = /^[a-zA-Z0-9- ]*$/;
        if (AddressLine1.length == 0) {
            $('.AddressLine1-error').addClass('text-red').text('Street is required');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (AddressLine1.trim().length == 0) {
            $('.AddressLine1-error').addClass('text-red').text('Street is required without space');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!validAddress.test(AddressLine1)) {
            $('.AddressLine1-error').addClass('text-red').text('Invalid Street');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else {
            $('.AddressLine1-error').empty();
            $(this).removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        }
    });

    $('#AddressLine2').on('input', function() {
        var AddressLine2 = $(this).val();
        var validAddress = /^[a-zA-Z0-9- ]*$/;
        if (AddressLine2.length == 0) {
            $('.AddressLine2-error').addClass('text-red').text('House is required');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (AddressLine2.trim().length == 0) {
            $('.AddressLine2-error').addClass('text-red').text('House is required without space');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!validAddress.test(AddressLine2)) {
            $('.AddressLine2-error').addClass('text-red').text('Invalid House');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else {
            $('.AddressLine2-error').empty();
            $(this).removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        }
    });

    $('#password-setting').on('input', function() {
        var Password = $(this).val();
        var uppercasePassword = /(?=.*?[A-Z])/;
        var lowercasePassword = /(?=.*?[a-z])/;
        var digitPassword = /(?=.*?[0-9])/;
        var spacesPassword = /^$|\s+/;
        var symbolPassword = /(?=.*?[#?!@$%^&*-])/;
        var minEightPassword = /.{8,}/;
        if (Password.length == 0) {
            $('.Password-setting-error').addClass('text-red').text('Password is required');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (Password.trim().length == 0) {
            $('.Password-setting-error').addClass('text-red').text("Password is required without space");
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!uppercasePassword.test(Password)) {
            $('.Password-setting-error').addClass('text-red').text('At least one Uppercase');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!lowercasePassword.test(Password)) {
            $('.Password-setting-error').addClass('text-red').text('At least one Lowercase');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!digitPassword.test(Password)) {
            $('.Password-setting-error').addClass('text-red').text('At least one digit');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!symbolPassword.test(Password)) {
            $('.Password-setting-error').addClass('text-red').text('At least one special character');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (spacesPassword.test(Password)) {
            $('.Password-setting-error').addClass('text-red').text('Whitespaces are not allowed');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!minEightPassword.test(Password)) {
            $('.Password-setting-error').addClass('text-red').text('Minimum 8 length password');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else {
            $('.Password-setting-error').empty();
            $(this).addClass('valid-inputBorder').removeClass('invalid-inputBorder');

        }
    });

    if (window.location.href.indexOf('BookService.php') != -1) {
        $('input').on('input', function(e) {

            if ($('#AddNewAddress').find('.valid-inputBorder').length == 3) {
                $('#Save-btn').removeAttr('disabled');

            } else {
                e.preventDefault();
                $('#Save-btn').attr('disabled', 'disabled');
            }
        });
    }

    $('#cardNumber').on('input', function() {
        var cardNumber = $(this).val();
        var validNumber = /\(?([0-9]{4})\)?([ .-]?)([0-9]{4})\2([0-9]{4})/;
        if (cardNumber.length == 0) {
            $('.cardNumber-error').addClass('text-red').text('Card Number is required');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (cardNumber.trim().length == 0) {
            $('.cardNumber-error').addClass('text-red').text('Card Number is required without space');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!validNumber.test(cardNumber)) {
            $('.cardNumber-error').addClass('text-red').text('Invalid Card Number');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else {
            $('.cardNumber-error').empty();
            $(this).removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        }
    });

    $('#discount').click(function() {
        var discounterr = "Promocode Doesn't Exists now.";
        $('.discount-error').addClass('text-red').text(discounterr);
        $('#discount-btn').attr('disabled', 'disabled');
    });

    $("#time").on("change", function() {
        changeTimes();
        checkTotalTime();
    });

    $("#bath").on("change", function() {
        changeBath();
    });

    $("#bed").on("change", function() {
        changeBed();
    });

    $("#Hrs").on("change", function() {
        changeTotalHours();
        checkTotalTime();
        checkPrice();
    });

    $("#Hrs").on("click", function() {
        changeBasicHours();
        checkTotalTime();
        checkPrice();
        window.time = $('#Hrs').val();
    });

    if (window.location.href.indexOf('BookService.php') != -1) {
        $('input').on('input', function(e) {

            if ($('input[type=checkbox][name="chkPrivacy"]:checked').length == 1) {
                if ($('#BookService').find('.valid-inputBorder').length == 2) {
                    $('#Complete').removeAttr('disabled');
                } else {
                    e.preventDefault();
                    $('#Complete').attr('disabled', 'disabled');
                }
            } else {
                e.preventDefault();
                $('#Complete').attr('disabled', 'disabled');
            }
            // $('#CheckAdress').attr('disabled', 'disabled');

            if ($("input[name='address']:checked").length = 1) {
                $('#CheckAdress').attr('disabled', 'disabled');
                $('.address-error').addClass('text-red').text('Please Select Address');

            } else {
                $('#CheckAdress').removeAttr('disabled');
                $('.address-error').empty();

            }

            $('body').on('click', '.address', function() {
                $('#CheckAdress').removeAttr('disabled');
                $('.address-error').empty();

            });

        });
    }


    // customer setting


    $('.birth').on("click", function() {
        if (($('#day').val() == "Day" || $('#month').val() == "Month" || $(
                '#year').val() == "Year")) {
            $('.birth-error').addClass('text-red').text("Enter Valid Birthdate");
            $('#save-detail').addClass('disabled');

        } else {
            $('.birth-error').empty();
            $('#save-detail').removeClass('disabled');

        }
        if ($('#day').val() != "Day") {
            $('#day').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        } else {
            $('#day').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
        }

        if ($('#month').val() != "Month") {
            $('#month').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        } else {
            $('#month').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
        }

        if ($('#year').val() != "Year") {
            $('#year').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        } else {
            $('#year').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
        }
    });

    $('.language').on("click", function() {

        if ($('#Language').val() == "") {
            $('#Language').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
            $('.language-error').addClass('text-red').text("Enter Valid language");
            $('#save-detail').addClass('disabled');

        } else {
            $('#Language').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
            $('.language-error').empty();
            $('#save-detail').removeClass('disabled');

        }

    });

    $('#Details').on('input', function() {
        if ($('#Details').find('.invalid-inputBorder').length > 0) {
            $('#save-detail').addClass('disabled');

        } else {
            $('#save-detail').removeClass('disabled');

        }

    });

    $('#ChangePassword').on('input', function() {
        if ($('#ChangePassword').find('.valid-inputBorder').length == 3) {
            $('#change-password').removeClass('disabled');
            $('#change-password').css('pointerEvents', 'auto');

        } else {
            $('#change-password').addClass('disabled');
            $('#change-password').css('pointerEvents', 'auto');

        }

    });

    if (window.location.href.indexOf('CustomerSetting.php') != -1) {
        $.ajax({

            url: URL + "?controller=Customer&function=FillCoustomerData",
            data: {

            },
            dataType: "json",
            success: function(response) {
                $('#FirstName').val(response[0]);
                $('#LastName').val(response[1]);
                $('#EmailAddress').val(response[2]);
                $('#PhoneNumber').val(response[3]);
                $('#day').val(response[4]);
                $('#month').val(response[5]);
                $('#year').val(response[6]);
                $('#Language').val(response[7]);
                addValidDetail();
            }
        });

        $.ajax({
            url: URL + "?controller=Customer&function=AddressList",
            data: {

            },
            success: function(response) {
                $('#allAddress').html(response);
            }
        });

        $('#change-password').css('pointerEvents', 'none');

    }

    $('#phonenumber').on('input', function() {
        var phonenumber = $(this).val();
        var validNumber = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
        if (phonenumber.length == 0) {
            $('.PhoneNumber-error').addClass('text-red').text('Mobile Number is required');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (phonenumber.trim().length == 0) {
            $('.PhoneNumber-error').addClass('text-red').text('Mobile Number is required without space');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else if (!validNumber.test(phonenumber)) {
            $('.PhoneNumber-error').addClass('text-red').text('Invalid Mobile Number');
            $(this).addClass('invalid-inputBorder').removeClass('valid-inputBorder');

        } else {
            $('.PhoneNumber-error').empty();
            $(this).removeClass('invalid-inputBorder').addClass('valid-inputBorder');
        }
    });

    $('#allAddress').on('click', ".Editaddress", function() {
        AddressId = $(this).attr('id');
        $('#AddressTitle').text('Edit Address');
        $("#save").css("display", "none");
        $("#edit").css("display", "block");

        $.ajax({
            type: 'POST',
            url: URL + "?controller=Customer&function=EditAddressData",
            data: {
                'AddressId': AddressId,
            },
            dataType: "json",
            success: function(response) {
                $("#AddressLine1").val(response[0]);
                $("#AddressLine2").val(response[1]);
                $('#Zipcode').val(response[2]);
                $('#phonenumber').val(response[3]);
                $('#CityId').html(response[4]);
                $('#StateId').html(response[6]);
            }
        });

        addValidAddress();

        $('#edit').on('click', function() {

            var AddressLine1 = $('#AddressLine1').val();
            var AddressLine2 = $('#AddressLine2').val();
            var CityId = $('#CityId').val();
            var PostalCode = $('#Zipcode').val();
            var Mobile = $('#phonenumber').val();
            var StateId = $('#StateId').val();

            $.ajax({
                type: 'POST',
                url: URL + "?controller=Customer&function=UpdateAddress",
                data: {
                    'AddressId': AddressId,
                    'AddressLine1': AddressLine1,
                    'AddressLine2': AddressLine2,
                    'CityId': CityId,
                    'StateId': StateId,
                    'PostalCode': PostalCode,
                    'Mobile': Mobile,
                },
                success: function(response) {
                    if ($.trim(response) == "Address updated successfully") {

                        Swal.fire({
                            position: 'center',
                            title: 'Address updated Succesfully',
                            text: '',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            title: 'Address not updated',
                            text: 'Please Try Again',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }

                    // alert(response);
                }
            });

            $.ajax({
                url: URL + "?controller=Customer&function=AddressList",
                data: {

                },
                success: function(response) {
                    $('#allAddress').html(response);
                }
            });
        });
    });

    $('#Zipcode').on('input', function() {
        var zipcode = $(this).val();

        $.ajax({
            type: 'POST',
            url: URL + "?controller=Customer&function=CheckAvaibility",
            data: {
                'Zipcode': zipcode,
            },
            success: function(response) {
                if ($.trim(response) == "Sevice Available") {
                    $('#Zipcode').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
                    $('.Zipcode-error').empty();
                    if ($('#address').find('.valid-inputBorder').length == 4) {
                        $('#save').removeClass('disabled');
                        $('#edit').removeClass('disabled');
                    }

                } else {
                    $('#Zipcode').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
                    $('.Zipcode-error').addClass('text-red').text(response);
                    $('#save').addClass('disabled');
                    $('#edit').addClass('disabled');

                }
            }
        });

        $.ajax({
            type: 'POST',
            url: URL + "?controller=Customer&function=CheckCity",
            data: {
                'Zipcode': zipcode,
            },
            dataType: 'json',
            success: function(response) {
                $('#CityId').html(response[0]);
                $('#StateId').html(response[1]);
            }
        });
    });

    $('#address').on('input', function() {
        if ($('#address').find('.valid-inputBorder').length == 4) {
            $('#save').add('#edit').removeClass('disabled');

        } else {
            $('#save').add('#edit').addClass('disabled');

        }

    });

    $('.Addaddress').on('click', function() {
        $('#AddressTitle').text('Add New Address');
        $("#edit").css("display", "none");
        $("#save").css("display", "block");

        cleanValueForNewAddress();
    });

    $('#save').on('click', function() {
        var AddressLine1 = $('#AddressLine1').val();
        var AddressLine2 = $('#AddressLine2').val();
        var CityId = $('#CityId').val();
        var PostalCode = $('#Zipcode').val();
        var Mobile = $('#phonenumber').val();
        var StateId = $('#StateId').val();


        $.ajax({
            type: 'POST',
            url: URL + "?controller=Customer&function=InsertAddress",
            data: {
                'AddressLine1': AddressLine1,
                'AddressLine2': AddressLine2,
                'CityId': CityId,
                'StateId': StateId,
                'PostalCode': PostalCode,
                'Mobile': Mobile,
            },
            success: function(response) {
                if ($.trim(response) == "Address added successfully") {

                    Swal.fire({
                        position: 'center',
                        title: 'Address added Succesfully',
                        text: '',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        title: 'Address not added',
                        text: 'Please Try Again',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });

        $.ajax({
            url: URL + "?controller=Customer&function=AddressList",
            data: {

            },
            success: function(response) {
                $('#allAddress').html(response);
            }
        });
    });

    $('#allAddress').on('click', ".Deleteaddress", function() {
        AddressId = $(this).attr('id');
        $('#delete').on('click', function() {
            $.ajax({
                type: 'POST',
                url: URL + "?controller=Customer&function=DeleteAddress",
                data: {
                    'AddressId': AddressId,
                },
                success: function(response) {
                    if ($.trim(response) == "Address deleted successfully") {
                        Swal.fire({
                            position: 'center',
                            title: 'Address deleted Succesfully',
                            text: '',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            title: 'Address not deleted',
                            text: 'Please Try Again',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            });
            $.ajax({
                url: URL + "?controller=Customer&function=AddressList",
                data: {

                },
                success: function(response) {
                    $('#allAddress').html(response);
                }
            });
        });
    });

    $('#address').on('click', '#addressClear', function() {
        cleanValueForNewAddress();
    });


    // customer service dashboard

    if (window.location.href.indexOf('CustomerServiceDashboard.php') != -1) {
        $.ajax({
            url: URL + "?controller=Customer&function=ListCustomerServiceDashboard",
            data: {

            },
            success: function(response) {
                $('#DashboardData').html(response);
            }
        });
    }

    $('#DashboardData').on('click', 'td:not(:last-child)', function() {
        ServiceRequestId = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: URL + "?controller=Customer&function=ServiceDetailForModel",
            data: {
                'ServiceRequestId': ServiceRequestId,
            },
            dataType: "json",
            success: function(response) {
                $('#ServiceStartDate').html(response[0]);
                $('#ServiceTime').html(response[1]);
                $('#TotalHour').html(response[2] + ' hr');
                $('#ServiceRequestId').html(response[3]);
                $('#service').html(response[4]);
                $('#TotalCost').html(response[5] + ' €');
                $('#Address').html(response[6]);
                $('#Mobile').html(response[7]);
                $('#Email').html(response[8]);
                $('#Comments').html(response[9]);

                $('#HasPets').html(response[10]);

                $('#fullDetail .Reschedule').attr('id', response[3]);
                $('#fullDetail .Cancel').attr('id', response[3]);
            }
        });
        $('#fullDetail').modal('show');
    });

    $('#DashboardData').on('click', '.Reschedule', function() {
        ServiceRequestId = $(this).attr('id');
        $('#rescheduleTimeDate .update').attr('id', ServiceRequestId);

        $.ajax({
            type: 'POST',
            url: URL + "?controller=Customer&function=ServiceDetailForModel",
            data: {
                'ServiceRequestId': ServiceRequestId,
            },
            dataType: "json",
            success: function(response) {
                $('#rescheduleTimeDate #date').val(response[0]);
                $('#totaltime').html(response[2]);
                $("#rescheduleTimeDate #time").val(response[11]).change();


            }
        });

    });

    $('#DashboardData').on('click', '.Cancel', function() {
        ServiceRequestId = $(this).attr('id');

        var cancelComment = $('#cancelComment').val();
        if (cancelComment.trim().length == 0) {
            $('#cancelService .cancel').addClass('disabled');

        }
        $('#cancelService .cancel').attr('id', ServiceRequestId);
    });

    $('#cancelComment').on('input', function() {
        var cancelComment = $('#cancelComment').val();
        if (cancelComment.length == 0) {
            $('#cancelService .cancel').addClass('disabled');

        } else if (cancelComment.trim().length == 0) {
            $('#cancelService .cancel').addClass('disabled');

        } else {
            $('#cancelService .cancel').removeClass('disabled');
        }
    });

    $('.Reschedule').click(function() {
        ServiceRequestId = $(this).attr('id');
        $('#fullDetail').modal('hide');
        $('#rescheduleTimeDate .update').attr('id', ServiceRequestId);

        $.ajax({
            type: 'POST',
            url: URL + "?controller=Customer&function=ServiceDetailForModel",
            data: {
                'ServiceRequestId': ServiceRequestId,
            },
            dataType: "json",
            success: function(response) {
                $('#rescheduleTimeDate #date').val(response[0]);
                $('#totaltime').html(response[2]);
                $("#rescheduleTimeDate #time").val(response[11]).change();

            }
        });
    });

    $('.Cancel').click(function() {
        ServiceRequestId = $(this).attr('id');
        $('#fullDetail').modal('hide');

        var cancelComment = $('#cancelComment').val();
        if (cancelComment.trim().length == 0) {
            $('#cancelService .cancel').addClass('disabled');

        }
        $('#cancelService .cancel').attr('id', ServiceRequestId);
    });

    $("#rescheduleTimeDate").on("click change", function() {

        timeValue = $('#rescheduleTimeDate #time').val();

        var hoursMinutes = timeValue.split(/[.:]/);
        var Hours = parseInt(hoursMinutes[0]);
        var Minutes = parseInt(hoursMinutes[1]);
        var totalTime = Hours + Minutes / 60;

        Hrsvalue = $("#rescheduleTimeDate #totaltime").text();
        hour = parseFloat(Hrsvalue);

        if (totalTime + hour > 21) {
            time = 21 - hour;
            $('.error21Hour').text("Booking change not saved! The helper must be able to finish cleaning by 9:00 p.m.")
            time = parseInt(time)
            $('#update').addClass('disabled');
        } else {
            $('.error21Hour').empty();
            $('#update').removeClass('disabled');
        }

    });

    $('#rescheduleTimeDate .close').click(function() {
        $('#rescheduleTimeDate #date').empty();
        $('#totaltime').empty();
        $("#rescheduleTimeDate #time").val().change();
    });

    $('#cancelService .close').click(function() {
        $('#cancelComment').val('');
        $('#cancelComment').empty();
        $('#cancelService .cancel').attr('id', ServiceRequestId);
    });

    $('.update').on('click', function() {
        newTime = $('#rescheduleTimeDate #time option:selected').val();

        ServiceRequestId = $(this).attr('id');

        $(".modal-backdrop").remove();
        $("#rescheduleTimeDate").hide();

        $("#iframeloading").show();

        $.ajax({
            type: "POST",
            url: URL + "?controller=Customer&function=UpdateServiceRequestTime",
            data: {
                'serviceid': ServiceRequestId,
                'newtime': newTime,
            },
            success: function(response) {

                $("#iframeloading").hide();

                if ($.trim(response) == "Update successfully") {

                    Swal.fire({
                        title: 'Your Booking Has Been Reschedule Successfully',
                        text: 'Reschedule Request Id : ' + ServiceRequestId,
                        icon: 'success',
                        confirmButtonText: 'Done'
                    });

                } else {
                    Swal.fire({
                        title: 'Your Booking Has Been Not Reschedule ',
                        text: 'Please Try Again',
                        icon: 'error',
                        confirmButtonText: 'Done'
                    });

                }
            }
        });

        $.ajax({
            url: URL + "?controller=Customer&function=ListCustomerServiceDashboard",
            data: {

            },
            success: function(response) {
                $('#DashboardData').html(response);
            }
        });

    });

    $('#cancelService .cancel').on('click', function() {
        cancelReason = $('textarea#cancelComment').val();

        ServiceRequestId = $(this).attr('id');

        $(".modal-backdrop").remove();
        $("#cancelService").hide();

        $("#iframeloading").show();

        $.ajax({
            type: "POST",
            url: URL + "?controller=Customer&function=CancelServiceRequest",
            data: {
                'serviceid': ServiceRequestId,
                'cancelReason': cancelReason,
            },
            success: function(response) {

                if ($.trim(response) == "Cancelled successfully") {

                    $("#iframeloading").hide();

                    Swal.fire({
                        title: 'Your Booking Has Been Cancel Successfully',
                        text: 'Reschedule Request Id : ' + ServiceRequestId,
                        icon: 'success',
                        confirmButtonText: 'Done'
                    });

                } else {
                    Swal.fire({
                        title: 'Your Booking Has Been Not Cancelled ',
                        text: 'Please Try Again',
                        icon: 'error',
                        confirmButtonText: 'Done'
                    });

                }
            }
        });

        $.ajax({
            url: URL + "?controller=Customer&function=ListCustomerServiceDashboard",
            data: {

            },
            success: function(response) {
                $('#DashboardData').html(response);
            }
        });

    });


    // customer service history

    if (window.location.href.indexOf('ServiceHistory.php') != -1) {
        $.ajax({
            url: URL + "?controller=Customer&function=ListCustomerServiceHistory",
            data: {

            },
            success: function(response) {
                $('#HistoryData').html(response);
            }
        });
    }




    // star rating for sp

    {
        let ratings1 = $('.ratings1 .bi');
        let timemsg = document.getElementsByClassName("timemsg");

        var currentRating1 = 0;

        ratings1 = Array.prototype.slice.call(ratings1);

        ratings1.forEach((star, index) => {
            star.addEventListener("click", (e) => {
                    for (let i = 0; i < ratings1.length; i++) {
                        ratings1[i].style.color = "";
                    }
                    colorStar1(index);
                    currentRating1 = index + 1
                    timemsg = " : " + currentRating1
                    $('.timemsg').text(timemsg)

                },
                false
            );

            // star.addEventListener("mouseenter", (e) => {
            //         for (let i = 0; i < ratings1.length; i++) {
            //             ratings1[i].style.color = "";
            //         }
            //         // colorStar1(index);
            //         currentRating1 = index + 1
            //         timemsg = " : " + currentRating1
            //         $('.timemsg').text(timemsg)

            //     },
            //     false
            // );
        });

        const colorStar1 = (n) => {
            if (n < 0) return;
            ratings1[n].style.color = "#fc0";
            colorStar1(n - 1);
        };
    }

    {
        let ratings2 = $('.ratings2 .bi');
        let friendlymsg = document.getElementsByClassName("friendlymsg");

        var currentRating2 = 0;

        ratings2 = Array.prototype.slice.call(ratings2);

        ratings2.forEach((star, index) => {
            star.addEventListener("click", (e) => {
                    for (let i = 0; i < ratings2.length; i++) {
                        ratings2[i].style.color = "";
                    }
                    colorStar2(index);
                    currentRating2 = index + 1
                    friendlymsg = " : " + currentRating2
                    $('.friendlymsg').text(friendlymsg);

                },
                false
            );

            // star.addEventListener("mouseenter", (e) => {
            //         for (let i = 0; i < ratings2.length; i++) {
            //             ratings2[i].style.color = "";
            //         }
            //         // colorStar2(index);
            //         currentRating2 = index + 1
            //         friendlymsg = " : " + currentRating2
            //         $('.friendlymsg').text(friendlymsg);

            //     },
            //     false
            // );
        });

        const colorStar2 = (n) => {
            if (n < 0) return;
            ratings2[n].style.color = "#fc0";
            colorStar2(n - 1);
        };
    }

    {
        let ratings3 = $('.ratings3 .bi');
        let qualitymsg = document.getElementsByClassName("qualitymsg");

        var currentRating3 = 0;

        ratings3 = Array.prototype.slice.call(ratings3);

        ratings3.forEach((star, index) => {
            star.addEventListener("click", (e) => {
                    for (let i = 0; i < ratings3.length; i++) {
                        ratings3[i].style.color = "";
                    }
                    colorStar3(index);
                    currentRating3 = index + 1
                    qualitymsg = " : " + currentRating3
                    $('.qualitymsg').text(qualitymsg);

                },
                false
            );

            // star.addEventListener("mouseenter", (e) => {
            //         for (let i = 0; i < ratings3.length; i++) {
            //             ratings3[i].style.color = "";
            //         }
            //         // colorStar3(index);
            //         currentRating3 = index + 1
            //         qualitymsg = " : " + currentRating3
            //         $('.qualitymsg').text(qualitymsg);

            //     },
            //     false
            // );

        });

        const colorStar3 = (n) => {
            if (n < 0) return;
            ratings3[n].style.color = "#fc0";
            colorStar3(n - 1);
        };
    }

    {
        $('#RateSP').on('click', function() {
            OnTimeArrival = currentRating1;
            Friendly = currentRating2;
            QualityOfService = currentRating3;


            if (OnTimeArrival == 0) {
                Ratings = (Friendly + QualityOfService) / 2;
            }
            if (Friendly == 0) {
                Ratings = (OnTimeArrival + QualityOfService) / 2;
            }
            if (QualityOfService == 0) {
                Ratings = (Friendly + OnTimeArrival) / 2;
            }


            if (Friendly == 0 && QualityOfService == 0) {
                Ratings = OnTimeArrival;
            }
            if (OnTimeArrival == 0 && QualityOfService == 0) {
                Ratings = Friendly;
            }
            if (OnTimeArrival == 0 && Friendly == 0) {
                Ratings = QualityOfService;
            }


            if (Friendly != 0 && QualityOfService != 0 && OnTimeArrival != 0) {
                Ratings = (OnTimeArrival + Friendly + QualityOfService) / 3;
            }
            if (Friendly == 0 && QualityOfService == 0 && OnTimeArrival == 0) {
                Ratings = 0.00;
            }

            // Ratings = (OnTimeArrival + Friendly + QualityOfService) / 3;

            Ratings = parseFloat(Ratings).toFixed(2);

            $('#RateSP .info').text(" " + Ratings);

            if (Ratings != 0) {
                var sahtml = '';
                for (var i = 0; i < parseInt(Ratings); i++) {
                    sahtml += `<i class="bi bi-star-fill golden-star"></i>`;
                }
                var or = 0;
                for (var i = 0; i < 1; i++) {
                    if (Ratings != null) {
                        if (Ratings.substr(2, 1) != 0) {
                            sahtml += `<i class="bi bi-star-half golden-star"></i>`;
                            or = 1;
                        }
                    } else {
                        Ratings = 0;
                    }
                }
                for (var i = 5; i > (parseInt(Ratings) + or); i--) {
                    sahtml += `<i class="bi bi-star-fill"></i>`;
                }
            }

            $('.STAR-AVG').html(sahtml);
        });
    }

    $('#RateSP .close').on('click', function() {
        let ratings1 = $('.ratings1 .bi');
        let ratings2 = $('.ratings2 .bi');
        let ratings3 = $('.ratings3 .bi');
        var value = '';
        for (i = 0; i < 5; i++) {
            ratings1[i].style.removeProperty("color");
            ratings2[i].style.removeProperty("color");
            ratings3[i].style.removeProperty("color");
            value += `<i class="bi bi-star-fill"></i>`;
        }

        $('#RateSP .STAR-AVG').html(value);

        $('.timemsg').empty();
        $('.friendlymsg').empty();
        $('.qualitymsg').empty();
        $('#feedbackcomment').val('');
        $('#RateSP .info').text('');
    });

    $('#HistoryData').on('click', '.ratesp', function() {
        ServiceRequestId = $(this).attr('id');
        $('#RateSP .giveratting').attr('id', ServiceRequestId);

        $.ajax({
            type: "POST",
            url: URL + "?controller=Customer&function=CheckCountrating",
            data: {
                'ServiceRequestId': ServiceRequestId,

            },
            success: function(response) {
                if ($.trim(response) == 1) {

                    Swal.fire({
                        title: 'You Are Already Provided Ratings For This Service',
                        text: 'Service Request Id : ' + ServiceRequestId,
                        icon: 'info',
                        confirmButtonText: 'Done'
                    });

                    $('#RateSP .giveratting').addClass('disabled');

                } else {
                    $('#RateSP .giveratting').removeClass('disabled');
                    $.ajax({
                        type: "POST",
                        url: URL + "?controller=Customer&function=GetServiceProvideName",
                        data: {
                            'ServiceRequestId': ServiceRequestId,

                        },
                        success: function(response) {
                            $('#SPName').text(response);
                        }
                    });
                }
            }
        });

    });

    $('#RateSP .giveratting').on('click', function() {

        ServiceRequestId = $('.giveratting').attr('id');
        OnTimeArrival = currentRating1;
        Friendly = currentRating2;
        QualityOfService = currentRating3;
        Ratings = (OnTimeArrival + Friendly + QualityOfService) / 3;

        rateComment = $('#feedbackcomment').val();

        $.ajax({
            type: "POST",
            url: URL + "?controller=Customer&function=InsertRatingtoSP",
            data: {
                'timearrival': OnTimeArrival,
                'friendly': Friendly,
                'quality': QualityOfService,
                'ServiceRequestId': ServiceRequestId,
                'Ratings': Ratings,
                'rateComment': rateComment,

            },
            success: function(response) {
                if ($.trim(response) == "Already Done") {
                    Swal.fire({
                        title: 'You Are Already Provided Ratings For This Service',
                        text: 'Service Request Id : ' + ServiceRequestId,
                        icon: 'info',
                        confirmButtonText: 'Done'
                    });
                }
                if ($.trim(response) == "rating done") {
                    Swal.fire({
                        title: 'Rating Provided Successfully',
                        text: 'Service Request Id : ' + ServiceRequestId,
                        icon: 'success',
                        confirmButtonText: 'Done'
                    });
                }
                if ($.trim(response) == "rating not inserted") {

                    Swal.fire({
                        title: 'Rating Is Not Submitted',
                        text: 'Service Request Id : ' + ServiceRequestId,
                        icon: 'error',
                        confirmButtonText: 'Done'
                    });
                }
                if ($.trim(response) == "You cancelled before service accept") {

                    Swal.fire({
                        title: 'You cancelled Service before service accepted',
                        text: 'Service Request Id : ' + ServiceRequestId,
                        icon: 'error',
                        confirmButtonText: 'Done'
                    });
                }
                // alert(response);
            }
        });

        $.ajax({
            url: URL + "?controller=Customer&function=ListCustomerServiceHistory",
            data: {

            },
            success: function(response) {
                $('#HistoryData').html(response);
            }
        });
    });


    // favourite prons

    if (window.location.href.indexOf('FavouriteProns.php') != -1) {

        $.ajax({
            url: URL + "?controller=Customer&function=FavouritePronsList",
            data: {

            },
            success: function(response) {
                $('#favouritePron').html(response);
            }
        });

    }

    $('#favouritePron').on('click', '.Favourite', function() {

        id = $(this).attr('id');

        $.ajax({
            type: "POST",
            url: URL + "?controller=Customer&function=UpdateFavouriteSP",
            data: {
                'FavouriteBlockId': id,
                'IsFavourite': 1,
            },
            success: function(response) {
                if ($.trim(response) == "Favourite or un-favourite successfully") {
                    Swal.fire({
                        title: 'Favourite Succeffully',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'Done'
                    });
                } else {
                    Swal.fire({
                        title: 'Favourite not Done',
                        text: '',
                        icon: 'error',
                        confirmButtonText: 'Done'
                    });
                }
            }
        });

        $.ajax({
            url: URL + "?controller=Customer&function=FavouritePronsList",
            data: {

            },
            success: function(response) {
                $('#favouritePron').html(response);
            }
        });

    });

    $('#favouritePron').on('click', '.Un-Favourite', function() {

        id = $(this).attr('id');

        $.ajax({
            type: "POST",
            url: URL + "?controller=Customer&function=UpdateFavouriteSP",
            data: {
                'FavouriteBlockId': id,
                'IsFavourite': 0,
            },
            success: function(response) {
                if ($.trim(response) == "Favourite or un-favourite successfully") {
                    Swal.fire({
                        title: 'Un-Favourite Succeffully',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'Done'
                    });
                } else {
                    Swal.fire({
                        title: 'Un-Favourite not Done',
                        text: '',
                        icon: 'error',
                        confirmButtonText: 'Done'
                    });
                }
            }
        });

        $.ajax({
            url: URL + "?controller=Customer&function=FavouritePronsList",
            data: {

            },
            success: function(response) {
                $('#favouritePron').html(response);
            }
        });

    });

    $('#favouritePron').on('click', '.Block', function() {

        id = $(this).attr('id');

        $.ajax({
            type: "POST",
            url: URL + "?controller=Customer&function=UpdateBlockSP",
            data: {
                'FavouriteBlockId': id,
                'IsBlocked': 1,
            },
            success: function(response) {
                if ($.trim(response) == "Block or un-block successfully") {
                    Swal.fire({
                        title: 'Blocked Succeffully',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'Done'
                    });
                } else {
                    Swal.fire({
                        title: 'Blocked not Done',
                        text: '',
                        icon: 'error',
                        confirmButtonText: 'Done'
                    });
                }
            }
        });

        $.ajax({
            url: URL + "?controller=Customer&function=FavouritePronsList",
            data: {

            },
            success: function(response) {
                $('#favouritePron').html(response);
            }
        });

    });

    $('#favouritePron').on('click', '.Un-Block', function() {

        id = $(this).attr('id');

        $.ajax({
            type: "POST",
            url: URL + "?controller=Customer&function=UpdateBlockSP",
            data: {
                'FavouriteBlockId': id,
                'IsBlocked': 0,
            },
            success: function(response) {
                if ($.trim(response) == "Block or un-block successfully") {
                    Swal.fire({
                        title: 'Un-Blocked Succeffully',
                        text: '',
                        icon: 'success',
                        confirmButtonText: 'Done'
                    });
                } else {
                    Swal.fire({
                        title: 'Un-Blocked not Done',
                        text: '',
                        icon: 'error',
                        confirmButtonText: 'Done'
                    });
                }
            }
        });

        $.ajax({
            url: URL + "?controller=Customer&function=FavouritePronsList",
            data: {

            },
            success: function(response) {
                $('#favouritePron').html(response);
            }
        });

    });


    // service provider setting

    if (window.location.href.indexOf('ServiceProviderSetting.php') != -1) {
        var hidden = document.getElementsByClassName("hidden-input-avtar");
        var avtar = document.getElementsByClassName("img-avtar");

        for (i = 0; i <= 6; i++) {
            if (hidden[i].value == "notselected") {
                $('.Selectavtar').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
                $('.avtar-error').addClass('text-red').text('Please profile picture');
            }
        }

        $(avtar).on('click', function() {
            $('.Selectavtar').removeClass('invalid-inputBorder');
            $('.avtar-error').empty();

        });

        $.ajax({
            url: URL + "?controller=ServiceProvider&function=getServiceProviderDetail",
            data: {

            },
            dataType: 'json',
            success: function(response) {
                $('#FirstName').val(response[0]);
                $('#LastName').val(response[1]);
                $('#EmailAddress').val(response[2]);
                $('#PhoneNumber').val(response[3]);
                $('#day').val(response[4]);
                $('#month').val(response[5]);
                $('#year').val(response[6]);
                $('#Language').val(response[7]);
                addValidDetail();

                if (response[8] != null && response[9] != null && response[10] != null) {
                    ValidAddressMatchServiceProvider();
                    // alert(0)
                } else {
                    ValidAddressServiceProvider();
                    // alert(1)
                }

                $("#AddressLine1").val(response[8]);
                $("#AddressLine2").val(response[9]);
                $('#Zipcode').val(response[10]);
                $('#CityId').html(response[11]);
                $('#StateId').html(response[12]);

                $("input[name=gender][value='" + response[13] + "']").prop('checked', true);

                photo = response[14];

                if (response[15] == 'Yes') {
                    $('.status').addClass('text-green').text('Active');
                }

                var hidden = document.getElementsByClassName("hidden-input-avtar");
                var imgs = document.getElementById("img-avtar-main");

                for (i = 1; i <= 6; i++) {
                    if (hidden[i].id == photo) {
                        hidden[i].value = "selected";
                        avtar[i].style.border = "3px solid #146371";
                        var path = "../assets/img/" + photo + ".jpeg";
                        imgs.src = path;
                        $('.Selectavtar').removeClass('invalid-inputBorder');
                        $('.avtar-error').empty();
                    }
                }

                if (response[13] == null || response[13] == "") {

                    if ($("input[name='gender']:checked").length == 0) {
                        $('#save-detail').attr('disabled', 'disabled');
                        // $('.gender').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
                        $('.gender-error').addClass('text-red').text('Please select Gender');

                    } else {
                        $('#save-detail').removeAttr('disabled');
                        $('.gender-error').empty();

                    }
                }
            }
        });

        $('body').on('click', '.gender', function() {
            $('#save-detail').removeAttr('disabled');
            $('.gender-error').empty();
            // $('.gender').removeClass('invalid-inputBorder');

        });

        $('#change-password').css('pointerEvents', 'none');

        if ($('#Service-Details').find('.valid-inputBorder').length > 0) {
            $('#save-detail').addClass('disabled');

        } else {
            $('#save-detail').removeClass('disabled');

        }

    }

    $('#Service-Details').on('input', function() {
        if ($('#Service-Details').find('.invalid-inputBorder').length > 0) {
            $('#save-detail').addClass('disabled');

        } else {
            $('#save-detail').removeClass('disabled');

        }

    });

    $('#Service-Details').on('click', function() {
        if ($('#Service-Details').find('.invalid-inputBorder').length > 0) {
            $('#save-detail').addClass('disabled');

        } else {
            $('#save-detail').removeClass('disabled');

        }

    });

});


// comman variable

var URL = "http://localhost:8088/";
var count = 0;


// book service

function disablesetupservice() {
    var header = document.getElementById("bookservice");
    var btns = header.getElementsByClassName("btn");
    btns[0].className += " services-selected";
    document.getElementById("setupservicetab").style.display = "block";
    document.getElementById("arrow-setupservice").style.display = "block";
    btns[0].style.pointerEvents = "none";
    btns[1].style.pointerEvents = "none";
    btns[2].style.pointerEvents = "none";
    btns[3].style.pointerEvents = "none";

    document.getElementById("0").style.display = "none";
    document.getElementById("1").style.display = "none";
    document.getElementById("2").style.display = "none";
    document.getElementById("3").style.display = "none";
    document.getElementById("4").style.display = "none";

    date = $('#date').val();
    document.querySelector('#Date').innerHTML = date;

    timeText = $('#time option:selected').text();
    document.querySelector('#Time').innerHTML = timeText;

    bath = $('#bath option:selected').text();
    document.querySelector('#Bath').innerHTML = bath;

    bed = $('#bed option:selected').text();
    document.querySelector('#Bed').innerHTML = bed;

    basicHour = $('#Hrs').val();
    Hrs = basicHour + ' Hours';
    document.querySelector('#basicHour').innerHTML = Hrs;

    Hrsvalue = $('#Hrs').val();
    Hrs = Hrsvalue + ' Hours';
    document.querySelector('.TotalHour').innerHTML = Hrs;

    TotalHourtext = $('.TotalHour').text();
    value = parseFloat(TotalHourtext);
    price = value * 19;
    totalPrice = "€ " + price;
    document.querySelector('#TotalPrice').innerHTML = totalPrice;
}

function gotoscheduleplan() {

    Zipcode = $(".check_zipcode").val();

    if (Zipcode.length == 0) {
        $('.Zipcode-error').addClass('text-red').text('Postal code is required');
        $("#zipcode").addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    } else if (Zipcode.length < 6) {
        $('.Zipcode-error').addClass('text-red').text('Postal code has 6 digit');
        $("#zipcode").addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    } else {
        $.ajax({
            type: 'POST',
            url: URL + "?controller=Bookservice&function=CheckAvaibility",
            data: {
                "check_zipcode": 1,
                "Zipcode": Zipcode,
            },
            success: function(response) {
                if ($.trim(response) == "Sevice Available") {
                    $('.Zipcode-error').removeClass('text-red').addClass('text-blue').text(response);
                    $('#zipcode').removeClass('invalid-inputBorder').addClass('valid-inputBorder');

                    var header = document.getElementById("bookservice");
                    var btns = header.getElementsByClassName("btn");
                    btns[1].className += " services-selected";
                    var hidediv = document.getElementById("setupservicetab");
                    hidediv.style.display = "none";
                    document.getElementById("scheduleplantab").style.display = "block";
                    document.getElementById("arrow-setupservice").style.display = "none";
                    document.getElementById("arrow-scheduleplan").style.display = "block";
                    var imgs = header.getElementsByTagName("img");
                    imgs[1].src = "../assets/img/schedule-white.png";
                    btns[0].style.pointerEvents = "auto";
                    btns[0].disabled = false;
                    btns[1].disabled = false;

                } else {
                    $('.Zipcode-error').removeClass('text-blue').addClass('text-red').text('We are not providing service in this area. We will notify you if any helper would start working near your area.');
                    $('#zipcode').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
                }
            }
        });
    }


}

function gotoyourDetails() {

    $.ajax({

        url: URL + "?controller=Helperland&function=BookServiceCheckLogin",
        data: {

        },
        success: function(response) {
            if ($.trim(response) == "Login successfull") {
                var header = document.getElementById("bookservice");
                var btns = header.getElementsByClassName("btn");
                btns[2].className += " services-selected";
                var imgs = header.getElementsByTagName("img");
                imgs[2].src = "../assets/img/details-white.png";
                document.getElementById("scheduleplantab").style.display = "none";
                document.getElementById("arrow-scheduleplan").style.display = "none";
                document.getElementById("arrow-detail").style.display = "block";
                document.getElementById("detailstab").style.display = "block";
                btns[1].style.pointerEvents = "auto";
                btns[1].disabled = false;
                btns[2].disabled = false;
                document.getElementById("AddNewAddress").style.display = "none";
            } else {
                window.location.href = "#LoginModal";
                $('#LoginModal').modal('show');
                $('#LoginModal .close').click(function() {
                    window.location.href = "";
                });
            }
        }
    });

    Zipcode = $(".check_zipcode").val();
    $('#PostalCode').val(Zipcode);

    $.ajax({
        type: 'POST',
        url: URL + "?controller=Bookservice&function=CheckCity",
        data: {
            "Zipcode": Zipcode,
        },
        success: function(response) {
            $('#city_name').html(response);
        }
    });

    $.ajax({

        url: URL + "?controller=Bookservice&function=AddressList",
        data: {

        },
        success: function(response) {
            $('#address').html(response);
        }
    });

    $.ajax({
        type: 'POST',
        url: URL + "?controller=Bookservice&function=FavouriteServiceProvider",
        data: {

        },
        success: function(response) {
            $('#Favourite').html(response);
        }
    });
}

function gotomakepayment() {

    var header = document.getElementById("bookservice");
    var btns = header.getElementsByClassName("btn");
    var imgs = header.getElementsByTagName("img");
    imgs[3].src = "../assets/img/payment-white.png";
    btns[3].className += " services-selected";
    document.getElementById("detailstab").style.display = "none";
    document.getElementById("arrow-detail").style.display = "none";
    document.getElementById("arrow-payment").style.display = "block";
    document.getElementById("paymenttab").style.display = "block";
    btns[2].style.pointerEvents = "auto";
    btns[2].disabled = false;
    btns[3].disabled = false;
}

function checkIfSelected(para) {
    var btns = document.getElementsByClassName("circle");
    var imgs = document.getElementsByClassName("img-book-service");
    var hidden = document.getElementsByClassName("hidden-input");

    if (hidden[para].value == "notselected") {
        hidden[para].value = "selected";
        btns[para].style.border = "3px solid #146371";
        var path = "../assets/img/" + (para + 1) + "-green.png";
        imgs[para].src = path;

        var value = $('#Hrs').val();
        var values = parseFloat(value);
        values = values + 0.5;
        $('#Hrs').val(values).change();

        if (para == 0) {
            document.getElementById("0").style.display = "block";
            count = count + 1;

        } else if (para == 1) {
            document.getElementById("1").style.display = "block";
            count = count + 1;

        } else if (para == 2) {
            document.getElementById("2").style.display = "block";
            count = count + 1;

        } else if (para == 3) {
            document.getElementById("3").style.display = "block";
            count = count + 1;

        } else if (para == 4) {
            document.getElementById("4").style.display = "block";
            count = count + 1;

        }

    } else {
        hidden[para].value = "notselected";
        btns[para].style.border = "1px solid gray";
        var path = "../assets/img/" + (para + 1) + ".png";
        imgs[para].src = path;

        var value = $('#Hrs').val();
        var values = parseFloat(value);
        values = values - 0.5;
        $('#Hrs').val(values).change();
        if (para == 0) {
            document.getElementById("0").style.display = "none";
            count = count - 1;

        } else if (para == 1) {
            document.getElementById("1").style.display = "none";
            count = count - 1;

        } else if (para == 2) {
            document.getElementById("2").style.display = "none";
            count = count - 1;

        } else if (para == 3) {
            document.getElementById("3").style.display = "none";
            count = count - 1;

        } else if (para == 4) {
            document.getElementById("4").style.display = "none";
            count = count - 1;

        }

    }
}

function checkFavouriteSelected(para) {
    var btns = document.getElementsByClassName("round");
    var hidden = document.getElementsByClassName("hidden-input-favourite");
    var favourite = document.getElementsByClassName("border-info");

    para = para - 1;

    if (hidden[para].value == "notselected") {
        hidden[para].value = "selected";
        btns[para].style.border = "3px solid #146371";
        favourite[para].style.backgroundColor = "#5bc0de";
        // favouriteServiceProvider.push(favourite[para].id);

    } else {
        hidden[para].value = "notselected";
        btns[para].style.border = "1px solid gray";
        favourite[para].style.backgroundColor = "transparent";
    }
}

function gotobacksetupservice() {
    var header = document.getElementById("bookservice");
    var btns = header.getElementsByClassName("btn");
    var imgs = header.getElementsByTagName("img");
    var hidediv = document.getElementById("scheduleplantab");
    var hidediv2 = document.getElementById("detailstab");
    var hidediv3 = document.getElementById("paymenttab");
    hidediv.style.display = "none";
    hidediv2.style.display = "none";
    hidediv3.style.display = "none";
    btns[3].disabled = true;
    btns[2].disabled = true;
    btns[1].disabled = true;
    // btns[3].style.pointerEvents = "none";
    // imgs[3].src = "../assets/img/payment.png";
    // btns[3].className += "";
    // btns[3].className += "services";
    // btns[2].style.pointerEvents = "none";
    // imgs[2].src = "../assets/img/details.png";
    // btns[2].className += "";
    // btns[2].className += "services";
    // btns[1].style.pointerEvents = "none";
    // imgs[1].src = "../assets/img/schedule.png";
    // btns[1].className += "";
    // btns[1].className += "services";
    document.getElementById("setupservicetab").style.display = "block";
    document.getElementById("arrow-detail").style.display = "none";
    document.getElementById("arrow-setupservice").style.display = "block";
    document.getElementById("arrow-scheduleplan").style.display = "none";
    document.getElementById("arrow-payment").style.display = "none";
}

function gotobackscheduleplan() {
    var header = document.getElementById("bookservice");
    var btns = header.getElementsByClassName("btn");
    var imgs = header.getElementsByTagName("img");
    var hidediv = document.getElementById("setupservicetab");
    var hidediv2 = document.getElementById("detailstab");
    var hidediv3 = document.getElementById("paymenttab");
    hidediv.style.display = "none";
    hidediv2.style.display = "none";
    hidediv3.style.display = "none";
    btns[3].disabled = true;
    btns[2].disabled = true;
    // btns[3].style.pointerEvents = "none";
    // imgs[3].src = "../assets/img/payment.png";
    // btns[3].className += "";
    // btns[3].className += " services";
    // btns[2].style.pointerEvents = "none";
    // imgs[2].src = "../assets/img/details.png";
    // btns[2].className += "";
    // btns[2].className += " services";
    document.getElementById("scheduleplantab").style.display = "block";
    document.getElementById("arrow-detail").style.display = "none";
    document.getElementById("arrow-setupservice").style.display = "none";
    document.getElementById("arrow-scheduleplan").style.display = "block";
    document.getElementById("arrow-payment").style.display = "none";

    // if (btns[1].className == " services-selected") {
    //     document.getElementById("scheduleplantab").style.display = "block";
    //     document.getElementById("setupservicetab").style.display = "none";
    // } else {
    //     document.getElementById("scheduleplantab").style.display = "block";
    //     document.getElementById("setupservicetab").style.display = "none";
    // }
}

function gotobackyourdetails() {
    var header = document.getElementById("bookservice");
    var btns = header.getElementsByClassName("btn");
    var imgs = header.getElementsByTagName("img");
    var hidediv = document.getElementById("setupservicetab");
    var hidediv2 = document.getElementById("scheduleplantab");
    var hidediv3 = document.getElementById("paymenttab");
    hidediv.style.display = "none";
    hidediv2.style.display = "none";
    hidediv3.style.display = "none";
    btns[3].disabled = true;
    // btns[3].style.pointerEvents = "none";
    // imgs[3].src = "../assets/img/payment.png";
    // btns[3].className += "";
    // btns[3].className += " services";
    document.getElementById("detailstab").style.display = "block";
    document.getElementById("arrow-detail").style.display = "block";
    document.getElementById("arrow-setupservice").style.display = "none";
    document.getElementById("arrow-scheduleplan").style.display = "none";
    document.getElementById("arrow-payment").style.display = "none";

    // if (btns[2].className == " services-selected") {
    //     document.getElementById("detailstab").style.display = "block";
    //     document.getElementById("scheduleplantab").style.display = "none";
    //     document.getElementById("setupservicetab").style.display = "none";
    // } else {
    //     document.getElementById("detailstab").style.display = "block";
    //     document.getElementById("scheduleplantab").style.display = "none";
    //     document.getElementById("setupservicetab").style.display = "none";
    // }
}

function showNewAddress() {
    document.getElementById("AddNewAddress").style.display = "block";
    document.getElementById("NewAddress").style.display = "none";
}

function saveAddress() {

    var AddressLine1 = $('#AddressLine1').val();
    var AddressLine2 = $('#AddressLine2').val();
    var CityId = $('#CityId').val();
    var StateId = $('#StateId').val();
    var PostalCode = $('#PostalCode').val();
    var Mobile = $('#PhoneNumber').val();


    $.ajax({
        type: 'POST',
        url: URL + "?controller=Bookservice&function=InsertAddress",
        data: {
            'AddressLine1': AddressLine1,
            'AddressLine2': AddressLine2,
            'CityId': CityId,
            'StateId': StateId,
            'PostalCode': PostalCode,
            'Mobile': Mobile,
        },
        success: function(response) {
            if ($.trim(response) == "Address added successfully") {
                $('#AddressLine1').val("");
                $('#AddressLine2').val("");
                $('#PhoneNumber').val("");
                $('#AddressLine1').removeClass('invalid-inputBorder');
                $('#AddressLine2').removeClass('invalid-inputBorder');
                $('#PhoneNumber').removeClass('invalid-inputBorder');
                $('.AddressLine1-error').empty();
                $('.AddressLine2-error').empty();
                $('.PhoneNumber-error').empty();
            }
        }
    });

    $.ajax({
        url: URL + "?controller=Bookservice&function=AddressList",
        data: {

        },
        success: function(response) {
            $('#address').html(response);
        }
    });

    document.getElementById("AddNewAddress").style.display = "none";
    document.getElementById("NewAddress").style.display = "block";

}

function discardAddress() {
    document.getElementById("AddNewAddress").style.display = "none";
    document.getElementById("NewAddress").style.display = "block";
    $('#AddressLine1').val("");
    $('#AddressLine2').val("");
    $('#PhoneNumber').val("");
    $('#AddressLine1').removeClass('invalid-inputBorder');
    $('#AddressLine2').removeClass('invalid-inputBorder');
    $('#PhoneNumber').removeClass('invalid-inputBorder');
    $('.AddressLine1-error').empty();
    $('.AddressLine2-error').empty();
    $('.PhoneNumber-error').empty();
}

function changeTimes() {
    timeText = $("#time option:selected").text();
    document.querySelector('#Time').innerHTML = timeText;

}

function changeBath() {
    bath = $("#bath option:selected").text();
    document.querySelector('#Bath').innerHTML = bath;

}

function changeBed() {
    bed = $("#bed option:selected").text();
    document.querySelector('#Bed').innerHTML = bed;

}

function changeBasicHours() {
    Hrstext = $("#Hrs option:selected").text();
    hh = parseFloat(Hrstext);
    basicHour = hh + ' Hours';
    document.querySelector('#basicHour').innerHTML = basicHour;
    hr = 3;

    for (i = 0; i <= 4; i++) {
        if (document.getElementById(i).style.display == "block") {
            hh = hh - 0.5;
            hr = hr + 0.5;

            if (hh >= 3) {
                hours = hh + ' Hours';
                document.querySelector('#basicHour').innerHTML = hours;
            } else {
                checkLessTime();
                $("#Hrs").val(hr).change();
            }

        }
    }
}

function changeTotalHours() {

    Hrsvalue = $("#Hrs option:selected").val();
    totalHour = Hrsvalue + ' Hours';
    document.querySelector('.TotalHour').innerHTML = totalHour;
}

function checkTotalTime() {

    timeValue = $('#time option:selected').val();

    var hoursMinutes = timeValue.split(/[.:]/);
    var Hours = parseInt(hoursMinutes[0]);
    var Minutes = parseInt(hoursMinutes[1]);
    var totalTime = Hours + Minutes / 60;

    Hrsvalue = $('#Hrs option:selected').val()
    hour = parseFloat(Hrsvalue);

    if (totalTime + hour > 21) {
        time = 21 - hour;
        $('#Warning21Hour').modal('show');
        time = parseInt(time)
        $("#time").val(time + ':00').change();
    }
}

function checkPrice() {
    TotalHourtext = $('.TotalHour').text();
    value = parseFloat(TotalHourtext);

    price = value * 19;
    totalPrice = "€ " + price;
    document.querySelector('#TotalPrice').innerHTML = totalPrice;
}

function checkLessTime() {

    TotalHourtext = $(".TotalHour").text();
    totalHour = parseFloat(TotalHourtext);
    Hrsvalue = $("#Hrs option:selected").val();
    Hour = parseFloat(Hrsvalue);
    basicHourtext = $("#basicHour").text();
    basicHour = parseFloat(basicHourtext);

    // console.log(totalHour);
    // if (totalHour < parseFloat(window.time)) {
    //     if (basicHour < 3.5) {
    //         $('#WarningLess3Hour').modal('show');
    //         $("#Hrs").val(TOTALHOUR).change();
    //     }
    // }



    if (totalHour < parseFloat(window.time)) {
        $('#WarningLess3Hour').modal('show');
    }
}

function SubmitData() {

    var favouriteServiceProvider = ['0'];
    var ExtraService = ['0'];

    ServiceHourlyRate = "€19"

    basichour = $('#basicHour').text();
    basichour = parseFloat(basichour);

    totalhour = $('.TotalHour').text();
    totalhour = parseFloat(totalhour);

    ExtraHours = totalhour - basichour;

    SubTotal = price;

    Discount = "0.00";

    TotalCost = price;

    payment = "Payment";
    cardno = $.trim($('#cardNumber').val().slice(4, 10));
    PaymentTransactionRefNo = payment + cardno;

    comment = $('#comment').val();

    if ($('#haspetsornot').is(":checked")) {
        pets = "1";
    } else {
        pets = "0";
    }

    Address = $('input[name="address"]:checked').val();

    PaymentDue = 0;


    var HIDDEN = document.getElementsByClassName("hidden-input");
    const a = [0, 1, 2, 3, 4];

    a.forEach((element) => {
        if (HIDDEN[element].value == "selected") {
            ExtraService.push(HIDDEN[element].id);
        }
    });


    var HIDDENfavourite = document.getElementsByClassName("hidden-input-favourite");
    var FAVOURITE = document.getElementsByClassName("border-info");

    const b = Array.from({ length: FAVOURITE.length }, (v, i) => i);

    b.forEach((element) => {
        if (HIDDENfavourite[element].value == "selected") {
            favouriteServiceProvider.push(FAVOURITE[element].id);
        }
    });

    AllData = ({
        "ServiceStartDate": date,
        "ZipCode": Zipcode,
        "ServiceHourlyRate": ServiceHourlyRate,
        "ServiceHours": basichour,
        "SelectTime": timeText,
        "TotalHour": totalhour,
        "ExtraHours": ExtraHours,
        "SubTotal": SubTotal,
        "Discount": Discount,
        "TotalCost": TotalCost,
        "Comments": comment,
        "PaymentTransactionRefNo": PaymentTransactionRefNo,
        "ServiceProviderId": favouriteServiceProvider,
        "ExtraServicesCount": count,
        "ExtraServices": ExtraService,
        "HasPets": pets,
        "Bed": bed,
        "Bath": bath,
        "AddressId": Address,
        "PaymentDue": PaymentDue,
    });

    $("#iframeloading").show();

    $.ajax({
        type: 'POST',
        url: URL + "?controller=Bookservice&function=AddServiceRequest",
        data: AllData,
        success: function(response) {

            $("#iframeloading").hide();

            if (response == 0) {
                Swal.fire({
                    title: 'Booking not completed',
                    text: 'Please Try Again Later',
                    icon: 'error',
                    confirmButtonText: 'Done'
                }).then(function() {
                    location.href = URL + "?controller=Helperland&function=CustomerServiceDashboard";
                });
            } else {
                Swal.fire({
                    title: 'Booking has been successfully submitted',
                    text: 'Service Request Id: ' + response,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then(function() {
                    location.href = URL + "?controller=Helperland&function=ServiceHistory";

                });
            }
        }
    });

}


// customer setting

function addValidDetail() {
    if (FirstName.length != 0) {
        $('#FirstName').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#FirstName').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

    if (LastName.length != 0) {
        $('#LastName').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#LastName').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

    if (PhoneNumber.length != 0) {
        $('#PhoneNumber').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#PhoneNumber').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

    if ($('#day').val() != "Day") {
        $('#day').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#day').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

    if ($('#month').val() != "Month") {
        $('#month').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#month').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

    if ($('#year').val() != "Year") {
        $('#year').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#year').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

    if ($('#Language').val() != "") {
        $('#Language').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#Language').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }
}

function cleanValueForNewAddress() {
    $("#AddressLine1").val(null);
    $("#AddressLine2").val(null);
    $('#Zipcode').val(null);
    $('#phonenumber').val(null);
    $('#CityId').html(null);
    $('#StateId').html(null);

    $('#AddressLine1').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    $('#AddressLine2').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    $('#Zipcode').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    $('#phonenumber').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    $('#CityId').addClass('invalid-inputBorder').removeClass('valid-inputBorder');

    $("#AddressLine1").removeClass('invalid-inputBorder');
    $("#AddressLine2").removeClass('invalid-inputBorder');
    $("#Zipcode").removeClass('invalid-inputBorder');
    $("#phonenumber").removeClass('invalid-inputBorder');
    $("#CityId").removeClass('invalid-inputBorder');

    $(".AddressLine1-error").empty();
    $(".AddressLine2-error").empty();
    $('.Zipcode-error').empty();
    $('.phonenumber-error').empty();
    $('.CityId-error').empty();
}

function addValidAddress() {
    if (AddressLine1.length != 0) {
        $('#AddressLine1').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#AddressLine1').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

    if (AddressLine2.length != 0) {
        $('#AddressLine2').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#AddressLine2').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

    if (Zipcode.length != 0) {
        $('#Zipcode').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#Zipcode').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

    if (phonenumber.length != 0) {
        $('#phonenumber').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#phonenumber').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }
}


// service provider setting 

function checkavtar(para) {
    var hidden = document.getElementsByClassName("hidden-input-avtar");
    var avtar = document.getElementsByClassName("img-avtar");
    var imgs = document.getElementById("img-avtar-main");

    para = para + 1;

    if (hidden[para].value == "notselected") {

        for (i = 1; i <= 6; i++) {
            if (hidden[i].value == "selected") {
                hidden[i].value = "notselected";
                avtar[i].style.border = "2px solid gray";
            }
        }

        hidden[para].value = "selected";
        avtar[para].style.border = "3px solid #146371";
        var path = "../assets/img/" + (para) + "-avtar.jpeg";
        imgs.src = path;

    }
    // else {
    //     hidden[para].value = "notselected";
    //     avtar[para].style.border = "2px solid gray";
    // }


}

function ValidAddressServiceProvider() {
    if (AddressLine1.length != null) {
        $('#AddressLine1').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#AddressLine1').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

    if (AddressLine2.length != null) {
        $('#AddressLine2').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#AddressLine2').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

    if (Zipcode.length != null) {
        $('#Zipcode').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#Zipcode').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

}

function ValidAddressMatchServiceProvider() {
    if (AddressLine1.length != 0) {
        $('#AddressLine1').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#AddressLine1').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

    if (AddressLine2.length != 0) {
        $('#AddressLine2').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#AddressLine2').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

    if (Zipcode.length != 0) {
        $('#Zipcode').removeClass('invalid-inputBorder').addClass('valid-inputBorder');
    } else {
        $('#Zipcode').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
    }

}

function updateServiceProviderData() {
    var hidden = document.getElementsByClassName("hidden-input-avtar");

    for (i = 1; i <= 6; i++) {
        if (hidden[i].value == "selected") {
            photoid = hidden[i].id;
        }
    }

    firstname = $('#FirstName').val();
    lastname = $('#LastName').val();
    mobile = $('#PhoneNumber').val();
    day = $('#day').val();
    month = $('#month').val();
    year = $('#year').val();
    profilephoto = photoid;
    gender = $("input[name='gender']:checked").val();
    language = $('#Language').val();

    AddressLine1 = $("#AddressLine1").val();
    AddressLine2 = $("#AddressLine2").val();
    Zipcode = $('#Zipcode').val();
    CityId = $('#CityId').val();
    StateId = $('#StateId').val();


    AllUpdateData = ({
        "FirstName": firstname,
        "LastName": lastname,
        "PhoneNumber": mobile,
        "day": day,
        "month": month,
        "year": year,
        "profilephoto": profilephoto,
        "gender": gender,
        "Language": language,
        "AddressLine1": AddressLine1,
        "AddressLine2": AddressLine2,
        "PostalCode": Zipcode,
        "CityId": CityId,
        "StateId": StateId,
    });

    $.ajax({
        type: 'POST',
        url: URL + "?controller=ServiceProvider&function=UpdateServiceProvideDetails",
        data: AllUpdateData,
        success: function(response) {
            if ($.trim(response) == "Data Update successfully") {

                Swal.fire({
                    position: 'center',
                    title: 'Address added Succesfully',
                    text: '',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                Swal.fire({
                    position: 'center',
                    title: 'Address not added',
                    text: 'Please Try Again',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    });

    var hidden = document.getElementsByClassName("hidden-input-avtar");
    var avtar = document.getElementsByClassName("img-avtar");

    for (i = 0; i <= 6; i++) {
        if (hidden[i].value == "notselected") {
            $('.Selectavtar').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
            $('.avtar-error').addClass('text-red').text('Please profile picture');
        }
    }

    $(avtar).on('click', function() {
        $('.Selectavtar').removeClass('invalid-inputBorder');
        $('.avtar-error').empty();

    });

    $.ajax({
        url: URL + "?controller=ServiceProvider&function=getServiceProviderDetail",
        data: {

        },
        dataType: 'json',
        success: function(response) {
            $('#FirstName').val(response[0]);
            $('#LastName').val(response[1]);
            $('#EmailAddress').val(response[2]);
            $('#PhoneNumber').val(response[3]);
            $('#day').val(response[4]);
            $('#month').val(response[5]);
            $('#year').val(response[6]);
            $('#Language').val(response[7]);
            addValidDetail();

            if (response[8] != null && response[9] != null && response[10] != null) {
                ValidAddressMatchServiceProvider();
                // alert(0)
            } else {
                ValidAddressServiceProvider();
                // alert(1)
            }

            $("#AddressLine1").val(response[8]);
            $("#AddressLine2").val(response[9]);
            $('#Zipcode').val(response[10]);
            $('#CityId').html(response[11]);
            $('#StateId').html(response[12]);

            $("input[name=gender][value='" + response[13] + "']").prop('checked', true);

            photo = response[14];

            $('.status').text(response[15]);

            var hidden = document.getElementsByClassName("hidden-input-avtar");
            var imgs = document.getElementById("img-avtar-main");

            for (i = 1; i <= 6; i++) {
                if (hidden[i].id == photo) {
                    hidden[i].value = "selected";
                    avtar[i].style.border = "3px solid #146371";
                    var path = "../assets/img/" + photo + ".jpeg";
                    imgs.src = path;
                    $('.Selectavtar').removeClass('invalid-inputBorder');
                    $('.avtar-error').empty();
                }
            }

            if (response[13] == null || response[13] == "") {

                if ($("input[name='gender']:checked").length == 0) {
                    $('#save-detail').attr('disabled', 'disabled');
                    // $('.gender').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
                    $('.gender-error').addClass('text-red').text('Please select Gender');

                } else {
                    $('#save-detail').removeAttr('disabled');
                    $('.gender-error').empty();

                }
            }
        }
    });

    $('body').on('click', '.gender', function() {
        $('#save-detail').removeAttr('disabled');
        $('.gender-error').empty();
        // $('.gender').removeClass('invalid-inputBorder');

    });

}