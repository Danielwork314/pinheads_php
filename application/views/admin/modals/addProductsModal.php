

<!--========== Add Products MODAL ============= -->
<div class="modal" id="add_products_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label>Import via CSV</label>
            <input type="file" name="add_product_modal_import" id="add_product_modal_import" class="form-control">
            <a href="<?= site_url('files/template/add_project_add_location.csv'); ?>">Download template</a>
            <hr>
            <input type="text" class="form-control" id="add_products_modal_search">
            <br>
            <button type="button" id="add_products_modal_button" class="btn btn-primary pull-right">Search</button>
            <br>
            <hr>
            <div class="full_width" id="add_products_modal_result">

            </div>
      </div>

    </div>
  </div>
</div>

<script>
    var productsModalResult = [];
    $(document).ready(function(){
            $("#add_products_modal_button").on('click',function(){
                var value = $("#add_products_modal_search").val();
      
                $.post("<?= site_url('Ajax/getProducts'); ?>",
                {
                    search: value
                },
                function(res){
                    $("#add_products_modal_result").html('');
                    productsModalResult = res.data;
                    for(var i = 0; i < res.data.length; i++){

                        var addedBefore = false; // addedProductsRow is an array variable found in project/add.php
                        for(var j = 0; j < addedProductsRows.length; j++){
                            if (addedProductsRows[j].item_id == res.data[i].item_id)
                                addedBefore = true;
                        }
                        
                        if (!addedBefore){
                            var row = addProductsModalCreateRow(res.data[i]);
                            $("#add_products_modal_result").append(row);
                        }
                    }
                },"json");
            });
            
    });

    function addProductsModalCreateRow(item){
        var row = "<div class='location_modal_row' id='add_products_modal_row_"+ item.item_id +"' style='width:100%'>";
        row += "<label>" + item.item + "</label>";
        row += "<button type='button' class='btn btn-info pull-right' onclick='addProductsModalAddRow("+ item.item_id +")'>Add</button>";
        row += "</div>";

        return row;
    }

    function addProductsModalReset(){
        $("#add_products_modal_search").val('');
        $("#add_products_modal_result").html('');
    }
    function addProductsModalAddRow(target){
       
      console.log(target);
        for(var i = 0; i < productsModalResult.length; i++){
            if (productsModalResult[i].item_id != target) continue;
            else{
                createAddProductsRow(productsModalResult[i]);
                $("#add_products_modal_row_"+target).hide('slide',{
                    direction: "left"
                });
                break;
            }
            

        }
    }
    
</script>