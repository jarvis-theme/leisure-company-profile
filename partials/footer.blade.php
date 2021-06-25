<div class="footer_container">
    <footer>
        <div class="menu-footer">
            <ul class="footer_links">
                @foreach(all_menu() as $key=>$group) 
                <li><span>{{$group->nama}}</span>
                    <ul>
                        @foreach($group->link as $key=>$link) 
                        <li><a href="{{menu_url($link)}}">{{ ucfirst(content_trans($link, 'Link', 'nama', $link->nama)) }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endforeach 
            </ul>
            <div class="footer_customblock">
            @if($kontak->alamat!='')
                <div class="contact_info">
                    <label>{{ trans('content.shop_front.shop.contact.address') }} :</label>
                    <big>{{ ucwords($kontak->alamat) }}</big>
                </div>
                <div class="contact_info">
                    <label>{{ trans('content.shop_front.shop.contact.phone') }} :</label>
                    <big>{{ $kontak->telepon }}</big>
                </div>
                @if($kontak->hp != '')
                <div class="contact_info">
                    <label>SMS :</label>
                    <big>{{ $kontak->hp }}</big>
                </div>
                @endif
                <div class="contact_info">
                    <label>{{ trans('content.shop_front.shop.contact.email') }} :</label>
                    <big><a class="mail" href="mailto:{{$kontak->email}}">{{ strtolower($kontak->email) }}</a></big>
                </div>
            @else 
                <div></div>
            @endif 
            </div>
            <div class="clear"></div>
        </div>
        <address>
            <p class="centering">Copyright &copy; {{date('Y')}} {{ Theme::place('title') }}. All Rights Reserved. Powered by <a target="_blank" href="http://jarvis-store.com">Jarvis Store</a></p>
            <div class="centering">
                @foreach(list_banks() as $bank) 
                    @if($bank->status == 1)
                    <img src="{{bank_logo($bank)}}" alt="{{$bank->bankdefault->nama}}" title="{{$bank->bankdefault->nama}}" />
                    @endif
                @endforeach
                @if(count(list_payments()) > 0)
                    @foreach(list_payments() as $pay)
                        @if($pay->nama == 'ipaymu' && $pay->aktif == 1)
                        <img class="img-responsive" src="{{url('img/bank/ipaymu.jpg')}}" alt="ipaymu" title="Ipaymu" />
                        @endif
                        @if($pay->nama == 'bitcoin' && $pay->aktif == 1)
                        <img class="img-responsive" src="{{url('img/bitcoin.png')}}" alt="bitcoin" title="Bitcoin" />
                        @endif
                        @if($pay->nama == 'paypal' && $pay->aktif == 1)
                        <img class="img-responsive" src="{{url('img/bank/paypal.png')}}" alt="paypal" title="Paypal" />
                        @endif
                    @endforeach
                @endif
                @if(count(list_dokus()) > 0 && list_dokus()->status == 1)
                <img class="img-responsive" src="{{url('img/bank/doku.jpg')}}" alt="doku myshortcart" title="Doku Myshortcart" />
                @endif
                @if(count(list_veritrans()) > 0 && list_veritrans()->status == 1 && list_veritrans()->type == 1)
                <img class="img-responsive midtrans" src="{{url('img/bank/midtrans.png')}}" alt="Midtrans" title="Midtrans">
                @endif
            </div>
        </address>
    </footer>
<div>
<div class="clear"></div>
{{pluginPowerup()}} 