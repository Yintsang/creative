@extends('layouts.frontend')

@section('content')
<?php
// echo "<pre>";
// print_r($about_us);
// echo "</pre>";
?>
<div class="all">
    <div data-w-id="8e97c06d-ef18-5bcf-1fe2-9a4bd723f9da" class="section-banner wf-section">
      <div class="inner-banner-content-b">
        <div class="inner-banner-deco">
          <div class="inner-banner-deco-outter" data-ix="common-deco-rotate-cw"></div>
          <div class="inner-banner-deco-inner" data-ix="common-deco-rotate-ccw"></div>
        </div>
        <div class="inner-banner-content-wrap">
          <div class="container w-container">
            <div class="section-heading-wrap">
              <div class="heading-gradient-b"></div>
              <h1>{{$about_us_page->title}}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content wf-section">
      <div class="content-arrow v-inner"></div>
      <div class="inner-content-top-b">
        <div class="container _w-full w-container">
          <div class="inner-menu-b">
            <div class="inner-menu-item-b">
              <a href="#our-history" class="inner-menu-link w-inline-block" data-ix="inner-menu-link-interaction">
                <div class="inner-menu-active-icon"><img src="{{ asset_frontend('images/inner-menu-active.svg') }}" alt="" class="img-full"></div>
                <div>{{$about_us_history->title}}</div>
              </a>
            </div>
            <div class="inner-menu-item-b">
              <a href="#our-mission" class="inner-menu-link w-inline-block" data-ix="inner-menu-link-interaction">
                <div class="inner-menu-active-icon"><img src="{{ asset_frontend('images/inner-menu-active.svg') }}" alt="" class="img-full"></div>
                <div>{{$about_us_mission->title}}</div>
              </a>
            </div>
            <div class="inner-menu-item-b">
              <a href="#business-opportunity" class="inner-menu-link w-inline-block" data-ix="inner-menu-link-interaction">
                <div class="inner-menu-active-icon"><img src="{{ asset_frontend('images/inner-menu-active.svg') }}" alt="" class="img-full"></div>
                <div>{{$about_us_business->title}}</div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="our-history" class="section-div">
        <div class="container w-container">
          <div class="about-history-b">
            <div class="about-history-row">
              <div class="about-history-col col-l">
                <div class="section-heading-b" data-ix="common-section-heading-interaction">
                  <div class="section-heading-wrap">
                    <div class="heading-gradient-b"></div>
                    <h2>{{$about_us_history->title}}</h2>
                  </div>
                </div>
                <div data-ix="common-fade-from-bottom">
                  <p>{!!editor($about_us_history->description)!!}</p>
                </div>
              </div>
              <div data-w-id="9b44d95f-c6c2-3f38-b917-8b7062a53f7f" class="about-history-col" data-ix="common-fade-from-bottom">
                <div class="about-history-img-b">
                  <div class="home-bus-bg-img about-history"></div>
                  @if($about_us_history->getMedia('image'))
                  <div class="relative"><img src="{{ $about_us_history->getMedia('image')->getResizedImage(2000) }}" alt="" class="img-full"></div>
                  @endif
                </div>
              </div>
            </div>
            <div class="txt-align-center" data-ix="common-fade-from-bottom">
              <div class="margin-bottom-50">
                <p class="max-800">{!!editor($about_us_history->image_title)!!}</p>
              </div>
              <div class="margin-bottom-50">
                <div class="about-history-icon-list">
                  <?php 
                  // echo "<pre>";
                  // print_r($about_us_history->content);
                  // echo "</pre>";
                  ?>
                @foreach ($about_us_history->content as $item)
                  <div class="about-history-icon-item">
                    <div class="about-history-icon-b">
                      @if(isset($item['medias']))
                        <img src="{{$item['medias']['image'][0]['path']}}" alt="" class="img-full">
                      @endif
                      <div class="about-history-circle" data-ix="common-deco-rotate-ccw"></div>
                    </div>
                    <div>{{$item['img_content']}}</div>
                  </div>
                @endforeach
                </div>
              </div>
              <p class="max-800">{!!editor($about_us_history->sub_description)!!}</p>
            </div>
          </div>
        </div>
      </div>
      <div id="our-mission" data-w-id="8e361965-a2a5-39e0-2bec-fdf30949a090" class="section-div v-dark-blue v-about-mission">
        <div class="about-mission-bg">
          <div class="home-bus-bg-img about-mission" style="background-image:url('{{$about_us_mission->getMedia('bg_image')->getResizedImage(2000) }}')"></div>
        </div>
        <div class="home-banner-deco-b v-about-mission">
          <div class="home-banner-deco-outter" data-ix="common-deco-rotate-cw"></div>
          <div class="home-banner-deco-inner" data-ix="common-deco-rotate-ccw"></div>
        </div>
        <div class="container w-container">
          <div class="about-history-b">
            <div>
              <div class="section-heading-b" data-ix="common-section-heading-interaction">
                <div class="section-heading-wrap">
                  <div class="heading-gradient-b"></div>
                  <h2>{{$about_us_mission->title}}</h2>
                </div>
              </div>
              <div class="about-mission-content" data-ix="common-fade-from-bottom">
                <p>{!! editor($about_us_mission->description) !!}</p>
              </div>
            </div>
            <div class="about-mission-circle-b mask-round" data-ix="common-fade-from-bottom">
              <div class="home-bus-bg-img about-mission-circle" style="background-image:url('{{$about_us_mission->getMedia('image')->getResizedImage(2000) }}')"></div>
            </div>
          </div>
        </div>
      </div>
      <div id="business-opportunity" class="section-div">
        <div class="container w-container">
          <div class="section-heading-b txt-align-center" data-ix="common-section-heading-interaction">
            <div class="section-heading-wrap">
              <div class="heading-gradient-b"></div>
              <h2>{{$about_us_business->title}}</h2>
            </div>
          </div>
          <div data-w-id="e8b0e2b4-dab9-9812-9c31-10b18159c279" class="home-business-top-b v-bottom-0">
            <div class="home-bus-top-graphic-b biosecurity-1" data-ix="common-zoom-out" style="background-image:url({{$about_us_business->getMedia('bg_image')->getResizedImage(2000) }})" ></div>
            <div class="home-bus-top-col col-txt">
              <div class="margin-bottom-50">
                <div class="about-logo-b" data-ix="common-fade-from-bottom">
                  @if($about_us_business->getMedia('logo'))
                  <img src="{{$about_us_business->getMedia('logo')->getResizedImage(2000) }}" alt="" class="img-full">
                  @endif
                </div>
              </div>
              <div data-ix="common-fade-from-bottom">
                <p>{!! editor($about_us_business->description)!!}</p>
                <a href="{{$about_us_business->url}}" class="btn-txt-on-line w-inline-block">
                  <div class="btn-txt-on-line-txt">{{lang('Learn More')}}</div>
                  <div class="btn-txt-on-line-line-b">
                    <div class="btn-txt-on-line-arrow"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="home-bus-top-col col-img">
              <div data-delay="2000" data-animation="cross" class="home-bus-slider w-slider" data-autoplay="true" data-easing="ease" data-hide-arrows="false" data-disable-swipe="true" data-autoplay-limit="0" data-nav-spacing="3" data-duration="1000" data-infinite="true">
                <div class="overflow-visible w-slider-mask">
                  <div class="home-bus-slide w-slide">
                    <div class="home-bus-top-img-wrap">
                      <div class="home-bus-top-img-b">
                        <div class="home-bus-bg-img biosecurity-1" style="background-image:url({{$about_us_business->getMedia('pbg_image')->getResizedImage(2000) }})"></div>
                      </div>
                      <div class="home-bus-top-p-img-b" data-ix="common-zoom-out"><img src="{{ $about_us_business->getMedia('p_image')->getResizedImage(2000) }}" alt="" class="img-full"></div>
                    </div>
                  </div>
                </div>
                <div class="hide w-slider-arrow-left">
                  <div class="w-icon-slider-left"></div>
                </div>
                <div class="hide w-slider-arrow-right">
                  <div class="w-icon-slider-right"></div>
                </div>
                <div class="hide w-slider-nav w-round"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
