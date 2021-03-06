@if(count(new_product()) > 0)
<div class="products_list products_slider">
    <h2 class="sub_title">{{ trans('content.shop_front.shop.new_product') }}</h2>
    <ul id="first-carousel" class="first-and-second-carousel jcarousel-skin-tango">
        @foreach(new_product() as $key => $myproduk)
        <li class="centering"> 
            <a href="{{product_url($myproduk)}}" class="product_image">
                <img src="{{URL::to(product_image_url($myproduk->gambar1,'medium'))}}" alt="{{$myproduk->nama}}" title="{{$myproduk->nama}}" onerror="this.src='//d3kamn3rg2loz7.cloudfront.net/img/no-image-product.png'">
            </a>
            <div class="product_info">
                <h3><a href="{{product_url($myproduk)}}">{{short_description(content_trans($myproduk, 'Produk', 'nama', $myproduk->nama), 50)}}</a></h3>
                <small>{{short_description($myproduk->deskripsi,60)}}</small>
            </div>
            @if($setting->checkoutType!=2)
            <div class="price_info">
                <button onclick="window.location.href='{{product_url($myproduk)}}'" class="price_add" title="Lihat" type="button" style="float: none;">
                    <span class="pr_price">&nbsp;{{price($myproduk->hargaJual)}}</span>
                    <span class="pr_add">{{ trans('content.shop_front.shop.btn.view') }}</span>
                </button>
            </div>
            @endif
        </li>
        @endforeach
    </ul>
</div>
@endif

<div class="products_list products_slider">
    <h2 class="sub_title">{{ trans('content.shop_front.shop.product') }}</h2>
    <ul id="first-carousel" class="first-and-second-carousel jcarousel-skin-tango">
        @foreach(home_product() as $key=>$myproduk)
        <li class="home-product">
            @if(is_outstok($myproduk))
            <img src="//d3kamn3rg2loz7.cloudfront.net/assets/leisure/img/stok-badge.png" class="outstok-badge">
            @elseif(is_terlaris($myproduk))
            <img src="//d3kamn3rg2loz7.cloudfront.net/assets/leisure/img/terlaris-badge.png" class="best-badge">
            @elseif(is_produkbaru($myproduk))
            <img src="//d3kamn3rg2loz7.cloudfront.net/assets/leisure/img/new-badge.png" class="new-badge">
            @endif
            <a href="{{product_url($myproduk)}}" class="product_image">
                <img src="{{URL::to(product_image_url($myproduk->gambar1,'medium'))}}" alt="{{$myproduk->nama}}" onerror="this.src='//d3kamn3rg2loz7.cloudfront.net/img/no-image-product.png'">
            </a>
            <div class="product_info">
                <h3><a href="{{product_url($myproduk)}}">{{short_description(content_trans($myproduk, 'Produk', 'nama', $myproduk->nama),50)}}</a></h3>
                <p style="text-align:left;"><small>{{short_description($myproduk->deskripsi,65)}}</small></p>
            </div>
            @if($setting->checkoutType!=2)
            <div class="price_info">
                <button onclick="window.location.href='{{product_url($myproduk)}}'" class="price_add" title="Lihat" type="button" style="float: none;">
                    <span class="pr_price">&nbsp;{{price($myproduk->hargaJual)}}</span>
                    <span class="pr_add">{{ trans('content.shop_front.shop.btn.view') }}</span>
                </button>
            </div>
            @endif
        </li>
        @endforeach
    </ul>
</div>