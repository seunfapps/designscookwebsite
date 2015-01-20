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
	 {{ HTML::style('css/animate.css') }}
	 {{ HTML::style('css/theme-style.css') }}
	 {{ HTML::style('css/shortcodes.css') }}
	 {{ HTML::style('css/responsive.css') }}
    
    
    
     <style type="text/css">
	.mybutton{
border: 1px solid rgba(175, 175, 175, 0.75);
border-radius: 4px;
background-clip: padding-box;
background-color: rgba(255, 255, 255, 0.9);
box-shadow: 0px 1px 0px rgba(255, 255, 255, 0.34), 0px 1px 0px rgba(0, 0, 0, 0.1) inset;
background-image: -moz-linear-gradient(center bottom , rgba(140, 140, 140, 0.29) 0%, rgba(255, 255, 255, 0.29) 100%);	
}
	
	</style>
    
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
					<a href="/"><img src="{{ asset('images/designscook-logo-278-129.fw.png') }}" alt="" /></a>
				<!-- END .logo-image -->
				</div>

				<!-- BEGIN .social-icons -->
				<div class="social-icons">
					<div>
						<a href="http://twitter.com/designscook" target="_blank"><img src="{{ asset('images/social-twitter.png') }}" alt="" /></a>
					</div>
					<div>
						<a href="https://www.facebook.com/pages/DesignsCook/1426586880962451?ref=hl" target="_blank"><img src="{{ asset('images/social-facebook.png') }}" alt="" /></a>
					</div>
					<div>
						<a href="https://plus.google.com/u/0/115870390292957554586/posts" target="_blank"><img src="{{ asset('images/social-google.png') }}" alt="" /></a>
					</div>
					<div class="header-search">
						<form action="#">
							<input type="text" name="s" value="" />
							<span><b>Search</b>Find content</span>
							<input type="submit" value="s" />
						</form>
					</div>
				<!-- END .social-icons -->
				</div>

				<!-- BEGIN #main-menu -->
				<div id="main-menu">
					<ul class="load-responsive" rel="Main Menu">
						<li>{{HTML::link('project/post','Categories')}}</li>
						<li>{{HTML::link('business_packages','Packages')}}</li>
						<li>{{HTML::link('','The Oven')}}</li>
						<li><a href="/#faqs">FAQs</a></li>
						 @if(!Auth::check())
	                        <li>{{HTML::link('login','Log in',['class'=>'mybutton'])}}</li>
	                        <li>{{HTML::link('register','Register',['class'=>'mybutton'])}}</li>
	                        <li>{{HTML::link('project/post','Post A Project',['class'=>'mybutton', 'style'=>'background: none repeat scroll 0% 0% #A6BE29; color:#fff'])}}
	                     @else
	                     	<li><a href="" class='mybutton'><span>My Account</span></a>
							<ul class="sub-menu">
								<li>{{HTML::link('user/dashboard','My Profile')}}</li>
								<li>{{HTML::link('logout','Log out')}}</li>
							</ul>
						</li>
                        	
                        	 @if(Auth::user()->userable_type == 'Designer')
	                        	<li>{{HTML::link('project/post','Browse Projects',['class'=>'mybutton', 'style'=>'background: none repeat scroll 0% 0% #A6BE29; color:#fff'])}}
	                        @elseif(Auth::user()->userable_type == 'Customer')
								<li>{{HTML::link('project/post','Post A Project',['class'=>'mybutton', 'style'=>'background: none repeat scroll 0% 0% #A6BE29; color:#fff'])}}
							@endif
                        @endif
                       
					</ul>
				<!-- END #main-menu -->
				</div>

			<!-- END .inner-wrapper -->
			</div>
		<!-- END #header -->
		</header>
		

		<!-- BEGIN .header-bottom -->
		<div class="header-bottom">
			<!-- BEGIN .inner-wrapper -->
			<div class="inner-wrapper">

				<ul class="page-tree">
					@yield('pagetree')
				</ul>

			

				<div class="right-info">
					<span >Need Help? &nbsp;<i class="fa fa-phone"></i> <a href='tel:0809-800-0901' style='color:#efeadf;'>0809-800-0901</a> &nbsp; <i class="fa fa-envelope"></i> <a href='mailto:info@designscook.com' style='color:#efeadf;'>info@designscook.com</a> </span>
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
							<p>For any enquiries, please feel free to call or send us a mail, we will respond to you within 48 hours.</p>
							<span class="big-icon"><i class="fa fa-phone"></i>&nbsp;&nbsp;<a href="tel:08098000901">0809-800-0901</a></span>
							<span class="big-icon"><i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:info@designscook.com">info@designscook.com</a></span>
						</div>
					<!-- BEGIN .widget -->
					</div>
					
					<!-- BEGIN .widget -->
					<div class="widget size4">
						<h3>Contact Us</h3>
						{{Form::open(['action'=>'welcomeController@contactus'])}}
						<div class="contact-footer">
							<div>
							<p class="input-text">
								{{Form::text('name','', ['placeholder'=>'Name', 'class'=>'input-text', 'required'=>'true'])}}
							</p>
							<p class="form-email">
								{{Form::email('email','', ['placeholder'=>'Email','required'=>'true'])}}
							</p>
							
							<p class="form-comment">
								{{Form::textarea('message','', ['placeholder'=>'Your message here', 'required'=>'true'])}}
							</p>
							<p class="form-submit">
								{{Form::submit('Submit')}}
							</p>
						</div>
						</div>
							{{Form::close()}}
					</div>
					
					<!-- BEGIN .widget -->
					<div class="widget size4">
						<h3>About Us</h3>
						<p>DesignsCook is an online design marketplace that provides logo, graphics, website, 3D and print designs services by providing access to freeleance graphic designers and design studios arounud the world. To showcase their design skills that can relate with what the clients want, with the aim to deliver services that will boost both small and large organizations</p>	
					</div>				

				<!-- END .footer-widgets -->
				</div>

				<!-- BEGIN .footer-subscribe -->
				<div class="footer-subscribe">

					<div class="footer-social right">
						<a href="http://twitter.com/designscook" target="_blank"><img src="{{ asset('images/social-twitter.png') }}" alt="" /></a>
						<a href="https://www.facebook.com/pages/DesignsCook/1426586880962451?ref=hl" target="_blank"><img src="{{ asset('images/social-facebook.png') }}" alt="" /></a>
						<a href="https://plus.google.com/u/0/115870390292957554586/posts" target="_blank"><img src="{{ asset('images/social-google.png') }}" alt="" /></a>
					</div>

					<div class="footer-subscribe-form right">
						{{Form::open(['action'=>'welcomeController@subscribe'])}}
							{{Form::email('subscription_email','', ['placeholder'=>'Your email', 'required'=>'true'])}}
							{{Form::submit('Subscribe')}}
						{{Form::close()}}
						{{$errors->first('subscription_email','<p>:message</p>')}}
					</div>
					
					<div class="info-msg">
						<h3>Subscribe to newsletter</h3>
						<p>Be first to get infotmation about our latest offers &amp; more</p>
					</div>

				<!-- END .footer-subscribe -->
				</div>


				<!-- BEGIN .footer-copyright -->
				<div class="footer-copyright">
					
					<p>
						&copy; <script>var now = new Date(); document.write(now.getFullYear())</script> 
						<a href="">designscook.com.ng</a> . All rights reserved
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

	

 	{{ HTML::script('jscript/jquery-1.10.2.min.js')}}
	{{ HTML::script('jscript/iscroll.js')}}
	{{ HTML::script('jscript/modernizr.custom.50878.js')}}
	{{ HTML::script('jscript/jquery-1.10.2.min.js')}}
	{{ HTML::script('jscript/flowtype.js')}}
	{{ HTML::script('jscript/jquery.knob.js')}}
	{{ HTML::script('jscript/theme-script.js')}}
	{{ HTML::script('jscript/dat-menu.js')}}
	@if (Session::has('status'))
			
		<script>
			alert('<?php echo Session::get('status') ?>');
		</script>
		{{Session::forget('status')}}
	@endif
</body>
</html>