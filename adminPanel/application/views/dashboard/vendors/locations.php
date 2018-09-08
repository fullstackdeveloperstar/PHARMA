<!-- #MAIN PANEL -->
<div id="main" role="main">

	<!-- RIBBON -->
	<div id="ribbon">

		<!-- breadcrumb -->
		<ol class="breadcrumb">
			<li>Vendors</li>
			<li>Locations</li>
		</ol>
		<!-- end breadcrumb -->


	</div>
	<!-- END RIBBON -->

	<!-- #MAIN CONTENT -->
	<div id="content">
		<div class="row">
			<!-- col -->
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark">
					
					<!-- PAGE HEADER -->
					<i class="fa-fw fa fa-home"></i> 
						Locations
						<a class="btn btn-success" href="<?=base_url()?>Vendors/addnewlocation/<?=$vendor['id']?>">Add New Location</a>
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
					
					<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
						<thead>			                
							<tr>
								<th>ID</th>
								<th>Vendor Name</th>
								<th>Address</th>
								<th>Zip</th>
								<th>Country</th>
								<th>Phone</th>
								<th>Fax</th>
								<th>Vendor Email</th>
								<th>Reference People</th>
								<th>Minimum Domestic Delivery Cost</th>
								<th>Minimum Domestic Delivery Cost Currency</th>
								<th>Minimum International Delivery Cost	</th>
								<th>Minimum International Delivery Currencies</th>
								<th>Language</th>
								<th>Enabled</th>
								<th>Last Modified</th>
								<th>Creation</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($locations as $location) {
								$i++;
								?>
								<tr>
									<td><?=$i?></td>
									<td><?=$vendor['vendor_name']?></td>
									<td><?=$location['address']?></td>
									<td><?=$location['zip']?></td>
									<td><?=$location['country']?></td>
									<td><?=$location['phone']?></td>
									<td><?=$location['fax']?></td>
									<td><?=$location['vendor_email']?></td>
									<td>
										<?php
										foreach ($peoples as $people) {
											if ($people['id'] == $location['reference_people_id']) {
												echo $people['username'];
											}
										}
										?>
									</td>
									<td><?=$location['minimum_domestic_delivery_cost']?></td>
									<td>
										<?php
										foreach ($currencies as $currency) {
											if($currency['id'] == $location['minimum_domestic_delivery_cost_currencies']) {
												echo $currency['name'];
											}
										}
										?>
									</td>
									<td><?=$location['minimum_international_delivery_cost']?></td>
									<td>
										<?php
										foreach ($currencies as $currency) {
											if($currency['id'] == $location['minimum_international_delivery_currencies']) {
												echo $currency['name'];
											}
										}
										?>
									</td>
									<td>
										<?php
										foreach ($languages as $language) {
											if($language['id'] == $location['languages_id']) {
												echo $language['name'];
											}
										}
									
										?>	
									</td>
									<td><?=$location['enabled'] == 1 ? 'Yes': 'No'?></td>
									<td><?=$location['last_modified']?></td>
									<td><?=$location['creation']?></td>
									<td>
										<a class="btn btn-success" href="<?=base_url()?>Vendors/editlocation/<?=$vendor['id']?>/<?=$location['id']?>">Edit</a>
										<button class="btn btn-danger deletelocation" data-location-id="<?=$location['id']?>">Delete</button>
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

<script type="text/javascript">
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

	$(document).on('click','.deletelocation', function(){
	// $(".deletelanguagebtn").click(function(e) {
		var location_id = $(this).data('vendor-id');
		$.SmartMessageBox({
			title : "Delete Location",
			content : "Do you really want to Delete it?",
			buttons : '[No][Yes]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Yes") {
				$.ajax({
					url : '<?=base_url()?>Vendors/deleteLocation', 
					type: 'post',
					dataType: 'json',
					data : {
						id: location_id
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
});

</script>


