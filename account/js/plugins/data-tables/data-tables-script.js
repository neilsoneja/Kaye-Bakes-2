$(document).ready(function(){
    $('#data-table-customer').DataTable({
		    paging: false
	});
    $('#data-table-admin').DataTable({

		    paging: false,
			ordering: false,
	});	
    var table = $('#data-table-row-grouping').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 4 }
        ],
        "order": [[ 4, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(4, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    });
 
    // Order by the grouping
    $('#data-table-row-grouping tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 4 && currentOrder[1] === 'asc' ) {
            table.order( [ 4, 'desc' ] ).draw();
        }
        else {
            table.order( [ 4, 'asc' ] ).draw();
        }
    } );


    });