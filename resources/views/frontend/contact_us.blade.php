@extends('layouts.frontend')

@section('content')
<div class="all v-filled">
    <div data-w-id="8e97c06d-ef18-5bcf-1fe2-9a4bd723f9da" class="section-banner overflow-visible wf-section">
      <div class="inner-banner-content-b">
        <div class="inner-banner-bg">
          <div class="inner-banner-deco">
            <div class="inner-banner-deco-outter" data-ix="common-deco-rotate-cw"></div>
            <div class="inner-banner-deco-inner" data-ix="common-deco-rotate-ccw"></div>
          </div>
        </div>
        <div class="inner-banner-content-wrap">
          <div class="container w-container">
            <div class="section-heading-wrap">
              <div class="heading-gradient-b"></div>
              <h1>{{lang('Contact Us')}}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content wf-section">
      <div id="our-history" class="section-div v-inner-filled">
        <div class="container w-container">
          <div data-w-id="ea32c667-4eab-015d-bb35-575aaf76cf0e" class="contact-b" data-ix="common-fade-from-bottom">
            <div class="contact-bg-b">
              <div class="home-bus-bg-img contact"></div>
              <div class="contact-bg-mask"></div>
            </div>
            <div class="contact-content-b">
              <div class="margin-bottom-50">
                <div class="contact-intro-txt" data-ix="common-fade-from-bottom">{{lang('Thank you for your interest')}}</div>
              </div>
              <div class="contact-info-b" data-ix="common-fade-from-bottom">
                <div class="contact-item-b">
                  <div class="contact-item-fieldname">{{lang('Telephone')}}</div>
                  <div>
                    <a href="tel:{{$contact_us_page->tel}}" class="contact-link">{{$contact_us_page->tel}}</a>
                  </div>
                </div>
                <div class="contact-item-b">
                  <div class="contact-item-fieldname">{{lang('Email')}}</div>
                  <div>
                    <a href="mailto:{{$contact_us_page->email}}" target="_blank" class="contact-link">{{$contact_us_page->email}}</a>
                  </div>
                </div>
                <div class="contact-item-b">
                  <div class="contact-item-fieldname">{{lang('Whatsapp')}}</div>
                  <div>
                    <a href="{{$contact_us_page->whatsapp}}" target="_blank" class="contact-link">{{$contact_us_page->whatsapp_footer}}</a>
                  </div>
                </div>
                <div class="contact-item-b">
                  <div class="contact-item-fieldname">{{lang('Address')}}</div>
                  <div>
                    <a href="{{$contact_us_page->google_map_link}}" target="_blank" class="contact-link">
                      {!! editor($contact_us_page->address) !!}
                    </a>
                  </div>
                </div>
              </div>
              <div class="contact-social-b">
                <div class="contact-item-b" data-ix="common-fade-from-bottom">
                  <div class="contact-item-fieldname">{{lang('Follow us on')}}</div>
                  <div class="contact-social-list">
                    <div class="footer-social-item">
                      <a href="{{$contact_us_page->linkedin}}" target="_blank" class="social-link w-inline-block" data-ix="social-link-interaction"><img src="{{ asset_frontend('images/footer-social-linkedin2x.png') }}" alt="" class="img-full"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="contact-map-b" data-ix="common-fade-from-bottom">
              <a href="{{$contact_us_page->google_map_link}}" target="_blank" class="contact-map-link w-inline-block" data-ix="contact-mapinteraction"><img src="{{$contact_us_page->getMedia('google_map_image')->getResizedImage(2000) }}" alt="" class="img-full"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
