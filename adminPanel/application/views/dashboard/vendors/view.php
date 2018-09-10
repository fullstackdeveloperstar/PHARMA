<!-- #MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Vendors</li>
					<li>View Vendor</li>
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
							View Vendor
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
				<h2>View Form</h2>

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

					<form method="post" action="<?=base_url()?>Vendors/postEidtVendor/<?=$vendor['id']?>" id='editform'>
						<fieldset>
							<div class="form-group">
								<label>Vendor Name : </label>
								<label><?=$vendor['vendor_name']?></label>
								
							</div>
							<div class="form-group">
								<label>Vendor Website Url : </label>
								<label><?=$vendor['vendor_web_site_url']?></label>
							</div>
							<div class="form-group">
								<label>Default Currency : </label>
								<lable>
									<?php
									foreach ($currencies as $currency) {
										echo $currency['id'] == $vendor['default_currencies_id'] ? $currency['name'] : '';
									}
									?>
								</label>
							</div>

							

							<div class="form-group">
								<label>Affiliation Category : </label>
								<label>
									<?php
									switch ($vendor['affiliation_category']) {
										case 'no_affiliation':
											echo 'No Affiliation';
											break;
										case 'pharmacomparison_affiliation':
											echo 'Pharmacomparison Affiliation';
											break;
										case 'external_affiliation_service':
											echo 'External Affiliation Service';
											break;
										
									}
									?>
								</label>
							
							</div>

							<div class="form-group">
								<label>Affiliation Vendor Id : </label>
								<label><?=$vendor['affiliation_vendor_id']?></label>
								
							</div>

							<div class="form-group">
								<label>External Affiliation Service : </label>
								<label>
									<?php
									foreach ($external_affiliation_services as $service) {
										echo $service['id'] == $vendor['external_affiliation_services_id'] ? $service['outsorced_provider_name'] : '';
									}
									?>
								</label>
							</div>

							<div class="form-group">
								<label>Remark : </label>
								<label><?=$vendor['remark']?></label>
							</div>

							<div class="form-group">
								<label>Language : </label>
								<label>
									<?php
										foreach ($languages as $lang) {
											echo $lang['id'] == $vendor['languages_id'] ? $lang['name'] : '';
										}
									?>
								</label>
								
							</div>
							
						</fieldset>
						
						<fieldset>
							
							<?php
							$i = 0;
							foreach ($locations as $location) {
								$i++;
								?>
									<h3>Location <?=$i?></h3>
									<p>
										<label>Address : </label>
										<label><?=$location['address']?></label>
									</p>
									<p>
										<label>Zip : </label>
										<label><?=$location['zip']?></label>
									</p>
									<p>
										<label>Country : </label>
										<label><?=$location['country']?></label>
									</p>
									<p>
										<label>Phone : </label>
										<label><?=$location['phone']?></label>
									</p>
									<p>
										<label>Fax : </label>
										<label><?=$location['fax']?></label>
									</p>
									<p>
										<label>Vendor Email : </label>
										<label><?=$location['vendor_email']?></label>
									</p>
									<p>
										<label>Language : </label>
										<label>
											<?php
											foreach ($languages as $language) {
												if($language['id'] == $location['languages_id']) {
													echo $language['name'];
												}
											}
										
											?>	
										</label>
									</p>
									<p>
										<label>Enabled : </label>
										<label><?=$location['enabled'] == 1 ? 'Yes': 'No'?></label>
									</p>
								<?php
							}
							?>
						</fieldset>
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
		$("#editform").validate({
			// Rules for form validation
			rules : {
				
			},

			// Messages for form validation
			messages : {
				
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