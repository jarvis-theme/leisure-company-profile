	<div class="full_page">
		<h1>{{$data->judul}}</h1>        
		<div class="page_sidebar">
			<section id="main_content">
				<div class="short-code-column">{{$data->isi}}</div>
			</section>
			<aside id="sidebar">            	                
				<ul class="arrow_li side_nav">
					<li><a href="{{URL::to('produk')}}">{{ trans('content.shop_front.shop.our_product') }}</a></li>
					<li><a href="{{URL::to('testimoni')}}">{{ trans('content.shop_front.shop.testimonial') }}</a></li>
					<li><a href="{{URL::to('service')}}">{{ trans('content.shop_front.shop.term_service') }}</a></li>
				</ul>
				<div class="twitter_feed"> </div>
			</aside>
		</div>
	</div>