$(document).ready(function() {
    $('#UserManagement').dataTable({
        "bPaginate": true,
        "bFilter": true,
        "bInfo": true,
        'aoColumnDefs': [{
            'bSortable': false,
            'aTargets': [-1] /* 1st one, start by the right */
        }]
    });

})


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