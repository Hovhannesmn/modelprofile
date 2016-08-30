@extends('layouts.application')

@section('content')
    {{--{{dd($product->country)}}--}}
<style>
    .buy-now-btn {
        position: relative;
        line-height: 42px;
        border: 1px solid #fd9729;
        color: #fff;
        background-color: #fd9729;
        padding: 0 35px;
        margin: 0 10px 5px 0;
        display: inline-block;
        vertical-align: top;
        line-height: 44px;
        height: 44px;
        border-radius: 3px;
        font-size: 18px;
        text-decoration: none;

    }
    .add-cart-btn{
        position: relative;
        line-height: 42px;
        border: 1px solid  #ff5400;
        color: #fff;
        background-color:  #ff5400;
        padding: 0 35px;
        margin: 0 10px 5px 0;
        display: inline-block;
        vertical-align: top;
        line-height: 44px;
        height: 44px;
        border-radius: 3px;
        font-size: 18px;

    }
    a:hover, a:focus {
        /*color: #23527c;*/
        text-decoration: none;
    }
</style>
    <div class="container">
    <div class="products-page">
        <!---728x90--->
        <div class="products">


                <div class="tags">
                    <h4 class="tag_head">Tags Widget</h4>
                    <ul class="tags_links">

                        @foreach(App\Model\Tag::select('id', 'name')->get() as $tag)
                            <li><a href="/tag/{{$tag->id}}">{{$tag->name}}</a></li>
                        @endforeach
                    </ul>

                </div>

        </div>
            <div class="new-product">
                <div class="col-md-5 zoom-grid">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{$product->image->url}}">
                                <div class="thumb-image"> <img src="{{$product->image->url}}" data-imagezoom="true" class="img-responsive" alt="" /> </div>
                            </li>
                            @foreach($images1=$product->images as $image)
                            <li  data-thumb="{{$image->url}}">
                                <div class="thumb-image"> <img src="{{$image->url}}"  data-imagezoom="true" class="img-responsive" alt="" /> </div>
                            </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            <div class="col-md-7 dress-info">
                <div class="dress-name">
                    <h3>{{$product->name}}</h3>
                    <span>${{$product->price}}</span>
                    <div class="clearfix"></div>
                    <p>
                        {{ str_split($product->description, 300)[0]}}

                    </p>
                </div>
                <div class="span span1">
                    <p class="left">FABRIC ORIGIN</p>
                    <p class="right">{{$product->producted->name}}</p>
                    <div class="clearfix"></div>
                </div>
                <div class="span span2">
                    <p class="left">MADE IN</p>
                    <p class="right">{{$product->origin->name}}</p>
                    <div class="clearfix"></div>
                </div>

                <div class="span span3">
                    <p class="left">COLOR</p>
                    <select class="domains valid" name="domains"  >
                        @foreach($product->color as $item)
                            <option class="opt-hover" value="{{$item->name}}" style="background-color: {{$item->color_code}}; " >{{$item->name}}
                            </option>
                        @endforeach
                    </select>
                    {{--<p class="right">White</p>--}}
                    <div class="clearfix"></div>
                </div>
                <div class="span span4">
                    <p class="left">SIZE</p>
                    <p class="right">
                        <span class="selection-box">
                            <select class="domains valid" name="domains">
                                @foreach($product->size as $item)
										   <option value="{{$item->name}}">{{$item->name}}</option>
                                @endforeach
                           </select>
                        </span>
                    </p>
                    <div class="clearfix"></div>
                </div>
                <div class="span span5">
                    <p class="left">Category</p>
                    <p class="right">{{$product->subcat->category['name'] . " / " . $product->subcat['name']}} </p>
                    <div class="clearfix"></div>
                </div>
                <div class="purchase">
                    {{--<a href="#">Purchase Now</a>--}}
                    {{--<div class="social-icons">--}}
                        {{--<ul>--}}
                            {{--<li><a class="facebook1" href="#"></a></li>--}}
                            {{--<li><a class="twitter1" href="#"></a></li>--}}
                            {{--<li><a class="googleplus1" href="#"></a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>


                <div class="product-action-block" id="j-product-action-block">

                    <span class="product-action-main">
                    <a href="" class="buy-now-btn" id="j-buy-now-btn" data-spm-anchor-id="2114.10010108.1000016.9" data-widget-cid="widget-15">Buy Now</a>
                        <a href="javascript:;" id="j-add-cart-btn" class="add-cart-btn"  data-widget-cid="widget-42">Add to Cart</a>
                    </span>
                    <span class="add-wishlist-action">

                    </span>
                    <div class="clearfix"></div>
                </div>


            {{ Html::script('assets/js/jquery/imagezoom.js') }}

            <!-- FlexSlider -->
                    {{ Html::script('assets/js/jquery/jquery.flexslider.js') }}

                <script>
                    // Can also be used with $(document).ready()
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                        });
                    });
                </script>
            </div>
            <div class="clearfix"></div>
            <!---728x90--->
            <div class="reviews-tabs">
                <!-- Main component for a primary marketing message or call to action -->
                <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
                    <li class="test-class active"><a class="deco-none misc-class" href="#how-to"> More Information</a></li>
                    <li class="test-class"><a href="#features">Specifications</a></li>
                    <li class="test-class"><a class="deco-none" href="#source">Reviews (7)</a></li>
                </ul>

                <div class="tab-content responsive hidden-xs hidden-sm">
                    <div class="tab-pane active" id="how-to">
                        <p class="tab-text">
                            {{$product->description}}
                        </p>
                            {{--Maecenas mauris velit, consequat sit amet feugiat rit, elit vitaeert scelerisque elementum, turpis nisl accumsan ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. and scrambled it to make a type specimen book. It has survived Auction your website on Flippa and you'll get the best price from serious buyers, dedicated support and a much better deal than you'll find with any website broker. Sell your site today I need a twitter bootstrap 3.0 theme for the full-calendar plugin. it would be great if the theme includes the add event; remove event, show event details. this must be RESPONSIVE and works on mobile devices. Also, I've seen so many bootstrap themes that comes up with the fullcalendar plugin. However these . </p>--}}
                    </div>
                    <div class="tab-pane" id="features">
                        <p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.This tab has icon in consectetur adipiscing eliconse consectetur adipiscing elit. Vestibulum nibh urna, ctetur adipiscing elit. Vestibulum nibh urna, t.consectetur adipiscing elit. Vestibulum nibh urna,  Vestibulum nibh urna,it.</p>
                        <p class="tab-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="tab-pane" id="source">
                        <div class="response">
                            <div class="media response-info">
                                <div class="media-left response-text-left">
                                    <a href="#">
                                        <img class="media-object" src="https://p.w3layouts.com/demos/e_shop/web/images/icon1.png" alt="">
                                    </a>
                                    <h5><a href="#">Username</a></h5>
                                </div>
                                <div class="media-body response-text-right">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <ul>
                                        <li>MARCH 21, 2015</li>
                                        <li><a href="single.html">Reply</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="media response-info">
                                <div class="media-left response-text-left">
                                    <a href="#">
                                        <img class="media-object" src="https://p.w3layouts.com/demos/e_shop/web/images/icon1.png" alt="">
                                    </a>
                                    <h5><a href="#">Username</a></h5>
                                </div>
                                <div class="media-body response-text-right">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <ul>
                                        <li>MARCH 26, 2054</li>
                                        <li><a href="single.html">Reply</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="media response-info">
                                <div class="media-left response-text-left">
                                    <a href="#">
                                        <img class="media-object" src="https://p.w3layouts.com/demos/e_shop/web/images/icon1.png" alt="">
                                    </a>
                                    <h5><a href="#">Username</a></h5>
                                </div>
                                <div class="media-body response-text-right">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <ul>
                                        <li>MAY 25, 2015</li>
                                        <li><a href="single.html">Reply</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="media response-info">
                                <div class="media-left response-text-left">
                                    <a href="#">
                                        <img class="media-object" src="https://p.w3layouts.com/demos/e_shop/web/images/icon1.png" alt="">
                                    </a>
                                    <h5><a href="#">Username</a></h5>
                                </div>
                                <div class="media-body response-text-right">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <ul>
                                        <li>FEB 13, 2015</li>
                                        <li><a href="single.html">Reply</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="media response-info">
                                <div class="media-left response-text-left">
                                    <a href="#">
                                        <img class="media-object" src="https://p.w3layouts.com/demos/e_shop/web/images/icon1.png" alt="">
                                    </a>
                                    <h5><a href="#">Username</a></h5>
                                </div>
                                <div class="media-body response-text-right">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <ul>
                                        <li>JAN 28, 2015</li>
                                        <li><a href="single.html">Reply</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="media response-info">
                                <div class="media-left response-text-left">
                                    <a href="#">
                                        <img class="media-object" src="https://p.w3layouts.com/demos/e_shop/web/images/icon1.png" alt="">
                                    </a>
                                    <h5><a href="#">Username</a></h5>
                                </div>
                                <div class="media-body response-text-right">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <ul>
                                        <li>APR 18, 2015</li>
                                        <li><a href="single.html">Reply</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="media response-info">
                                <div class="media-left response-text-left">
                                    <a href="#">
                                        <img class="media-object" src="https://p.w3layouts.com/demos/e_shop/web/images/icon1.png" alt="">
                                    </a>
                                    <h5><a href="#">Username</a></h5>
                                </div>
                                <div class="media-body response-text-right">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <ul>
                                        <li>DEC 25, 2014</li>
                                        <li><a href="single.html">Reply</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div><div class="panel-group responsive visible-xs visible-sm" id="collapse-myTab"><div class="panel panel-default test-class"><div class="panel-heading"><h4 class="panel-title"><a class="accordion-toggle deco-none misc-class" data-toggle="collapse" data-parent="#collapse-myTab" href="#collapse-how-to"> More Information</a></h4></div><div id="collapse-how-to" class="panel-collapse collapse in" style="height: auto;"></div></div><div class="panel panel-default test-class"><div class="panel-heading"><h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#collapse-myTab" href="#collapse-features">Specifications</a></h4></div><div id="collapse-features" class="panel-collapse collapse"></div></div><div class="panel panel-default test-class"><div class="panel-heading"><h4 class="panel-title"><a class="accordion-toggle deco-none" data-toggle="collapse" data-parent="#collapse-myTab" href="#collapse-source">Reviews (7)</a></h4></div><div id="collapse-source" class="panel-collapse collapse"></div></div></div>
            </div>

        </div>
        <!---728x90--->
        <div class="clearfix"></div>
    </div>
</div>

@endsection
