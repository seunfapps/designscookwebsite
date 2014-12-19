<!DOCTYPE html>
<html>
<head>
	<!-- Head Meta Data -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Designscook | gettting your designs done right</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Head Stylesheets -->
	 {{ HTML::style('css/theme-reset.css') }}
	 {{ HTML::style('css/font-awesome.min.css') }}
	 {{ HTML::style('css/dat-menu.css') }}
	 {{ HTML::style('css/css/animate.css') }}
	 {{ HTML::style('css/theme-style.css') }}
	 {{ HTML::style('css/shortcodes.css') }}
	 {{ HTML::style('css/responsive.css') }}
    
</head>
<body>

	<!-- BEGIN #wrapper -->
	<div id="wrapper" class="wide">

		<!-- BEGIN #header -->
		<header id="header">
			<!-- BEGIN .inner-wrapper -->
			<div class="inner-wrapper">
				
				<!-- BEGIN .logo-image -->
				<div class="logo-image">
					<a href="/"><img src="images/designscook-logo-278-129.fw.png" alt="" /></a>
				<!-- END .logo-image -->
				</div>

				<!-- BEGIN .social-icons -->
				<div class="social-icons">
					<div>
						<a href="https://twitter.com/DesignsCook" target="_blank"><img src="images/social-twitter.png" alt="" /></a>
					</div>
					<div>
						<a href="https://www.facebook.com/pages/DesignsCook/1426586880962451?ref=hl" target="_blank"><img src="images/social-facebook.png" alt="" /></a>
					</div>
					<div>
						<a href="https://plus.google.com/u/0/115870390292957554586/posts" target="_blank"><img src="images/social-google.png" alt="" /></a>
					</div>
					<!--<div class="header-search">
						<form action="#">
							<input type="text" name="s" value="" />
							<span><b>Search</b>Find content</span>
							<input type="submit" value="s" />
						</form>
					</div>-->
				<!-- END .social-icons -->
				</div>

				<!-- BEGIN #main-menu -->
				<div id="main-menu">
					<ul class="load-responsive" rel="Main Menu">
						<!--<li><a href="#">Home</a></li>-->
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Packages</a></li>
                        <li><a href="#">Collections</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><div class="logReg"><a href="#">Login</a></div></li>
                        <li><div class="logReg"><a href="#">Register</a></div></li>
                        <li><div id="register_btn"><a href="#">Post A Job</a></div></li>
                        
                        <!--<li><a href="#">How It Works</a></li>
                        <li><a href="#">Contact Us</a></li>
						<!--<li><a href="blog.html"><span>Blog</span></a>
							<ul class="sub-menu">
								<li><a href="blog-sidebar.html">Blog With Sidebar</a></li>
								<li><a href="post-single.html">Post Single</a></li>
								<li><a href="post-single-no-comments.html">Post Single No Comments</a></li>
							</ul>
						</li>
						<li><a href="shortcodes.html"><span>Features</span></a>
							<ul class="sub-menu">
								<li><a href="shortcodes.html"><span>Custom Shortcodes</span></a>
									<ul class="sub-menu">
										<li><a href="#">Buttons and Links</a></li>
										<li><a href="#">Columns</a></li>
										<li><a href="#">Contact Form</a></li>
										<li><a href="#">Info Box</a></li>
										<li><a href="#">Toggle</a></li>
										<li><a href="#">Typography</a></li>
									</ul>
								</li>
								<li><a href="#">Buy This Theme</a></li>
							</ul>
						</li>
						<li><a href="oven.html">The Oven</a></li>
						<li><a href="photo-gallery.html">Gallery</a></li>
						<li><a href="contact-us.html">Contacts</a></li>-->
					</ul>
				<!-- END #main-menu -->
				</div>

			<!-- END .inner-wrapper -->
			</div>
		<!-- END #header -->
		</header>
		

		<!-- BEGIN .header-bottom -->
		<div class="header-bottom">
			
            <div class="right-info with-basket">
                <!--	<a href="#" class="s-border-button" style="background-image:url(../images/panel-background.jpg);">Login</a>
                    <a href="#" class="s-border-button" style="background-image:url(../images/panel-background.jpg);">Register</a>
                    <a href="#" class="s-border-button" style="background-image:url(../images/panel-background.jpg);">Post a Job</a>-->
			</div>
			<div class="inner-wrapper">

				<ul class="page-tree">
					@yield('pagetree')
				</ul>

				<div class="basket">
					<!-- BEGIN .basket-content -->
					
				</div>

				

			<!-- END .inner-wrapper -->
			</div>
		<!-- END .header-bottom -->
		</div>



		<!-- BEGIN .content-wrapper -->
		<section class="content-wrapper">
		<div id="container" class="full-width">
			<div id="content">
			@yield('content')
			</div>
		</div>

		<!-- END .content-wrapper -->
		</section>




		<!-- BEGIN #footer -->
		<footer id="footer">
			<!-- BEGIN .inner-wrapper -->
			<div class="inner-wrapper">

				<!-- BEGIN .footer-widgets -->
				<div class="footer-widgets split">
					
					<!-- BEGIN .widget -->
					<div class="widget size4">
						<h3>Contact Information</h3>
						<div>
							
							<p>Duo id choro blandit, est ea purto constituto vituperatoribus. Id mei quis aeterno, hinc detracto deseruisse quo ne nam. Id mei quis aeterno, hinc detracto deseruisse quo ne nam.</p>
							<span class="big-icon"><i class="fa fa-phone"></i>&nbsp;&nbsp;8-453-234-1234</span>
							<span class="big-icon"><i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="#">oven@oursite.com</a></span>
							
						</div>
					<!-- BEGIN .widget -->
					</div>
					
					<!-- BEGIN .widget -->
					<div class="widget size4">
						<h3>Most Recent Posts</h3>
						<div class="article-items">
							
							<div class="item">
								<div class="item-photo">
									<a href="#"><img src="images/photos/image-9.jpg" alt="" /></a>
								</div>
								<div class="item-content">
									<h4><a href="post-single.html">Dicta nemore accusamus</a><a href="post-single.html#comments" class="comment-link"><i class="fa fa-comment"></i>163</a></h4>
									<p>Duo id choro blandit, est ea constituto vituperatoribus quis aeterno...</p>
								</div>
							</div>
							
							<div class="item">
								<div class="item-photo">
									<a href="#"><img src="images/photos/image-10.jpg" alt="" /></a>
								</div>
								<div class="item-content">
									<h4><a href="post-single.html">Dicta nemore accusamus</a><a href="post-single.html#comments" class="comment-link"><i class="fa fa-comment"></i>163</a></h4>
									<p>Duo id choro blandit, est ea constituto vituperatoribus quis aeterno...</p>
								</div>
							</div>
							
						</div>
					<!-- BEGIN .widget -->
					</div>
					
					<!-- BEGIN .widget -->
					<div class="widget size4">
						<h3>Latest Photo Galleries</h3>
						<div class="photo-widget">
							
							<div class="item"><a href="photo-gallery-single.html"><img src="images/photos/image-11.jpg" alt="" /></a></div>
							<div class="item"><a href="photo-gallery-single.html"><img src="images/photos/image-12.jpg" alt="" /></a></div>
							<div class="item"><a href="photo-gallery-single.html"><img src="images/photos/image-13.jpg" alt="" /></a></div>
							<div class="item"><a href="photo-gallery-single.html"><img src="images/photos/image-14.jpg" alt="" /></a></div>

							<div class="item"><a href="photo-gallery-single.html"><img src="images/photos/image-15.jpg" alt="" /></a></div>
							<div class="item"><a href="photo-gallery-single.html"><img src="images/photos/image-16.jpg" alt="" /></a></div>
							<div class="item"><a href="photo-gallery-single.html"><img src="images/photos/image-17.jpg" alt="" /></a></div>
							<div class="item"><a href="photo-gallery-single.html"><img src="images/photos/image-18.jpg" alt="" /></a></div>

							<div class="clear-float"></div>
							
						</div>
					<!-- BEGIN .widget -->
					</div>

					<div class="clear-float"></div>

				<!-- END .footer-widgets -->
				</div>

				<!-- BEGIN .footer-subscribe -->
				<div class="footer-subscribe">

					<div class="footer-social right">
						<a href="#" target="_blank"><img src="images/footer-social-twitter.png" alt="" /></a>
						<a href="#" target="_blank"><img src="images/footer-social-facebook.png" alt="" /></a>
						<a href="#" target="_blank"><img src="images/footer-social-google.png" alt="" /></a>
					</div>

					<div class="footer-subscribe-form right">
						<form action="#" method="get">
							<input type="text" value="" placeholder="Your e-mail" />
							<input type="submit" value="Subscribe" />
						</form>
					</div>
					
					<div class="info-msg">
						<h3>Subscribe to newsletter</h3>
						<p>Be first to get infotmation about our latest offers &amp; more</p>
					</div>

				<!-- END .footer-subscribe -->
				</div>

				<!-- BEGIN .footer-menu -->
				<div class="footer-menu">
					<ul>
						<li><a href="#">Partners</a></li>
						<li><a href="#">The Oven</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				<!-- END .footer-menu -->
				</div>

				<!-- BEGIN .footer-copyright -->
				<div class="footer-copyright">
					
					<p>
						&copy; <script>var now = new Date(); document.write(now.getFullYear())</script> 
						<a href="">designscook.com</a> . All rights reserved
					</p>

				<!-- END .footer-copyright -->
				</div>

			<!-- END .inner-wrapper -->
			</div>
		<!-- END #footer -->
		</footer>

	<!-- END #wrapper -->
	</div>


	<!-- Theme Scripts -->
	<script>
		// Animation time of revieling and hiding menu (defaut = 400)
		var _datMenuAnim = 400;
		// Animation effect for now it is just 1 (defaut = "effect-1")
		var _datMenuEffect = "effect-1";
		// Submenu dropdown animation (defaut = true)
		var _datMenuSublist = true;
		// If fixed header is showing (defaut = true)
		var _datMenuHeader = false;
		// Header Title
		var _datMenuHeaderTitle = "DatCouch";
		// If search is showing in header (defaut = true)
		var _datMenuSearch = true;
	</script>

	<script src="jscript/jquery-1.10.2.min.js"></script>
	<script src="jscript/iscroll.js"></script>
	<script src="jscript/modernizr.custom.50878.js"></script>

	<script src="jscript/flowtype.js"></script>
	<script src="jscript/jquery.knob.js"></script>
	<script src="jscript/theme-script.js"></script>
	<script src="jscript/dat-menu.js"></script>

</body>
</html>