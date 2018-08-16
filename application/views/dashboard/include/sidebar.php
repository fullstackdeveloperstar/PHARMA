<!-- #NAVIGATION -->
		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS/SASS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as is --> 
					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="<?=base_url()?>assets/img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							john.doe 
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
					<!-- <li class="">
						<a href="index.html" title="blank_"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Blank</span></a>
					</li> -->

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-home"></i>
							<span class="menu-item-parent">Dashboard</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Analytics Dashboard">Analytics Dashboard</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-desktop"></i>
							<span class="menu-item-parent">Website</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-renren"></i>
									Manage Static Page
								</a>
							</li>
							<li class="">
								<a href="" title="Manage Contact">
									<i class="fa fa-lg fa-fw fa-renren"></i>
									Manage Contact
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-renren"></i>
									Setting
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-renren"></i>
							<span class="menu-item-parent">Usage</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Usages
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Usages
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-bitbucket-square"></i>
							<span class="menu-item-parent">Drugs</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Drugs
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Drugs
								</a>
							</li>
						</ul>
					</li>


					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-pencil-square-o"></i>
							<span class="menu-item-parent">Formats</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Formats
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Formats
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Products</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Products
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Products
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Active Ingredients</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Ingredients
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Ingredients
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Dosages</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Dosages
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Dosages
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Vendors</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Vendors
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Vendors
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Vendors Office Location</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Office Location
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Office Location
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Vendors Offers</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Offers
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Offers
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Offer Price</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Set Offer Price
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Offer Price
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Currency</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Currency
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Currency
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Language</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Language
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Language
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Affiliation Services</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Third Party Affiliation Services
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Third Party Affiliation Services
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">People</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add People
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage People
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">System Operators</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add System Operators
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage System Operators
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Wizard</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Create Wizard
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Wizard
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">CSV Price Update</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add New Prices Update CSV Model
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage CSV Price Update
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									CSV file bulk prices update
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Most Request</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Most Request
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Most Request
								</a>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" title="">
							<i class="fa fa-lg fa-fw fa-xing-square"></i>
							<span class="menu-item-parent">Click Table</span>
							<b class="collapse-sign">
								<em class="fa fa-plus-square-o"></em>
							</b>
						</a>
						<ul>
							<li class="">
								<a href="" title="Manage Static Page">
									<i class="fa fa-lg fa-fw fa-gear"></i>
									Add Click Table
								</a>
							</li>
							<li class="">
								<a href="" title="Setting">
									<i class="fa fa-lg fa-fw fa-picture-o"></i>
									Manage Click Table
								</a>
							</li>
						</ul>
					</li>

				</ul>
			</nav>

			<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

		</aside>
		<!-- END NAVIGATION -->