window.addEventListener('DOMContentLoaded', (event) => {
$(window).on('load', function(){ 
    var collection = $('.bus-collection-item').length;
    if(collection <= 1){
    var ix = Webflow.require('ix');
    var ixItemHover = {
        "stepsA": [{
        "height": "auto",
        "transition": "height 500ms ease 0"
        }],
        };
        var ixItemHover2 = {
        "stepsA": [{
            "display": "none"
        }],
        };
        var ixItemHover3 = {
        "stepsA": [{
            "display": "flex"
        }],
        };
    var el = document.querySelector('.bus-collection-expand-b');
    var el2 = document.querySelector('.bus-collection-expand-btn');
    var el3 = document.querySelector('.bus-collection-close-btn');
    ix.run(ixItemHover, el);
    ix.run(ixItemHover2, el2);
    ix.run(ixItemHover3, el3); 
    }
});
function temp(res){
    for(var i =0;i<res.length;i++) {
    dom = '\
    <div class="bus-product-item" data-ix="common-fade-from-bottom" style="opacity:1">\
        <div class="product-item-circle">\
        <div data-delay="2000" data-animation="cross" class="product-item-slider w-slider" data-autoplay="true" data-easing="ease" data-hide-arrows="false" data-disable-swipe="true" data-autoplay-limit="0" data-nav-spacing="3" data-duration="1000" data-infinite="true">\
            <div class="w-slider-mask">';
            for(var b=0;b<res[i]['images'].length;b++) {
                dom += '\
                <div class="product-item-slide w-slide">\
                <div class="product-item-img-b"><img src="'+res[i]['images'][b]['path']+'" alt="" class="img-full"></div>\
                </div>';
            }
                dom += '</div>\
            <div class="hide w-slider-arrow-left">\
            <div class="w-icon-slider-left"></div>\
            </div>\
            <div class="hide w-slider-arrow-right">\
            <div class="w-icon-slider-right"></div>\
            </div>\
            <div class="hide w-slider-nav w-round"></div>\
        </div>\
        </div>\
        <div class="product-name-txt">'+res[i]['title']+'</div>\
        <div class="product-supplier-series">\
        <div class="product-sipplier-txt">\
            <a href="#" pkey="'+res[i]['supplier']['id']+'" class="txt-link">'+res[i]['supplier']['title']+'</a>\
        </div>\
        <div class="product-series-b">\
            <div class="product-series-line"></div>\
            <div>'+res[i]['series']+'</div>\
        </div>\
        </div>\
        <div class="product-item-collection-b">\
        <div>';
        for(a=0;a<res[i]['collection'].length;a++){
            dom += '<a href="#" pkey="'+res[i]['collection'][a]['id']+'" class="product-item-collection-link">'+res[i]['collection'][a]['title']+'</a><p style="width:10px;display:inline-block;text-align:left">. </p>';
        }
        dom += '</div>\
        </div>\
    </div>\
    ';
    $('.bus-product-list-b').append(dom);
    }
}
$(document).on('click','.product-sipplier-txt a',function(){
    pkey = $(this).attr( "pkey" );
    selection = $(this).text();
    $('.current_supplier').text(selection);
    $('.current_supplier').attr('pkey',pkey);
    $('.supplier').val(pkey);
    $.ajax({
        method: "GET",
        url: "/product_filter",
        data: { 
            business: $('.business').val(),
            supplier: $('.supplier').val(),
            collection: $('.collection').val(),
        },
        success: function(res) {
            $('.bus-product-item').remove();
            temp(res);
        }
    })
    });
    $(document).on('click','.supplier_dropdown a',function(){
    pkey = $(this).attr( "pkey" );
    selection = $(this).text();
    $('.current_supplier').text(selection);
    $('.current_supplier').attr('pkey',pkey);
    $('.supplier').val(pkey);
    $.ajax({
        method: "GET",
        url: "/product_filter",
        data: { 
            business: $('.business').val(),
            supplier: $('.supplier').val(),
            collection: $('.collection').val(),
        },
        success: function(res) {
            $('.bus-product-item').remove();
            temp(res);
        }
    })
    });
    $(document).on('click','.product-item-collection-b a',function(){
    pkey = $(this).attr( "pkey" );
    selection = $(this).text();
    $('.current_collection').text(selection);
    $('.current_collection').attr('pkey',pkey);
    $('.collection').val(pkey);
    $.ajax({
        method: "GET",
        url: "/product_filter",
        data: { 
            business: $('.business').val(),
            supplier: $('.supplier').val(),
            collection: $('.collection').val(),
        },
        success: function(res) {
            $('.bus-product-item').remove();
            temp(res);
        }
    })
});
    $(document).on('click','.collection_dropdown a',function(){
    pkey = $(this).attr( "pkey" );
    selection = $(this).text();
    $('.current_collection').text(selection);
    $('.current_collection').attr('pkey',pkey);
    $('.collection').val(pkey);
    $.ajax({
        method: "GET",
        url: "/product_filter",
        data: { 
            business: $('.business').val(),
            supplier: $('.supplier').val(),
            collection: $('.collection').val(),
        },
        success: function(res) {
            $('.bus-product-item').remove();
            temp(res);
        }
    })
    });
});