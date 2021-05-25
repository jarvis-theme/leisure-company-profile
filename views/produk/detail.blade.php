<ul class="breadcrumb">
    {{$breadcrumb}} 
</ul>
<div id="product_detail">
    <div class="product_leftcol centering">
        <div id="flexslider-product">
            <span class="slides">
            <a href="{{url(product_image_url($produk->gambar1,'large'))}}">
                {{HTML::image(product_image_url($produk->gambar1,'large'), $produk->nama, array("onerror"=>"this.src='//d3kamn3rg2loz7.cloudfront.net/img/no-image-product.png';"))}} <span class="pr_info"></span>
            </a>
            </span>
        </div>
        <ul id="flexslider-product" class="pr_gallery">
            @if($produk->gambar2)
            <li class="slides"><a href="{{url(product_image_url($produk->gambar2,'large'))}}">{{HTML::image(product_image_url($produk->gambar2,'thumb'), 'Gambar 1', array('width' => '95', 'heigth' => '95', "onerror" => "this.src='//d3kamn3rg2loz7.cloudfront.net/img/no-image-product.png';"))}}</a></li>
            @endif
            @if($produk->gambar3)
            <li class="slides"><a href="{{url(product_image_url($produk->gambar3,'large'))}}">{{HTML::image(product_image_url($produk->gambar3,'thumb'), 'Gambar 2', array('width' => '95', 'heigth' => '95', "onerror" => "this.src='//d3kamn3rg2loz7.cloudfront.net/img/no-image-product.png';"))}}</a></li>
            @endif
            @if($produk->gambar4)
            <li class="slides"><a href="{{url(product_image_url($produk->gambar4,'large'))}}">{{HTML::image(product_image_url($produk->gambar4,'thumb'), 'Gambar 3', array('width' => '95', 'heigth' => '95', "onerror" => "this.src='//d3kamn3rg2loz7.cloudfront.net/img/no-image-product.png';"))}}</a></li>
            @endif
        </ul>
    </div>

    <div class="product_rightcol"> <!-- <small class="pr_type">{{$produk->nama}}</small> -->
        <h1>{{$produk->nama}}</h1>
        <p class="short_dc">{{$produk->deskripsi}}</p>
        
        <form action="#" id='addorder'>
            @if($setting->checkoutType!=2)
                <div class="pr_price">
                    <big>{{ price($produk->hargaJual) }}</big>
                    @if($produk->hargaCoret != 0)
                    <small>{{ price($produk->hargaCoret) }}</small>
                    @endif
                </div>
            @endif
            <div class="">
                <div class="size_sel">
                    @if($produk->stok < 10)
                        <b>{{ trans('content.shop_front.shop.stock.ready_stock') }}</b>
                    @elseif($produk->stok > 10)
                        <label>{{ trans('content.shop_front.shop.stock.stock') }} :</label>
                        <input type="number" class="qty" name="qty" pattern="[0-9]" title="{{ trans('content.shop_front.shop.stock.stock') }}" value="1">
                    @else
                        <b>{{ trans('content.shop_front.shop.stock.out_of_stock') }}</b>
                    @endif
                </div>
                @if($opsiproduk->count()>0)
                <div id="opsiprod">
                    <label>{{ trans('content.shop_front.shop.option') }} :</label>
                    <select class="contact_page">
                        <option value=""> --- </option>
                        @foreach ($opsiproduk as $key => $opsi)
                        <option value="{{$opsi->id}}" {{ $opsi->stok==0 ? 'disabled':''}} >
                            {{$opsi->opsi1.($opsi->opsi2=='' ? '':' / '.$opsi->opsi2).($opsi->opsi3=='' ? '':' / '.$opsi->opsi3)}} {{price($opsi->harga)}}
                        </option>
                        @endforeach
                    </select>
                </div>
                @endif
            </div>
        </form>
        <div class="product_overview" id="sosial-media">
            {{-- sosialShare(url(product_url($produk))) --}} 
        </div>
        <div class="product_overview">
            {{-- pluginComment(product_url($produk), @$produk) --}} 
        </div>
    </div>
</div>

@if(count(other_product($produk)) > 0)
<div class="products_list products_slider">
    <h2 class="sub_title centering" id="recommend">{{ trans('content.shop_front.shop.more_product') }}</h2>
    <ul id="first-carousel" class="first-and-second-carousel jcarousel-skin-tango centering">
        {{--*/ $i=count(other_product($produk)) /*--}}
        @foreach(other_product($produk) as $myproduk)
        <li id="relateprod" class="{{$i>3?'fl':''}}">
            @if(is_outstok($myproduk))
                <img src="//d3kamn3rg2loz7.cloudfront.net/assets/leisure/img/stok-badge.png" class="outstok-badge">
            @elseif(is_produkbaru($myproduk))
                <img src="//d3kamn3rg2loz7.cloudfront.net/assets/leisure/img/new-badge.png" class="new-badge">
            @elseif(is_terlaris($myproduk))
                <img src="//d3kamn3rg2loz7.cloudfront.net/assets/leisure/img/terlaris-badge.png" class="best-badge">
            @endif
            <a href="{{slugProduk($myproduk)}}" class="product_image">
                {{HTML::image(product_image_url($myproduk->gambar1,'medium'), $myproduk->nama, array("onerror" => "this.src='//d3kamn3rg2loz7.cloudfront.net/img/no-image-product.png';"))}} 
            </a>
            <div class="product_info text-left">
                <h3 class="centering"><a href="{{url(product_url($myproduk))}}">{{short_description($myproduk->nama,30)}}</a></h3>
                <small>{{short_description($myproduk->deskripsi,100)}}</small>
            </div>
                
            @if($setting->checkoutType!=2)
            <div class="price_info">
                <button onclick="window.location.href='{{slugProduk($myproduk)}}'" class="price_add fl" type="button">
                    <span class="pr_price">&nbsp;{{price($myproduk->hargaJual,$matauang)}}</span>
                    <span class="pr_add">{{ trans('content.shop_front.shop.btn.view') }}</span>
                </button>
            </div>
            @endif
        </li>
        @endforeach
    </ul>
</div>
@endif