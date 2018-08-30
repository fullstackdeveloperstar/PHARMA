<?php
	function isActiveLanguage($lang_id){
		foreach ($languages as $language) {
			if($language['id'] ==  $lang_id) return true;
		}
		return false;
	}
?>
<!-- #MAIN PANEL -->
<div id="main" role="main">

	<!-- RIBBON -->
	<div id="ribbon">

		<!-- breadcrumb -->
		<ol class="breadcrumb">
			<li>Unit of Measure</li>
			<li>Confection Quantity U. of M.</li>
		</ol>
		

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
						confections
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
						<button class="btn btn-success" id="addnewconfectionbtn">Add New confection</button>	
					</div>
					<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
						<thead>			                
							<tr>
								<th data-hide="phone">ID</th>
								<th>Unit of Measure</th>
								<th>Language</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody id="confection_table_tbody">
							
							<?php
								$i = 0;

								foreach ($confections as $confection) {
									$i++;
									?>
									<tr data-confection-id="<?=$confection['id']?>" class="smart-form">
										<td><?=$i?></td>
										<td>
											<span data-confection-id="<?=$confection['id']?>"><?=$confection['unit_of_measure']?></span>
											<input  data-confection-id="<?=$confection['id']?>" type="text" name="" value="<?=$confection['unit_of_measure']?>" class="form-control hide edit_unit_of_measure" >
										</td>

										<td>
											
											<?php 
												foreach ($languages as $language) {
													if($language['id'] == $confection['language_id'])
													{
														echo '<span data-confection-id="'.$confection['id'].'">'.$language['name'].'</span>';
													}	
												}
											?>
											
											<select class="form-control hide edit-language"  data-confection-id="<?=$confection['id']?>">
												<?php
													foreach ($languages as $language) {
														?>
														<option <?php echo $language['id'] == $confection['language_id']? 'selected': '';?> value="<?=$language['id']?>" ><?=$language['name']?></option>
														<?php
													}
												?>
											</select>
										</td>
										
										<td>
											<button class="hide btn btn-success saveconfectionbtn" data-confection-id="<?=$confection['id']?>" style="padding: 6px 12px;">Save</button>
											<button class="hide btn btn-danger cancelconfectionbtn" data-confection-id="<?=$confection['id']?>" style="padding: 6px 12px;">Cancel</button>
											<button class="btn btn-success editconfectionbtn" data-confection-id="<?=$confection['id']?>"   style="padding: 6px 12px;">Edit</button>
											<button class="btn btn-danger deleteconfectionbtn" data-confection-id="<?=$confection['id']?>"  style="padding: 6px 12px;">Delete</button>
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

	var confection_table = $('#dt_basic').dataTable({
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
			"t"+
			"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		"autoWidth" : true,
        "oconfection": {
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
	$("#addnewconfectionbtn").click(function(){
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
		 $("#confection_table_tbody").prepend(`
		 	<tr class="smart-form" id="addnewtr">
				<td></td>
				<td><input type="text" class="form-control" name="" id="addnew_unit_of_measure"></td>`+
				lang_str+
				`<td>
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
		var addnew_unit_of_measure = $("#addnew_unit_of_measure").val();
		var addlanguage = $("#addlanguage").val();

		if(addnew_unit_of_measure == ''){
			$("#addnew_unit_of_measure").parent().addClass('state-error');
		}else{
			$("#addnew_unit_of_measure").parent().removeClass('state-error');	
		}

		if(addnew_unit_of_measure == '') {
			return;
		}

		$.ajax({
			url: "<?=base_url()?>UnitOfMeasure/postAddNewConfection",
			type: 'post',
			dataType: 'json',
			data: {
				unit_of_measure: addnew_unit_of_measure,
				language_id : addlanguage
			},
			success: function(res){
				// console.log(res);
				if(res.success == '1') {
					location.reload();
				}
			}
		});
	});

	$(".editconfectionbtn").click(function(){
		var confection_id = $(this).data('confection-id');
		$('span[data-confection-id="' + confection_id + '"').addClass('hide');
		$('input[data-confection-id="' + confection_id + '"').removeClass('hide');
		$('select[data-confection-id="' + confection_id + '"').removeClass('hide');
		$('.editconfectionbtn[data-confection-id="' + confection_id + '"').addClass('hide');
		$('.deleteconfectionbtn[data-confection-id="' + confection_id + '"').addClass('hide');
		$('.saveconfectionbtn[data-confection-id="' + confection_id + '"').removeClass('hide');
		$('.cancelconfectionbtn[data-confection-id="' + confection_id + '"').removeClass('hide');
	});



	$(".cancelconfectionbtn").click(function(){
		var confection_id = $(this).data('confection-id');
		$('.editconfectionbtn[data-confection-id="' + confection_id + '"').removeClass('hide');
		$('.deleteconfectionbtn[data-confection-id="' + confection_id + '"').removeClass('hide');
		$('.saveconfectionbtn[data-confection-id="' + confection_id + '"').addClass('hide');
		$('.cancelconfectionbtn[data-confection-id="' + confection_id + '"').addClass('hide');
		$('span[data-confection-id="' + confection_id + '"').removeClass('hide');
		$('input[data-confection-id="' + confection_id + '"').addClass('hide');
		$('select[data-confection-id="' + confection_id + '"').addClass('hide');
	});

	$(".saveconfectionbtn").click(function() {
		var confection_id = $(this).data('confection-id');
		var edit_unit_of_measure = $('.edit_unit_of_measure[data-confection-id="' + confection_id + '"').val();
		var edit_language = $('.edit-language[data-confection-id="' + confection_id + '"').val();


		if(edit_unit_of_measure == "") {
			$('.edit_unit_of_measure[data-confection-id="' + confection_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_unit_of_measure[data-confection-id="' + confection_id + '"').parent().removeClass('state-error');
		}


		if(edit_unit_of_measure == "") {
			return;
		}

		$.ajax({
			url : "<?=base_url()?>UnitOfMeasure/postEditConfection",
			type: 'post',
			dataType: 'json',
			data : {
				id: confection_id,
				unit_of_measure: edit_unit_of_measure,
				language_id: edit_language
			},
			success : function(res){
				if(res.success == '1'){
					location.reload();
				}
			}
		});

	});


	$(".deleteconfectionbtn").click(function(e) {
		var confection_id = $(this).data('confection-id');
		$.SmartMessageBox({
			title : "Delete confection",
			content : "Do you really want to Delete it?",
			buttons : '[No][Yes]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Yes") {
				$.ajax({
					url : '<?=base_url()?>UnitOfMeasure/deleteConfection', 
					type: 'post',
					dataType: 'json',
					data : {
						id: confection_id
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
