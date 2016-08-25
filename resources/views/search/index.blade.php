@extends('layouts.application')

@section('content')
    <link href="/assets/css/component.css" rel='stylesheet' type='text/css' />
    <div class="container">
        <div class="products-page">
            <style>
                .searching{
                    width: 184px;
                    max-height: 175px;
                    min-height: 50px;
                    margin: 0;
                    padding: 7px 0;
                    overflow-x: hidden;
                    overflow-y: auto;
                    border-bottom: 1px solid #DADADA;

                }
                .searching-cat a{
                    display: block;
                    padding-bottom: 2px;
                    padding-left: 10px;
                    font-size: 12px;
                    padding-left: 25px;
                }
                .searching a.tag, a.country, a.subcat, a.price  {
                    display: block;
                    padding-bottom: 2px;
                    padding-left: 10px;
                    font-size: 12px;
                    padding-left: 25px;
                    background: url(http://www.zappos.com/search/imgs/tmp-nv-checkbox.20160817111830.png) no-repeat 10px 1px;
                }

                .naviCenter{
                    width: 184px;
                    margin: 0 0 15px;
                    background: #fff;
                    border: 1px solid #DADADA;
                }
                h4.navOpen{
                    width: 184px;
                    margin: 0;
                    padding: 5px 10px;
                    font-size: 10px;
                    line-height: 1.75em;
                    border: solid #ccc;
                    border-width: 0 0 1px;
                    color: #2C5987;
                    text-transform: uppercase;
                    cursor: pointer;
                    border-radius: 0px;
                    -webkit-border-radius: 0px;
                }
                .naviCenter h4 span {
                    display: block;
                    width: 13px;
                    height: 13px;
                    margin: 2px 7px 0 0;
                    float: left;
                    background-image: url(http://www.zappos.com/search/imgs/spSearch.20160817111830.png) !important;
                    background-repeat: no-repeat;
                }
                .symbolic{
                    width: 184px;
                    max-height: 175px;
                    min-height: 50px;
                    margin: 0;
                    padding: 7px 0;
                    overflow-x: hidden;
                    overflow-y: auto;
                    border-bottom: 1px solid #DADADA;
                    padding: 8px 0;
                }
                .symbolic a,  .symbolic a:hover {
                    display: block;
                    width: 26px;
                    margin: 0 0 8px 7px;
                    padding: 3px 0;
                    float: left;
                    border: 1px solid #ccc;
                    text-align: center;
                    font-size: 10px;
                    background: #fafafa;
                    border-radius: 3px;
                    -webkit-border-radius: 3px;
                    -ms-border-radius: 3px;
                    -moz-border-radius: 3px;
                    -o-border-radius: 3px;

                }
                .symbolic  a:hover {
                    text-decoration: none;
                    border-color: #2C5987;
                    /*background-color: #D9EEFA;*/
                }
                .searching a:hover {
                    text-decoration: none;
                    color: #2C5987;
                    background-color: #D9EEFA;
                }
                a:link {
                    color: #2c5987;
                    text-decoration: none;
                }

                .choose{
                    background-position: 10px -83px;
                }

            </style>

            <!-- content-section-ends -->

            <div class="products">
                <div class="tags">
                    <div class="naviCenter">
                        <h4 class="stripeOuter navOpen">
                            <span></span>
                            Tag
                        </h4>
                        <div class="searching" class=" nwMulti">
                            @foreach(App\Model\Tag::all() as $item)
                                <a href="#"  title="A-line - (287 Items)" class="tag">
                                    {{$item->name}}
                                </a>
                            @endforeach
                        </div>


                        <h4 class="stripeOuter navOpen">
                            <span></span>
                            MADE IN
                        </h4>
                        <div class="searching" class=" nwMulti">
                                @foreach(\App\Model\Country::all() as $item)
                                <a href="#"  title="A-line - (287 Items)" class="country">
                                    {{$item->name}}
                                </a>
                            @endforeach
                        </div>
                        <h4 class="stripeOuter navOpen">
                            <span></span>
                            CATEGORY
                        </h4>
                        <div class="searching-cat" class=" nwMulti">
                            @foreach(\App\Model\Category::all() as $item)

                                <a href="#"  title="A-line - (287 Items)" class="">
                                    {{$item->name}}
                                </a>
                                <div class="searching" class=" nwMulti">
                                @foreach($item->subcat as $itemsub)
                                    <a href="#"  title="A-line - (287 Items)" class="subcat">{{$itemsub->name}}</a>
                                @endforeach
                                </div>
                            @endforeach
                        </div>

                        <h4 class="stripeOuter navOpen">
                            <span></span>
                            Size
                        </h4>
                        <div id="" class=" symbolic nwMulti">
                            @foreach(\App\Model\Size::all() as $item)
                                <a href="#" data-statement=""  title="A-line - (287 Items)" class="size">{{$item->name}}</a>
                            @endforeach

                        </div>
                        <h4 class="stripeOuter navOpen">
                            <span></span>
                            Color
                        </h4>
                        <div id="" class=" symbolic nwMulti">
                            @foreach(\App\Model\Color::all() as $item)
                                <a href="#" data-statement="" style="background-color: {{$item->color_code}}"  title="A-line - (287 Items)" class="color">{{$item->name}}</a>
                            @endforeach

                        </div>
                        <h4 class="stripeOuter navOpen">
                            <span></span>
                            Price
                        </h4>
                        <div class="searching" class=" nwMulti">
                            {{--@foreach(\App\Model\Country::all() as $item)--}}
                                <a href="#"  title="A-line - (287 Items)" value="1" class="price">
                                    $10-$100
                                </a>
                            <a href="#"  title="A-line - (287 Items)" value="2" class="price">
                                $100-$200
                            </a>
                            <a href="#"  title="A-line - (287 Items)"  value="3" class="price">
                                $200-$1000
                            </a>
                            <a href="#"  title="A-line - (287 Items)" value="4" class="price">
                                $1000-$10000
                            </a>
                            {{--@endforeach--}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="new-product">
                <div class="new-product-top">
                    <ul class="product-top-list">
                        <li><a href="index.html">Home</a>&nbsp;<span>&gt;</span></li>
                        <li><span class="act">Best Sales</span>&nbsp;</li>
                    </ul>
                    <p class="back"><a href="index.html">Back to Previous</a></p>
                    <div class="clearfix"></div>
                </div>
                <div class="mens-toolbar">
                    <div class="sort">
                        <div class="sort-by">
                            <label>Sort By</label>
                            <select>
                                <option value="">
                                    Position
                                </option>
                                <option value="">
                                    Name
                                </option>
                                <option value="">
                                    Price
                                </option>
                            </select>
                        </div>
                    </div>
                    <ul class="women_pagenation">
                        <li>PagePage:</li>
                        {{--<li class="active"><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--{{dd($products->count())}}--}}
                        @for($i = 1; $i<= $products->lastPage(); $i++)
                            @if($i == $products->currentPage())

                                <li class="active"><a href="{{$products->url($i)}}&perpage={{$perpage}}">{{$i}}</a></li>
                            @else
                                <li><a href="{{$products->url($i)}}&perpage={{$perpage}}">{{$i}}</a></li>
                            @endif
                        @endfor
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
                    <div class="cbp-vm-options">
                        <a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
                        <a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
                    </div>
                    <div class="pages">
                        <div class="limiter visible-desktop">
                            <label>Show</label>
                            <select id="perpage">

                                <option @if($perpage == 3) {{'selected'}}  @endif value="1">3</option>
                                <option @if($perpage == 6) {{'selected'}} @endif  value="2">6</option>
                                <option @if($perpage == 9) {{'selected'}} @endif  value="3">9</option>
                            </select> per page
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <ul id="show-products">
                        @foreach($products as $product)
                            {{--<li style="margin-top: 150px">--}}
                            <li>
                                <a class="cbp-vm-image" href="/item/{{$product->id}}" >
                                    <div style="width: 256px; " class="simpleCart_shelfItem ">
                                        <div class="view view-first">
                                            <div class="inner_content clearfix">
                                                <div class="product_image">
                                                    <img src="{{$product->image->url}}" class="img-responsive" alt=""/>
                                                    <div class="mask">
                                                        <div class="info">Quick View</div>
                                                    </div>
                                                    <div class="product_container">
                                                        <div class="cart-left">
                                                            <p class="title">{{$product->name}}</p>
                                                        </div>
                                                        <div class="pricey"><span class="item_price">${{$product->price}}</span></div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="cbp-vm-details">
                                    {{$product->description}}
                                </div>
                                <a class="cbp-vm-icon cbp-vm-add item_add" href="#">Add to cart</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <script type="text/javascript">
        $( document ).ready(function() {
            var tag =[];
            var made_id = '';
            var subcat = '';
            var price = '';
            var size = [];
            var color = [];
            var origin = '';
            size='size[]=';
            tag ='tag[]=';
            color='color[]=';
        $('#perpage').on('change', function() {
            var url_search = `/search?${tag}&made_in=${origin}&subcat=${subcat}&${size}&${color}`
            var url = "{{$products->url($products->currentPage())}}";

            switch (this.value) {
                case '1':
                    url = url + '&perpage=3';
                    break;
                case '2':
                    url = url + '&perpage=6';
                    break;
                case '3':
                    url = url + '&perpage=9';
                    break;
            }
            window.location.href =  url;
        });



            $(document).on("click", ".country",  function (event) {
                event.preventDefault();
                if($(this).data("statement") == "selected"){
                    $(this).data("statement", "");
                    $(this).css('background-position', '10px 2px')
                    origin = '';
                    var url_search = `/search?${tag}&made_in=${origin}&subcat=${subcat}&${size}&${color}&price=${price}`;
                    window.history.pushState("", "", url_search);
                    sendRequest(url_search);

                }else{
                    $(this).closest(".searching").find(".country").data("statement", "");
                    $(this).closest(".searching").find(".country").css('background-position', '10px 2px');
                    $(this).data("statement", "selected");
                    $(this).css('background-position', '10px -83px');
                    origin = $(this).html().trim();
                    var url_search = `/search?${tag}&made_in=${origin}&subcat=${subcat}&${size}&${color}&price=${price}`;
                    window.history.pushState("", "", url_search);
                    sendRequest(url_search);

                }
            })


        $(document).on("click", ".subcat",  function (event) {
            event.preventDefault();
            if($(this).data("statement") == "selected"){
                $(this).data("statement", "");
                $(this).css('background-position', '10px 2px')
                subcat = '';
                var url_search = `/search?${tag}&made_in=${origin}&subcat=${subcat}&${size}&${color}&price=${price}`;
                window.history.pushState("", "", url_search);
                sendRequest(url_search);

            }else{
                $(this).closest(".searching-cat").find(".subcat").data("statement", "");
                $(this).closest(".searching-cat").find(".subcat").css('background-position', '10px 2px');
                $(this).data("statement", "selected");
                $(this).css('background-position', '10px -83px');
                subcat =encodeURIComponent( $(this).html().trim());
                var url_search = `/search?${tag}&made_in=${origin}&subcat=${subcat}&${size}&${color}&price=${price}`;



                window.history.pushState("", "", url_search);
                sendRequest(url_search);


            }
        })
            $(document).on("click", ".price",  function (event) {
                event.preventDefault();
                if($(this).data("statement") == "selected"){
                    $(this).data("statement", "");
                    $(this).css('background-position', '10px 2px')
                    var url_search = `/search?${tag}&made_in=${origin}&subcat=${subcat}&${size}&${color}&price=${price}`;
                    price = '';
                    window.history.pushState("", "", url_search);
//                    sendRequest(url_search);

                }else{
                    $(this).closest(".searching").find(".price").data("statement", "");
                    $(this).closest(".searching").find(".price").css('background-position', '10px 2px');
                    $(this).data("statement", "selected");
                    $(this).css('background-position', '10px -83px');
                    console.log($(this).html().trim())
                    price = encodeURIComponent( $(this).html().trim()).replace(/\%24/g, "");;
                    var url_search = `/search?${tag}&made_in=${origin}&subcat=${subcat}&${size}&${color}&price=${price}`;


                    window.history.pushState("", "", url_search);
                    sendRequest(url_search);


                }
            })



            $(document).on("click", ".color",  function (event) {
            event.preventDefault();
            if($(this).data("statement") == "selected"){
                $(this).data("statement", "");
                $(this).css('background', '#fafafa');
                $(this).css('color', '#2C5987');
                var colors = $('.color');
                var para= new Array();
                var i = 0
                $.each(colors, function (key, val) {
                    if($(this).data("statement")== "selected"){
                        i++;
                        para.push('color[]=' + $(this).html().trim() || 0);
                    }
                })
                color = para.join('&');
                if(i==0){
                    color='color[]=';
                }
                var url_search = `/search?${tag}&made_in=${origin}&subcat=${subcat}&${size}&${color}&price=${price}`;
                window.history.pushState("", "", url_search);
                sendRequest(url_search);
            }else{
                $(this).data("statement", "selected");
                $(this).css('background', '#2C5987')
                $(this).css('color', 'white')
                var colors = $('.color');
                var para= new Array();
                $.each(colors, function (key, val) {
                    if($(this).data("statement")== "selected"){
                        para.push('color[]=' + $(this).html().trim() || 0);
                    }
                })
                color = para.join('&');
                var url_search = `/search?${tag}&made_in=${origin}&subcat=${subcat}&${size}&${color}&price=${price}`;
                window.history.pushState("", "", url_search);
                sendRequest(url_search);

                }
        })


        $(document).on("click", ".size",  function (event) {
            event.preventDefault();
            if($(this).data("statement") == "selected"){
                $(this).data("statement", "");
                $(this).css('background', '#fafafa')
                $(this).css('color', '#2C5987')
                var sizes = $('.size');
                var para= new Array();
                var i = 0;
                $.each(sizes, function (key, val) {
                    if($(this).data("statement")== "selected"){
                        i++;
                        para.push('size[]=' + $(this).html().trim() || 0);
                    }
                })

                size = para.join('&');
                if(i==0){
                    size='size[]=';
                }
                var url_search = `/search?${tag}&made_in=${origin}&subcat=${subcat}&${size}&${color}&price=${price}`;
                window.history.pushState("", "", url_search);
                sendRequest(url_search);
            }else{
                $(this).data("statement", "selected");
                $(this).css('background', '#2C5987')
                $(this).css('color', 'white')

                var sizes = $('.size');
                var para= new Array();
                $.each(sizes, function (key, val) {
                    if($(this).data("statement")== "selected"){
                        para.push('size[]=' + $(this).html().trim() || 0);
                    }
                })
                size = para.join('&');
                var url_search = `/search?${tag}&made_in=${origin}&subcat=${subcat}&${size}&${color}&price=${price}`;
                window.history.pushState("", "", url_search);
                sendRequest(url_search);

            }
        })


            $(document).on("click", ".tag ",  function (event) {
                event.preventDefault();
                if($(this).data("statement") == "selected"){
                    $(this).data("statement", "");
                    $(this).css('background-position', '10px 2px');
                    var tags = $('.tag');
                    var para= new Array();
                    var i = 0
                    $.each(tags, function (key, val) {
                        if($(this).data("statement")== "selected"){
                            i++;
                            para.push('tag[]=' + $(this).html().trim() || 0);
                        }
                    });
                    tag = para.join('&');
                    if(i==0){
                        tag='tag[]=';
                    }
                    var url_search = `/search?${tag}&made_in=${origin}&subcat=${subcat}&${size}&${color}&price=${price}`;
                    window.history.pushState("", "", url_search);
                    sendRequest(url_search);

                }else{
                    $(this).data("statement", "selected");
                    $(this).css('background-position', '10px -83px')
                    var tags = $('.tag');
                    var para= new Array();
                    $.each(tags, function (key, val) {
                        if($(this).data("statement")== "selected"){
                            para.push('tag[]=' + $(this).html().trim() || 0);
                        }
                    })
                    tag = para.join('&');
                    var url_search = `/search?${tag}&made_in=${origin}&subcat=${subcat}&${size}&${color}&price=${price}`;
                    console.log(url_search);
                    window.history.pushState("", "", url_search);
                    sendRequest(url_search);

                }
            })



//            sendRequest(window.location.href.toString());
        function sendRequest(url ) {

            $.ajax({
                method: 'GET',
                url: url,
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function (response) {
                    console.log(response);
                    $('#show-products').empty()
                    $.each(response.products.data, function (key, item) {
                       $('#show-products').append(

                      '<li>'
                       +'<a class="cbp-vm-image"' +  'href="/item/' + item.id + '" >'
                               + '<div style="width: 256px; " class="simpleCart_shelfItem ">'
                                +'<div class="view view-first">'
                                +'<div class="inner_content clearfix">'
                                + '<div class="product_image">'
                                 +'<img src="' + item.image.url +  '" class="img-responsive" alt=""/>'
                                +'<div class="mask">'
                                +'<div class="info">Quick View</div>'
                        +'</div>'
                        +'<div class="product_container">'
                                +'<div class="cart-left">'
                                +'<p class="title">' + item.name + '</p>'
                                +'</div>'
                                +'<div class="pricey"><span class="item_price">$' +item.price + '</span></div>'
                                +'<div class="clearfix"></div>'
                                +'</div>'
                                +'</div>'
                                +'</div>'
                                +'</div>'
                                +'</div>'
                                +'</a>'
                                +'<div class="cbp-vm-details">'
                                +item.description
                        +'</div>'
                        +'<a class="cbp-vm-icon cbp-vm-add item_add" href="#">' + 'Add to cart' + '</a>'
                        +'</li>');

                    });
                    if (response.success) {
//                        window.location.href = '/galery/' + response.product_id
                    } else {
//                    console.log()
                    }


                }
            });
        }
            var new_url =window.location.href.toString()
            function URLToArray(url) {
                var request = {};
                var pairs = url.substring(url.indexOf('?') + 1).split('&');
                for (var i = 0; i < pairs.length; i++) {
                    if(!pairs[i])
                        continue;
                    var pair = pairs[i].split('=');
                    request[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
                }
                return request;
            }
                arr = [];
            arr = URLToArray(new_url);

//            $( "a.subcat:contains(c)").css('background-position', '10px -83px');
            $.each($('.subcat'), function (key,  val) {
                if( arr['subcat'] == $(this).html() )
                {
                    $(this).css('background-position', '10px -83px');
                    $(this).data("statement", "selected");
                    subcat = $(this).html();
                }
            } )
            $.each($('.price'), function (key,  val) {
                if( arr['price'] == encodeURIComponent( $(this).html().trim()).replace(/\%24/g, "") )
                {
                    $(this).css('background-position', '10px -83px');
                    $(this).data("statement", "selected");
                    price = $(this).html();
                }
            } )
            $.each($('.country'), function (key,  val) {
                if( arr['made_in'] == encodeURIComponent( $(this).html().trim()) )
                {
                    $(this).css('background-position', '10px -83px');
                    $(this).data("statement", "selected");
                    origin = encodeURIComponent( $(this).html().trim()) ;
                }
            } )
            console.log(arr)

            $.each($('.size'), function (key,  val) {
                if( arr['size[]'] == $(this).html() )
                {
                    $(this).css('background', '#2C5987')
                    $(this).css('color', 'white')
                    $(this).data("statement", "selected");
                    alert(1);
//                    .push('size[]=' + $(this).html().trim() || 0).join('&');
                }
            } )
            $.each($('.color'), function (key,  val) {
                if( arr['color[]'] == $(this).html() )
                {
                    $(this).css('background', '#2C5987')
                    $(this).css('color', 'white')
                    $(this).data("statement", "selected");
                }
            } )

        });

    </script>

@endsection