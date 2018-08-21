
		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS/SASS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as is --> 
					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="<?=base_url()?>assets/img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							<?=$this->session->userdata('admin_username')?>
						</span>
						<i class="fa fa-angle-down"></i>
					</a> 
					
				</span>
			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive

			To make this navigation dynamic please make sure to link the node
			(the reference to the nav > ul) after page load. Or the navigation
			will not initialize.
			-->
			<nav>
				<!-- 
				NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional href="" links. See documentation for details.
				-->

				<ul>
					

					<li class="<?php
						if($view == 'dashboard/dashboard/analyticsdashboard' || $view == 'dashboard/dashboard/admindashboard') echo 'active';
					?>">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-home"></i>
							<span class="menu-item-parent">Dashboard</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="<?php
								if($view == 'dashboard/dashboard/analyticsdashboard') echo 'active';
							?>">
								<a href="<?=base_url()?>Dashboard/analyticsdashboard" title="">Analytics Dashboard</a>
							</li>
							<li class="<?php
								if($view == 'dashboard/dashboard/admindashboard') echo 'active';
							?>">
								<a href="<?=base_url()?>Dashboard/admindashboard" title="">Admin Dashboard</a>
							</li>
						</ul>
					</li>

					<li class="<?php
						if($view == 'dashboard/offerprice/offerprice') echo 'active';
					?>">
						<a href="<?=base_url()?>OfferPrice" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Offer Price</span>
						</a>
					</li>

					<li class="<?php if($view == 'dashboard/wizardpricesupdate/wizardpricesupdate') echo 'active';?>">
						<a href="<?=base_url()?>WizardPricesUpdate" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Wizard Prices Update</span>
						</a>
					</li>

					<li class="<?php if($view == 'dashboard/currencies/currencies') echo 'active';?>">
						<a href="<?=base_url()?>Currencies" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Currencies</span>
						</a>
					</li>

					<li class="<?php if($view == 'dashboard/languages/languages') echo 'active';?>">
						<a href="<?=base_url()?>Languages" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Language</span>
						</a>
					</li>

					<li class="<?php if($view == 'dashboard/people/addaperson' || $view == 'dashboard/people/managepeople') echo 'active';?>">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">People</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="<?php if($view == 'dashboard/people/addaperson') echo 'active';?>">
								<a href="<?=base_url()?>People/addaperson" title="">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add a Person
								</a>
							</li>
							<li class="<?php if($view == 'dashboard/people/managepeople') echo 'active';?>">
								<a href="<?=base_url()?>People/managepeople" title="">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage People
								</a>
							</li>
						</ul>
					</li>

					<li class="<?php if($view == 'dashboard/administrators/addanadministrator' || $view == 'dashboard/administrators/manageadministrators') echo 'active';?>">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Administrators</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="<?php if($view == 'dashboard/administrators/addanadministrator') echo 'active';?>">
								<a href="<?=base_url()?>Administrators/addanadministrator" title="">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add an Administrator
								</a>
							</li>
							<li class="<?php if($view == 'dashboard/administrators/manageadministrators') echo 'active';?>">
								<a href="<?=base_url()?>Administrators/manageadministrators" title="">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Administrators
								</a>
							</li>
						</ul>
					</li>

					<li class="<?php if($view == 'dashboard/unitofmeasure/confection' || $view == 'dashboard/unitofmeasure/ingredients') echo 'active';?>">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Unit of Measure</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="<?php if($view == 'dashboard/unitofmeasure/confection') echo 'active';?>">
								<a href="<?=base_url()?>UnitOfMeasure/confection" title="">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Confection Quantity U. of M.
								</a>
							</li>
							<li class="<?php if($view == 'dashboard/unitofmeasure/ingredients') echo 'active';?>">
								<a href="<?=base_url()?>UnitOfMeasure/ingredients" title="">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Active Ingredients Concentration U. of M.
								</a>
							</li>
						</ul>
					</li>

					<li class="<?php if($view == 'dashboard/activeingredients/activeingredients') echo 'active';?>">
						<a href="<?=base_url()?>ActiveIngredients" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Active Ingredients</span>
						</a>
					</li>

					<li class="<?php if($view == 'dashboard/formats/formats') echo 'active';?>">
						<a href="<?=base_url()?>Formats" title="">
							<i class="fa fa-lg fa-fw fa-pencil-square-o"></i>
							<span class="menu-item-parent">Formats</span>
						</a>
					</li>

					<li class="<?php if($view == 'dashboard/drugs/drugs') echo 'active';?>">
						<a href="<?=base_url()?>Drugs" title="">
							<i class="fa fa-lg fa-fw fa-bitbucket-square"></i>
							<span class="menu-item-parent">Drugs</span>
						</a>
					</li>					

					<li class="<?php if($view == 'dashboard/products/addnewproduct' || $view == 'dashboard/products/manageproducts') echo 'active';?>">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Products</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="<?php if($view == 'dashboard/products/addnewproduct') echo 'active';?>">
								<a href="<?=base_url()?>Products/addnewproduct" title="">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add New Product
								</a>
							</li>
							<li class="<?php if($view == 'dashboard/products/manageproducts') echo 'active';?>">
								<a href="<?=base_url()?>Products/manageproducts" title="">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Products
								</a>
							</li>
						</ul>
					</li>
					
					<li class="<?php if($view == 'dashboard/vendors/addnewvendor' || $view == 'dashboard/vendors/managevendors') echo 'active';?>">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Vendors</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="<?php if($view == 'dashboard/vendors/addnewvendor') echo 'active';?>">
								<a href="<?=base_url()?>Vendors/addnewvendor" title="">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add New Vendor
								</a>
							</li>
							<li class="<?php if($view == 'dashboard/vendors/managevendors') echo 'active';?>">
								<a href="<?=base_url()?>Vendors/managevendors" title="">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Vendors
								</a>
							</li>
						</ul>
					</li>

					
					<li class="<?php if($view == 'dashboard/vendorsoffers/addnewoffer' || $view == 'dashboard/vendorsoffers/manageoffers') echo 'active';?>">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Vendors Offers</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="<?php if($view == 'dashboard/vendorsoffers/addnewoffer') echo 'active';?>">
								<a href="<?=base_url()?>VendorsOffers/addnewoffer" title="">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add New Offer
								</a>
							</li>
							<li class="<?php if($view == 'dashboard/vendorsoffers/manageoffers') echo 'active';?>">
								<a href="<?=base_url()?>VendorsOffers/manageoffers" title="">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Offers
								</a>
							</li>
						</ul>
					</li>

					<li class="<?php if($view == 'dashboard/affiliationservices/add' || $view == 'dashboard/affiliationservices/manage') echo 'active';?>">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Affiliation Services</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="<?php if($view == 'dashboard/affiliationservices/add') echo 'active';?>">
								<a href="<?=base_url()?>AffiliationServices/add" title="">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Third Party Affiliation Service
								</a>
							</li>
							<li class="<?php if($view == 'dashboard/affiliationservices/manage') echo 'active';?>">
								<a href="<?=base_url()?>AffiliationServices/manage" title="">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Third Party Affiliation Services
								</a>
							</li>
						</ul>
					</li>

					<li class="<?php if($view == 'dashboard/csvxmlpriceupdate/addmanagecsvxmlpricemodels' || $view == 'dashboard/csvxmlpriceupdate/csvbulkpricesupdate') echo 'active';?>">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">CSV/XML Prices Update</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="<?php if($view == 'dashboard/csvxmlpriceupdate/addmanagecsvxmlpricemodels') echo 'active';?>">
								<a href="<?=base_url()?>CSVXMLPricesUpdate/addmanagecsvxmlpricemodel" title="">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add/Manage CSV/XML Price Models
								</a>
							</li>
							<li class="<?php if($view == 'dashboard/csvxmlpriceupdate/csvbulkpricesupdate') echo 'active';?>">
								<a href="<?=base_url()?>CSVXMLPricesUpdate/csvbulkpricesupdate" title="">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									CSV Bulk Prices Update
								</a>
							</li>
						</ul>
					</li>

					<li class="<?php if($view == 'dashboard/specialdiscounts/specialdiscounts') echo 'active';?>">
						<a href="<?=base_url()?>SpecialDiscounts" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Special Discounts</span>
						</a>
					</li>
					
				</ul>
			</nav>

			<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

		</aside>
		<!-- END NAVIGATION