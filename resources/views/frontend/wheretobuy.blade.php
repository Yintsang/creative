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
      <div id="collections" class="section-div">
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
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">All</a>
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
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">All</a>
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">Hong Kong</a>
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">Macau</a>
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">China</a>
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">Far East</a>
                  </nav>
                </div>
              </div>
            </div>
            <div class="where-to-buy-filter-item">
              <div class="where-to-buy-filter-item-mobile">
                <div class="where-to-buy-filter-type">{{lang('Location')}}</div>
                <div data-hover="false" data-delay="500" class="where-to-buy-filter-dropdown w-dropdown">
                  <div class="where-to-buy-filter-dropdown-toggle w-dropdown-toggle" data-ix="where-to-buy-filter-interaction">
                    <div>All</div><img loading="lazy" src="{{ asset_frontend('images/arrow-filter.svg') }}" alt="" class="img-dropdown-arrow">
                  </div>
                  <nav class="where-to-buy-filter-dropdown-list w-dropdown-list">
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">All</a>
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">Hong Kong Island</a>
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">Kowloon</a>
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">New Territories</a>
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">Others</a>
                  </nav>
                </div>
              </div>
            </div>
            <div class="where-to-buy-filter-item">
              <div class="where-to-buy-filter-item-mobile">
                <div class="where-to-buy-filter-type">{{lang('District')}}</div>
                <div data-hover="false" data-delay="500" class="where-to-buy-filter-dropdown w-dropdown">
                  <div class="where-to-buy-filter-dropdown-toggle w-dropdown-toggle" data-ix="where-to-buy-filter-interaction">
                    <div>All</div><img loading="lazy" src="{{ asset_frontend('images/arrow-filter.svg') }}" alt="" class="img-dropdown-arrow">
                  </div>
                  <nav class="where-to-buy-filter-dropdown-list district w-dropdown-list">
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">All</a>
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">Causeway Bay</a>
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">Central</a>
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">North Point</a>
                    <a href="#" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">Sai Wan Ho</a>
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
                <div class="where-to-buy-retails-b">
                  <div class="sub-heading-b">
                    <div class="where-to-buy-title">Hong Kong Island</div>
                  </div>
                  <div class="where-to-buy-table">
                    <div class="where-to-buy-row first">
                      <div class="where-to-buy-col-15 title-text">
                        <div><strong>District</strong><br></div>
                      </div>
                      <div class="where-to-buy-col-15 title-text"></div>
                      <div class="where-to-buy-col-27 title-text">
                        <div><strong>Company Name</strong><br></div>
                      </div>
                      <div class="where-to-buy-col-27 title-text">
                        <div><strong>Address</strong><br></div>
                      </div>
                      <div class="where-to-buy-col-15 title-text">
                        <div><strong>Telephone</strong><br></div>
                      </div>
                    </div>
                    <div class="where-to-buy-row">
                      <div class="where-to-buy-col-15 mobile-none">
                        <div>Causeway Bay</div>
                      </div>
                      <div class="where-to-buy-col-15"><img src="images/retail-shop-012x.jpg" loading="lazy" width="220" alt="" class="where-to-buy-logo-img"></div>
                      <div class="where-to-buy-col-27">
                        <div><strong>Bluefrog</strong><br></div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>Causeway Bay</div>
                        </div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>
                            <a href="https://g.page/ntmedicaltw?share" target="_blank" class="where-to-buy-link">Tsuen Wan, Lo Tak Ct, 46-58 C2 Carson Mansion</a>
                          </div>
                        </div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>
                            <a href="tel:+85291371158" class="where-to-buy-link">+852 9137 1158</a>
                          </div>
                        </div>
                      </div>
                      <div class="where-to-buy-col-27 mobile-none">
                        <div>
                          <a href="https://g.page/ntmedicaltw?share" target="_blank" class="where-to-buy-link">Tsuen Wan, Lo Tak Ct, 46-58 C2 Carson Mansion</a>
                        </div>
                      </div>
                      <div class="where-to-buy-col-15 mobile-none">
                        <div>
                          <a href="tel:+85291371158" class="where-to-buy-link">+852 9137 1158</a>
                        </div>
                      </div>
                    </div>
                    <div class="where-to-buy-row">
                      <div class="where-to-buy-col-15 mobile-none">
                        <div>North Point</div>
                      </div>
                      <div class="where-to-buy-col-15"><img src="images/online-shop-012x.jpg" loading="lazy" width="220" alt="" class="where-to-buy-logo-img"></div>
                      <div class="where-to-buy-col-27">
                        <div><strong>MSB International Ltd Hong Kong</strong><br></div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>North Point</div>
                        </div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>
                            <a href="https://g.page/ntmedicaltw?share" target="_blank" class="where-to-buy-link">Tsuen Wan, Lo Tak Ct, 46-58 C2 Carson Mansion</a>
                          </div>
                        </div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>
                            <a href="tel:+85291371158" class="where-to-buy-link">+852 9137 1158</a>
                          </div>
                        </div>
                      </div>
                      <div class="where-to-buy-col-27 mobile-none">
                        <div>
                          <a href="https://g.page/ntmedicaltw?share" target="_blank" class="where-to-buy-link">Tsuen Wan, Lo Tak Ct, 46-58 C2 Mansion</a>
                        </div>
                      </div>
                      <div class="where-to-buy-col-15 mobile-none">
                        <div>
                          <a href="tel:+85291371158" class="where-to-buy-link">+852 9137 1158</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="where-to-buy-retails-b">
                  <div class="sub-heading-b">
                    <div class="where-to-buy-title">Kowloon</div>
                  </div>
                  <div class="where-to-buy-table">
                    <div class="where-to-buy-row first">
                      <div class="where-to-buy-col-15 title-text">
                        <div><strong>District</strong><br></div>
                      </div>
                      <div class="where-to-buy-col-15 title-text"></div>
                      <div class="where-to-buy-col-27 title-text">
                        <div><strong>Company Name</strong><br></div>
                      </div>
                      <div class="where-to-buy-col-27 title-text">
                        <div><strong>Address</strong><br></div>
                      </div>
                      <div class="where-to-buy-col-15 title-text">
                        <div><strong>Telephone</strong><br></div>
                      </div>
                    </div>
                    <div class="where-to-buy-row">
                      <div class="where-to-buy-col-15 mobile-none">
                        <div>Cheung Sha Wan</div>
                      </div>
                      <div class="where-to-buy-col-15"><img src="images/retail-shop-012x.jpg" loading="lazy" width="220" alt="" class="where-to-buy-logo-img"></div>
                      <div class="where-to-buy-col-27">
                        <div><strong>Bluefrog</strong><br></div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>Cheung Sha Wan</div>
                        </div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>
                            <a href="https://g.page/ntmedicaltw?share" target="_blank" class="where-to-buy-link">Tsuen Wan, Lo Tak Ct, 46-58 C2 Carson Mansion</a>
                          </div>
                        </div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>
                            <a href="tel:+85291371158" class="where-to-buy-link">+852 9137 1158</a>
                          </div>
                        </div>
                      </div>
                      <div class="where-to-buy-col-27 mobile-none">
                        <div>
                          <a href="https://g.page/ntmedicaltw?share" target="_blank" class="where-to-buy-link">Tsuen Wan, Lo Tak Ct, 46-58 C2 Carson Mansion</a>
                        </div>
                      </div>
                      <div class="where-to-buy-col-15 mobile-none">
                        <div>
                          <a href="tel:+85291371158" class="where-to-buy-link">+852 9137 1158</a>
                        </div>
                      </div>
                    </div>
                    <div class="where-to-buy-row">
                      <div class="where-to-buy-col-15 mobile-none">
                        <div>Kowloon City</div>
                      </div>
                      <div class="where-to-buy-col-15"><img src="images/online-shop-022x.png" loading="lazy" width="220" srcset="images/online-shop-022x-p-500.png 500w, images/online-shop-022x.png 600w" sizes="(max-width: 479px) 100vw, (max-width: 767px) 16vw, (max-width: 991px) 17vw, (max-width: 1279px) 2vw, 1vw" alt="" class="where-to-buy-logo-img"></div>
                      <div class="where-to-buy-col-27">
                        <div><strong>CARY &amp; DAY &amp; MARTIN</strong><br></div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>Kowloon City</div>
                        </div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>
                            <a href="https://g.page/ntmedicaltw?share" target="_blank" class="where-to-buy-link">Tsuen Wan, Lo Tak Ct, 46-58 C2 Carson Mansion</a>
                          </div>
                        </div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>
                            <a href="tel:+85291371158" class="where-to-buy-link">+852 9137 1158</a>
                          </div>
                        </div>
                      </div>
                      <div class="where-to-buy-col-27 mobile-none">
                        <div>
                          <a href="https://g.page/ntmedicaltw?share" target="_blank" class="where-to-buy-link">Tsuen Wan, Lo Tak Ct, 46-58 C2 Carson Mansion</a>
                        </div>
                      </div>
                      <div class="where-to-buy-col-15 mobile-none">
                        <div>
                          <a href="tel:+85291371158" class="where-to-buy-link">+852 9137 1158</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="where-to-buy-retails-b">
                  <div class="sub-heading-b">
                    <div class="where-to-buy-title">New Territories</div>
                  </div>
                  <div class="where-to-buy-table">
                    <div class="where-to-buy-row first">
                      <div class="where-to-buy-col-15 title-text">
                        <div><strong>District</strong><br></div>
                      </div>
                      <div class="where-to-buy-col-15 title-text"></div>
                      <div class="where-to-buy-col-27 title-text">
                        <div><strong>Company Name</strong><br></div>
                      </div>
                      <div class="where-to-buy-col-27 title-text">
                        <div><strong>Address</strong><br></div>
                      </div>
                      <div class="where-to-buy-col-15 title-text">
                        <div><strong>Telephone</strong><br></div>
                      </div>
                    </div>
                    <div class="where-to-buy-row">
                      <div class="where-to-buy-col-15 mobile-none">
                        <div>Sha Tin</div>
                      </div>
                      <div class="where-to-buy-col-15"><img src="images/retail-shop-012x.jpg" loading="lazy" width="220" alt="" class="where-to-buy-logo-img"></div>
                      <div class="where-to-buy-col-27">
                        <div><strong>Bluefrog</strong><br></div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>Sha Tin</div>
                        </div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>
                            <a href="https://g.page/ntmedicaltw?share" target="_blank" class="where-to-buy-link">Tsuen Wan, Lo Tak Ct, 46-58 C2 Carson Mansion</a>
                          </div>
                        </div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>
                            <a href="tel:+85291371158" class="where-to-buy-link">+852 9137 1158</a>
                          </div>
                        </div>
                      </div>
                      <div class="where-to-buy-col-27 mobile-none">
                        <div>
                          <a href="https://g.page/ntmedicaltw?share" target="_blank" class="where-to-buy-link">Tsuen Wan, Lo Tak Ct, 46-58 C2 Carson Mansion</a>
                        </div>
                      </div>
                      <div class="where-to-buy-col-15 mobile-none">
                        <div>
                          <a href="tel:+85291371158" class="where-to-buy-link">+852 9137 1158</a>
                        </div>
                      </div>
                    </div>
                    <div class="where-to-buy-row">
                      <div class="where-to-buy-col-15 mobile-none">
                        <div>Yuen Long</div>
                      </div>
                      <div class="where-to-buy-col-15"><img src="images/online-shop-012x.jpg" loading="lazy" width="220" alt="" class="where-to-buy-logo-img"></div>
                      <div class="where-to-buy-col-27">
                        <div><strong>Hallway Feeds</strong><br></div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>Yuen Long</div>
                        </div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>
                            <a href="https://g.page/ntmedicaltw?share" target="_blank" class="where-to-buy-link">Tsuen Wan, Lo Tak Ct, 46-58 C2 Carson Mansion</a>
                          </div>
                        </div>
                        <div class="where-to-buy-mobile-text-b">
                          <div>
                            <a href="tel:+85291371158" class="where-to-buy-link">+852 9137 1158</a>
                          </div>
                        </div>
                      </div>
                      <div class="where-to-buy-col-27 mobile-none">
                        <div>
                          <a href="https://g.page/ntmedicaltw?share" target="_blank" class="where-to-buy-link">Tsuen Wan, Lo Tak Ct, 46-58 C2 Carson Mansion</a>
                        </div>
                      </div>
                      <div class="where-to-buy-col-15 mobile-none">
                        <div>
                          <a href="tel:+85291371158" class="where-to-buy-link">+852 9137 1158</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset_frontend('js/wheretobuy.js') }}" type="text/javascript"></script>
@endsection
