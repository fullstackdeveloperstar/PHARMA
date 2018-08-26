<!-- #MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Unit of Measure</li>
					<li>Active Ingredients Concentration U. of M.</li>
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
						Active Ingredients Concentration U. of M.
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
						<button class="btn btn-success" id="addnewconcentrationbtn">Add New Concentration</button>	
					</div>
					<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
						<thead>			                
							<tr>
								<th data-hide="phone">ID</th>
								<th>Unit of Measure</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody id="concentration_table_tbody">
							
							<?php
								$i = 0;

								foreach ($concentrations as $concentration) {
									$i++;
									?>
									<tr data-concentration-id="<?=$concentration['id']?>" class="smart-form">
										<td><?=$i?></td>
										<td>
											<span data-concentration-id="<?=$concentration['id']?>"><?=$concentration['unit_of_measure']?></span>
											<input  data-concentration-id="<?=$concentration['id']?>" type="text" name="" value="<?=$concentration['unit_of_measure']?>" class="form-control hide edit_unit_of_measure" >
										</td>
										
										<td>
											<button class="hide btn btn-success saveconcentrationbtn" data-concentration-id="<?=$concentration['id']?>" style="padding: 6px 12px;">Save</button>
											<button class="hide btn btn-danger cancelconcentrationbtn" data-concentration-id="<?=$concentration['id']?>" style="padding: 6px 12px;">Cancel</button>
											<button class="btn btn-success editconcentrationbtn" data-concentration-id="<?=$concentration['id']?>"   style="padding: 6px 12px;">Edit</button>
											<button class="btn btn-danger deleteconcentrationbtn" data-concentration-id="<?=$concentration['id']?>"  style="padding: 6px 12px;">Delete</button>
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

	var concentration_table = $('#dt_basic').dataTable({
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
			"t"+
			"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		"autoWidth" : true,
        "oconcentration": {
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
	$("#addnewconcentrationbtn").click(function(){
		 // addnewtr.removeClass('hide');
		 if(is_add_new) return;
		 is_add_new = true;
		 $("#concentration_table_tbody").prepend(`
		 	<tr class="smart-form" id="addnewtr">
				<td></td>
				<td><input type="text" class="form-control" name="" id="addnew_unit_of_measure"></td>
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
		var addnew_unit_of_measure = $("#addnew_unit_of_measure").val();
		

		if(addnew_unit_of_measure == ''){
			$("#addnew_unit_of_measure").parent().addClass('state-error');
		}else{
			$("#addnew_unit_of_measure").parent().removeClass('state-error');	
		}

		if(addnew_unit_of_measure == '') {
			return;
		}

		$.ajax({
			url: "<?=base_url()?>UnitOfMeasure/postAddNewConcentration",
			type: 'post',
			dataType: 'json',
			data: {
				unit_of_measure: addnew_unit_of_measure,
			},
			success: function(res){
				// console.log(res);
				if(res.success == '1') {
					location.reload();
				}
			}
		});
	});

	$(".editconcentrationbtn").click(function(){
		var concentration_id = $(this).data('concentration-id');
		$('span[data-concentration-id="' + concentration_id + '"').addClass('hide');
		$('input[data-concentration-id="' + concentration_id + '"').removeClass('hide');
		$('.editconcentrationbtn[data-concentration-id="' + concentration_id + '"').addClass('hide');
		$('.deleteconcentrationbtn[data-concentration-id="' + concentration_id + '"').addClass('hide');
		$('.saveconcentrationbtn[data-concentration-id="' + concentration_id + '"').removeClass('hide');
		$('.cancelconcentrationbtn[data-concentration-id="' + concentration_id + '"').removeClass('hide');
	});



	$(".cancelconcentrationbtn").click(function(){
		var concentration_id = $(this).data('concentration-id');
		$('.editconcentrationbtn[data-concentration-id="' + concentration_id + '"').removeClass('hide');
		$('.deleteconcentrationbtn[data-concentration-id="' + concentration_id + '"').removeClass('hide');
		$('.saveconcentrationbtn[data-concentration-id="' + concentration_id + '"').addClass('hide');
		$('.cancelconcentrationbtn[data-concentration-id="' + concentration_id + '"').addClass('hide');
		$('span[data-concentration-id="' + concentration_id + '"').removeClass('hide');
		$('input[data-concentration-id="' + concentration_id + '"').addClass('hide');
	});

	$(".saveconcentrationbtn").click(function() {
		var concentration_id = $(this).data('concentration-id');
		var edit_unit_of_measure = $('.edit_unit_of_measure[data-concentration-id="' + concentration_id + '"').val();
	
		if(edit_unit_of_measure == "") {
			$('.edit_unit_of_measure[data-concentration-id="' + concentration_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_unit_of_measure[data-concentration-id="' + concentration_id + '"').parent().removeClass('state-error');
		}

		if(edit_unit_of_measure == "") {
			return;
		}

		$.ajax({
			url : "<?=base_url()?>UnitOfMeasure/postEditConcentration",
			type: 'post',
			dataType: 'json',
			data : {
				id: concentration_id,
				unit_of_measure: edit_unit_of_measure,
			},
			success : function(res){
				if(res.success == '1'){
					location.reload();
				}
			}
		});

	});


	$(".deleteconcentrationbtn").click(function(e) {
		var concentration_id = $(this).data('concentration-id');
		$.SmartMessageBox({
			title : "Delete concentration",
			content : "Do you really want to Delete it?",
			buttons : '[No][Yes]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Yes") {
				$.ajax({
					url : '<?=base_url()?>UnitOfMeasure/deleteConcentration', 
					type: 'post',
					dataType: 'json',
					data : {
						id: concentration_id
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
