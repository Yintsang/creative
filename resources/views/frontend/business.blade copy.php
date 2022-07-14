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
              @if($image = $item->getMedia('image'))
              <div class="bus-collection-banner-b">
                <div class="home-bus-bg-img bus-bs-agriculture" style="background-image:url('{{$image->getResizedImage(2000) }}')"></div>
              </div>
              @endif
              <a href="#" class="bus-collection-expand-btn w-inline-block" data-ix="bus-collection-expand-interaction">
                <div class="bus-collection-title">{{$item->title}}</div>
                <div class="bus-collection-expand-indicator">
                  <div class="expand-txt-detail">{{lang('Details')}}</div>
                  <div class="bus-collection-expand-icon-b"><img src="{{ asset_frontend('images/icon-expand.svg') }}" alt="" class="img-bus-close"></div>
                </div>
              </a>
              <a href="#" class="bus-collection-close-btn w-inline-block" data-ix="bus-collection-close">
                <div class="bus-collection-title">{{$item->title}}</div>
                <div class="bus-collection-expand-indicator">
                  <div class="expand-txt-detail">{{lang('Close')}}</div>
                  <div class="bus-collection-expand-icon-b"><img src="{{ asset_frontend('images/icon-collapse.svg') }}" alt="" class="img-bus-close"></div>
                </div>
              </a>
              <div class="bus-collection-expand-b">
                <div class="bus-collection-expand-content-gp">
                                    
                @foreach ($item->content as $item2)
                  <div class="bus-content-gp-b">
                    <div class="bus-content-gp-title"><span class="highlight-green">{{$item2['title']}}</span></div>
                      {!!editor($item2['content'])!!}
                  </div>
                  @endforeach
                </div>
              </div>
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
                <nav class="collection_dropdown w-dropdown-list" type="collection_dropdown">
                  <a href="#" class="bus-filter-dropdown-link w-dropdown-link">{{lang('All')}}</a>
                  @foreach($product_collection as $collection_item)
                    <a href="#" pkey="{{$collection_item->id}}" class="bus-filter-dropdown-link w-dropdown-link">{{$collection_item->title}}</a>
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
                <nav class="supplier_dropdown w-dropdown-list" type="supplier_dropdown">
                  <a href="#" class="bus-filter-dropdown-link w-dropdown-link" >{{lang('All')}}</a>
                  @foreach($supplier as $supplier_item)
                    <a href="#" pkey="{{$supplier_item->id}}" class="bus-filter-dropdown-link w-dropdown-link">{{$supplier_item->title}}</a>
                  @endforeach
                </nav>
              </div>
            </div>
          </div>
          <div class="bus-product-list-b">
            @foreach ($product_business as $product_item)
            <div class="bus-product-item" data-ix="common-fade-from-bottom">
              <div class="product-item-circle">
                <div data-delay="2000" data-animation="cross" class="product-item-slider w-slider" data-autoplay="true" data-easing="ease" data-hide-arrows="false" data-disable-swipe="true" data-autoplay-limit="0" data-nav-spacing="3" data-duration="1000" data-infinite="true">
                  <div class="w-slider-mask">
                  @foreach($product_item->getMedia('image', true) as $image)
                  <div class="product-item-slide w-slide">
                    <div class="product-item-img-b"><img src="{{ $image->path }}" alt="" class="img-full"></div>
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
              <div class="product-name-txt">{{$product_item->title}}</div>
              <div class="product-supplier-series">
                <div class="product-sipplier-txt">
                  <a href="#" class="txt-link">{{$product_item->supplier['title']}}</a>
                </div>
                <div class="product-series-b">
                  <div class="product-series-line"></div>
                  <div>{{$product_item->series['title']}}</div>
                </div>
              </div>
              <div class="product-item-collection-b">
                <div>
                  <a href="#" class="product-item-collection-link">Hospitality</a>．<a href="#" class="product-item-collection-link">Food &amp; Beverage</a>．<a href="#" class="product-item-collection-link">Education</a>．<a href="#" class="product-item-collection-link">Healthcare</a>．<a href="#" class="product-item-collection-link">Office &amp; Workspace</a>．<a href="#" class="product-item-collection-link">Personal Care</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
<script>
  window.addEventListener('DOMContentLoaded', (event) => {
      // $(".supplier_dropdown a").click(function(){
      //   pkey = $(this).attr( "pkey" );
      //   selection = $(this).text();
      //   console.log(pkey);
      //   console.log(selection);
      //   $('.current_supplier').text(selection);
      //   $('.current_supplier').attr('pkey',pkey);
      // });
      // $(".collection_dropdown a").click(function(){
      //   pkey = $(this).attr( "pkey" );
      //   selection = $(this).text();
      //   console.log(pkey);
      //   console.log(selection);
      //   $('.current_collection').text(selection);
      //   $('.current_collection').attr('pkey',pkey);
      // });
});
</script>