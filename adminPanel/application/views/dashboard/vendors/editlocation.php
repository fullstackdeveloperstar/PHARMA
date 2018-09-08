<!-- #MAIN PANEL -->
<div id="main" role="main">

	<!-- RIBBON -->
	<div id="ribbon">

		<!-- breadcrumb -->
		<ol class="breadcrumb">
			<li>Vendors</li>
			<li>Edit Location</li>
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
						Edit Location
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
				<h2>Edit Location Form</h2>

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

					<form method="post" action="<?=base_url()?>Vendors/postEditLocation/<?=$vendor['id']?>/<?=$location['id']?>" id='addnewform'>
						<fieldset>
							
							<div class="form-group">
								<label>Address</label>
								<input class="form-control" placeholder="Address" type="text" name="address" required="" value="<?=$location['address']?>">
							</div>

							<div class="form-group">
								<label>Zip</label>
								<input class="form-control" placeholder="Zip" type="text" required="" name="zip" value="<?=$location['zip']?>">
							</div>

							<div class="form-group">
								<label>Country</label>
								<input class="form-control" placeholder="Country" type="text" required="" name="country" value="<?=$location['country']?>">
							</div>

							<div class="form-group">
								<label>Phone</label>
								<input class="form-control" placeholder="Phone" type="text" required="" name="phone" value="<?=$location['phone']?>">
							</div>

							<div class="form-group">
								<label>Fax</label>
								<input class="form-control" placeholder="Fax" type="text" required="" name="fax" value="<?=$location['fax']?>">
							</div>
							
							<div class="form-group">
								<label>Vendor Email</label>
								<input class="form-control" placeholder="Vendor Email" type="email" required="" name="vendor_email" value="<?=$location['vendor_email']?>">
							</div>
							
							<div class="form-group">
								<label>Reference People</label>
								<select class="form-control" name="reference_people_id">
									<?php
									foreach ($peoples as $people) {
										?>
										<option value="<?=$people['id']?>" <?= $people['id'] == $location['reference_people_id'] ? 'selected' : ''?>><?=$people['username']?></option>
										<?php
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label>Minimum Domestic Delivery Cost</label>
								<input class="form-control" placeholder="Minimum Domestic Delivery Cost" type="text" required="" name="minimum_domestic_delivery_cost" value="<?=$location['minimum_domestic_delivery_cost']?>">
							</div>

							<div class="form-group">
								<label>Minimum Domestic Delivery Cost Currencies</label>
								<select class="form-control" name="minimum_domestic_delivery_cost_currencies">
									<?php
									foreach ($currencies as $currency) {
										?>
										<option value="<?=$currency['id']?>" <?= $currency['id'] == $location['minimum_domestic_delivery_cost_currencies'] ? 'selected' : ''?>><?=$currency['name']?></option>
										<?php
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label>Minimum International Delivery Cost</label>
								<input class="form-control" placeholder="Minimum International Delivery Cost" type="text" required="" name="minimum_international_delivery_cost" value="<?= $location['minimum_international_delivery_cost']?>">
							</div>

							<div class="form-group">
								<label>Minimum International Delivery Currencies</label>
								<select class="form-control" name="minimum_international_delivery_currencies">
									<?php
									foreach ($currencies as $currency) {
										?>
										<option value="<?=$currency['id']?>" <?= $currency['id'] == $location['minimum_international_delivery_currencies'] ? 'selected' : ''?>><?=$currency['name']?></option>
										<?php
									}
									?>
								</select>
							</div>

							<div class="form-group">
								<label>Enabled</label>
								<select class="form-control" name="enabled">
									<option value="1" <?= $location['enabled'] == "1"? 'selected': ''?>>Yes</option>
									<option value="0" <?= $location['enabled'] == "0"? 'selected': ''?>>No</option>
								</select>
							</div>
							
							<div class="form-group">
								<label>Language</label>
								<select class="form-control" name="languages_id">
									<?php
										foreach ($languages as $lang) {
											?>
											<option value="<?=$lang['id']?>" <?= $lang['id'] == $location['languages_id'] ? 'selected' : ''?>><?=$lang['name']?></option>
											<?php
										}
									?>
								</select>
							</div>
							
						</fieldset>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary btn-lg">
								<i class="fa fa-save"></i>
								Save Location
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
				address : {
					required : true
				},
			},

			// Messages for form validation
			messages : {
				address : {
					required : 'Please enter your address'
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