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

							<div class="form-group">
								<label>Affiliation Category</label>
								<select class="form-control" name="affiliation_category" id="affiliation_category">
									<option value="no_affiliation">No Affiliation</option>
									<option value="pharmacomparison_affiliation">Pharmacomparison Affiliation</option>
									<option value="external_affiliation_service">External Affiliation Service</option>
								</select>
							</div>

							<div class="form-group hide" id="type_of_ext_affiliation_div">
								<label>Type of External Affiliation</label>
								<select class="form-control" name="type_of_ext_affiliation" id="type_of_ext_affiliation">
									<option value="ext_third_party">ext_third_party</option>
									<option value="ext_vendor_own">ext_vendor_own</option>
								</select>
							</div>

							<div class="form-group hide" id="external_affiliation_services_id_div">
								<label>Outsourced Provider Name</label>
								<select class="form-control" name="external_affiliation_services_id">
									<?php
									foreach ($external_affiliation_services as $service) {
										?>
										<option value="<?=$service['id']?>"><?=$service['outsorced_provider_name']?></option>
										<?php
									}
									?>
								</select>
							</div>

							<div id="external_affiliation_services_data_div" class="hide">
								<div class="form-group">
									<label>Outsorced Provider Name</label>
									<input class="form-control" placeholder="Outsorced Provider Name" type="text" required="" name="outsorced_provider_name">
								</div>

								<div class="form-group">
									<label>Outsorced Provider Url</label>
									<input class="form-control" placeholder="Outsorced Provider Url" type="url" required="" name="outsorced_provider_url">
								</div>

								<div class="form-group">
									<label>Our Affiliation Id</label>
									<input class="form-control" placeholder="Our Affiliation Id" type="text" required="" name="our_affiliation_id">
								</div>

								<div class="form-group">
									<label>Our Affiliation User Name</label>
									<input class="form-control" placeholder="Our Affiliation User Name" type="text" required="" name="our_affiliation_user_name">
								</div>

								<div class="form-group">
									<label>Our Affiliation PW</label>
									<input class="form-control" placeholder="Our Affiliation PW" type="text" required="" name="our_affiliation_pw">
								</div>
							</div>


							<div class="form-group">
								<label>Affiliation Vendor Id</label>
								<input class="form-control" placeholder="Affiliation Vendor Id" type="text" required="" name="affiliation_vendor_id">
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
				error.insertAfter(element);
			}
		});

		$("#affiliation_category").change(function(){
			var affiliation_category = $(this).val();
			var type_of_ext_affiliation_div = $("#type_of_ext_affiliation_div");
			var external_affiliation_services_id_div = $('#external_affiliation_services_id_div');
			var type_of_ext_affiliation = $('#type_of_ext_affiliation').val();
			var external_affiliation_services_data_div = $("#external_affiliation_services_data_div");
			if (affiliation_category == 'external_affiliation_service') {
				type_of_ext_affiliation_div.removeClass('hide');
				if(type_of_ext_affiliation == 'ext_third_party') {
					external_affiliation_services_id_div.removeClass('hide');
					external_affiliation_services_data_div.addClass('hide');
				} else {
					external_affiliation_services_id_div.addClass('hide');
					external_affiliation_services_data_div.removeClass('hide');
				}
			} else {
				type_of_ext_affiliation_div.addClass('hide');
				external_affiliation_services_id_div.addClass('hide');
				external_affiliation_services_data_div.addClass('hide');
			}

		});

		$("#type_of_ext_affiliation").change(function(){
			var type_of_ext_affiliation = $(this).val();
			var external_affiliation_services_id_div = $("#external_affiliation_services_id_div");
			var external_affiliation_services_data_div = $("#external_affiliation_services_data_div");
			if(type_of_ext_affiliation == 'ext_third_party') {
				external_affiliation_services_id_div.removeClass('hide');
				external_affiliation_services_data_div.addClass('hide');
			} else {
				external_affiliation_services_id_div.addClass('hide');
				external_affiliation_services_data_div.removeClass('hide');
			}
		});
	});
</script>

<style type="text/css">
	label.error{
		color: red;
	}
</style>