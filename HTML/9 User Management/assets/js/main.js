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