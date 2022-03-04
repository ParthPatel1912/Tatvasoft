// home section

$(window).on("scroll", function() {
    if ($(window).scrollTop() > 50) {
        $("#home-navbar").addClass("active2");
        $(".btnBlueTransparent").addClass("btnBlue");
    } else {
        $("#home-navbar").removeClass("active2");
        $(".btnBlueTransparent").removeClass("btnBlue");
    }
});

function footerHide() {
    document.getElementById("footer_end").style.display = "none";
}

// data table

$(document).ready(function() {

    // upcoming-service

    $('#upcoming-service').dataTable({
        "bPaginate": false,
        "bFilter": false,
        "bInfo": false,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': [-1] /* 1st one, start by the right */
        }]
    });


    // service history

    $('#service-history').DataTable({
        "bPaginate": true,
        "bFilter": false,
        "bInfo": false,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': [-1] /* 1st one, start by the right */
        }]
    });


    // customer-service-dashboard

    $('#customer-service-dashboard').DataTable({
        "bPaginate": true,
        "bFilter": false,
        "bInfo": false,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': [-1] /* 1st one, start by the right */
        }]
    });


    // user management

    $('#user-management').dataTable({
        "bPaginate": true,
        "bFilter": true,
        "bInfo": true,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': [-1] /* 1st one, start by the right */
        }]
    });


    // service request

    $('#service-requets').dataTable({
        "bPaginate": true,
        "bFilter": true,
        "bInfo": true,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': [-1] /* 1st one, start by the right */
        }]
    });

    /* coustomer setting */
    $('#nav-tab button').on('click', function(e) {
        $(this).tab('show');
        $(".nav-tabs button").removeClass("border-bottom-blue text-blue");
        $(this).addClass(" border-bottom-blue text-blue");
        $(".tab-content .tab-pane").addClass("active-nav");
    });

});

$(function() {
    $.contextMenu({
        selector: '.context-menu_active',
        trigger: 'left',
        callback: function(key, options) {},
        items: {
            "edit": {
                name: "Edit"
            },
            "deactivate": {
                name: "Deactivate"
            }
        }
    });
    $.contextMenu({
        selector: '.context-menu_inactive',
        trigger: 'left',
        callback: function(key, options) {},
        items: {
            "edit": {
                name: "Edit"
            },
            "deactivate": {
                name: "Deactivate"
            },
            "servicereques": {
                name: "Service Request"
            }
        }
    });
});


$(function() {
    $.contextMenu({
        selector: '.context-menu_new',
        trigger: 'left',
        callback: function(key, options) {},
        items: {
            "edit_rechedule": {
                name: "Edit & Rechedule"
            },
            "inquery": {
                name: "Inquiry"
            },
            "historylog": {
                name: "History Log"
            },
            "downloadinvoice": {
                name: "Download Invoice"
            },
            "othertransaction": {
                name: "Other Transaction"
            }
        }
    });
    $.contextMenu({
        selector: '.context-menu_pending',
        trigger: 'left',
        callback: function(key, options) {},
        items: {
            "edit_rechedule": {
                name: "Edit & Rechedule"
            },
            "refund": {
                name: "Refund"
            },
            "cancle": {
                name: "Cancle"
            },
            "changeSP": {
                name: "Change SP"
            },
            "escalate": {
                name: "Escalate"
            },
            "historylog": {
                name: "History Log"
            },
            "downloadinvoice": {
                name: "Download Invoice"
            }
        }
    });
    $.contextMenu({
        selector: '.context-menu_cancelled',
        trigger: 'left',
        callback: function(key, options) {},
        items: {
            "edit_rechedule": {
                name: "Edit & Rechedule"
            },
            "refund": {
                name: "Refund"
            },
            "inquery": {
                name: "Inquiry"
            },
            "historylog": {
                name: "History Log"
            },
            "downloadinvoice": {
                name: "Download Invoice"
            },
            "othertransaction": {
                name: "Other Transaction"
            }
        }
    });
    $.contextMenu({
        selector: '.context-menu_completed',
        trigger: 'left',
        callback: function(key, options) {},
        items: {
            "refund": {
                name: "Refund"
            },
            "escalate": {
                name: "Escalate"
            },
            "historylog": {
                name: "History Log"
            },
            "downloadinvoice": {
                name: "Download Invoice"
            }
        }
    });
});


$(document).ready(function() {

    $('#LoginError').hide('fade');
    $('#ForgotError').hide('fade');
    $('#ResetError').hide('fade');

    if (window.location.href.indexOf('#LoginModal') != -1) {

        $('#LoginModal').modal('show');

        $('#LoginModal .close').click(function() {
            window.location.href = "";
        });

    }

    if (window.location.href.indexOf('#ForgotModal') != -1) {

        $('#ForgotModal').modal('show');

        $('#ForgotModal .close').click(function() {
            window.location.href = "";
        });

    }

    if (window.location.href.indexOf('#ResetModal') != -1) {

        $('#ResetModal').modal('show');

        if (window.location.href.indexOf('&resetkey=') != -1) {

            $('#ResetModal .close').click(function() {
                window.location.href = "HomePage.php";
            });
        } else {
            $('#ResetModal .close').click(function() {
                window.location.href = "";
            });
        }


    }

    $('#close-alert').click(function() {
        $('#LoginError').hide('fade');
    });

    $('#close-alert-forgot').click(function() {
        $('#ForgotError').hide('fade');
    });

    $('#close-alert-reset').click(function() {
        $('#ResetError').hide('fade');
    });

    // Disable click outside of modal area

    $('#Warning21Hour').modal({
        backdrop: 'static',
        keyboard: false,
        show: false
    });

    $('#LoginModal').modal({
        backdrop: 'static',
        keyboard: false,
        show: false
    });

    $('#ForgotModal').modal({
        backdrop: 'static',
        keyboard: false,
        show: false
    });

    $('#ResetModal').modal({
        backdrop: 'static',
        keyboard: false,
        show: false
    });

    $('#WarningLess3Hour').modal({
        backdrop: 'static',
        keyboard: false,
        show: false
    });

    $('#fullDetail').modal({
        backdrop: 'static',
        keyboard: false,
        show: false
    });

});

function LoginModal() {
    window.location.href = "#LoginModal";

    $('#LoginModal .close').click(function() {
        window.location.href = "";
    });
}

function ForgotModal() {
    window.location.href = "#ForgotModal";

    $('#ForgotModal .close').click(function() {
        window.location.href = "";
    });
}