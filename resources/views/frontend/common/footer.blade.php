@foreach ($contact_us as $index)
@endforeach
<a href="{{$index->whatsapp}}" target="_blank" class="btn-chat w-inline-block" data-ix="btn-chat-interaction">
    <div class="relative">
    <div class="btn-chat-icon-default"><img src="{{ asset_frontend('images/sticky-chat-default.svg') }}" alt="" class="img-full"></div>
    <div class="btn-chat-icon-hover"><img src="{{ asset_frontend('images/sticky-chat-whatsapp.svg') }}" alt="" class="img-full"></div>
    <div class="btn-chat-bubble">
        <div>{{lang('Message us')}}</div>
        <div class="btn-chat-dot-b">
        <div class="btn-chat-dot-1">
            <div class="btn-chat-dot"></div>
        </div>
        <div class="btn-chat-dot-2">
            <div class="btn-chat-dot"></div>
        </div>
        <div class="btn-chat-dot-3">
            <div class="btn-chat-dot"></div>
        </div>
        </div>
        <div class="btn-chat-bubble-tip"><img src="{{ asset_frontend('images/chat-tip.svg') }}" alt="" class="img-full"></div>
    </div>
    </div>
</a>
<!-- <a href="#page-top" class="btn-top w-inline-block" data-ix="btn-top-interaction"><img src="{{ asset_frontend('images/footer-arrow-top.svg') }}" alt="" class="img-full"></a> -->
    <a href="#page-top" class="btn-top w-inline-block" data-ix="btn-top-interaction">
      <div class="btn-top-icon"><img src="{{ asset_frontend('images/icon-top.svg') }}" loading="lazy" alt="" class="img-full"></div>
      <div class="btn-top-txt">TOP</div>
    </a>
<div class="section-footer wf-section">
    <div class="container w-container">
        <div class="footer-content-b">
            <div class="footer-content-col">
                <div class="footer-logo-b">
                    <a href="{{route('index')}}" class="footer-logo-link w-inline-block"><img
                            src="{{ asset_frontend('images/msb-logo-white2x.png') }}" alt=""
                            class="img-full"></a>
                </div>
                <div class="footer-company-name">
                    <div class="font-size-20">MSB International Ltd<br>Hong Kong</div>
                </div>
                <div class="footer-contact-b">
                    <div class="footer-contact-row">
                        <div class="footer-contact-fieldname">T</div>
                        <div class="footer-contact-data">
                            <a href="tel:{{$index->tel}}" class="footer-link">{{$index->tel}}</a>
                        </div>
                    </div>
                    <div class="footer-contact-row">
                        <div class="footer-contact-fieldname">W</div>
                        <div class="footer-contact-data">
                            <a href="{{$index->whatsapp}}" target="_blank" class="footer-link">{{$index->whatsapp_footer}}</a>
                        </div>
                    </div>
                    <div class="footer-contact-row">
                        <div class="footer-contact-fieldname">E</div>
                        <div class="footer-contact-data">
                            <a href="mailto:{{$index->email}}" target="_blank" class="footer-link">{{$index->email}}</a>
                        </div>
                    </div>
                </div>
                <div class="footer-social-b">
                    <div class="footer-social-item">
                        <a href="{{$index->linkedin}}" target="_blank" class="social-link w-inline-block" data-ix="social-link-interaction"><img
                                src="{{ asset_frontend('images/footer-social-linkedin2x.png') }}" alt=""
                                class="img-full"></a>
                    </div>
                </div>
            </div>
            <div class="footer-content-col col-sitemap">
                <div class="footer-sitemap-col col-1">
                    <div class="footer-sitemap-row">
                        <a href="{{route('about_us')}}" class="footer-sitemap-link w-inline-block">
                            <div class="font-size-20">{{lang('About Us')}}</div>
                        </a>
                    </div>
                    @if($evnet_page->page_enable)
                    <div class="footer-sitemap-row">
                        <a href="{{route('event')}}" class="footer-sitemap-link w-inline-block">
                            <div class="font-size-20">{{lang('Events')}}</div>
                        </div>
                    </div>
                    @endif
                    <div class="footer-sitemap-row">
                        <a href="{{route('partners')}}" class="footer-sitemap-link w-inline-block">
                            <div class="font-size-20">{{lang('Partners')}}</div>
                        </a>
                    </div>
                    <div class="footer-sitemap-row">
                        <a href="{{route('client')}}" class="footer-sitemap-link w-inline-block">
                            <div class="font-size-20">{{lang('Clients')}}</div>
                        </a>
                    </div>
                    <div class="footer-sitemap-row">
                        <a href="{{route('contact_us')}}" class="footer-sitemap-link w-inline-block">
                            <div class="font-size-20">{{lang('Contact Us')}}</div>
                        </a>
                    </div>
                </div>
                <div class="footer-sitemap-col">
                    <div class="footer-sitemap-row v-business">
                        <div class="footer-sitemap-link w-inline-block">
                            <div class="font-size-20">{{lang('Businesses')}}</div>
                        </div>
                        <div class="footer-sitemap-sub-b">
                            
                            @foreach ($footer_business as $footer_item)
                            <div class="footer-sitemap-sub-row">
                                <div class="footer-sitemap-sublink w-inline-block">
                                    <a href="{{route('business',$footer_item->url_slug)}}">{{$footer_item->title}}</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-b">
            <div class="footer-bottom-col col-l">
                <div class="footer-copyright">Copyright © 2022 MSB International Limited. All Rights Reserved</div>
                <!-- <div>
                    <a href="#" class="footer-link">Terms of Use</a> | <a href="#" class="footer-link">Privacy
                        Policy</a>
                </div> -->
            </div>
            <div class="footer-bottom-col col-r">
                <div>
                    <a href="http://ysd.hk" target="_blank" class="footer-link">Web Design</a> by YSD
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .footer-sitemap-sublink a:visited{
        color: inherit;
    }
</style>
@section('js')
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=61cea3894d566d464cebaacc" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset_frontend('js/msb-int-v02-ysd.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/body-scroll-lock@3.0.3/lib/bodyScrollLock.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js"></script>
<script>
    $(document).on('click', 'html:not(.popup-opened) .popup-link', function () {
        $('html').addClass('popup-opened');
        $('.popup-scroll').scrollTop(0);
        $('.popup-scroll').each(function () {
            bodyScrollLock.disableBodyScroll($(this)[0]);
        })
    })
    $(document).on('click', 'html.popup-opened .popup-close', function () {
        bodyScrollLock.clearAllBodyScrollLocks();
        $('html').removeClass('popup-opened');
    })
</script>
<script>
    $(document).ready(function() {
    $('.carousel').bxSlider({
        pager: false,
        slideMargin: 20,
        controls: false,
        speed: 50000,
        useCSS: false,
        ticker: true,
        tickerHover: false,
        slideWidth: 240,
        responsive: true,
        minSlides: 1,
        maxSlides: 100,
        adaptiveHeight: true,
        autoDirection: 'next',
    });
    });
</script>
@endsection
</html>