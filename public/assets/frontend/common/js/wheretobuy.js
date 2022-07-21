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
                    var image = "";
                    if(res[i]['images'].length > 0){
                        image = res[i]['images'][0]['path'];
                    }
                    dom += '\
                    <div class="where-to-buy-row">\
                        <div class="where-to-buy-col-15"><img src="'+image+'" loading="lazy" width="220" alt="" class="where-to-buy-logo-img"></div>\
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
    function retail_shop_temp(res, all_location, all_location_categorys){
        var location_pkey = $('.location_type_text').attr('pkey');
        var location = [];
        var location_name = [];
        for(var i =0;i<res.length;i++) {
            // if($location_pkey != '')
            location.push(res[i]['location_id']);
            location_name.push(res[i]['location_id']);
            if (typeof(location_pkey) != "undefined" && location_pkey != 'all'){
                // console.log("District Title: "+res[i]['district_title']);
                // console.log("Location_ID: "+res[i]['location_id']);
                // console.log("Location Pkey:"+location_pkey);
                if(res[i]['location_id'] != location_pkey){
                    res.splice(i, 1);
                    i--;
                }
            }
            // if(!location.includes(res[i]['location_id'])){
            //     location.push(res[i]['location_id']);
            // }
            // location[res[i]['location_id']]
            // console.log(location);
        }
        // console.log(location);
        // console.log(all_location);
        // for(var i =0;i<location.length;i++) {
        //     if(location[i] == 9 || location[i] == 10){
        //         for(var a = 0;a<all_location.length;a++){
        //             if(all_location[a]['id'] == location[i]){
        //                 location_name.push(all_location[a]['title']);
        //             }
        //         }
        //     }
        //     else{
        //         for(var a = 0;a<all_location.length;a++){
        //             if(all_location[a]['parent_id'] == location[i]){
        //                 // console.log("Location:"+location[i]);
        //                 // console.log("Location_array:"+all_location[a]['id']);
        //                 console.log(all_location[a]['parent_id']+":"+location[i]);
        //                 console.log(all_location[a]['title']);
        //                 location_name.push(all_location[a]['title']);
        //             }
        //         }
        //     }
        // }
        let location_uniq = location.filter((c, index) => {
            return location.indexOf(c) === index;
        });
        console.log(location_uniq);
        console.log(res);
        // console.log(res);
            dom = '\
            <div class="where-to-buy-content-b">\
                <div class="section-heading-b">\
                    <div class="section-heading-wrap">\
                      <div class="heading-gradient-b"></div>\
                      <h2>Retail shop</h2>\
                    </div>\
                </div>';
                    for(var a =0;a<location_uniq.length;a++){
                        dom += '<div class="where-to-buy-retails-row" style="display:none;">\
                    <div class="where-to-buy-retails-b">\
                      <div class="sub-heading-b">\
                        <div class="where-to-buy-title">';
                        // console.log(all_location_categorys)
                        for(var b =0;b<all_location.length;b++){
                            if(all_location[b]['parent_id'] == 9){ //Hard Code for Macau
                                if(all_location[b]['id'] == location_uniq[a]){
                                    dom += all_location[b]['title'];
                                }
                            }
                            // else{
                            //     if(all_location[b]['parent_id'] == location_uniq[a]){
                            //         dom += all_location[b]['title'];
                            //     }
                            // }
                        }
                        for(var b =0;b<all_location_categorys.length;b++){
                            if(all_location_categorys[b]['parent_id'] != 9){ //Hard Code for Macau
                                if(all_location_categorys[b]['id'] == location_uniq[a]){
                                    dom += all_location_categorys[b]['title'];
                                }
                            }
                        }
                        dom +='</div>\
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
                            type = "";
                            if(res[i]['location_id'] != location_uniq[a]){
                                continue;
                            }
                            var image = "";
                            if(res[i]['images'].length > 0){
                                image = res[i]['images'][0]['path'];
                            }
                            dom += '\
                            <div class="where-to-buy-row where-to-buy-row-second">\
                            <div class="where-to-buy-col-15 mobile-none">\
                                <div>'+res[i]['district_title']+'</div>\
                            </div>\
                            <div class="where-to-buy-col-15"><img src="'+image+'" loading="lazy" width="220" alt="" class="where-to-buy-logo-img"></div>\
                            <div class="where-to-buy-col-27">\
                                <div><strong>'+res[i]['title']+'</strong><br></div>\
                                <div class="where-to-buy-mobile-text-b">\
                                <div>'+res[i]['district_title']+'</div>\
                                </div>\
                                <div class="where-to-buy-mobile-text-b">\
                                <div>';
                                if(!(res[i]['address']== null)){
                                    dom += '<a href="'+res[i]['google_map_link']+'" class="where-to-buy-link">'+res[i]['address']+'</a>';
                                }
                                dom += '</div>\
                                </div>\
                                <div class="where-to-buy-mobile-text-b">\
                                <div>';
                                if(!(res[i]['tel']== null)){
                                    dom += '<a href="tel:+852'+res[i]['tel']+'" class="where-to-buy-link">'+res[i]['tel']+'</a>';
                                }
                                dom += '</div>\
                                </div>\
                            </div>\
                            <div class="where-to-buy-col-27 mobile-none">\
                            <div>';
                                if(!(res[i]['address']== null)){
                                    dom += '<a href="'+res[i]['google_map_link']+'" class="where-to-buy-link">'+res[i]['address']+'</a>';
                                }
                                dom += '</div>\
                            </div>\
                            <div class="where-to-buy-col-15 mobile-none">\
                                <div>';
                                if(!(res[i]['tel']== null)){
                                    dom += '<a href="tel:+852'+res[i]['tel']+'" class="where-to-buy-link">'+res[i]['tel']+'</a>';
                                }
                                dom += '</div>\
                            </div>\
                            </div>\
                            ';
                        }
                            dom += '\
                    </div>\
                </div>\
            </div>';
        }
            dom += '</div>';
            $('.where-to-buy-content-row').append(dom);
            // var element = $('.where-to-buy-retails-row');
            $('.where-to-buy-row-second').parent().parent().parent().show();
            // for(var i =0;i<element.length;i++){
            //     // $('.where-to-buy-retails-row').find('.where-to-buy-row-second').parent().parent().parent().css("display","none");
            //     // element.find('.where-to-buy-row-second').parent().parent().parent().css("display","none");
            //     if(element.eq(i).find('.where-to-buy-row-second') == 0){
            //         console.log("123");
            //     }
            // }
            
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
                region_type: $('.region_type_hidden').val(),
                location_type: $('.location_type_hidden').val(),
                district_type: $('.district_type_hidden').val(),
            },
            success: function(res) {
                clear_dom();
                if(res['online_shop'] !== null && res['online_shop']){
                    online_shop_temp(res['online_shop']);
                }
                if(res['retail_shop'] !== null && res['retail_shop']){
                    retail_shop_temp(res['retail_shop'],res['all_location'],res['all_location_categorys']);
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
                region_type: $('.region_type_hidden').val(),
                location_type: $('.location_type_hidden').val(),
                district_type: $('.district_type_hidden').val(),
            },
            success: function(res) {
                clear_dom();
                if(res['online_shop'] !== null && res['online_shop']){
                    online_shop_temp(res['online_shop']);
                }
                if(res['retail_shop'] !== null && res['retail_shop']){
                    retail_shop_temp(res['retail_shop'],res['all_location'],res['all_location_categorys']);
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
                    location_type: $('.location_type_hidden').val(),
                    district_type: $('.district_type_hidden').val(),
                },
                success: function(res) {
                    clear_dom();
                    if(res['retail_shop'] !== null && res['retail_shop']){
                        retail_shop_temp(res['retail_shop'],res['all_location'],res['all_location_categorys']);
                    }
                    // var location_ar = res['locations'];
                    // $('.location_type').empty();
                    // $('.location_type').append('<a href="#" pkey="all" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">All</a>');
                    // for(var i =0;i<location_ar.length;i++){
                    //     $('.location_type').append('<a href="#" pkey="'+location_ar[i]['id']+'" class="where-to-buy-filter-dropdown-link w-dropdown-link" data-ix="bus-filter-item-click">'+location_ar[i]['title']+'</a>');
                    // }
                }
            })
        }
    });
    $(document).on('click','.district_type a',function(){
        pkey = $(this).attr( "pkey" );
        selection = $(this).text();
        $('.district_type_text').text(selection);
        $('.district_type_text').attr('pkey',pkey);
        $('.district_type_hidden').val(pkey);
        shop_type = $('.shop_type_hidden').val();
        if(shop_type !== 'online'){
            $.ajax({
                method: "GET",
                url: "/wheretobuy_filter",
                data: { 
                    shop_type: $('.shop_type_hidden').val(),
                    brand_type: $('.brand_type_hidden').val(),
                    region_type: $('.region_type_hidden').val(),
                    location_type: $('.location_type_hidden').val(),
                    district_type: $('.district_type_hidden').val(),
                },
                success: function(res) {
                    clear_dom();
                    if(res['retail_shop'] !== null && res['retail_shop']){
                        retail_shop_temp(res['retail_shop'],res['all_location'],res['all_location_categorys']);
                    }
                }
            })
        }
    });
    $(document).on('click','.location_type a',function(){
        pkey = $(this).attr( "pkey" );
        selection = $(this).text();
        $('.location_type_text').text(selection);
        $('.location_type_text').attr('pkey',pkey);
        $('.location_type_hidden').val(pkey);
        shop_type = $('.shop_type_hidden').val();
        if(shop_type !== 'online'){
            $.ajax({
                method: "GET",
                url: "/wheretobuy_filter",
                data: { 
                    shop_type: $('.shop_type_hidden').val(),
                    brand_type: $('.brand_type_hidden').val(),
                    region_type: $('.region_type_hidden').val(),
                    location_type: $('.location_type_hidden').val(),
                    district_type: $('.district_type_hidden').val(),
                },
                success: function(res) {
                    // console.log(res);
                    clear_dom();
                    if(res['retail_shop'] !== null && res['retail_shop']){
                        retail_shop_temp(res['retail_shop'],res['all_location'],res['all_location_categorys']);
                    }
                }
            })
        }
    });
});