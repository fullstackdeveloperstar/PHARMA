<!-- #MAIN PANEL -->
<div id="main" role="main">

	<!-- RIBBON -->
	<div id="ribbon">

		<!-- breadcrumb -->
		<ol class="breadcrumb">
			<li>Vendors</li>
			<li>Manage Vendors</li>
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
						Manage Vendors
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
								<th >ID</th>
								<th>Vendor Name</th>
								<th>Vendor Website Url</th>
								<th>Default Currency</th>
								<th>Pharmacomparison Affiliation Service</th>
								<th>Affiliation Category</th>
								<th>Affiliation Vendor Id</th>
								<!-- <th>Affiliation Service</th> -->
								<th>Remark</th>
								<th>Language</th>
								<th>Last Modified</th>
								<th>Creation</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody id="currency_table_tbody">
							<?php
							$i = 0;
							foreach ($vendors as $vendor) {
								$i ++;
								?>
								<td><?=$i?></td>
								<td><?=$vendor['vendor_name']?></td>
								<td><?=$vendor['vendor_web_site_url']?></td>
								<td>
									<?php
									foreach ($currencies as $currency) {
										if($currency['id'] == $vendor['default_currencies_id']) {
											echo $currency['name'];
										}
									}
									?>
								</td>
								
								<td><?=$vendor['affiliation_category']?></td>
								<td><?=$vendor['affiliation_vendor_id']?></td>
								<td>
									<?php
									foreach ($external_affiliation_services as $service) {
										if($service['id'] == $vendor['external_affiliation_services_id']) {
											echo $service['outsorced_provider_name'];
										}
									}
									?>
								</td>
								<td><?=$vendor['remark']?></td>
								<td>
									<?php
									foreach ($languages as $language) {
										if($language['id'] == $vendor['languages_id']) {
											echo $language['name'];
										}
									}
									?>
								</td>
								<td><?=$vendor['last_modified']?></td>
								<td><?=$vendor['creation']?></td>
								<td>
									<a class="btn btn-success" href="<?=base_url()?>Vendors/editvendor/<?=$vendor['id']?>">Edit</a>
									<a class="btn btn-primary" href="<?=base_url()?>Vendors/locations/<?=$vendor['id']?>">Locations</a>
									<a class="btn btn-warning" href="<?=base_url()?>Vendors/view/<?=$vendor['id']?>">View</a>
									<button class="btn btn-danger deletevendor" data-vendor-id="<?=$vendor['id']?>">Delete</button>
								</td>
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

	$(document).on('click','.deletevendor', function(){
	// $(".deletelanguagebtn").click(function(e) {
		var vendor_id = $(this).data('vendor-id');
		$.SmartMessageBox({
			title : "Delete Vendor",
			content : "Do you really want to Delete it?",
			buttons : '[No][Yes]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Yes") {
				$.ajax({
					url : '<?=base_url()?>Vendors/deleteVendor', 
					type: 'post',
					dataType: 'json',
					data : {
						id: vendor_id
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


