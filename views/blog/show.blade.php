	<div class="full_page">
		<h1>{{$detailblog->judul}}</h1>
		<div class="page_sidebar">
			<section id="main_content">
				<span class="highlight_text">{{$detailblog->kategori->nama}}</span>
				<p>
					<span class="date">
						<i class="icon-calendar"></i> {{date("d M Y", strtotime($detailblog->created_at))}} 
						<i class="icon-tag"></i><a href="#"></a>
					</span>
				</p>
				<div class="short-code-column">
					{{$detailblog->isi}} 
				</div>
				<div id="border-blog"></div>
				<br>
				<div class="navigate comments clearfix">
					@if(prev_blog($detailblog))
					<p class="pull-left">
						<a href="{{blog_url(prev_blog($detailblog))}}" id="navigate-post">&larr; {{ trans('content.shop_front.shop.blog.next_blog') }}</a>
					</p>
					@endif
					@if(next_blog($detailblog))
					<p class="pull-right">
						<a href="{{blog_url(next_blog($detailblog))}}" id="navigate-post">{{ trans('content.shop_front.shop.blog.prev_blog') }} &rarr;</a>
					</p>
					@endif
				</div>
				<br>
				{{$fbscript}} 
				{{fbcommentbox(blog_url($detailblog), '100%', '5', 'light')}} 
			</section>
			<aside id="sidebar">
				<ul class="arrow_li side_nav">
					@foreach(list_blog_category() as $key=>$value)
					<li><a href="{{blog_category_url($value)}}">{{$value->nama}}</a></li>
					@endforeach
				</ul>
				<div class="twitter_feed"></div>
			</aside>
		</div>
	</div>