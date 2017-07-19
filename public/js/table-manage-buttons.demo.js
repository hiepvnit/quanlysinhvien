/*   
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 1.9.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v1.9/admin/
*/

var handleDataTableButtons = function() {
	"use strict";
    
    if ($('#data-table').length !== 0) {
        $('#data-table').DataTable({
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