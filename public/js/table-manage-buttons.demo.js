/*   
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 1.9.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v1.9/admin/
*/

var handleDataTableButtons = function() {
	"use strict";
    
    if ($('#data-table').length !== 0) {
        $('#data-table tfoot th').each( function (i) {
            var title = $('#data-table thead th').eq( $(this).index() ).text();
            $(this).html( '<input type="text" placeholder="Tìm '+title+'" data-index="'+i+'" />' );
        } );
        var table = $('#data-table').DataTable({
            dom: 'lBfrtip',
            buttons: [
                {
                    text: 'Xuất Excel',
                    extend: 'excel',
                    className: 'btn-sm',
                    exportOptions: {
                        modifier: {
                            selected: true
                        }
                    }
                }
            ],
            scrollY:        true,
            scrollX:        true,
            scrollCollapse: true,
            paging:         true,
            select: true,
            fixedColumns:   {
                leftColumns: 4
            }
        });

        // Filter event handler
        $( table.table().container() ).on( 'keyup', 'tfoot input', function () {
            table
                .column( $(this).data('index') )
                .search( this.value )
                .draw();
        } );
    }
};

var TableManageButtons = function () {
	"use strict";
    return {
        //main function
        init: function () {
            handleDataTableButtons();
        }
    };
}();