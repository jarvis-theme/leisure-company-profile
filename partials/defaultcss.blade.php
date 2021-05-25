	{{favicon()}}

	{{generate_theme_css('leisure-company-profile/assets/css/reset.css')}}
	{{generate_theme_css('leisure-company-profile/assets/css/flexslider.css')}}
	{{generate_theme_css('leisure-company-profile/assets/css/jcarousel_tango.css')}}
	{{generate_theme_css('leisure-company-profile/assets/css/simpletabs.css')}}
	{{generate_theme_css('leisure-company-profile/assets/css/short_codes.css')}}
	@if($tema->isiCss=='')
	{{generate_theme_css('leisure-company-profile/assets/css/base.css?v=013a')}}
	
	@else
	{{generate_theme_css('leisure-company-profile/assets/css/editbase.css?v=013a')}}
	@endif	
	
	{{generate_theme_css('leisure-company-profile/assets/css/responsive.css')}}
	{{generate_theme_css('leisure-company-profile/assets/css/bootstrap.min.css')}}
	{{generate_theme_css('leisure-company-profile/assets/css/sosmed.css')}}
	<link href='//fonts.googleapis.com/css?family=Istok+Web' rel='stylesheet' type='text/css'>