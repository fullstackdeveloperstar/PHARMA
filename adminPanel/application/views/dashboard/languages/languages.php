<!-- #MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Languages</li>
					
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
						Languages
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
						<button class="btn btn-success" id="addnewlanguagebtn">Add New language</button>	
					</div>
					<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
						<thead>			                
							<tr>
								<th data-hide="phone">ID</th>
								<th>Name</th>
								<th>Language Short Key</th>
								<th>Enabled</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody id="language_table_tbody">
							
							<?php
								$i = 0;

								foreach ($languages as $language) {
									$i++;
									?>
									<tr data-language-id="<?=$language['id']?>" class="smart-form">
										<td><?=$i?></td>
										<td>
											<span data-language-id="<?=$language['id']?>"><?=$language['name']?></span>
											<input  data-language-id="<?=$language['id']?>" type="text" name="" value="<?=$language['name']?>" class="form-control hide edit_name" >
										</td>
										<td>
											<span  data-language-id="<?=$language['id']?>"><?=$language['language_short_key']?></span>
											<input  data-language-id="<?=$language['id']?>" type="text" name="" value="<?=$language['language_short_key']?>" class="form-control hide edit_short_key">
										</td>
										
										<td>
											<span  data-language-id="<?=$language['id']?>"><?=$language['enabled'] == '1' ? 'Yes' : 'No'?></span>
											<select  data-language-id="<?=$language['id']?>" class="form-control hide edit_enabled">
												<option value="1" <?=$language['enabled'] == '1' ? 'selected': ''?>>Yes</option>
												<option value="0"  <?=$language['enabled'] == '0' ? 'selected': ''?>>No</option>
											</select>
										</td>
										
										<td>
											<button class="hide btn btn-success savelanguagebtn" data-language-id="<?=$language['id']?>" style="padding: 6px 12px;">Save</button>
											<button class="hide btn btn-danger cancellanguagebtn" data-language-id="<?=$language['id']?>" style="padding: 6px 12px;">Cancel</button>
											<button class="btn btn-success editlanguagebtn" data-language-id="<?=$language['id']?>"   style="padding: 6px 12px;">Edit</button>
											<button class="btn btn-danger deletelanguagebtn" data-language-id="<?=$language['id']?>"  style="padding: 6px 12px;">Delete</button>
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

	var language_table = $('#dt_basic').dataTable({
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
			"t"+
			"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		"autoWidth" : true,
        "oLanguage": {
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
	$("#addnewlanguagebtn").click(function(){
		 // addnewtr.removeClass('hide');
		 if(is_add_new) return;
		 is_add_new = true;
		 $("#language_table_tbody").prepend(`
		 	<tr class="smart-form" id="addnewtr">
				<td></td>
				<td><input type="text" class="form-control" name="" id="addnew_name"></td>
				<td><input type="text" class="form-control" name="" id="addnew_shortkey"></td>
				
				<td>
					<select class="form-control" id="addnew_enabled">
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select>
				</td>
				
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
		var addnew_shortkey = $("#addnew_shortkey").val();
		var addnew_enabled = $("#addnew_enabled").val();

		if(addnew_name == ''){
			$("#addnew_name").parent().addClass('state-error');
		}else{
			$("#addnew_name").parent().removeClass('state-error');	
		}

		if(addnew_shortkey == ''){
			$("#addnew_shortkey").parent().addClass('state-error');
		}else{
			$("#addnew_shortkey").parent().removeClass('state-error');	
		}


		if(addnew_name == '' || addnew_shortkey == '') {
			return;
		}

		$.ajax({
			url: "<?=base_url()?>Languages/postAddNew",
			type: 'post',
			dataType: 'json',
			data: {
				name: addnew_name,
				short_key: addnew_shortkey,
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

	$(document).on('click','.editlanguagebtn', function(){
	// $(".editlanguagebtn").click(function(){
		var language_id = $(this).data('language-id');
		$('span[data-language-id="' + language_id + '"').addClass('hide');
		$('input[data-language-id="' + language_id + '"').removeClass('hide');
		$('select[data-language-id="' + language_id + '"').removeClass('hide');
		$('.editlanguagebtn[data-language-id="' + language_id + '"').addClass('hide');
		$('.deletelanguagebtn[data-language-id="' + language_id + '"').addClass('hide');
		$('.savelanguagebtn[data-language-id="' + language_id + '"').removeClass('hide');
		$('.cancellanguagebtn[data-language-id="' + language_id + '"').removeClass('hide');
	});


	$(document).on('click','.cancellanguagebtn', function(){
	// $(".cancellanguagebtn").click(function(){
		var language_id = $(this).data('language-id');
		$('.editlanguagebtn[data-language-id="' + language_id + '"').removeClass('hide');
		$('.deletelanguagebtn[data-language-id="' + language_id + '"').removeClass('hide');
		$('.savelanguagebtn[data-language-id="' + language_id + '"').addClass('hide');
		$('.cancellanguagebtn[data-language-id="' + language_id + '"').addClass('hide');
		$('span[data-language-id="' + language_id + '"').removeClass('hide');
		$('input[data-language-id="' + language_id + '"').addClass('hide');
		$('select[data-language-id="' + language_id + '"').addClass('hide');
	});

	$(document).on('click','.savelanguagebtn', function(){
	// $(".savelanguagebtn").click(function() {
		var language_id = $(this).data('language-id');
		var edit_name = $('.edit_name[data-language-id="' + language_id + '"').val();
		var edit_short_key = $('.edit_short_key[data-language-id="' + language_id + '"').val();
		var edit_enabled = $('.edit_enabled[data-language-id="' + language_id + '"').val();

		if(edit_name == "") {
			$('.edit_name[data-language-id="' + language_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_name[data-language-id="' + language_id + '"').parent().removeClass('state-error');
		}


		if(edit_short_key == "") {
			$('.edit_short_key[data-language-id="' + language_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_short_key[data-language-id="' + language_id + '"').parent().removeClass('state-error');
		}


	

		if(edit_name == "" || edit_short_key == "") {
			return;
		}

		$.ajax({
			url : "<?=base_url()?>Languages/postEdit",
			type: 'post',
			dataType: 'json',
			data : {
				id: language_id,
				name: edit_name,
				short_key: edit_short_key,
				enabled: edit_enabled
			},
			success : function(res){
				if(res.success == '1'){
					location.reload();
				}
			}
		});

	});

	$(document).on('click','.deletelanguagebtn', function(){
	// $(".deletelanguagebtn").click(function(e) {
		var language_id = $(this).data('language-id');
		$.SmartMessageBox({
			title : "Delete language",
			content : "Do you really want to Delete it?",
			buttons : '[No][Yes]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Yes") {
				$.ajax({
					url : '<?=base_url()?>Languages/delete', 
					type: 'post',
					dataType: 'json',
					data : {
						id: language_id
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
