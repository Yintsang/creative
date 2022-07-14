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
              <h1>{{$business->title}}</h1>
              <input type="hidden" class="business" name="business" value="{{$business->url_slug}}">
              <input type="hidden" class="collection" name="collection" value="">
              <input type="hidden" class="supplier" name="supplier" value="">
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
              <a href="#collections" class="inner-menu-link w-inline-block" data-ix="inner-menu-link-interaction">
                <div class="inner-menu-active-icon"><img src="{{ asset_frontend('images/inner-menu-active.svg') }}" alt="" class="img-full"></div>
                <div>{{lang('Collection')}}</div>
              </a>
            </div>
            <div class="inner-menu-item-b">
              <a href="#products" class="inner-menu-link w-inline-block" data-ix="inner-menu-link-interaction">
                <div class="inner-menu-active-icon"><img src="{{ asset_frontend('images/inner-menu-active.svg') }}" alt="" class="img-full"></div>
                <div>{{lang('Products')}}</div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="section-div bottom-0" data-ix="common-fade-from-bottom">
        <div class="container w-container">
          {!! editor($business->description) !!}
        </div>
      </div>
      <div id="collections" class="section-div">
        <div class="container w-container">
          <div class="section-heading-b" data-ix="common-section-heading-interaction">
            <div class="section-heading-wrap">
              <div class="heading-gradient-b"></div>
              <h2>{{lang('Collection')}}</h2>
            </div>
          </div>
          <div data-w-id="389f3346-79f8-0e7e-e8a3-7bba8c3eb416" class="bus-collection-list-b" data-ix="init-bus-collection">
            @foreach($collection as $item)
            <div class="bus-collection-item" data-ix="common-fade-from-bottom">
            <a href="#" class="bus-collection-expand-btn w-inline-block" data-ix="bus-collection-expand-interaction">
              @if($image = $item->getMedia('image'))
              <div class="bus-collection-banner-b"> 
                <div class="home-bus-bg-img bus-bs-agriculture" style="background-image:url('{{$image->getResizedImage(2000) }}')"></div>
              </div>
              @endif
                <div class="bus-collection-title">{{$item->title}}</div>
                <div class="bus-collection-expand-indicator">
                  <div class="expand-txt-detail">{{lang('Details')}}</div>
                  <div class="bus-collection-expand-icon-b"><img src="{{ asset_frontend('images/icon-expand.svg') }}" alt="" class="img-bus-close"></div>
                </div>
              </a>
              <a href="#" class="bus-collection-close-btn w-inline-block" data-ix="bus-collection-close">
                  @if($image = $item->getMedia('image'))
                  <div class="bus-collection-banner-b">
                    <div class="home-bus-bg-img bus-bs-agriculture" style="background-image:url('{{$image->getResizedImage(2000) }}')"></div>
                  </div>
                  @endif
                <div class="bus-collection-title">{{$item->title}}</div>
                <div class="bus-collection-expand-indicator">
                  <div class="expand-txt-detail">{{lang('Close')}}</div>
                  <div class="bus-collection-expand-icon-b"><img src="{{ asset_frontend('images/icon-collapse.svg') }}" alt="" class="img-bus-close"></div>
                </div>
              </a>
              <div class="bus-collection-expand-b">
                <div class="bus-collection-expand-content-gp">
                  @if($item['description'])
                  {!! editor($item['description'])!!}
                  @endif
                  @if($item['header_1'])
                  <br>
                  <div class="bus-content-gp-b">
                    <div class="bus-content-gp-title"><span class="highlight-purple" style="color:{{color($item['header_color_1'])}}">{{$item['header_1']}}</span></div>
                    <div class="bus-content-point-list">
                      @foreach ($item->content as $item2)
                      <div class="bus-content-point-item">
                        <div class="bus-content-point-txt">{{$item2['content']}}</div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  @endif
                  @if($item['header_2'])
                  <div class="bus-content-gp-b">
                    <div class="bus-content-gp-title"><span class="highlight-purple" style="color:{{color($item['header_color_2'])}}">{{$item['header_2']}}</span></div>
                    <div class="bus-content-point-list">
                      @foreach ($item->content2 as $item2)
                      <div class="bus-content-point-item">
                        <div class="bus-content-point-txt">{{$item2['content']}}</div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  @endif
                  @if($item['header_3'])
                  <div class="bus-content-gp-b">
                    <div class="bus-content-gp-title"><span class="highlight-purple" style="color:{{color($item['header_color_3'])}}">{{$item['header_3']}}</span></div>
                    <div class="bus-content-point-list">
                      @foreach ($item->content3 as $item2)
                      <div class="bus-content-point-item">
                        <div class="bus-content-point-txt">{{$item2['content']}}</div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  @endif
                  @if($item['header_4'])
                  <div class="bus-content-gp-b">
                    <div class="bus-content-gp-title"><span class="highlight-purple" style="color:{{color($item['header_color_4'])}}">{{$item['header_4']}}</span></div>
                    <div class="bus-content-point-list">
                      @foreach ($item->content4 as $item2)
                      <div class="bus-content-point-item">
                        <div class="bus-content-point-txt">{{$item2['content']}}</div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  @endif
                </div>
              </div>
              <br>
              @if($item['description2'])
                  <div class="bus-collection-expand-b">
                    {!! editor($item['description2'])!!}
                  </div>
                  @endif
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <div id="products" class="section-div v-product">
        <div class="container w-container">
          <div class="section-heading-b txt-align-center" data-ix="common-section-heading-interaction">
            <div class="section-heading-wrap">
              <div class="heading-gradient-b"></div>
              <h2>{{lang('Products')}}</h2>
            </div>
          </div>
          <div class="bus-product-filter-b" data-ix="common-fade-from-bottom">
            <div class="bus-filter-item">
              <div class="bus-filter-type">{{lang('Collection')}}</div>
              <div data-hover="false" data-delay="500" class="bus-filter-dropdown w-dropdown">
                <div class="bus-filter-dropdown-toggle w-dropdown-toggle" data-ix="bus-filter-interaction">
                  <div class="current_collection" pkey="">{{lang('All')}}</div><img src="{{ asset_frontend('images/arrow-filter.svg') }}" alt="" class="img-dropdown-arrow">
                </div>
                <nav class="collection_dropdown bus-filter-dropdown-list w-dropdown-list" type="collection_dropdown">
                  <a href="#" class="bus-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">{{lang('All')}}</a>
                  @foreach($product as $products_item)
                    @foreach ($products_item->collection as $products_collection)
                      @php 
                      $data[] = [];
                      if (!in_array($products_collection->title, $data)) {
                      @endphp
                      <a href="#" pkey="{{$products_collection->id}}" class="bus-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">{{$products_collection->title}}</a>
                      @php
                      array_push($data,$products_collection->title);
                      }
                      @endphp
                    @endforeach
                  @endforeach
                </nav>
              </div>
            </div>
            <div class="bus-filter-item">
              <div class="bus-filter-type">{{lang('Supplier')}}</div>
              <div data-hover="false" data-delay="500" class="bus-filter-dropdown w-dropdown">
                <div class="bus-filter-dropdown-toggle w-dropdown-toggle" data-ix="bus-filter-interaction">
                  <div class="current_supplier" pkey="">{{lang('All')}}</div><img src="{{ asset_frontend('images/arrow-filter.svg') }}" alt="" class="img-dropdown-arrow">
                </div>
                <nav class="supplier_dropdown bus-filter-dropdown-list w-dropdown-list"  type="supplier_dropdown">
                  <a href="#" class="bus-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">{{lang('All')}}</a>
                  @foreach($product as $products_item)
                    @php 
                      $data[] = [];
                      if (!in_array($products_item->supplier->title, $data)) {
                      @endphp
                      <a href="#" pkey="{{$products_item->supplier->id }}" class="bus-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">{{$products_item->supplier->title }}</a>
                      @php
                      array_push($data,$products_item->supplier->title);
                      }
                    @endphp
                  @endforeach
                </nav>
              </div>
            </div>
          </div>
          <div class="bus-product-list-b">
            @foreach ($product as $products_item)
            <div class="bus-product-item" data-ix="common-fade-from-bottom">
              <div class="product-item-circle">
                <div data-delay="2000" data-animation="cross" class="product-item-slider w-slider" data-autoplay="true" data-easing="ease" data-hide-arrows="false" data-disable-swipe="true" data-autoplay-limit="0" data-nav-spacing="3" data-duration="1000" data-infinite="true">
                  <div class="w-slider-mask">
                      @foreach($products_item->getMedia('image', true) as $image)
                      <div class="product-item-slide w-slide">
                        <div class="product-item-img-b">
                          <img src="{{$image->path}}" alt="" class="img-full">
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
                  <div class="hide w-slider-nav w-round"></div>
                </div>
              </div>
              <div class="product-name-txt">{{$products_item->title}}</div>
              <div class="product-supplier-series">
                <div class="product-sipplier-txt">
                  <a href="#" pkey="{{$products_item->supplier->id}}" class="txt-link">{{$products_item->supplier->title}}</a>
                </div>
                <div class="product-series-b">
                  <div class="product-series-line"></div>
                  <div>{{$products_item->series}}</div>
                </div>
              </div>
              <div class="product-item-collection-b">
                <div>
                  @foreach ($products_item->collection as $products_collection)
                  <a href="#" pkey="{{$products_collection->id}}" class="product-item-collection-link">{{$products_collection->title}}</a><p style="width:10px;display:inline-block;text-align:left">. </p>
                  @endforeach
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset_frontend('js/business.js') }}" type="text/javascript"></script>
@endsection