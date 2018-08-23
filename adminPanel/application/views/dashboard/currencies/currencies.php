<!-- #MAIN PANEL -->
<div id="main" role="main">

	<!-- RIBBON -->
	<div id="ribbon">

		<!-- breadcrumb -->
		<ol class="breadcrumb">
			<li>Currencies</li>
			
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
						Currencies
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
									<button class="btn btn-success" id="addnewcurrencybtn">Add New Currency</button>	
								</div>
								<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
									<thead>			                
										<tr>
											<th data-hide="phone">ID</th>
											<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Name</th>
											<th data-hide="phone">Short Key</th>
											<th>Symbol</th>
											<th data-hide="phone,tablet">Enabled</th>
											<th data-hide="phone,tablet"><i class="fa fa-fw fa-calendar txt-color-blue hidden-md hidden-sm hidden-xs"></i>Created Date</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody id="currency_table_tbody">
										
										<?php
											$i = 0;

											foreach ($currencies as $currency) {
												$i++;
												?>
												<tr data-currency-id="<?=$currency['id']?>" class="smart-form">
													<td><?=$i?></td>
													<td>
														<span data-currency-id="<?=$currency['id']?>"><?=$currency['name']?></span>
														<input  data-currency-id="<?=$currency['id']?>" type="text" name="" value="<?=$currency['name']?>" class="form-control hide edit_name" >
													</td>
													<td>
														<span  data-currency-id="<?=$currency['id']?>"><?=$currency['short_key']?></span>
														<input  data-currency-id="<?=$currency['id']?>" type="text" name="" value="<?=$currency['short_key']?>" class="form-control hide edit_short_key">
													</td>
													<td>
														<span  data-currency-id="<?=$currency['id']?>"><?=$currency['symbol']?></span>
														<input  data-currency-id="<?=$currency['id']?>" type="text" name="" value="<?=$currency['symbol']?>" class="form-control hide edit_symbol">
													</td>
													<td>
														<span  data-currency-id="<?=$currency['id']?>"><?=$currency['enabled'] == '1' ? 'Active' : 'Disable'?></span>
														<select  data-currency-id="<?=$currency['id']?>" class="form-control hide edit_enabled">
															<option value="1" <?=$currency['enabled'] == '1' ? 'selected': ''?>>Active</option>
															<option value="0"  <?=$currency['enabled'] == '0' ? 'selected': ''?>>Disable</option>
														</select>
													</td>
													<td><?=$currency['creation']?></td>
													<td>
														<button class="hide btn btn-success savecurrencybtn" data-currency-id="<?=$currency['id']?>" style="padding: 6px 12px;">Save</button>
														<button class="hide btn btn-danger cancelcurrencybtn" data-currency-id="<?=$currency['id']?>" style="padding: 6px 12px;">Cancel</button>
														<button class="btn btn-success editcurrencybtn" data-currency-id="<?=$currency['id']?>"   style="padding: 6px 12px;">Edit</button>
														<button class="btn btn-danger deletecurrencybtn" data-currency-id="<?=$currency['id']?>"  style="padding: 6px 12px;">Delete</button>
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

	var currency_table = $('#dt_basic').dataTable({
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
	$("#addnewcurrencybtn").click(function(){
		 // addnewtr.removeClass('hide');
		 if(is_add_new) return;
		 is_add_new = true;
		 $("#currency_table_tbody").prepend(`
		 	<tr class="smart-form" id="addnewtr">
				<td></td>
				<td><input type="text" class="form-control" name="" id="addnew_name"></td>
				<td><input type="text" class="form-control" name="" id="addnew_shortkey"></td>
				<td><input type="text" class="form-control" name="" id="addnew_symbol"></td>
				<td>
					<select class="form-control" id="addnew_enabled">
						<option value="1">Active</option>
						<option value="0">Disabled</option>
					</select>
				</td>
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
		var addnew_shortkey = $("#addnew_shortkey").val();
		var addnew_symbol = $("#addnew_symbol").val();
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

		if(addnew_symbol == ''){
			$("#addnew_symbol").parent().addClass('state-error');
		}else {
			$("#addnew_symbol").parent().removeClass('state-error');	
		}

		if(addnew_name == '' || addnew_shortkey == '' || addnew_symbol == '') {
			return;
		}

		$.ajax({
			url: "<?=base_url()?>Currencies/postAddNew",
			type: 'post',
			dataType: 'json',
			data: {
				name: addnew_name,
				short_key: addnew_shortkey,
				symbol: addnew_symbol,
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

	$(".editcurrencybtn").click(function(){
		var currency_id = $(this).data('currency-id');
		$('span[data-currency-id="' + currency_id + '"').addClass('hide');
		$('input[data-currency-id="' + currency_id + '"').removeClass('hide');
		$('select[data-currency-id="' + currency_id + '"').removeClass('hide');
		$('.editcurrencybtn[data-currency-id="' + currency_id + '"').addClass('hide');
		$('.deletecurrencybtn[data-currency-id="' + currency_id + '"').addClass('hide');
		$('.savecurrencybtn[data-currency-id="' + currency_id + '"').removeClass('hide');
		$('.cancelcurrencybtn[data-currency-id="' + currency_id + '"').removeClass('hide');
	});



	$(".cancelcurrencybtn").click(function(){
		var currency_id = $(this).data('currency-id');
		$('.editcurrencybtn[data-currency-id="' + currency_id + '"').removeClass('hide');
		$('.deletecurrencybtn[data-currency-id="' + currency_id + '"').removeClass('hide');
		$('.savecurrencybtn[data-currency-id="' + currency_id + '"').addClass('hide');
		$('.cancelcurrencybtn[data-currency-id="' + currency_id + '"').addClass('hide');
		$('span[data-currency-id="' + currency_id + '"').removeClass('hide');
		$('input[data-currency-id="' + currency_id + '"').addClass('hide');
		$('select[data-currency-id="' + currency_id + '"').addClass('hide');
	});

	$(".savecurrencybtn").click(function() {
		var currency_id = $(this).data('currency-id');
		var edit_name = $('.edit_name[data-currency-id="' + currency_id + '"').val();
		var edit_short_key = $('.edit_short_key[data-currency-id="' + currency_id + '"').val();
		var edit_symbol = $('.edit_symbol[data-currency-id="' + currency_id + '"').val();
		var edit_enabled = $('.edit_enabled[data-currency-id="' + currency_id + '"').val();

		if(edit_name == "") {
			$('.edit_name[data-currency-id="' + currency_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_name[data-currency-id="' + currency_id + '"').parent().removeClass('state-error');
		}


		if(edit_short_key == "") {
			$('.edit_short_key[data-currency-id="' + currency_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_short_key[data-currency-id="' + currency_id + '"').parent().removeClass('state-error');
		}


		if(edit_symbol == "") {
			$('.edit_symbol[data-currency-id="' + currency_id + '"').parent().addClass('state-error');
		} else {
			$('.edit_symbol[data-currency-id="' + currency_id + '"').parent().removeClass('state-error');
		}

		if(edit_name == "" || edit_short_key == "" || edit_symbol == "") {
			return;
		}

		$.ajax({
			url : "<?=base_url()?>Currencies/postEdit",
			type: 'post',
			dataType: 'json',
			data : {
				id: currency_id,
				name: edit_name,
				short_key: edit_short_key,
				symbol: edit_symbol,
				enabled: edit_enabled
			},
			success : function(res){
				if(res.success == '1'){
					location.reload();
				}
			}
		});

	});


	$(".deletecurrencybtn").click(function(e) {
		var currency_id = $(this).data('currency-id');
		$.SmartMessageBox({
			title : "Delete Currency",
			content : "Do you really want to Delete it?",
			buttons : '[No][Yes]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Yes") {

				// $.smallBox({
				// 	title : "Callback function",
				// 	content : "<i class='fa fa-clock-o'></i> <i>You pressed Yes...</i>",
				// 	color : "#659265",
				// 	iconSmall : "fa fa-check fa-2x fadeInRight animated",
				// 	timeout : 4000
				// });
				
				$.ajax({
					url : '<?=base_url()?>Currencies/delete', 
					type: 'post',
					dataType: 'json',
					data : {
						id: currency_id
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
				// $.smallBox({
				// 	title : "Callback function",
				// 	content : "<i class='fa fa-clock-o'></i> <i>You pressed No...</i>",
				// 	color : "#C46A69",
				// 	iconSmall : "fa fa-times fa-2x fadeInRight animated",
				// 	timeout : 4000
				// });
			}

		});
		e.preventDefault();
	})


});

</script>
