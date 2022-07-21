@extends('layouts.frontend')

@section('content')
<?php
// echo "<pre>";
//   print_r($shop);
// echo "</pre>";
?>
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
              <h1>{{lang('Where To Buy')}}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content wf-section">
      <input type="hidden" class="shop_type_hidden" name="shop_type" value="">
      <input type="hidden" class="brand_type_hidden" name="brand_type" value="">
      <input type="hidden" class="region_type_hidden" name="region_type" value="">
      <input type="hidden" class="location_type_hidden" name="location_type" value="">
      <input type="hidden" class="district_type_hidden" name="district_type" value="">
      <div id="collections" class="section-div" style="min-height:500px">
        <div class="where-to-buy-filter-b" data-ix="common-fade-from-bottom">
          <div class="where-to-buy-filter-item-b">
            <div class="where-to-buy-filter-item">
              <div class="where-to-buy-filter-item-mobile">
                <div class="where-to-buy-filter-type">{{lang('Online / Retail')}}</div>
                <div data-hover="false" data-delay="500" class="where-to-buy-filter-dropdown w-dropdown">
                  <div class="where-to-buy-filter-dropdown-toggle w-dropdown-toggle" data-ix="where-to-buy-filter-interaction">
                    <div class="shop_type_text" pkey="">All</div><img loading="lazy" src="{{ asset_frontend('images/arrow-filter.svg') }}" alt="" class="img-dropdown-arrow">
                  </div>
                  <nav class="shop_type where-to-buy-filter-dropdown-list w-dropdown-list">
                    <a href="#" pkey="all" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">All</a>
                    <a href="#" pkey="online" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">Online </a>
                    <a href="#" pkey="retail" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">Retail</a>
                  </nav>
                </div>
              </div>
            </div>
            <div class="where-to-buy-filter-item">
              <div class="where-to-buy-filter-item-mobile">
                <div class="where-to-buy-filter-type">{{lang('Brand')}}</div>
                <div data-hover="false" data-delay="500" class="where-to-buy-filter-dropdown w-dropdown">
                  <div class="where-to-buy-filter-dropdown-toggle w-dropdown-toggle" data-ix="where-to-buy-filter-interaction">
                    <div class="brand_type_text" pkey="">All</div><img loading="lazy" src="{{ asset_frontend('images/arrow-filter.svg') }}" alt="" class="img-dropdown-arrow">
                  </div>
                  <nav class="brand_type where-to-buy-filter-dropdown-list w-dropdown-list">
                    <a href="#" pkey="all" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">All</a>
                    @foreach($brand as $item)
                    <a href="#" pkey="{{$item->id}}" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">{{$item->title}}</a>
                    @endforeach
                  </nav>
                </div>
              </div>
            </div>
            <div class="where-to-buy-filter-item">
              <div class="where-to-buy-filter-item-mobile">
                <div class="where-to-buy-filter-type">{{lang('Region')}}</div>
                <div data-hover="false" data-delay="500" class="where-to-buy-filter-dropdown w-dropdown">
                  <div class="where-to-buy-filter-dropdown-toggle w-dropdown-toggle" data-ix="where-to-buy-filter-interaction">
                    <div class="region_type_text" pkey="">All</div><img loading="lazy" src="{{ asset_frontend('images/arrow-filter.svg') }}" alt="" class="img-dropdown-arrow">
                  </div>
                  <nav class="region_type where-to-buy-filter-dropdown-list region w-dropdown-list">
                    <a href="#" pkey="all" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">All</a>
                    {{-- @foreach ($regions as $item)
                    <a href="#" pkey="{{$item->id}}" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">{{$item->title}}</a>
                    @endforeach --}}
                    @foreach ($all_location as $item)
                    <a href="#" pkey="{{$item->id}}" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">{{$item->title}}</a>
                    @endforeach
                  </nav>
                </div>
              </div>
            </div>
            <div class="where-to-buy-filter-item">
              <div class="where-to-buy-filter-item-mobile">
                <div class="where-to-buy-filter-type">{{lang('Location')}}</div>
                <div data-hover="false" data-delay="500" class="where-to-buy-filter-dropdown w-dropdown">
                  <div class="where-to-buy-filter-dropdown-toggle w-dropdown-toggle" data-ix="where-to-buy-filter-interaction">
                    <div class="location_type_text">All</div><img loading="lazy" src="{{ asset_frontend('images/arrow-filter.svg') }}" alt="" class="img-dropdown-arrow">
                  </div>
                  <nav class="location_type where-to-buy-filter-dropdown-list w-dropdown-list">
                    <a href="#" pkey="all" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">All</a>
                    @foreach ($all_location as $item)
                      @isset($item->child_cats)
                        @foreach($item->child_cats as $item2)
                        <a href="#" pkey="{{$item2->id}}" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">{{$item2->title}}</a>
                        @endforeach
                      @endisset
                      @isset($item->childs)
                        @foreach($item->childs as $item2)
                        <a href="#" pkey="{{$item2->id}}" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">{{$item2->title}}</a>
                        @endforeach
                      @endisset
                    @endforeach
                      {{-- @foreach($item->child_cats as $item2)
                      <a href="#" pkey="{{$item2->id}}" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">{{$item2->title}}</a>
                      @endforeach --}}
                  </nav>
                </div>
              </div>
            </div>
            <div class="where-to-buy-filter-item">
              <div class="where-to-buy-filter-item-mobile">
                <div class="where-to-buy-filter-type">{{lang('District')}}</div>
                <div data-hover="false" data-delay="500" class="where-to-buy-filter-dropdown w-dropdown">
                  <div class="where-to-buy-filter-dropdown-toggle w-dropdown-toggle" data-ix="where-to-buy-filter-interaction">
                    <div class="district_type_text">All</div><img loading="lazy" src="{{ asset_frontend('images/arrow-filter.svg') }}" alt="" class="img-dropdown-arrow">
                  </div>
                  <nav class="district_type where-to-buy-filter-dropdown-list district w-dropdown-list">
                    <a href="#" pkey="all" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">All</a>
                    @foreach ($all_location as $item)
                      @foreach($item->child_cats as $item2)
                        @foreach($item2->childs as $item3)
                          <a href="#" pkey="{{$item3->id}}" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">{{$item3->title}}</a>
                        @endforeach
                      @endforeach
                    @endforeach
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container w-container">
          <div class="where-to-buy-content-row" data-ix="common-fade-from-bottom">
            <div class="where-to-buy-content-b">
              <div class="section-heading-b">
                <div class="section-heading-wrap">
                  <div class="heading-gradient-b"></div>
                  <h2>{{lang('Online shop')}}</h2>
                </div>
              </div>
              <div class="where-to-buy-table">
                <div class="where-to-buy-row first">
                  <div class="where-to-buy-col-15 title-text"></div>
                  <div class="where-to-buy-col-27 title-text">
                    <div><strong>{{lang('Company Name')}}</strong><br></div>
                  </div>
                  <div class="where-to-buy-col-27 title-text">
                    <div><strong>{{lang('Web Address')}}</strong><br></div>
                  </div>
                  <div class="where-to-buy-col-15 title-text">
                    <div><strong>{{lang('Email')}}</strong><br></div>
                  </div>
                  <div class="where-to-buy-col-15 title-text">
                    <div><strong>{{lang('Telephone')}}</strong><br></div>
                  </div>
                </div>
                @foreach($online_shop as $item)
                <div class="where-to-buy-row">
                  <div class="where-to-buy-col-15">
                  @if($image = $item->getMedia('logo'))
                    <img src="{{ $item->getMedia('logo')->getResizedImage(2000) }}" loading="lazy" width="220" alt="" class="where-to-buy-logo-img">
                  @endif
                  </div>
                  <div class="where-to-buy-col-27">
                    <div><strong>{{$item->title}}</strong><br></div>
                    <div class="where-to-buy-mobile-text-b">
                      <div>
                        <a href="{{$item->website_address}}" target="_blank" class="where-to-buy-link">{{$item->website_address}}</a>
                      </div>
                    </div>
                    <div class="where-to-buy-mobile-text-b">
                      <div>
                        <a href="mailto:{{$item->email}}" class="where-to-buy-link">{{$item->email}}</a>
                      </div>
                    </div>
                    <div class="where-to-buy-mobile-text-b">
                      <div>
                        <a href="tel:{{$item->tel}}" class="where-to-buy-link">{{$item->tel}}</a>
                      </div>
                    </div>
                  </div>
                  <div class="where-to-buy-col-27 mobile-none">
                    <div>
                      <a href="{{$item->website_address}}" target="_blank" class="where-to-buy-link">{{$item->website_address}}</a>
                    </div>
                  </div>
                  <div class="where-to-buy-col-15 mobile-none">
                    <div>
                    <a href="mailto:{{$item->email}}" class="where-to-buy-link">{{$item->email}}</a>
                    </div>
                  </div>
                  <div class="where-to-buy-col-15 mobile-none">
                    <div>
                      <a href="tel:{{$item->tel}}" class="where-to-buy-link">{{$item->tel}}</a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="where-to-buy-content-b" data-ix="common-fade-from-bottom">
              <div class="section-heading-b">
                <div class="section-heading-wrap">
                  <div class="heading-gradient-b"></div>
                  <h2>{{lang('Retail shop')}}</h2>
                </div>
              </div>
              <div class="where-to-buy-retails-row">
                <!-- For Each-->
                {{-- <div class="where-to-buy-title" style="font-size:35px;padding-bottom:20px">Hong Kong</div> --}}
                @foreach($location_categories as $location_category)
                <div class="where-to-buy-retails-b">
                  <div class="sub-heading-b">
                    <div class="where-to-buy-title">{{ $location_category->title }}</div>
                  </div>
                  <div class="where-to-buy-table">
                    <div class="where-to-buy-row first">
                      <div class="where-to-buy-col-15 title-text">
                        <div><strong>{{lang('District')}}</strong><br></div>
                      </div>
                      <div class="where-to-buy-col-15 title-text"></div>
                      <div class="where-to-buy-col-27 title-text">
                        <div><strong>{{lang('Company Name')}}</strong><br></div>
                      </div>
                      <div class="where-to-buy-col-27 title-text">
                        <div><strong>{{lang('Address')}}</strong><br></div>
                      </div>
                      <div class="where-to-buy-col-15 title-text">
                        <div><strong>{{lang('Telephone')}}</strong><br></div>
                      </div>
                    </div>
                    @foreach($location_category->childs as $district)
                      @foreach($district->retail_shops as $shop)
                      <div class="where-to-buy-row">
                        <div class="where-to-buy-col-15 mobile-none">
                          <div>{{ $district->title }}</div>
                        </div>
                        <div class="where-to-buy-col-15"><img src="images/retail-shop-012x.jpg" loading="lazy" width="220" alt="" class="where-to-buy-logo-img"></div>
                        <div class="where-to-buy-col-27">
                          <div><strong>{{ $shop->title }}</strong><br></div>
                          <div class="where-to-buy-mobile-text-b">
                            <div>{{ $district->title }}</div>
                          </div>
                          <div class="where-to-buy-mobile-text-b">
                            <div>
                              <a href="{{ $shop->google_map_link }}" target="_blank" class="where-to-buy-link">{{ $shop->address }}</a>
                            </div>
                          </div>
                          <div class="where-to-buy-mobile-text-b">
                            <div>
                              <a href="tel:+852{{ $shop->tel }}" class="where-to-buy-link">{{ $shop->tel }}</a>
                            </div>
                          </div>
                        </div>
                        <div class="where-to-buy-col-27 mobile-none">
                          <div>
                            <a href="{{ $shop->google_map_link }}" target="_blank" class="where-to-buy-link">{{ $shop->address }}</a>
                          </div>
                        </div>
                        <div class="where-to-buy-col-15 mobile-none">
                          <div>
                            <a href="tel:+852{{ $shop->tel }}" class="where-to-buy-link">{{ $shop->tel }}</a>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    @endforeach
                    
                  </div>
                </div>
                @endforeach
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset_frontend('js/wheretobuy.js') }}" type="text/javascript"></script>
@endsection
