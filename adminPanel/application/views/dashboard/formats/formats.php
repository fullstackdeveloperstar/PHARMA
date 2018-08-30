<!-- #MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Formats</li>
					
				</ol>
				<!-- end breadcrumb -->

				

			</div>
			<!-- END RIBBON -->

			<!-- #MAIN CONTENT -->
			<div id='content'>
				<div class="row">
					<!-- col -->
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">
							
							<!-- PAGE HEADER -->
							<i class="fa-fw fa fa-home"></i> 
								Formats
						</h1>
					</div>
					<!-- end col -->	
				</div>




		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
			
			<header>
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Standard Data Tables </h2>

			</header>

			<!-- widget div-->
			<div>

				
				<!-- widget content -->
				<div class="widget-body no-padding">
					<div>
						<button class="btn btn-success" id="addnewformatbtn">Add New Format</button>	
					</div>
					<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
						<thead>			                
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Description</th>
								<th>Confection quantity units of measure</th>
								<th>Language</th>
								<th>Last Modified</th>
								<th>Creation</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody id="format_table_tbody">
							
							<?php
								$i = 0;

								foreach ($formats as $format) {
									$i++;
									?>
									<tr data-format-id="<?=$format['id']?>" class="smart-form">
										<td><?=$i?></td>
										<td>
											<span data-format-id="<?=$format['id']?>"><?=$format['name']?></span>
											<input  data-format-id="<?=$format['id']?>" type="text" name="" value="<?=$format['name']?>" class="form-control hide edit_name">
										</td>

										<td>
											<span data-format-id="<?=$format['id']?>"><?=$format['description']?></span>
											<input  data-format-id="<?=$format['id']?>" type="text" name="" value="<?=$format['description']?>" class="form-control hide edit_description">
										</td>

										<td>
											<?php 
												foreach ($confections as $confection) {
													if($confection['id'] == $format['confection_quantity_units_of_measure_id'])
													{
														echo '<span data-format-id="'.$format['id'].'">'.$confection['unit_of_measure'].'</span>';
													}	
												}
											?>

											<select class="form-control hide edit-confection"  data-format-id="<?=$format['id']?>">
												<?php
													foreach ($confections as $confection) {
														?>
														<option <?php echo $confection['id'] == $format['confection_quantity_units_of_measure_id']? 'selected': '';?> value="<?=$confection['id']?>" ><?=$confection['unit_of_measure']?></option>
														<?php
													}
												?>
											</select>
										</td>

										<td>
											<?php 
												foreach ($languages as $language) {
													if($language['id'] == $format['languages_id'])
													{
														echo '<span data-format-id="'.$format['id'].'">'.$language['name'].'</span>';
													}	
												}
											?>

											<select class="form-control hide edit-language"  data-format-id="<?=$format['id']?>">
												<?php
													foreach ($languages as $language) {
														?>
														<option <?php echo $language['id'] == $format['languages_id']? 'selected': '';?> value="<?=$language['id']?>" ><?=$language['name']?></option>
														<?php
													}
												?>
											</select>
										</td>

										<th>
											<span data-format-id="<?=$format['id']?>"><?=$format['lastmodified']?></span>
										</th>

										<th>
											<span data-format-id="<?=$format['id']?>"><?=$format['creation']?></span>
										</th>
										
										<td>
											<button class="hide btn btn-success saveformatbtn" data-format-id="<?=$format['id']?>" style="padding: 6px 12px;">Save</button>
											<button class="hide btn btn-danger cancelformatbtn" data-format-id="<?=$format['id']?>" style="padding: 6px 12px;">Cancel</button>
											<button class="btn btn-success editformatbtn" data-format-id="<?=$format['id']?>"   style="padding: 6px 12px;">Edit</button>
											<button class="btn btn-danger deleteformatbtn" data-format-id="<?=$format['id']?>"  style="padding: 6px 12px;">Delete</button>
										</td>
									</tr>
									<?php
								}
							?>
						</tbody>
					</table>

				</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->



<script >
$(document).ready(function() {
	var responsiveHelper_dt_basic = undefined;
	var responsiveHelper_datatable_fixed_column = undefined;
	var responsiveHelper_datatable_col_reorder = undefined;
	var responsiveHelper_datatable_tabletools = undefined;
	
	var breakpointDefinition = {
		tablet : 1024,
		phone : 480
	};

	var format_table = $('#dt_basic').dataTable({
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
			"t"+
			"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		"autoWidth" : true,
        "oformat": {
		    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
		},
		"preDrawCallback" : function() {
			// Initialize the responsive datatables helper once.
			if (!responsiveHelper_dt_basic) {
				responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
			}
		},
		"rowCallback" : function(nRow) {
			responsiveHelper_dt_basic.createExpandIcon(nRow);
		},
		"drawCallback" : function(oSettings) {
			responsiveHelper_dt_basic.respond();
		}
	});
	
	var addnewtr = $("#addnewtr");
	var is_add_new = false;
	$("#addnewformatbtn").click(function(){
		 // addnewtr.removeClass('hide');
		 if(is_add_new) return;
		 is_add_new = true;
		  var lang_str = `
		 	<td>
			 	<select id="addlanguage" class="form-control add-language">
					<?php
						foreach ($languages as $language) {
							?>
							<option value="<?=$language['id']?>" ><?=$language['name']?></option>
							<?php
						}
					?>
				</select>
			</td>
		 `;

		 var confection_str = `
		 	<td>
			 	<select id="addconfection" class="form-control add-confection">
					<?php
						foreach ($confections as $confection) {
							?>
							<option value="<?=$confection['id']?>" ><?=$confection['unit_of_measure']?></option>
							<?php
						}
					?>
				</select>
			</td>
		 `;

		 $("#format_table_tbody").prepend(`
		 	<tr class="smart-form" id="addnewtr">
				<td></td>
				<td><input type="text" class="form-control" name="" id="addnew_name"></td>
				<td><input type="text" class="form-control" name="" id="addnew_description"></td>
				` + confection_str + `
				` + lang_str + `
				<td></td>
				<td></td>
				<td>
					<div class="btn btn-success" id="addnewaddbtn" style="padding: 6px 12px;">Add</div>
					<div class="btn btn-danger" id="addnewcancelbtn" style="padding: 6px 12px;">Cancel</div>
				</td>
			</tr>
		 `);
	});



	$(document).on('click', '#addnewcancelbtn', function(){
		$("#addnewtr").remove();
		is_add_new = false;
	});

	$(document).on('click', '#addnewaddbtn', function() {
		var addnew_name = $("#addnew_name").val();
		var addnew_description = $("#addnew_description").val();
		var addlanguage = $("#addlanguage").val();
		var addconfection = $("#addconfection").val();
		

		if(addnew_name == ''){
			$("#addnew_name").parent().addClass('state-error');
		}else{
			$("#addnew_name").parent().removeClass('state-error');	
		}

		if(addnew_description == ''){
			$("#addnew_description").parent().addClass('state-error');
		}else{
			$("#addnew_description").parent().removeClass('state-error');	
		}

		if(addnew_name == '' || addnew_description == '') {
			return;
		}

		$.ajax({
			url: "<?=base_url()?>Formats/postAddNew",
			type: 'post',
			dataType: 'json',
			data: {
				name: addnew_name,
				description : addnew_description,
				confection: addconfection,
				language: addlanguage
			},
			success: function(res){
				// console.log(res);
				if(res.success == '1') {
					location.reload();
				}
			}
		});
	});

	$(".editformatbtn").click(function(){
		var format_id = $(this).data('format-id');
		$('span[data-format-id="' + format_id + '"').addClass('hide');
		$('input[data-format-id="' + format_id + '"').removeClass('hide');
		$('select[data-format-id="' + format_id + '"').removeClass('hide');
		$('.editformatbtn[data-format-id="' + format_id + '"').addClass('hide');
		$('.deleteformatbtn[data-format-id="' + format_id + '"').addClass('hide');
		$('.saveformatbtn[data-format-id="' + format_id + '"').removeClass('hide');
		$('.cancelformatbtn[data-format-id="' + format_id + '"').removeClass('hide');
	});



	$(".cancelformatbtn").click(function(){
		var format_id = $(this).data('format-id');
		$('.editformatbtn[data-format-id="' + format_id + '"').removeClass('hide');
		$('.deleteformatbtn[data-format-id="' + format_id + '"').removeClass('hide');
		$('.saveformatbtn[data-format-id="' + format_id + '"').addClass('hide');
		$('.cancelformatbtn[data-format-id="' + format_id + '"').addClass('hide');
		$('span[data-format-id="' + format_id + '"').removeClass('hide');
		$('input[data-format-id="' + format_id + '"').addClass('hide');
		$('select[data-format-id="' + format_id + '"').addClass('hide');
	});

	$(".saveformatbtn").click(function() {
		var format_id = $(this).data('format-id');
		var edit_name = $('.edit_name[data-format-id="' + format_id + '"').val();
		var edit_description = $('.edit_description[data-format-id="' + format_id + '"').val();
		var edit_confection = $('.edit-confection[data-format-id="' + format_id + '"').val();
		var edit_language = $('.edit-language[data-format-id="' + format_id + '"').val();
	
		if(edit_name == "") {
			$('.edit_name[data-format-id="' + format_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_name[data-format-id="' + format_id + '"').parent().removeClass('state-error');
		}

		if(edit_description == "") {
			$('.edit_description[data-format-id="' + format_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_description[data-format-id="' + format_id + '"').parent().removeClass('state-error');
		}

		if(edit_name == "" || edit_description == "") {
			return;
		}

		$.ajax({
			url : "<?=base_url()?>Formats/postEdit",
			type: 'post',
			dataType: 'json',
			data : {
				id: format_id,
				name: edit_name,
				description: edit_description,
				confection: edit_confection,
				language: edit_language
			},
			success : function(res){
				if(res.success == '1'){
					location.reload();
				}
			}
		});

	});


	$(".deleteformatbtn").click(function(e) {
		var format_id = $(this).data('format-id');
		$.SmartMessageBox({
			title : "Delete format",
			content : "Do you really want to Delete it?",
			buttons : '[No][Yes]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Yes") {
				$.ajax({
					url : '<?=base_url()?>Formats/deleteFormat', 
					type: 'post',
					dataType: 'json',
					data : {
						id: format_id
					},
					success : function(res) {
						if(res.success == '1')
						{
							location.reload();
						}
					}
				});

			}
			if (ButtonPressed === "No") {
			}

		});
		e.preventDefault();
	})


});

</script>
