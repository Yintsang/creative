@extends('layouts.frontend')

@section('content')
@foreach ($content as $index2)
@endforeach
<?php 
// echo "<pre>";
// print_r($item['medias']['content_pb_image']);
// echo "</pre>";
?>

<!-- {{$client->getMedia('image_list', true)}} -->
@if(isset($popup->title))
<div class="pop-b popup-scroll default-open">
  <div class="pop-bg-b popup-click" data-ix="pop-close">
    <div class="pop-deco-b">
      <div class="pop-deco-outter" data-ix="common-deco-rotate-cw"></div>
      <div class="pop-deco-inner" data-ix="common-deco-rotate-ccw"></div>
    </div>
    <div class="pop-deco-b v-bottom">
      <div class="pop-deco-outter" data-ix="common-deco-rotate-cw"></div>
      <div class="pop-deco-inner" data-ix="common-deco-rotate-ccw"></div>
    </div>
  </div>
  <div class="relative">
    
    <div class="container w-container">
      <div class="pop-box">
        <div class="section-heading-b txt-align-center">
          <div class="section-heading-wrap">
            <div class="heading-gradient-b"></div>
            <h2>{{$popup->title}}</h2>
          </div>
        </div>
        <div class="margin-bottom-50">
          <p>{!! editor($popup->popup_description)!!}</p>
        </div>
        <div class="txt-align-center">
          @if($popup->getMedia('popup_image'))
          <img src="{{$popup->getMedia('popup_image')->getResizedImage(2000) }}" width="600" alt="">
          @endif
        </div>
        <div class="txt-align-center">
          <a href="{{$popup->popup_url}}" class="btn-txt-on-line w-inline-block">
            <div class="btn-txt-on-line-txt">{{lang('Learn More')}}</div>
            <div class="btn-txt-on-line-line-b">
              <div class="btn-txt-on-line-arrow"></div>
            </div>
          </a>
        </div>
        <a href="#" class="btn-pop-close popup-close w-inline-block" data-ix="pop-close"><img src="{{ asset_frontend('images/pop-close.svg') }}" alt="" class="img-full"></a>
      </div>
    </div>
  </div>
</div>
@endif
<div class="all">
    <div data-w-id="8e97c06d-ef18-5bcf-1fe2-9a4bd723f9da" class="section-banner v-home wf-section">
      <div data-delay="2000" data-animation="cross" class="home-banner-slider w-slider" data-autoplay="true" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="7" data-duration="1000" data-infinite="true">
        <div class="home-banner-slider-mask w-slider-mask">
          @foreach ($banner as $index)
          <div class="home-banner-slide w-slide" data-ix="home-banner-slide-interaction">
            <div class="home-banner-content-wrap" data-ix="home-banner-slide-scroll">
            @if($image = $index->getMedia('background_image'))
            <div class="home-banner-bg equine-1" style="background-image:url({{ $image->getResizedImage(2000) }})"></div>
            @endif
              <div class="home-banner-deco-b">
                <div class="home-banner-deco-outter" data-ix="common-deco-rotate-cw"></div>
                <div class="home-banner-deco-inner" data-ix="common-deco-rotate-ccw"></div>
              </div>
              <div class="home-banner-center-b">
                <div class="home-banner-circle mask-round">
                @if($image = $index->getMedia('image'))
                <div class="home-banner-center-bg equine-1" style="background-image:url({{ $image->getResizedImage(2000) }})"></div>
                @endif
                  @if($image = $index->getMedia('p_image'))
                    <div class="home-banner-center-p equine-1" style="background-image:url({{ $image->getResizedImage(2000) }})"></div>
                  @endif
                </div>
              </div>
              <div class="home-banner-content">
                <div class="container w-container">
                  <div>
                    <div class="home-banner-title-b">
                      <div class="heading-gradient-b v-home-banner"></div>
                      <div class="relative">{{$index->title}}</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="home-banner-detail-b">
                <div class="container v-left-0 mobile-full w-container">
                  <div class="home-banner-detail-name">
                    {{$index->description_title}}
                  </div>
                  <div>
                    {{$index->description}}
                  </div>
                  <a href="{{$index->url}}" class="btn-txt-on-line v-white w-inline-block">
                    <div class="btn-txt-on-line-txt">{{lang('Learn More')}}</div>
                    <div class="btn-txt-on-line-line-b v-white">
                      <div class="btn-txt-on-line-arrow v-white"></div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="hide w-slider-arrow-left">
          <div class="w-icon-slider-left"></div>
        </div>
        <div class="hide w-slider-arrow-right">
          <div class="w-icon-slider-right"></div>
        </div>
        <div class="home-slider-nav w-slider-nav w-round"></div>
      </div>
      <div class="home-banner-bottom-mask"></div>
    </div>
    <div class="section-content wf-section">
      <div class="section-div v-dark-blue">
        <div class="container w-container">
          <div class="max-800" data-ix="common-fade-from-bottom">
            <div class="section-heading-b txt-align-center" data-ix="common-section-heading-interaction">
              <div class="section-heading-wrap">
                <div class="heading-gradient-b"></div>
                <h2>{{lang('About Us')}}</h2>
              </div>
            </div>
            <div>
            <p class="txt-align-center">{!! editor($index2->about_us)!!}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="section-div">
        <div class="content-arrow v-dark"></div>
        <div class="container w-container">
          <div data-w-id="c273ae83-8dcd-96fa-f9a8-64ced75aaf91" class="home-business-top-b">
          @if($image = $index2->getMedia('bg_image'))
          <div class="home-bus-top-graphic-b biosecurity-1" data-ix="common-zoom-out"  style="background-image:url({{ $image->getResizedImage(2000) }})"></div>
            @endif
            <div class="home-bus-top-col col-txt">
              <div class="section-heading-b" data-ix="common-section-heading-interaction">
                <div class="section-small-heading-txt">{{$index2->first_header}}</div>
                <div class="section-heading-wrap">
                  <div class="heading-gradient-b"></div>
                  <h2 class="h2-home-bus-top">{{$index2->first_title}}</h2>
                </div>
              </div>
              <div data-ix="common-fade-from-bottom">
                {!! editor($index2->first_description) !!}
                <a href="{{$index2->first_url}}" class="btn-txt-on-line w-inline-block">
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
                      @if($image = $index2->getMedia('pbg_image'))
                        <div class="home-bus-bg-img biosecurity-1" style="background-image:url({{ $image->getResizedImage(2000) }})"></div>
                        @endif
                      </div>
                      <div class="home-bus-top-p-img-b" data-ix="common-zoom-out">
                      @if($image = $index2->getMedia('p_image'))
                      <img src="{{$image->getResizedImage(2000) }}" alt="" class="img-full">
                        @endif
                      </div>
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
          @foreach ($content_sub_section->content as $item)
          <?php 
?>
          @if($loop->iteration % 2 != 0)
          <div data-w-id="190476bd-0935-3a7d-3917-7f02714cc840" class="home-business-b">
            <div class="home-bus-col col-txt">
              <div class="section-heading-b" data-ix="common-section-heading-interaction">
                <div class="section-small-heading-txt">{{$item['header']}}</div>
                <div class="section-heading-wrap">
                  <div class="heading-gradient-b"></div>
                  <h2 style="text-align:center">{{$item['textinput']}}</h2>
                </div>
              </div>
              <div data-ix="common-fade-from-bottom">
                <p>{!! editor($item['description']) !!}</p>
                <a href="{{$item['url']}}" class="btn-txt-on-line w-inline-block">
                  <div class="btn-txt-on-line-txt">{{lang('Learn More')}}</div>
                  <div class="btn-txt-on-line-line-b">
                    <div class="btn-txt-on-line-arrow"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="home-bus-col col-img">
              <div data-delay="2000" data-animation="cross" class="home-bus-slider w-slider" data-autoplay="true" data-easing="ease" data-hide-arrows="false" data-disable-swipe="true" data-autoplay-limit="0" data-nav-spacing="3" data-duration="1000" data-infinite="true">
                <div class="overflow-visible w-slider-mask">
                @if(isset($item['medias']))
                  @for ($i = 0; $i < count($item['medias']['content_pb_image']); $i++)
                      <div class="home-bus-slide w-slide">
                        <div class="home-bus-img-wrap">
                          <div class="home-bus-img-b">
                            @if(isset($item['medias']['content_pb_image'][$i]['path']))
                            <div class="home-bus-bg-img equine-1" style="background-image:url({{$item['medias']['content_pb_image'][$i]['path']}})"></div>
                            @endif
                          </div>
                          <div class="home-bus-p-img-b" data-ix="common-zoom-out">
                            @if(isset($item['medias']['content_p_image'][$i]['path']))
                            <img src="{{$item['medias']['content_p_image'][$i]['path']}}"  alt="" class="img-full">
                            @endif
                          </div>
                        </div>
                      </div>
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
            </div>
          </div>
          @else
          <div data-w-id="c3970671-6882-3da4-c800-8ba7759b800f" class="home-business-b">
            <div class="home-bus-col col-txt v-even">
              <div class="section-heading-b" data-ix="common-section-heading-interaction">
                <div class="section-small-heading-txt">{{$item['header']}}</div>
                <div class="section-heading-wrap">
                  <div class="heading-gradient-b"></div>
                  <h2 style="text-align:center">{{$item['textinput']}}</h2>
                </div>
              </div>
              <div data-ix="common-fade-from-bottom">
                <p>{!! editor($item['description']) !!}</p>
                <a href="{{$item['url']}}" class="btn-txt-on-line w-inline-block">
                  <div class="btn-txt-on-line-txt">{{lang('Learn More')}}</div>
                  <div class="btn-txt-on-line-line-b">
                    <div class="btn-txt-on-line-arrow"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="home-bus-col col-img v-even">
              <div data-delay="2000" data-animation="cross" class="home-bus-slider w-slider" data-autoplay="true" data-easing="ease" data-hide-arrows="false" data-disable-swipe="true" data-autoplay-limit="0" data-nav-spacing="3" data-duration="1000" data-infinite="true">
                <div class="overflow-visible w-slider-mask">
                  @if(isset($item['medias']))
                    @for ($i = 0; $i < count($item['medias']['content_pb_image']); $i++)
                    <div class="home-bus-slide w-slide">
                      <div class="home-bus-img-wrap v-even">
                        <div class="home-bus-img-b v-even">
                          <div class="home-bus-bg-img leathercare-1" style="background-image:url({{$item['medias']['content_pb_image'][$i]['path']}})"></div>
                        </div>
                        <div class="home-bus-p-img-b" data-ix="common-zoom-out"><img src="{{$item['medias']['content_p_image'][$i]['path']}}"  alt="" class="img-full"></div>
                      </div>
                    </div>
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
            </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>
      <div class="section-div top-0">
        <div class="container w-container">
          <div class="home-client-b">
            <div class="section-heading-b txt-align-center" data-ix="common-section-heading-interaction">
              <div class="section-heading-wrap">
                <div class="heading-gradient-b"></div>
                <h2>{{lang('Clients')}}</h2>
              </div>
            </div>
            <div class="home-client-list carousel">
            @foreach($client->getMedia('image_list', true) as $image)
              <div class="home-client-item"><img src="{{ $image->path }}" alt="" class="img-full"></div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
