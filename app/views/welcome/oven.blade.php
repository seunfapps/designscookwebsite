@extends('layouts.master')
@section('pagetree')
<li><a href="index.html">Homepage</a></li>
<li><span>Login</span></li>
@stop
@section('content')
<div class="inner-wrapper">
    
        <div class="block-title"><h2>The Oven</h2></div>
        	<div class="split gallery-blocks">
            <?php for ($i = 0; $i < 9; $i++){?>
     			  <div class="size4">
						<a href="photo-gallery-single.html" class="gallery-pic hover-fade">
							<span class="hover-img"><i>View Gallery</i></span>
							<img src="images/photos/image-6.jpg" alt="" />
							<b class="gallery-title">Amet possim scripta eleifend eos</b>
						</a>
				  </div>
             <?php  } ?>
             </div>
             
             <div class="pager">
								<a href="#" class="page-link prev"><i class="fa fa-chevron-left"></i></a>
								<a href="#" class="page-link">1</a>
								<a href="#" class="page-link current">2</a>
								<a href="#" class="page-link">3</a>
								<a href="#" class="page-link">4</a>
								<a href="#" class="page-link">5</a>
								<a href="#" class="page-link next"><i class="fa fa-chevron-right"></i></a>
							</div>

							<div class="additional-button">
								<a href="#" class="s-big-button">Load More Galleries<i class="fa fa-refresh"></i></a>
							</div>

            
</div>
@stop