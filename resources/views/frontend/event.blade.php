@extends('layouts.frontend')

@section('content')
<div class="all">
    <div data-w-id="8e97c06d-ef18-5bcf-1fe2-9a4bd723f9da" class="section-banner wf-section">
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
              <h1>{{lang('Events')}}</h1>
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
              <a href="{{route('event')}}" aria-current="page" class="inner-menu-link w-inline-block @if($cate == '') w--current @endif" data-ix="inner-menu-link-interaction">
                <div class="inner-menu-active-icon"><img src="{{ asset_frontend('images/inner-menu-active.svg') }}" alt="" class="img-full"></div>
                <div>{{lang('All')}}</div>
              </a>
            </div>
            <div class="inner-menu-item-b">
              <a href="{{route('event','current')}}" aria-current="page" class="inner-menu-link w-inline-block @if($cate == 'current') w--current @endif" data-ix="inner-menu-link-interaction">
                <div class="inner-menu-active-icon"><img src="{{ asset_frontend('images/inner-menu-active.svg') }}" alt="" class="img-full"></div>
                <div>{{lang('Current')}}</div>
              </a>
            </div>
            <div class="inner-menu-item-b">
              <a href="{{route('event','upcoming')}}" class="inner-menu-link w-inline-block @if($cate == 'upcoming') w--current @endif" data-ix="inner-menu-link-interaction">
                <div class="inner-menu-active-icon"><img src="{{ asset_frontend('images/inner-menu-active.svg') }}" alt="" class="img-full"></div>
                <div>{{lang('Upcoming')}}</div>
              </a>
            </div>
            <div class="inner-menu-item-b">
              <a href="{{route('event','recap')}}" class="inner-menu-link w-inline-block @if($cate == 'recap') w--current @endif" data-ix="inner-menu-link-interaction">
                <div class="inner-menu-active-icon"><img src="{{ asset_frontend('images/inner-menu-active.svg') }}" alt="" class="img-full"></div>
                <div>{{lang('Recap')}}</div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="our-history" class="section-div">
        <div class="container w-container">
          <div class="event-item-list">
          @foreach ($event as $item)
          <div class="event-item-b" data-ix="common-fade-from-bottom">
              <div class="event-item-content-b">
                <div class="event-post-date-b">
                  <div class="event-post-date-fieldname">Posted on</div>
                  <div class="event-post-date-data">{{$item->post_date}}</div>
                </div>
                <div class="event-status-b">
                  @php
                  $post_type = '';
                    $currentDate = date('Y-m-d', strtotime(date('Y-m-d')));
                    $startDate = date('Y-m-d', strtotime($item->from_date));
                    $endDate = date('Y-m-d', strtotime($item->to_date));
                    if ($currentDate >= $startDate && $currentDate <= $endDate){   
                      $post_type = 'Current';
                    }else if($currentDate <= $startDate && $currentDate <= $endDate){
                      $post_type = 'Upcoming';
                    }else{
                      $post_type = 'Recap';
                    }
                    @endphp
                  <div class="event-status v-{{strtolower($post_type)}}">{{$post_type}}</div>
                </div>
                <div class="section-heading-b txt-align-center">
                  <div class="section-heading-wrap">
                    <div class="heading-gradient-b"></div>
                    <h2>{{$item->title}}</h2>
                  </div>
                </div>
                <div class="event-info-b">
                  <div class="event-info-row">
                    @if($item->from_date != '')
                    <div class="event-info-fieldname">Date:</div>
                    <div class="event-info-data">{{$item->from_date}} 
                      @if($item->to_date != '')
                      - {{$item->to_date}} 
                      @endif
                    </div>
                    @endif
                  </div>
                  <div class="event-info-row">
                  @if($item->time != '')
                    <div class="event-info-fieldname">Time:</div>
                    <div class="event-info-data">{{$item->time}}</div>
                  @endif
                  </div>
                  <div class="event-info-row">
                    @if($item->venue != '')
                    <div class="event-info-fieldname">Venue:</div>
                    <div class="event-info-data">{{$item->venue}}</div>
                    @endif
                  </div>
                </div>
                <div>
                  {!! editor($item->description)!!}
                </div>
              </div>
              <a href="#" class="event-item-expand-btn w-inline-block" data-ix="readall-interaction">
                <div class="event-expand-txt">{{lang('Read All')}}</div>
                <div class="arrow-readall"></div>
              </a>
            </div>
          @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
