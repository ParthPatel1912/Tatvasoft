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
        var validAddress = /^[a-zA-Z0-9-]*$/;
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
        var validAddress = /^[a-zA-Z0-9-]*$/;
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

    $("#Hrs").on("click", function() {
        checkLessTime();
        changeBasicHours();
        checkTotalTime();
        checkPrice();
    });

    $("#Hrs").on("change", function() {
        checkLessTime();
        changeTotalHours();
        checkTotalTime();
        checkPrice();
    });

    if (window.location.href.indexOf('BookService.php') != -1) {
        $('input').on('input', function(e) {
            if ($('input[type=checkbox][name="chkPrivacy"]:checked').length == 1) {
                if ($('#BookService').find('.valid-inputBorder').length == 2) {
                    $('#Complete').removeAttr('disabled');
                }
            } else {
                e.preventDefault();
                $('#Complete').attr('disabled', 'disabled');
            }
        });
    }

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
        $('.Zipcode-error').addClass('text-red').text('Postal code` has 6 digit');
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
                    // $('#checkAvaibility-btn').removeAttr('disabled');

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
                    $('.Zipcode-error').removeClass('text-blue').addClass('text-red').text(response);
                    $('#zipcode').addClass('invalid-inputBorder').removeClass('valid-inputBorder');
                    // $('#checkAvaibility-btn').attr('disabled', 'disabled');
                }
            }
        });
    }


}

function gotoyourDetails() {

    $.ajax({

        url: URL + "?controller=User&function=BookService",
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

    var UserId = $("#UserId").val();
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
            'UserId': UserId,
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

    for (i = 0; i <= 4; i++) {
        if (document.getElementById(i).style.display == "block") {
            hh = hh - 0.5;
            hours = hh + ' Hours';
            document.querySelector('#basicHour').innerHTML = hours;
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

    if (totalTime + hour > 22) {
        time = 21 - hour;
        alert('select time is greater than 21');
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

    // TotalHourtext = $(".TotalHour").text();
    // totalHour = parseFloat(TotalHourtext);
    // Hrsvalue = $("#Hrs option:selected").val();
    // Hour = parseFloat(Hrsvalue);
    // basicHourtext = $("#basicHour").text();
    // basicHour = parseFloat(basicHourtext);

    // if (parseFloat(Hour) < parseFloat(totalHour)) {
    //     if (basicHour < 3.5) {
    //         alert('select time is LESS of complete all service');
    //         $("#Hrs").val(totalHour).change();
    //     }
    // }
}

function SubmitData() {

    var favouriteServiceProvider = ['0'];
    var ExtraService = ['0'];

    var UserId = $("#UserId").val();

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
        pets = "yes";
    } else {
        pets = "no";
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
        "UserId": UserId,
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
                })
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