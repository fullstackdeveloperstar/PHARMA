<!-- #MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Vendors</li>
					<li>Add New Vendor</li>
				</ol>
				<!-- end breadcrumb -->


			</div>
			<!-- END RIBBON -->

			<!-- #MAIN CONTENT -->

			<div class="">
				<!-- col -->
				<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
					<h1 class="page-title txt-color-blueDark">
						
						<!-- PAGE HEADER -->
						<i class="fa-fw fa fa-home"></i> 
							Add New Vendor
					</h1>
				</div>
				<!-- end col -->
			</div>
				

			<!-- end row -->
			
			<!-- END #MAIN CONTENT -->


<div class="">
	<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable col-lg-offset-3">
		<div class="jarviswidget jarviswidget-sortable" id="wid-id-2" data-widget-colorbutton="false" data-widget-editbutton="false" role="widget">
								
			<header role="heading" class="ui-sortable-handle">
				<span class="widget-icon"> <i class="fa fa-eye"></i> </span>
				<h2>Add New Vendor Form</h2>

			</header>

			<!-- widget div-->
			<div role="content">

				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->

				</div>
				<!-- end widget edit box -->

				<!-- widget content -->
				<div class="widget-body">

					<form method="post" action="<?=base_url()?>Vendors/postAddNewVendor" id='addnewform'>
						<fieldset>
							<div class="form-group">
								<label>Vendor Name</label>
								<input class="form-control" placeholder="Vendor Name" type="text" name="vendorname" required="">
							</div>
							<div class="form-group">
								<label>Vendor Website Url</label>
								<input class="form-control" placeholder="Vendor Website Url" type="url" required="" name="vendor_website_url">
							</div>
							<div class="form-group">
								<label>Default Currency</label>
								<select class="form-control" name="default_currency">
									<?php
									foreach ($currencies as $currency) {
										?>
										<option value="<?=$currency['id']?>"><?=$currency['name']?></option>
										<?php
									}
									?>
								</select>
							</div>

							<!-- <div class="form-group">
								<label>Pharmacomparison Affiliation Service</label>
								<input class="form-control" placeholder="Pharmacomparison Affiliation Service" type="text" required="" name="pharmacomparison_affiliation_service">
							</div> -->

							<div class="form-group">
								<label>Affiliation Category</label>
								<select class="form-control" name="affiliation_category">
									<option value="no_affiliation">No Affiliation</option>
									<option value="pharmacomparison_affiliation">Pharmacomparison Affiliation</option>
									<option value="external_affiliation_service">External Affiliation Service</option>
								</select>
							</div>

							<div class="form-group">
								<label>Affiliation Vendor Id</label>
								<input class="form-control" placeholder="Affiliation Vendor Id" type="text" required="" name="affiliation_vendor_id">
							</div>

							<div class="form-group">
								<label>External Affiliation Service</label>
								<select class="form-control" name="external_affiliation_service">
									<?php
									foreach ($external_affiliation_services as $service) {
										?>
										<option value="<?=$service['id']?>"><?=$service['outsorced_provider_name']?></option>
										<?php
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label>Remark</label>
								<textarea class="form-control" placeholder="Remark" rows="3" required="" name="remark"></textarea>
							</div>

							<div class="form-group">
								<label>Language</label>
								<select class="form-control" name="language">
									<?php
										foreach ($languages as $lang) {
											?>
											<option value="<?=$lang['id']?>"><?=$lang['name']?></option>
											<?php
										}
									?>
								</select>
							</div>
							
						</fieldset>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary btn-lg">
								<i class="fa fa-save"></i>
								Add New Vendor
							</button>
						</div>
					</form>

				</div>
				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>
	</article>
</div>


<script type="text/javascript">
	$(function() {
		// Validation
		$("#addnewform").validate({
			// Rules for form validation
			rules : {
				vendorname : {
					required : true
				},
				// pharmacomparison_affiliation_service: {
				// 	required : true 
				// },
				affiliation_vendor_id : {
					required : true
				}, 
				remark : {
					required : true
				},
				vendor_website_url : {
					required : true
				}
				
			},

			// Messages for form validation
			messages : {
				vendorname : {
					required : 'Please enter your vendorname'
				},
				// pharmacomparison_affiliation_service : {
				// 	required : 'Please enter Pharmacomparison Affiliation Service'
				// }, 
				affiliation_vendor_id : {
					required : 'Please enter Affiliation Vendor Id'
				}, 
				remark : {
					required : 'Please enter Remark'
				},
				vendor_website_url : {
					required : 'Please enter Vendor Website url'
				}
				
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});
	});
</script>

<style type="text/css">
	label.error{
		color: red;
	}
</style>