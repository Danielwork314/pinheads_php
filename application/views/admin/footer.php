		</div>
	</div>
</div>
<!-- /.content-wrapper -->

<!-- <footer class="main-footer">
            </footer> -->

</div>
<!-- ./wrapper -->


<!--========== LOCATION MODAL ============= -->
<?php include('modals/locationModal.php'); ?>
<?php include('modals/addProductsModal.php'); ?>

<!-- jQuery 3 -->

<script src="<?= base_url() ?>js/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>js/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>js/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url() ?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>js/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>js/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>js/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url() ?>js/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url() ?>js/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>js/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>js/demo.js"></script>
<script src="<?= base_url() ?>js/functions.js"></script>
<script src="<?= base_url() ?>js/steps.js"></script>
<!-- IonIcon -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.0.0-7/collection/icon/icon.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>


<script>
	$(document).ready(function () {
		$(".datepicker").datepicker({
			format: 'dd-mm-yyyy'
		});

		$(".data-table").DataTable({});

		$(".input_form").validate({
			rules: {
				password2: {
					equalTo: "#form_password"
				},
				contact: {
					number: true
				}
			},
			messages: {
				password2: {
					equalTo: "Passwords do not match."
				},
				contact: {
					number: "Only numbers from 0-9 are allowed."
				}
			}
		});
	});

	$('input').change(function(){
		var input = $(this).val();
		$(this).val($.trim(input));
	});

	// $(document).on('change','.image_input', function(){
	// 	var input_name = $(this).attr('name');
		
	// alert(input_name);

	// 	if($(this).files && $(this).files[0]){
	// 		var reader = new FileReader();
            
    //         reader.onload = function (e) {
	// 			html ="<img src='" + e.target.result + "'>";
    //             $('#preview_' + input_name).html(html);
    //         }
            
    //         reader.readAsDataURL(input.files[0]);
	// 	}
	// });

	 function displaySingle(input, input_name) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
				var html ="<img src='" + e.target.result + "'>";

                $('#preview_' + input_name).html(html);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

	$(document).on('change','.image_input', function(){

		 var input_name = $(this).attr('name');

        displaySingle(this,input_name);
	});
	
	function displayMultiple(input, input_name) {

		if (input.files && input.files[0]) {
			i = 0;
			$('#preview_' + input_name).html('');
			$(input.files).each(function(){
				var reader = new FileReader();

				reader.onload = function (e) {
					var html = "<div class='col-sm-4 col-xs-12 multi_preview_wrapper'>";
					html += "<div class='col-sm-4 col-xs-12 multi_preview_image'>";
					html += "<img src='" + e.target.result + "'>";
					html += "</div>";
					html += "</div>";

					$('#preview_' + input_name).append(html);
				}

				reader.readAsDataURL(input.files[i]);
				i++;
			});
		}
	}

	$(document).on('change','.image_input_multiple', function(){

		var input_name = $(this).attr('name');
		input_name = input_name.substr(0, input_name.length - 2);

		displayMultiple(this,input_name);
	});

	$(document).on("click", ".delete-button", function (e) {
		e.preventDefault();

		var delete_record = confirm("Are you sure you want to delete this record?");
		var path = $(this).attr("href");

		if (delete_record === true) {
			window.location.replace(path);
		}
	});

	$(document).on("click", "#toggle-sidebar", function (e) {
		console.log($('.sidebar-mini').hasClass("sidebar-collapse"));

		if ($('.sidebar-mini').hasClass("sidebar-collapse") === true) {
			$('.sidebar-mini').addClass("sidebar-collapse");
		} else {
			$('.sidebar-mini').removeClass("sidebar-collapse");
		}
	});

</script>
</body>

</html>
