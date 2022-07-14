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
          <div class="partners-banner-deco-b">
            <div class="home-banner-deco-outter" data-ix="common-deco-rotate-cw"></div>
            <div class="home-banner-deco-inner" data-ix="common-deco-rotate-ccw"></div>
          </div>
        </div>
        <div class="inner-banner-content-wrap">
          <div class="container w-container">
            <div class="section-heading-wrap">
              <div class="heading-gradient-b"></div>
              <h1>{{$partners->title}}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content wf-section">
      <div id="our-history" class="section-div v-inner-filled">
        <div class="container w-container">
          <div class="margin-bottom-50">
            <div class="txt-align-center">
              <p data-ix="common-fade-from-bottom">{!! editor($partners->description)!!}</p>
            </div>
          </div>
          <div class="partners-list-b">
          @foreach ($partners->partners as $item)
          <div class="partners-item-b" data-ix="common-fade-from-bottom">
              <div class="relative">
                <div class="partners-hover-rim"></div>
                <a href="{{$item['url']}}" target="_blank" class="partners-item-link w-inline-block" data-ix="partner-item-hover">
                  <div class="partners-img-b">
                  <div data-delay="3000" data-animation="cross" class="product-item-slider w-slider" data-autoplay="true" data-easing="ease" data-hide-arrows="false" data-disable-swipe="true" data-autoplay-limit="0" data-nav-spacing="3" data-duration="1000" data-infinite="true">
                      <div class="w-slider-mask">
                      @if(isset($item['medias']))
                        @for ($i = 0; $i < count($item['medias']['content_pb_image']); $i++)
                          @if(isset($item['medias']['content_pb_image'][$i]['path']))
                          <div class="product-item-slide w-slide">
                            <div class="product-item-img-b"><img src="{{$item['medias']['content_pb_image'][$i]['path']}}" loading="eager" alt="" class="img-full"></div>
                          </div>
                          @endif
                        @endfor
                      @endif
                      </div>
                      <div class="hide w-slider-arrow-left">
                        <div class="w-icon-slider-left"></div>
                      </div>
                      <div class="hide w-slider-arrow-right">
                        <div class="w-icon-slider-right"></div>
                      </div>
                      <div class="hide w-slider-nav w-round"></div>
                    </div>
                    <!-- <img src="{{$item['medias']['content_pb_image'][0]['path']}}" alt="" class="img-full"> -->
                  </div>
                  <div class="partners-hover-b">
                    <div class="btn-txt-on-line margin-0">
                      <div class="btn-txt-on-line-txt">{{lang('Visit Site')}}</div>
                      <div class="btn-txt-on-line-line-b">
                        <div class="btn-txt-on-line-arrow"></div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          @endforeach
          </div>
          <div data-w-id="adf63809-e085-6d5a-6900-cdb30edebfb6">
            <div class="partner-img-circle-b mask-round" data-ix="common-fade-from-bottom">
              <div class="home-bus-bg-img partners" style="background-image:url({{$partners->getMedia('partners_image')->getResizedImage(2000) }})"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
