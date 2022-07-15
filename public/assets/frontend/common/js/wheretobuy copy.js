window.addEventListener('DOMContentLoaded', (event) => {
    function clear_dom(){
        $('.where-to-buy-content-row').empty();
    }
    function online_shop_temp(res){
        dom = '\
        <div class="where-to-buy-content-b">\
              <div class="section-heading-b">\
                <div class="section-heading-wrap">\
                  <div class="heading-gradient-b"></div>\
                  <h2>Online shop</h2>\
                </div>\
              </div>\
              <div class="where-to-buy-table">\
                <div class="where-to-buy-row first">\
                  <div class="where-to-buy-col-15 title-text"></div>\
                  <div class="where-to-buy-col-27 title-text">\
                    <div><strong>Company Name</strong><br></div>\
                  </div>\
                  <div class="where-to-buy-col-27 title-text">\
                    <div><strong>Web Address</strong><br></div>\
                  </div>\
                  <div class="where-to-buy-col-15 title-text">\
                    <div><strong>Email</strong><br></div>\
                  </div>\
                  <div class="where-to-buy-col-15 title-text">\
                    <div><strong>Telephone</strong><br></div>\
                  </div>\
                </div>';
                for(var i =0;i<res.length;i++) {
                    dom += '\
                    <div class="where-to-buy-row">\
                        <div class="where-to-buy-col-15"><img src="'+res[i]['images'][0]['path']+'" loading="lazy" width="220" alt="" class="where-to-buy-logo-img"></div>\
                        <div class="where-to-buy-col-27">\
                            <div><strong>'+res[i]['title']+'</strong><br></div>\
                            <div class="where-to-buy-mobile-text-b">\
                            <div>\
                                <a href="'+res[i]['website_address']+'" target="_blank" class="where-to-buy-link">'+res[i]['website_address']+'</a>\
                            </div>\
                            </div>\
                            <div class="where-to-buy-mobile-text-b">\
                            <div>\
                                <a href="mailto:'+res[i]['email']+'" class="where-to-buy-link">'+res[i]['email']+'</a>\
                            </div>\
                            </div>\
                            <div class="where-to-buy-mobile-text-b">\
                            <div>\
                                <a href="tel:+85'+res[i]['tel']+'" class="where-to-buy-link">'+res[i]['tel']+'</a>\
                            </div>\
                            </div>\
                        </div>\
                        <div class="where-to-buy-col-27 mobile-none">\
                            <div>\
                            <a href="'+res[i]['website_address']+'" target="_blank" class="where-to-buy-link">'+res[i]['website_address']+'</a>\
                            </div>\
                        </div>\
                        <div class="where-to-buy-col-15 mobile-none">\
                            <div>\
                            <a href="mailto:'+res[i]['email']+'" class="where-to-buy-link">'+res[i]['email']+'</a>\
                            </div>\
                        </div>\
                        <div class="where-to-buy-col-15 mobile-none">\
                            <div>\
                            <a href="tel:+852'+res[i]['tel']+'" class="where-to-buy-link">'+res[i]['tel']+'</a>\
                            </div>\
                        </div>\
                    </div>\
                    ';
                }
                dom += '\
              </div>\
            </div>';
            $('.where-to-buy-content-row').append(dom);
    }
    function retail_shop_temp(res){
        console.log(res);
        dom = '\
        <div class="where-to-buy-retails-b">\
                  <div class="sub-heading-b">\
                    <div class="where-to-buy-title">Hong Kong Island</div>\
                  </div>\
                  <div class="where-to-buy-table">\
                    <div class="where-to-buy-row first">\
                      <div class="where-to-buy-col-15 title-text">\
                        <div><strong>District</strong><br></div>\
                      </div>\
                      <div class="where-to-buy-col-15 title-text"></div>\
                      <div class="where-to-buy-col-27 title-text">\
                        <div><strong>Company Name</strong><br></div>\
                      </div>\
                      <div class="where-to-buy-col-27 title-text">\
                        <div><strong>Address</strong><br></div>\
                      </div>\
                      <div class="where-to-buy-col-15 title-text">\
                        <div><strong>Telephone</strong><br></div>\
                      </div>\
                    </div>';
                    for(var i =0;i<res.length;i++) {
                        var image = "";
                        if(res[i]['images'][0]['path']){
                            image = res[i]['images'][0]['path'];
                        }
                    dom += '\
                    <div class="where-to-buy-row">\
                        <div class="where-to-buy-col-15 mobile-none">\
                            <div>'+res[i]['district_id']+'</div>\
                        </div>\
                        <div class="where-to-buy-col-15"><img src="'+image+'" loading="lazy" width="220" alt="" class="where-to-buy-logo-img"></div>\
                        <div class="where-to-buy-col-27">\
                            <div><strong>'+res[i]['title']+'</strong><br></div>\
                            <div class="where-to-buy-mobile-text-b">\
                            <div>'+res[i]['district_id']+'</div>\
                            </div>\
                            <div class="where-to-buy-mobile-text-b">\
                            <div>\
                                <a href="'+res[i]['google_map_link']+'" target="_blank" class="where-to-buy-link">'+res[i]['address']+'</a>\
                            </div>\
                            </div>\
                            <div class="where-to-buy-mobile-text-b">\
                            <div>\
                                <a href="tel:+852'+res[i]['tel']+'" class="where-to-buy-link">'+res[i]['tel']+'</a>\
                            </div>\
                            </div>\
                        </div>\
                        <div class="where-to-buy-col-27 mobile-none">\
                            <div>\
                            <a href="'+res[i]['google_map_link']+'" target="_blank" class="where-to-buy-link">'+res[i]['address']+'</a>\
                            </div>\
                        </div>\
                        <div class="where-to-buy-col-15 mobile-none">\
                            <div>\
                            <a href="tel:+852'+res[i]['tel']+'" class="where-to-buy-link">'+res[i]['tel']+'</a>\
                            </div>\
                        </div>\
                        </div>\
                        ';
                    }
                        dom += '\
                    </div>\
                </div>\
        ';
        $('.where-to-buy-content-row').append(dom);
    }
    $(document).on('click','.shop_type a',function(){
        pkey = $(this).attr( "pkey" );
        selection = $(this).text();
        $('.shop_type_text').text(selection);
        $('.shop_type_text').attr('pkey',pkey);
        $('.shop_type_hidden').val(pkey);
        $.ajax({
            method: "GET",
            url: "/wheretobuy_filter",
            data: { 
                shop_type: $('.shop_type_hidden').val(),
                brand_type: $('.brand_type_hidden').val(),
            },
            success: function(res) {
                clear_dom();
                if(res['online_shop'] !== null && res['online_shop']){
                    console.log("online");
                    online_shop_temp(res['online_shop']);
                }
                if(res['retail_shop'] !== null && res['retail_shop']){
                    console.log("retail");
                    retail_shop_temp(res['retail_shop']);
                }
            }
        })
    });
    $(document).on('click','.brand_type a',function(){
        pkey = $(this).attr( "pkey" );
        selection = $(this).text();
        $('.brand_type_text').text(selection);
        $('.brand_type_text').attr('pkey',pkey);
        $('.brand_type_hidden').val(pkey);
        $.ajax({
            method: "GET",
            url: "/wheretobuy_filter",
            data: { 
                shop_type: $('.shop_type_hidden').val(),
                brand_type: $('.brand_type_hidden').val(),
            },
            success: function(res) {
                clear_dom();
                if(res['online_shop'] !== null && res['online_shop']){
                    console.log("online");
                    online_shop_temp(res['online_shop']);
                }
                if(res['retail_shop'] !== null && res['retail_shop']){
                    console.log("retail");
                    retail_shop_temp(res['retail_shop']);
                }
            }
        })
    });
    $(document).on('click','.region_type a',function(){
        pkey = $(this).attr( "pkey" );
        selection = $(this).text();
        $('.region_type_text').text(selection);
        $('.region_type_text').attr('pkey',pkey);
        $('.region_type_hidden').val(pkey);
        shop_type = $('.shop_type_hidden').val();
        if(shop_type !== 'online'){
            $.ajax({
                method: "GET",
                url: "/wheretobuy_filter",
                data: { 
                    shop_type: $('.shop_type_hidden').val(),
                    brand_type: $('.brand_type_hidden').val(),
                    region_type: $('.region_type_hidden').val(),
                },
                success: function(res) {
                    // $('.bus-product-item').remove();
                    console.log("123");
                    // console.log(res);
                    if(res['online_shop'] !== null){
                        online_shop_temp(res['online_shop']);
                    }
                }
            })
        }
    });
});