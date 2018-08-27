<!-- #MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Active Ingredients</li>
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
						Active Ingredients
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
						<button class="btn btn-success" id="addnewingredientbtn">Add New ingredient</button>	
					</div>
					<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
						<thead>			                
							<tr>
								<th data-hide="phone">ID</th>
								<th>Name</th>
								<th>Description</th>
								<th>Enabled</th>
								<th>Creation</th>
								<th>Last Modified</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody id="ingredient_table_tbody">
							
							<?php
								$i = 0;

								foreach ($ingredients as $ingredient) {
									$i++;
									?>
									<tr data-ingredient-id="<?=$ingredient['id']?>" class="smart-form">
										<td><?=$i?></td>
										<td>
											<span data-ingredient-id="<?=$ingredient['id']?>"><?=$ingredient['name']?></span>
											<input  data-ingredient-id="<?=$ingredient['id']?>" type="text" name="" value="<?=$ingredient['name']?>" class="form-control hide edit_name" >
										</td>
										<td>
											<span  data-ingredient-id="<?=$ingredient['id']?>" class='description-short'>
												<div>
													<?php
														// $ingredient['description'];
														echo word_limiter($ingredient['description'], 20, '');
													?>
												</div>
											</span>

											<span  data-ingredient-id="<?=$ingredient['id']?>" class='description-all hide'>
												<div>
													<?php
														
														echo $ingredient['description'];
													?>
												</div>
											</span>
											<?php 
												$shown = word_limiter($ingredient['description'], 20, '');
												if(strlen($shown) + 1 < strlen($ingredient['description'])) {
											?>
											<span data-ingredient-id="<?=$ingredient['id']?>" class='description-show-more' style="cursor: pointer;"><u>[show more]</u></span>
												<?php } ?>
											<textarea  data-ingredient-id="<?=$ingredient['id']?>" type="text" name="" class="form-control hide edit_description"> <?=$ingredient['description']?> </textarea>
										</td>
										
										<td>
											<span  data-ingredient-id="<?=$ingredient['id']?>"><?=$ingredient['enabled'] == '1' ? 'Yes' : 'No'?></span>
											<select  data-ingredient-id="<?=$ingredient['id']?>" class="form-control hide edit_enabled">
												<option value="1" <?=$ingredient['enabled'] == '1' ? 'selected': ''?>>Yes</option>
												<option value="0"  <?=$ingredient['enabled'] == '0' ? 'selected': ''?>>No</option>
											</select>
										</td>
										<td>
											<span data-ingredient-id="<?=$ingredient['id']?>"><?=$ingredient['creation']?></span>
										</td>
										<td>
											<span data-ingredient-id="<?=$ingredient['id']?>"><?=$ingredient['last_modified']?></span>
											
										</td>
										
										<td>
											<button class="hide btn btn-success saveingredientbtn" data-ingredient-id="<?=$ingredient['id']?>" style="padding: 6px 12px;">Save</button>
											<button class="hide btn btn-danger cancelingredientbtn" data-ingredient-id="<?=$ingredient['id']?>" style="padding: 6px 12px;">Cancel</button>
											<button class="btn btn-success editingredientbtn" data-ingredient-id="<?=$ingredient['id']?>"   style="padding: 6px 12px;">Edit</button>
											<button class="btn btn-danger deleteingredientbtn" data-ingredient-id="<?=$ingredient['id']?>"  style="padding: 6px 12px;">Delete</button>
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

	var ingredient_table = $('#dt_basic').dataTable({
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
			"t"+
			"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		"autoWidth" : true,
        "oingredient": {
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
	$("#addnewingredientbtn").click(function(){
		 // addnewtr.removeClass('hide');
		 if(is_add_new) return;
		 is_add_new = true;
		 $("#ingredient_table_tbody").prepend(`
		 	<tr class="smart-form" id="addnewtr">
				<td></td>
				<td><input type="text" class="form-control" name="" id="addnew_name"></td>
				<td><input type="text" class="form-control" name="" id="addnew_description"></td>
				
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

	$("#addnewcancelbtn").click(function(){
		// addnewtr.addClass('hide');
		alert();
	});

	$(document).on('click', '#addnewcancelbtn', function(){
		$("#addnewtr").remove();
		is_add_new = false;
	});

	$(document).on('click', '#addnewaddbtn', function() {
		var addnew_name = $("#addnew_name").val();
		var addnew_description = $("#addnew_description").val();
		var addnew_enabled = $("#addnew_enabled").val();

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
			url: "<?=base_url()?>ActiveIngredients/postAddNew",
			type: 'post',
			dataType: 'json',
			data: {
				name: addnew_name,
				description: addnew_description,
				enabled: addnew_enabled
			},
			success: function(res){
				// console.log(res);
				if(res.success == '1') {
					location.reload();
				}
			}
		});
	});

	var cur_editor = [];

	$(".editingredientbtn").click(function(){
		var ingredient_id = $(this).data('ingredient-id');
		$('span[data-ingredient-id="' + ingredient_id + '"').addClass('hide');
		$('input[data-ingredient-id="' + ingredient_id + '"').removeClass('hide');
		$('select[data-ingredient-id="' + ingredient_id + '"').removeClass('hide');
		$('.editingredientbtn[data-ingredient-id="' + ingredient_id + '"').addClass('hide');
		$('.deleteingredientbtn[data-ingredient-id="' + ingredient_id + '"').addClass('hide');
		$('.saveingredientbtn[data-ingredient-id="' + ingredient_id + '"').removeClass('hide');
		$('.cancelingredientbtn[data-ingredient-id="' + ingredient_id + '"').removeClass('hide');

		// $( '.edit_description[data-ingredient-id="' + ingredient_id + '"').ckeditor( function() { 
		//     // Callback function code.
		// }, { 
		//     // Config options here
		// } );
		$('.edit_description[data-ingredient-id="' + ingredient_id + '"' ).removeClass('hide');
		$('.edit_description[data-ingredient-id="' + ingredient_id + '"' ).click( function(){
		   	cur_editor[ingredient_id] =  $( this ).ckeditor( function() {
		        console.log( 'Instance ' + this.name + ' created' );
		    }, {
		        on: {
		            blur: function( evt ) {
		                console.log( 'Instance ' + this.name + ' destroyed' );
		                console.log(this);
		                // this.destroy();
		            }
		        }
		    } );
		} );

	});



	$(".cancelingredientbtn").click(function(){
		var ingredient_id = $(this).data('ingredient-id');
		$('.editingredientbtn[data-ingredient-id="' + ingredient_id + '"').removeClass('hide');
		$('.deleteingredientbtn[data-ingredient-id="' + ingredient_id + '"').removeClass('hide');
		$('.saveingredientbtn[data-ingredient-id="' + ingredient_id + '"').addClass('hide');
		$('.cancelingredientbtn[data-ingredient-id="' + ingredient_id + '"').addClass('hide');
		$('span[data-ingredient-id="' + ingredient_id + '"').removeClass('hide');
		$('input[data-ingredient-id="' + ingredient_id + '"').addClass('hide');
		$('select[data-ingredient-id="' + ingredient_id + '"').addClass('hide');
		
		cur_editor[ingredient_id].editor.destroy();
		$('.edit_description[data-ingredient-id="' + ingredient_id + '"' ).addClass('hide');
	});

	$(".saveingredientbtn").click(function() {
		var ingredient_id = $(this).data('ingredient-id');
		var edit_name = $('.edit_name[data-ingredient-id="' + ingredient_id + '"').val();
		var edit_description = $('.edit_description[data-ingredient-id="' + ingredient_id + '"').val();
		var edit_enabled = $('.edit_enabled[data-ingredient-id="' + ingredient_id + '"').val();

		if(edit_name == "") {
			$('.edit_name[data-ingredient-id="' + ingredient_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_name[data-ingredient-id="' + ingredient_id + '"').parent().removeClass('state-error');
		}


		if(edit_description == "") {
			$('.edit_description[data-ingredient-id="' + ingredient_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_description[data-ingredient-id="' + ingredient_id + '"').parent().removeClass('state-error');
		}


		// alert(edit_description);

		if(edit_name == "" || edit_description == "") {
			return;
		}


		$.ajax({
			url : "<?=base_url()?>ActiveIngredients/postEdit",
			type: 'post',
			dataType: 'json',
			data : {
				id: ingredient_id,
				name: edit_name,
				description: edit_description,
				enabled: edit_enabled
			},
			success : function(res){
				if(res.success == '1'){
					location.reload();
				}
			}
		});

	});


	$(".deleteingredientbtn").click(function(e) {
		var ingredient_id = $(this).data('ingredient-id');
		$.SmartMessageBox({
			title : "Delete ingredient",
			content : "Do you really want to Delete it?",
			buttons : '[No][Yes]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Yes") {
				$.ajax({
					url : '<?=base_url()?>ActiveIngredients/delete', 
					type: 'post',
					dataType: 'json',
					data : {
						id: ingredient_id
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
	});

	$(document).on('click', '.description-show-more', function(){
		// alert();
		var ingredient_id = $(this).data('ingredient-id');
		$('.description-short[data-ingredient-id="' + ingredient_id + '"').addClass('hide');
		$('.description-all[data-ingredient-id="' + ingredient_id + '"').removeClass('hide');
		$(this).addClass('hide');
	});

});

</script>