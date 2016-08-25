<!DOCTYPE html>
<html>
<head>
    <title>shopsite</title>
    <link href="/assets/bootstrap/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
    <!-- Custom Theme files -->
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
{{--<link href="https://p.w3layouts.com/demos/e_shop/web/css/style.css" rel="stylesheet" type="text/css" media="all" />--}}

<!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
    {{--<script src="https://p.w3layouts.com/demos/e_shop/web/js/simpleCart.min.js"> </script>--}}
    <!-- cart -->
    <link rel="stylesheet" href="/assets/css/flexslider.css" type="text/css" media="screen" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<?php $categories = \App\Model\Category::all() ?>

<!-- header-section-starts -->
<div class="header">
    <div class="header-top-strip">
        <div class="container">
            @if (Auth::guest())

            <div class="header-top-left">
                <ul>
                    <li><a href="/login"><span class="glyphicon glyphicon-user"> </span>Login</a></li>
                    <li><a href="/register"><span class="glyphicon glyphicon-lock"> </span>Create an Account</a></li>
                </ul>
            </div>
            @else
            <div class="header-right">
                <div class="cart box_1">
                    <a href="checkout.html">
                        <h3> <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)<img src="https://p.w3layouts.com/demos/e_shop/web/images/bag.png" alt=""></h3>
                    </a>
                    <p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
                    <a href="/product/create" style="color: #FFC6CF" class="simpleCart_total"> add product </a>

                    <a href="/logout" style="color: #FFC6CF" class="simpleCart_total"> logout </a>

                    <div class="clearfix"> </div>
                </div>
            </div>
            @endif
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- header-section-ends -->
<div class="banner-top">
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo">
                    <h1><a href="/"><span>E</span> -Shop</a></h1>
                </div>
            </div>
            <!--/.navbar-header-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Men <b class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="multi-column-dropdown">
                                        <h6>{{ $categories[0]->name}}</h6>

                                    @foreach($categories[0]->subcat as $item)
                                        <li><a href="/subcat/{{$item->id}}">{{$item->name}}</a></li>
                                        @endforeach
                                        </ul>
                                </div>
                                 <div class="col-sm-6">
                                    <ul class="multi-column-dropdown">

                                        <h6>{{$categories[1]->name}}</h6>
                                        @foreach($categories[1]->subcat as $item)
                                            <li><a href="/subcat/{{$item->id}}">{{$item->name}}</a></li>

                                        @endforeach
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </ul>
                    </li>

                    <li><a href="#">TYPO</a></li>
                    <li><a href="#">CONTACT</a></li>
                    <li><a href="/search">SEARCH</a></li>
                    @if (!Auth::guest())
                        <li><a href="/product">MY PRODUCTS</a></li>
                    @endif
                    </ul>
                 </nav>
            </div>
        </div>



    @yield('content')

<div class="news-letter">
    <div class="container">
        <div class="join">
            <h6>JOIN OUR MAILING LIST</h6>
            <div class="sub-left-right">
                <form>
                    <input type="text" value="Enter Your Email Here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Your Email Here';}" />
                    <input type="submit" value="SUBSCRIBE" />
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="container">
        <div class="footer_top">
            <div class="span_of_4">
                <div class="col-md-3 span1_of_4">
                    <h4>Shop</h4>
                    <ul class="f_nav">
                        <li><a href="#">new arrivals</a></li>
                        <li><a href="#">men</a></li>
                        <li><a href="#">women</a></li>
                        <li><a href="#">accessories</a></li>
                        <li><a href="#">kids</a></li>
                        <li><a href="#">brands</a></li>
                        <li><a href="#">trends</a></li>
                        <li><a href="#">sale</a></li>
                        <li><a href="#">style videos</a></li>
                    </ul>
                </div>
                <div class="col-md-3 span1_of_4">
                    <h4>help</h4>
                    <ul class="f_nav">
                        <li><a href="#">frequently asked  questions</a></li>
                        <li><a href="#">men</a></li>
                        <li><a href="#">women</a></li>
                        <li><a href="#">accessories</a></li>
                        <li><a href="#">kids</a></li>
                        <li><a href="#">brands</a></li>
                    </ul>
                </div>

                <div class="col-md-3 span1_of_4">
                    <h4>account</h4>
                    <ul class="f_nav">
                        <li><a href="account.html">login</a></li>
                        <li><a href="register.html">create an account</a></li>
                        <li><a href="#">create wishlist</a></li>
                        <li><a href="checkout.html">my shopping bag</a></li>
                        <li><a href="#">brands</a></li>
                        <li><a href="#">create wishlist</a></li>
                    </ul>
                </div>

                <div class="col-md-3 span1_of_4">
                    <h4>popular</h4>
                    <ul class="f_nav">
                        <li><a href="#">new arrivals</a></li>
                        <li><a href="#">men</a></li>
                        <li><a href="#">women</a></li>
                        <li><a href="#">accessories</a></li>
                        <li><a href="#">kids</a></li>
                        <li><a href="#">brands</a></li>
                        <li><a href="#">trends</a></li>
                        <li><a href="#">sale</a></li>
                        <li><a href="#">style videos</a></li>
                        <li><a href="#">login</a></li>
                        <li><a href="#">brands</a></li>
                    </ul>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <div class="cards text-center">
            <img src="https://p.w3layouts.com/demos/e_shop/web/images/cards.jpg" alt="" />
        </div>
        <div class="copyright text-center">
            <p>© 2015 Eshop. All Rights Reserved | Design by   <a href="http://w3layouts.com">  W3layouts</a></p>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">

//    var values="Test,Prof,Off";
//    $.each(values.split(","), function(i,e){
//        $("#strings option[value='" + e + "']").prop("selected", true);
//    });
</script>
</html>