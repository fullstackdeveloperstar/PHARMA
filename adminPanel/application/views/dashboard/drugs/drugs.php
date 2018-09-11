<!-- #MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Drugs</li>
					
				</ol>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right" style="margin-right:25px">
					<a href="#" id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa fa-grid"></i> Change Grid</a>
					<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa fa-plus"></i> Add</span>
					<button id="search" class="btn btn-ribbon" data-title="search"><i class="fa fa-search"></i> <span class="hidden-mobile">Search</span></button>
				</span> -->

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
								Drugs
						</h1>
					</div>
					<!-- end col -->
					
				</div>
				<!-- end row -->
				
				<!-- END #MAIN CONTENT -->


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
						<button class="btn btn-success" id="addnewdrugbtn">Add New Drug</button>	
					</div>
					<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
						<thead>			                
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Producer</th>
								<th>Type of Production</th>
								<th>Description</th>
								<th>Language</th>
								<th>Enabled</th>
								<th>Last Modified</th>
								<th>Creation</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody id="drug_table_tbody">
							
							<?php
								$i = 0;

								foreach ($drugs as $drug) {
									$i++;
									?>
									<tr data-drug-id="<?=$drug['id']?>" class="smart-form">
										<td><?=$i?></td>
										<td>
											<span data-drug-id="<?=$drug['id']?>"><?=$drug['name']?></span>
											<input  data-drug-id="<?=$drug['id']?>" type="text" name="" value="<?=$drug['name']?>" class="form-control hide edit_name">
										</td>

										<td>
											<span data-drug-id="<?=$drug['id']?>"><?=$drug['producer']?></span>
											<input  data-drug-id="<?=$drug['id']?>" type="text" name="" value="<?=$drug['producer']?>" class="form-control hide edit_producer">
										</td>

										<td>
											<span data-drug-id="<?=$drug['id']?>">
												<?php
												switch ($drug['type_of_production']) {
													case 'branded':
														echo 'Branded';
														break;
													case 'generic':
														echo 'Generic';
														break;
													case 'galenic':
														echo 'Galenic';
														break;
													
													default:
														break;
												}
												?>
											</span>

											<select class="form-control hide edit_type_of_production" data-drug-id="<?=$drug['id']?>">
												<option value="branded">Branded</option>
												<option value="generic">Generic</option>
												<option value="galenic">Galenic</option>
												
											</select>
										</td>

										<td>
											<span data-drug-id="<?=$drug['id']?>"><?=$drug['description']?></span>
											<input  data-drug-id="<?=$drug['id']?>" type="text" name="" value="<?=$drug['description']?>" class="form-control hide edit_description">
										</td>

										<td>
											<?php 
												foreach ($languages as $language) {
													if($language['id'] == $drug['languages_id'])
													{
														echo '<span data-drug-id="'.$drug['id'].'">'.$language['name'].'</span>';
													}	
												}
											?>

											<select class="form-control hide edit_language"  data-drug-id="<?=$drug['id']?>">
												<?php
													foreach ($languages as $language) {
														?>
														<option <?php echo $language['id'] == $drug['languages_id']? 'selected': '';?> value="<?=$language['id']?>" ><?=$language['name']?></option>
														<?php
													}
												?>
											</select>
										</td>

										<td>
											<span data-drug-id="<?=$drug['id']?>">
												<?php
												switch ($drug['enabled']) {
													case '1':
														echo 'Yes';
														break;
													case '0':
														echo 'No';
														break;
													default:
														break;
												}
												?>
											</span>

											<select class="form-control hide edit_enabled" data-drug-id="<?=$drug['id']?>">
												<option value="1">Yes</option>
												<option value="0">No</option>
											</select>
										</td>

										<th>
											<span data-drug-id="<?=$drug['id']?>"><?=$drug['last_modified']?></span>
										</th>

										<th>
											<span data-drug-id="<?=$drug['id']?>"><?=$drug['creation']?></span>
										</th>
										
										<td>
											<button class="hide btn btn-success savedrugbtn" data-drug-id="<?=$drug['id']?>" style="padding: 6px 12px;">Save</button>
											<button class="hide btn btn-danger canceldrugbtn" data-drug-id="<?=$drug['id']?>" style="padding: 6px 12px;">Cancel</button>
											<button class="btn btn-success editdrugbtn" data-drug-id="<?=$drug['id']?>"   style="padding: 6px 12px;">Edit</button>
											<button class="btn btn-danger deletedrugbtn" data-drug-id="<?=$drug['id']?>"  style="padding: 6px 12px;">Delete</button>
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

	var drug_table = $('#dt_basic').dataTable({
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
	$("#addnewdrugbtn").click(function(){
		 // addnewtr.removeClass('hide');
		 if(is_add_new) return;
		 is_add_new = true;
		 var lang_str = `
		 	<td>
			 	<select id="addnew_language" class="form-control add-language">
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

		 

		 $("#drug_table_tbody").prepend(`
		 	<tr class="smart-form" id="addnewtr">
				<td></td>
				<td><input type="text" class="form-control" name="" id="addnew_name"></td>
				<td><input type="text" class="form-control" name="" id="addnew_producer"></td>
				<td>
					<select class="form-control" id="addnew_type_of_production">
						<option value="branded">Branded</option>
						<option value="generic">Generic</option>
						<option value="galenic">Galenic</option>
					</select>
				</td>
				<td><input type="text" class="form-control" name="" id="addnew_description"></td>
				` + lang_str + `
				<td>
					<select class="form-control" id="addnew_enabled">
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select>
				</td>
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
		var addnew_producer = $("#addnew_producer").val();
		var addnew_type_of_production = $("#addnew_type_of_production").val();
		var addnew_description = $("#addnew_description").val();
		var addnew_language = $("#addnew_language").val();
		var addnew_enabled = $("#addnew_enabled").val();


		if(addnew_name == ''){
			$("#addnew_name").parent().addClass('state-error');
		}else{
			$("#addnew_name").parent().removeClass('state-error');	
		}

		if(addnew_producer == ''){
			$("#addnew_producer").parent().addClass('state-error');
		}else{
			$("#addnew_producer").parent().removeClass('state-error');	
		}

		if(addnew_description == ''){
			$("#addnew_description").parent().addClass('state-error');
		}else{
			$("#addnew_description").parent().removeClass('state-error');	
		}

		if(addnew_name == '' || addnew_producer == '' || addnew_description == '') {
			return;
		}

		$.ajax({
			url: "<?=base_url()?>Drugs/postAddNew",
			type: 'post',
			dataType: 'json',
			data: {
				name: addnew_name,
				producer : addnew_producer,
				type_of_production: addnew_type_of_production,
				description : addnew_description,
				languages_id : addnew_language,
				enabled : addnew_enabled
			},
			success: function(res){
				// console.log(res);
				if(res.success == '1') {
					location.reload();
				}
			}
		});
	});

	$(".editdrugbtn").click(function(){
		var drug_id = $(this).data('drug-id');
		$('span[data-drug-id="' + drug_id + '"').addClass('hide');
		$('input[data-drug-id="' + drug_id + '"').removeClass('hide');
		$('select[data-drug-id="' + drug_id + '"').removeClass('hide');
		$('.editdrugbtn[data-drug-id="' + drug_id + '"').addClass('hide');
		$('.deletedrugbtn[data-drug-id="' + drug_id + '"').addClass('hide');
		$('.savedrugbtn[data-drug-id="' + drug_id + '"').removeClass('hide');
		$('.canceldrugbtn[data-drug-id="' + drug_id + '"').removeClass('hide');
	});



	$(".canceldrugbtn").click(function(){
		var drug_id = $(this).data('drug-id');
		$('.editdrugbtn[data-drug-id="' + drug_id + '"').removeClass('hide');
		$('.deletedrugbtn[data-drug-id="' + drug_id + '"').removeClass('hide');
		$('.savedrugbtn[data-drug-id="' + drug_id + '"').addClass('hide');
		$('.canceldrugbtn[data-drug-id="' + drug_id + '"').addClass('hide');
		$('span[data-drug-id="' + drug_id + '"').removeClass('hide');
		$('input[data-drug-id="' + drug_id + '"').addClass('hide');
		$('select[data-drug-id="' + drug_id + '"').addClass('hide');
	});

	$(".savedrugbtn").click(function() {
		var drug_id = $(this).data('drug-id');
		var edit_name = $('.edit_name[data-drug-id="' + drug_id + '"').val();
		var edit_producer = $('.edit_producer[data-drug-id="' + drug_id + '"').val();
		var edit_type_of_production = $('.edit_type_of_production[data-drug-id="' + drug_id + '"').val();
		var edit_description = $('.edit_description[data-drug-id="' + drug_id + '"').val();
		var edit_language = $('.edit_language[data-drug-id="' + drug_id + '"').val();
		var edit_enabled = $('.edit_enabled[data-drug-id="' + drug_id + '"').val();
	
		if(edit_name == "") {
			$('.edit_name[data-drug-id="' + drug_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_name[data-drug-id="' + drug_id + '"').parent().removeClass('state-error');
		}

		if(edit_producer == "") {
			$('.edit_producer[data-drug-id="' + drug_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_producer[data-drug-id="' + drug_id + '"').parent().removeClass('state-error');
		}

		if(edit_description == "") {
			$('.edit_description[data-drug-id="' + drug_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_description[data-drug-id="' + drug_id + '"').parent().removeClass('state-error');
		}

		if(edit_name == "" || edit_description == "" || edit_producer == '') {
			return;
		}

		$.ajax({
			url : "<?=base_url()?>Drugs/postEdit",
			type: 'post',
			dataType: 'json',
			data : {
				id: drug_id,
				name: edit_name,
				producer : edit_producer,
				type_of_production: edit_type_of_production,
				description: edit_description,
				languages_id: edit_language,
				enabled: edit_enabled
			},
			success : function(res){
				if(res.success == '1'){
					location.reload();
				}
			}
		});

	});


	$(".deletedrugbtn").click(function(e) {
		var drug_id = $(this).data('drug-id');
		$.SmartMessageBox({
			title : "Delete Drug",
			content : "Do you really want to Delete it?",
			buttons : '[No][Yes]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Yes") {
				$.ajax({
					url : '<?=base_url()?>Drugs/deleteDrug', 
					type: 'post',
					dataType: 'json',
					data : {
						id: drug_id
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



