<html data-wf-page="61cea3894d566d2ff7ebaace" data-wf-site="61cea3894d566d464cebaacc">
<head>
  <meta charset="utf-8">
  <title>MSB International Limited</title>
  <div class="external_link" style="display:none">
    <a href="http://www.ysd.hk">A Professional Website Design Company</a>
  </div>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="{{ asset_frontend('css/normalize.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset_frontend('css/components.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset_frontend('css/msb-int-v02-ysd.css') }}" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144185003-39"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-144185003-39');
  </script>
  <script type="text/javascript">
      WebFont.load({
        google: {
          families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Raleway:regular,500,600,700,800,900"]
        }
      });
    </script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">
      ! function(o, c) {
        var n = c.documentElement,
          t = " w-mod-";
        n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
      }(window, document);
    </script>
  <link href="{{ asset_frontend('images/favicon.png') }}" rel="shortcut icon" type="image/x-icon">
  <link href="{{ asset_frontend('images/webclip.png') }}" rel="apple-touch-icon">
  <style>
      <meta name="format-detection"content="telephone=no">* {
        -webkit-print-color-adjust: exact;
      }
      @media print {
        .nav-menu,
        .header-notification-b,
        .sticky-btn-gp {
          display: none;
        }
        .header {
          position: absolute;
        }
      }
      .mask-round {
        -webkit-mask-image: -webkit-radial-gradient(white, black);
      }
      .w-slider-dot {
        width: 10px;
        height: 10px;
        margin-left: 0px !important;
        margin-right: 15px !important;
        background: none;
        background-image: url("https://uploads-ssl.webflow.com/61cea3894d566d464cebaacc/61d263f102a2a84805d28983_home-slider-nav-dot.svg");
        background-size: contain;
      }
      .w-slider-dot:last-child {
        margin-right: 0px !important;
      }
      .w-slider-dot.w-active {
        background: none;
        background-image: url("https://uploads-ssl.webflow.com/61cea3894d566d464cebaacc/61d263f1499f21dd24a97647_home-slider-nav-dot-active.svg");
        background-size: contain;
      }
      @media(max-width: 767px) {
        .w-slider-dot {
          margin-left: 8px !important;
          margin-right: 8px !important;
        }
        .w-slider-dot:last-child {
          margin-right: 8px !important;
        }
      }
      .nav-link.w--current .nav-link-tip-current {
        opacity: 100%;
      }
      .inner-menu-link.w--current .inner-menu-active-icon {
        opacity: 100%;
      }
    </style>
</head>
@foreach ($other_languages as $other_languages)

@endforeach
<div data-animation="default" data-collapse="medium" data-duration="500" data-easing="ease" data-easing2="ease" role="banner" class="header w-nav">
    <div class="header-bg"></div>
    <div class="container _w-full v-left-0 w-container">
      <div class="header-wrap">
        <a href="{{route('index')}}" aria-current="page" class="brand-b w-inline-block w--current" data-ix="brand-hover">
          <div class="brand-default"><img src="{{ asset_frontend('images/msb-logo-white2x.png') }}" alt="" class="img-full"></div>
          <div class="brand-scroll"><img src="{{ asset_frontend('images/msb-logo2x.png') }}" alt="" class="img-full"></div>
        </a>
        <nav role="navigation" class="nav-menu popup-scroll w-nav-menu">
          <div class="nav-item">
            <a href="{{route('about_us')}}" class="nav-link w-inline-block" data-ix="nav-link-interaction">
              <div class="nav-link-tip-hover"></div>
              <div class="nav-link-tip-current"></div>
              <div>{{lang('About Us')}}</div>
            </a>
          </div>
          <div class="nav-item">
            <div class="nav-link" data-ix="nav-link-interaction">
              <div class="nav-link-tip-hover"></div>
              <div class="nav-link-tip-current"></div>
              <div>{{lang('Businesses')}}</div>
              <div class="nav-submenu-b">
              @foreach ($footer_business as $footer_item)
              <a href="{{route('business',$footer_item->url_slug)}}" class="nav-submenu-link w-inline-block">
                  <div>{{$footer_item->title}}</div>
                </a>
              @endforeach
              </div>
            </div>
          </div>
          @if($evnet_page->page_enable)
          <div class="nav-item">
            <a href="{{route('event')}}" class="nav-link w-inline-block" data-ix="nav-link-interaction">
              <div class="nav-link-tip-hover"></div>
              <div class="nav-link-tip-current"></div>
              <div>{{lang('Events')}}</div>
            </a>
          </div>
          @endif
          <div class="nav-item">
            <a href="{{route('client')}}" class="nav-link w-inline-block" data-ix="nav-link-interaction">
              <div class="nav-link-tip-hover"></div>
              <div class="nav-link-tip-current"></div>
              <div>{{lang('Clients')}}</div>
            </a>
          </div>
          <div class="nav-item">
            <a href="{{route('partners')}}" class="nav-link w-inline-block" data-ix="nav-link-interaction">
              <div class="nav-link-tip-hover"></div>
              <div class="nav-link-tip-current"></div>
              <div>{{lang('Partners')}}</div>
            </a>
          </div>
          <!-- <div class="nav-item">
            <a href="{{route('wheretobuy')}}" class="nav-link w-inline-block" data-ix="nav-link-interaction">
              <div class="nav-link-tip-hover"></div>
              <div class="nav-link-tip-current"></div>
              <div>{{lang('Where To Buy')}}</div>
            </a>
          </div> -->
          <div class="nav-item">
            <a href="{{route('contact_us')}}" class="nav-link w-inline-block" data-ix="nav-link-interaction">
              <div class="nav-link-tip-hover"></div>
              <div class="nav-link-tip-current"></div>
              <div>{{lang('Contact Us')}}</div>
            </a>
          </div>
          @if($setting->lang_chinese)
          <div class="nav-lang-b">
            <a href="{{ $other_languages->url }}" class="nav-lang-link w-inline-block">
                <div>{{$other_languages->display_name}}</div>
            </a>
          </div>
          @endif
        </nav>
        <div class="btn-menu popup-link popup-close w-nav-button" data-ix="nav-menu-interaction">
          <div class="btn-menu-line-1">
            <div class="btn-menu-line"></div>
          </div>
          <div class="btn-menu-line-2">
            <div class="btn-menu-line"></div>
          </div>
          <div class="btn-menu-line-3">
            <div class="btn-menu-line"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="page-top" class="top-b"></div>