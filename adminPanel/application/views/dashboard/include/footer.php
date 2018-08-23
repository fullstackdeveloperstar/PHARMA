		</div>
		<!-- #PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white">SmartAdmin 1.9.x <span class="hidden-xs"> - Web Application Framework</span> © 2017-2019</span>
				</div>
			</div>
			<!-- end row -->
		</div>
		<!-- END FOOTER -->

		<!-- #SHORTCUT AREA : With large tiles (activated via clicking user name tag)
			 Note: These tiles are completely responsive, you can add as many as you like -->
		<div id="shortcut">
			<ul>
				<li>
					<a href="<?=base_url()?>DashboardBase/logout" class="jarvismetro-tile big-cubes bg-color-blue"> 
						<span class="iconbox"> 
							<i class="fa fa-sign-out fa-4x"></i> 
							<span>Log Out 
								<!-- <span class="label pull-right bg-color-darken">14</span> -->
							</span> 
						</span> 
					</a>
				</li>
			</ul>
		</div>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->


		<script src="<?=base_url()?>assets/js/app.config.js"></script>
		<!-- MAIN APP JS FILE -->
		<script src="<?=base_url()?>assets/js/app.min.js"></script>
		
		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script>
	
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>

	</body>

</html>