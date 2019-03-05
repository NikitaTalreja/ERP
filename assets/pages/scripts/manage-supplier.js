var TableDatatables = function(){
    var handleSupplierTable = function(){
        var supplierTable = $("#supplier_list");
        
        var oTable = supplierTable.dataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                url: "http://localhost/erp/pages/scripts/supplier/manage.php",
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
        supplierTable.on('click','.edit', function(e){
            $id = $(this).attr('id');
            $("#edit_supplier_id").val($id);
            
            //fetching all the other values from database using ajax and loading them onto their respective edit fields
            $.ajax({
                url: "http://localhost/erp/pages/scripts/supplier/fetch.php",
                method: "POST",
                data: {supplier_id: $id},
                dataType: "json",
                success: function(data){
                    $("#supplier_name").val(data.supplier_name);
                    $("#supplier_address").val(data.supplier_address);
                    $("#supplier_email").val(data.supplier_email);
                    $("#supplier_contact").val(data.supplier_contact);
                    $("#gst_no").val(data.gst_no);
                    $("#editModal").modal('show');
                },
            });
            
        });
        supplierTable.on('click','.delete', function(e){
            $id = $(this).attr('id');
            $("#recordID").val($id);
            
        });
    }
    return{
        init: function(){
            handleSupplierTable();
        }
    };
}();
jQuery(document).ready(function(){
    TableDatatables.init();
});