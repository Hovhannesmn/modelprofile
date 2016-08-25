@extends('layouts.application')

@section('content')
    <link href="/assets/css/component.css" rel='stylesheet' type='text/css' />
    <div class="container">
    <div class="products-page">
<!-- content-section-ends -->

<div class="products">
    {{--<div class="product-listy">--}}
        {{--<h2>our Products</h2>--}}
        {{--<ul class="product-list">--}}
            {{--<li><a href="">New Products</a></li>--}}
            {{--<li><a href="">Old Products</a></li>--}}
            {{--<li><a href="">T-shirts</a></li>--}}
            {{--<li><a href="">pants</a></li>--}}
            {{--<li><a href="">Dress</a></li>--}}
            {{--<li><a href="">Shorts</a></li>--}}
            {{--<li><a href="#">Shirts</a></li>--}}
            {{--<li><a href="register.html">Register</a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}

    <div class="tags">
        <h4 class="tag_head">Tags Widget</h4>
        <ul class="tags_links">

            @foreach($tags as $tag)
            <li><a href="#">{{$tag->name}}</a></li>
                @endforeach
        </ul>

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
            <li>Page:</li>
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
<a href="{{$products->perPage()}}">sakdgasg</a>
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
        <ul>
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
                    Silver beet shallot wakame tomatillo salsify mung bean beetroot groundnut.
                </div>
                <a class="cbp-vm-icon cbp-vm-add item_add" href="#">Add to cart</a>
             </li>
    @endforeach


</ul>

</div>
    {{--{{ dd($products->links())}}--}}

        {{--<script src="js/cbpViewModeSwitch.js" type="text/javascript"></script>--}}
        {{--<script src="js/classie.js" type="text/javascript"></script>--}}
    </div>
    <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
<script type="text/javascript">
      $('#perpage').on('change', function() {
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
</script>

@endsection