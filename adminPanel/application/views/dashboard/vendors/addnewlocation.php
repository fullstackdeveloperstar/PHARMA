<!-- #MAIN PANEL -->
<div id="main" role="main">

	<!-- RIBBON -->
	<div id="ribbon">

		<!-- breadcrumb -->
		<ol class="breadcrumb">
			<li>Vendors</li>
			<li>Add New Location</li>
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
						Add New Location
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
				<h2>Add New Location Form</h2>

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

					<form method="post" action="<?=base_url()?>Vendors/postAddNewLocation" id='addnewform'>
						<fieldset>
							<input type="hidden" name="vendors_id" value="<?=$vendor['id']?>">
							<div class="form-group">
								<label>Address</label>
								<input class="form-control" placeholder="Address" type="text" name="address" required="">
							</div>

							<div class="form-group">
								<label>Zip</label>
								<input class="form-control" placeholder="Zip" type="text" required="" name="zip">
							</div>

							<div class="form-group">
								<label>Country</label>
								<input class="form-control" placeholder="Country" type="text" required="" name="country">
							</div>

							<div class="form-group">
								<label>Phone</label>
								<input class="form-control" placeholder="Phone" type="text" required="" name="phone">
							</div>

							<div class="form-group">
								<label>Fax</label>
								<input class="form-control" placeholder="Fax" type="text" required="" name="fax">
							</div>
							
							<div class="form-group">
								<label>Vendor Email</label>
								<input class="form-control" placeholder="Vendor Email" type="email" required="" name="vendor_email">
							</div>

							<div class="form-group">
								<label>Enabled</label>
								<select class="form-control" name="enabled">
									<option value="1">Yes</option>
									<option value="0">No</option>
								</select>
							</div>
							
							<div class="form-group">
								<label>Language</label>
								<select class="form-control" name="languages_id">
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
								Add New Location
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