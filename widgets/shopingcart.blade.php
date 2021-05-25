<div class="counter">
    <a href="javascript:void(0);" class="minicart_link">
    	<span class="item"><b>{{Shpcart::cart()->total_items()}}</b> {{ trans('content.shop_front.shop.cart.item') }} /</span>
    	<span class="price"><b>{{ price(Shpcart::cart()->total() )}}</b></span>
	</a>
</div>
<div class="cart_drop">
	<span class="darw"></span>
    <ul>
    	@if(Shpcart::cart())
    		@foreach (Shpcart::cart()->contents() as $key => $cart)
    		<li>
    			<a href="#">{{$cart['name']}}</a>
    			<span class="price pull-right">{{ price($cart['qty'] * $cart['price'])}}</span>
			</li>
			@endforeach
			<div class="cart_bottom">
				<div class="subtotal_menu">
					<small>{{ trans('content.shop_front.shop.cart.subtotal') }}:</small><big>{{ price(Shpcart::cart()->total() )}}</big>
				</div>
				<a href="{{url('checkout')}}">{{ trans('content.shop_front.shop.cart.cart') }}</a>
			</div>
		@else
			<li>
				<center><span class="price">{{ trans('content.shop_front.shop.cart.empty') }}</span></center>
			</li>
		@endif
    </ul>
</div>