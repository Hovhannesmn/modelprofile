@extends('layouts.application')

@section('content')

<div class="banner">
    <div class="container">
        <div class="banner-bottom">
            <div class="banner-bottom-left">
                <h2>B<br>U<br>Y</h2>
            </div>
            <div class="banner-bottom-right">
                <div  class="callbacks_container">
                    <ul class="rslides" id="slider4">
                        <li>
                            <div class="banner-info">
                                <h3>Smart But Casual</h3>
                                <p>Start your shopping here...</p>
                            </div>
                        </li>
                        <li>
                            <div class="banner-info">
                                <h3>Shop Online</h3>
                                <p>Start your shopping here...</p>
                            </div>
                        </li>
                        <li>
                            <div class="banner-info">
                                <h3>Pack your Bag</h3>
                                <p>Start your shopping here...</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!--banner-->
                <script src="https://p.w3layouts.com/demos/e_shop/web/js/responsiveslides.min.js"></script>
                <script>
                    $(function () {
                        // Slideshow 4
                        $("#slider4").responsiveSlides({
                            auto: true,
                            pager:true,
                            nav:false,
                            speed: 500,
                            namespace: "callbacks",
                            before: function () {
                                $('.events').append("<li>before event fired.</li>");
                            },
                            after: function () {
                                $('.events').append("<li>after event fired.</li>");
                            }
                        });

                    });
                </script>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="shop">
            <a href="single.html">SHOP COLLECTION NOW</a>
        </div>
    </div>
</div>
<!---728x90--->
<div style="text-align: center;">
    <ins class="adsbygoogle"
         style="display:inline-block;width:728px;height:90px"
         data-ad-client="ca-pub-9153409599391170"
         data-ad-slot="6850850687"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script></div>
<!-- content-section-starts-here -->
<div class="container">
    <div class="main-content">
            <div class="products-grid">
                @foreach($products as $product)
                <div class="col-md-4 product simpleCart_shelfItem text-center">
                    <a href="/item/{{$product->id}}" >
                        <img src="{{$product->image->url}} " style="width: 350px; height: 500px" alt="" /></a>
                    <div class="mask">
                        <a href="/item/{{$product->id}}">Quick View</a>
                    </div>
                    <a href="/item/{{$product->id}}">Sed ut perspiciatis</a>
                    <p><a class="item_add" href="#"><i></i> <span class="item_price">{{$product->price}}</span></a></p>
                </div>
                @endforeach

            </div>



    </div>

</div>
<div class="other-products">
    <div class="container">
        <h3 class="like text-center">Featured Collection</h3>
        <div class="nbs-flexisel-container"><div class="nbs-flexisel-inner"><ul id="flexiselDemo3" class="nbs-flexisel-ul" style="display: block; left: -285px;">
                @for($i=0; $i<10; $i++)
                    <li class="nbs-flexisel-item" style="width: 285px;"><a href="single.html"><img src="https://p.w3layouts.com/demos/e_shop/web/images/l1.jpg" class="img-responsive" alt=""></a>
                        <div class="product liked-product simpleCart_shelfItem">
                            <a class="like_name" href="single.html">perfectly simple</a>
                            <p><a class="item_add" href="#"><i></i> <span class=" item_price">$759</span></a></p>
                        </div>
                    </li>
                @endfor

                </ul>
                <div class="nbs-flexisel-nav-left" style="top: 202.5px;"></div>
                <div class="nbs-flexisel-nav-right" style="top: 202.5px;"></div>
            </div>
        </div>
        <script type="text/javascript">
            $(window).load(function() {
                $("#flexiselDemo3").flexisel({
                    visibleItems: 4,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint:480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint:640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint:768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>
        <script type="text/javascript" src="https://p.w3layouts.com/demos/e_shop/web/js/jquery.flexisel.js"></script>
    </div>
</div>

    @endsection