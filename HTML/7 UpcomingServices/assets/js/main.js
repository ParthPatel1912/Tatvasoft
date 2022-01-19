    $(document).ready(function() {
        $('#example').dataTable({
            "bPaginate": false,
            "bFilter": false,
            "bInfo": false,
            'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [-1] /* 1st one, start by the right */
            }]
        });

    })