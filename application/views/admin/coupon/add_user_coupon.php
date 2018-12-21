<div class="content-container" style="display: flow-root;">
<section class="content-header">
	<h1>
		Assign Coupon
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>coupon">
				<i class="fa fa-money-bill-wave"></i> Coupon</a>
		</li>
        <li>
            <a href="<?= base_url() ?>coupon/details/<?= $coupon_id ?>"> Coupon</a>
		</li>
		<li>
			<a href="<?= base_url() ?>coupon/add_user_coupon/<?= $coupon_id ?>"> Assign Coupon</a>
		</li>
	</ol>
</section>v
<br>
<section class="content">
	<div class="col-md-6 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">User</h3>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<div class="form-group">
					<div class="col-md-9 customize_menu">
						<label>User</label>
						<div class="form_food">
						<select class="form-control select2" required id="user_id">
							<?php foreach ($user as $row) { ?>
								<option value="<?= $row['user_id'] ?>"><?= $row['username'] ?></option>
							<?php } ?>
						</select>
						</div>
					</div>
				
					<div class="col-md-3 customize_menu" style="padding-top: 24px;">
						<button type="button" id="add_user" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add</button>
					</div>
				</div>
				<div class="form-group">
                    <table class="table table-hover table-stripe">
                        <thead>
                            <tr>
                                <th width="70%" class="customize_tr">User List</th>
                                <th width="30%"></th>
                            </tr>
                        </thead>
                        <tbody id="user_list"></tbody>
                    </table>
                </div>
			</div>
			<div class="box-footer">
				<button type="button" onclick="submit()" class="btn btn-primary pull-right">Submit</button>
			</div>
		</div>
	</div>
</section>

<script>
    var user_array = [];

    $('#add_user').click(function(){

        var user_id = $('#user_id').val();

        postParam = {

            user_id: user_id
        };

        $.ajax({
            url:'<?=base_url()?>Ajax/addUser',
            type: "POST",
            data: postParam,
            success:function(data)
            {
                var data = JSON.parse(data);
                var user = data.data;
                console.log(user);

                var html = '<tr id="tr_' + user.user_id + '">';
                    html += '<td>' + user.username + '</td>';
                    html += '<td><button type="button" class="btn btn-danger pull-right" onclick="removeUser(' + user.user_id + ')">Remove</button></td>';
                    html += '</tr>';

                user_array.push({ user_id: user.user_id });

                console.log(user_array);
                
                $("#user_list").append(html);

            }, 
            error: function () {
                console.log("error");
            }
        });
    });

    function removeUser(user_id){

        $('#tr_' + user_id).closest('tr').remove();

        var index = user_array.map(function(e) { return e.user_id; }).indexOf(user_id.toString());

        if(index != -1){

            user_array.splice(index, 1);
        }

        console.log(user_array);
    }

    function submit() {

        var url = '<?= base_url() ?>coupon/add_user_coupon/<?= $coupon_id ?>';

        postParam = {
            user_array: user_array
        };

        $.ajax({
            url: url,
            data: postParam,
            type: "POST",
            success: function(response) {

                console.log(response);
                window.location.href = "<?= base_url()?>coupon/details/<?= $coupon_id ?>";
            }, 
            error: function () {
                console.log("error");
            }
        });
    }
</script>