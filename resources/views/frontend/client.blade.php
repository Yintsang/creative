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
              <h1>{{$client->title}}</h1>
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
              <p data-ix="common-fade-from-bottom">{!! editor($client->description) !!}</p>
            </div>
          </div>
          <div class="client-list-b">
            @foreach($client->getMedia('image_list', true) as $image)
            <div class="client-item-b" data-ix="common-fade-from-bottom">
              <div class="client-circle-b">
                <div class="client-circle-img-b"><img src="{{ $image->path }}" alt="" class="img-full"></div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
