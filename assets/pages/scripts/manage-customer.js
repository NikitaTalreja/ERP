var TableDatatables = function(){
    var handleCustomerTable = function(){
        var customerTable = $("#customer_list");
        
        var oTable = customerTable.dataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                url: "http://localhost/erp/pages/scripts/customer/manage.php",
                type: "POST",
            },
            "lengthMenu":[
                [5, 15, 20, -1],
                [5, 15, 20, "All"]
            ],
            "pageLength": 15,
            "order": [
                [0, "desc"]
            ],
            "columnDefs": [{
                'orderable': false,
                'targets': [-1,-2,-3]
            }]
        });
        customerTable.on('click','.edit', function(e){
            $id = $(this).attr('id');
            $("#edit_customer_id").val($id);
            
            //fetching all the other values from database using ajax and loading them onto their respective edit fields
            $.ajax({
                url: "http://localhost/erp/pages/scripts/customer/fetch.php",
                method: "POST",
                data: {customer_id: $id},
                dataType: "json",
                success: function(data){
                    $("#customer_name").val(data.customer_name);
                    $("#customer_address").val(data.customer_address);
                    $("#customer_email").val(data.customer_email);
                    $("#customer_contact").val(data.customer_contact);
                    $("#gst_no").val(data.gst_no);
                    $("#editModal").modal('show');
                },
            });
            
        });
        customerTable.on('click','.delete', function(e){
            $id = $(this).attr('id');
            $("#recordID").val($id);
            
        });
    }
    return{
        init: function(){
            handleCustomerTable();
        }
    };
}();
jQuery(document).ready(function(){
    TableDatatables.init();
});