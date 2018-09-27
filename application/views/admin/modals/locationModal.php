

<!--========== LOCATION MODAL ============= -->
<div class="modal" id="location_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select Locations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <label>Import via CSV</label>
            <input type="file" name="location_modal_import" id="location_modal_import" class="form-control">
            <a href="<?= site_url('files/template/add_project_add_location.csv'); ?>">Download template</a>
            <hr>
            <label>User</label>
            <select name="user" class="form-control" id="location_modal_supervisor">
                <?php foreach($supervisors as $row){ ?>
                <option value="<?= $row['username']; ?>"><?= $row['username']; ?></option>
                <?php } ?>
            </select>
            <label>Search For Location</label>
            <input type="text" placeholder="search for a place" class="form-control" id="location_modal_location_search">
            <br>
            <button type="button" id="location_modal_location_button" class="btn btn-primary pull-right">Search</button>
            <br>
            <hr>
            <div class="full_width" id="location_modal_result">

            </div>
      </div>

    </div>
  </div>
</div>

<script>
    var locationModalResult = [];
    $(document).ready(function(){
            $("#location_modal_location_button").on('click',function(){
                var value = $("#location_modal_location_search").val();
      
                $.post("<?= site_url('Ajax/getLocations'); ?>",
                {
                    search: value
                },
                function(res){
                    $("#location_modal_result").html('');
                    locationModalResult = res.data;
                    for(var i = 0; i < res.data.length; i++){

                        var addedBefore = false; // addedOutletRows is an array variable found in project/add.php
                        for(var j = 0; j < addedOutletRows.length; j++){
                            if (addedOutletRows[j].customer_code == res.data[i].customer_code)
                                addedBefore = true;
                        }
                        
                        if (!addedBefore){
                            var row = locationModalCreateRow(res.data[i]);
                            $("#location_modal_result").append(row);
                        }
                    }
                },"json");
            });
            
    });

    function locationModalCreateRow(item){
        var row = "<div class='location_modal_row' id='location_modal_row_"+ item.outlet_id +"' style='width:100%'>";
        row += "<label>[" + item.customer_code + "] " + item.customer_name + " ( " + item.outlet + " )</label>";
        row += "<button type='button' class='btn btn-info pull-right' onclick='locationModalAddRow("+ item.outlet_id +")'>Add</button>";
        row += "</div>";

        return row;
    } 

    function locationModalReset(){
        $("#location_modal_location_search").val('');
        $("#location_modal_result").html('');
    }
    function locationModalAddRow(target){
       
        var user = $("#location_modal_supervisor").val();
        for(var i = 0; i < locationModalResult.length; i++){
            if (locationModalResult[i].outlet_id != target) continue;
            else{
                createLocationRow(locationModalResult[i],user);
                $("#location_modal_row_"+target).hide('slide',{
                    direction: "left"
                });
                break;
            }
            

        }
    }
    
</script>