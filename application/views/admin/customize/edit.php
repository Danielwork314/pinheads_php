<section class="content-header">
	<h1>
		Edit Customize
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>customize">
				<i class="fa fa-share-square"></i> Customize</a>
		</li>
		<li>
			<a href="<?= base_url() ?>customize/edit/<?= $customize['customize_id'] ?>"> Edit Customize</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="col-lg-6 col-md-6">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Customize</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" class="input_form" method="POST" action="<?= base_url()?>customize/edit/<?= $customize['customize_id'] ?>" enctype="multipart/form-data">
			<div class="box-body">
				<?php 
				if (isset($error)) { 
					?>
					<div class="alert alert-danger alert-dismissable">
						<?= $error; ?>						
					</div>
					<?php 
				}
				?>

				<?= $input_field['customize'] ?>

				<div class="form-group">
					<div class="col-md-9 dressing_menu">
						<label>Dressing Menu</label>
						<div class="form_food">
						<select class="form-control" required id="dressing_id">
							<?php foreach ($dressing_list as $row) { ?>
								<option value="<?= $row['dressing_id'] ?>"><?= $row['dressing'] ?></option>
							<?php } ?>
						</select>
						</div>
					</div>
				
					<div class="col-md-3 dressing_menu" style="padding-top: 24px;">
						<button type="button" id="add_dressing" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</button>
					</div>
				</div>
				<div class="form-group">
                    <table class="table table-hover table-stripe">
                        <thead>
                            <tr>
                                <th width="70%" class="dressing_tr">Dressing List</th>
                                <th width="30%"></th>
                            </tr>
                        </thead>
                        <tbody id="dressing_list"></tbody>
                    </table>
                </div>
            </div>
			
			<div class="box-footer">
				<button type="button" class="btn btn-primary pull-right submit_btn">Submit</button>
			</div>
		</form>
	</div>
	</div>
</section>

<script>

	var dressing_array = [];

    $(document).ready(function(){

        <?php foreach($dressing as $row){ ?>
            
            addDressing(<?= $row['dressing_id'] ?>);

        <?php } ?>
    });

	$('#add_dressing').click(function(){

		var dressing_id = $('#dressing_id').val();

        addDressing(dressing_id);

	});

    function addDressing(dressing_id){

        postParam = {

            dressing_id: dressing_id
        };

        $.ajax({
            url:'<?=base_url()?>Ajax/addDressing',
            type: "POST",
            data: postParam,
            success:function(data)
            {
                var data = JSON.parse(data);
                var dressing = data.data;
                console.log(dressing);

                var html = '<tr id="tr_' + dressing.dressing_id + '">';
                    html += '<td>' + dressing.dressing + '</td>';
                    html += '<td><button type="button" class="btn btn-danger pull-right" onclick="removeDressing(' + dressing.dressing_id + ')">Remove</button></td>';
                    html += '</tr>';

                dressing_array.push({ dressing_id: dressing.dressing_id });

                console.log(dressing_array);
                
                $("#dressing_list").append(html);

            }, 
            error: function () {
                console.log("error");
            }
        });
    }

	function removeDressing(dressing_id){

		$('#tr_' + dressing_id).closest('tr').remove();

		var index = dressing_array.map(function(e) { return e.dressing_id; }).indexOf(dressing_id.toString());

		if(index != -1){

			dressing_array.splice(index, 1);
		}

		console.log(dressing_array);
	}

	$('.submit_btn').click(function(){

		var customize = $('#form_customize').val();

		if(!customize){
			alert('Please give this customize set a name!');
			return false;
		}

		if(dressing_array.length <= 0 ){

			alert('Please put in at least one Dressing');
			return false;
		}

		postParam = {
			customize: customize,
			dressing_array: dressing_array,
		};

		console.log(postParam);

		$.ajax({
			url:'<?=base_url()?>Customize/edit/<?= $customize['customize_id'] ?>',
			type: "POST",
			data: postParam,
			success:function(data)
			{
				console.log(data);
				window.location = "<?= base_url() ?>Customize/details/<?= $customize['customize_id'] ?>";
			}, 
			error: function () {
				console.log("error");
			}
		});
	});
</script>