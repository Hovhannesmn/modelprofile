@extends('layouts.application')

@section('content')

<link href="/assets/css/dropzone.css" rel="stylesheet" type="text/css" media="all" />
<script src="/assets/js/dropzone.js"></script>
<link href="/assets/css/selectpiker.css" rel="stylesheet" type="text/css" media="all" />

<style>

    </style>
    <div class="registration-form">
        <div class="container">
            <div class="dreamcrub">
                <ul class="breadcrumbs">
                    <li class="home">
                        <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                        <span>&gt;</span>
                    </li>
                    <li class="women">
                        Update Product
                    </li>
                </ul>
                <ul class="previous">
                    <li><a href="index.html">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <!---728x90--->
            <div style="text-align: center;"><script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <div class="registration-grids">
                <div class="reg-form">
                        <div class="reg">
                            <h2>Update product</h2>

                        <form role="form" id="form_update" >
                            {{ csrf_field() }}
                            <ul class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                                <li class="text-prod"> Tag: </li>
                                <li>
                                    <select name="tags[]"  class="selectpicker"  multiple data-max-options="100"  data-width="100%">
                                        @foreach(App\Model\Tag::all() as $tag)
                                            @if (in_array($tag->id, $arrTags))
                                                <option value="{{$tag->id}}" selected="selected">{{$tag->name}}</option>
                                            @else
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    {{--<input type="text" name="tag" value="">--}}
                                </li>
                                @if ($errors->has('sizes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sizes') }}</strong>
                                    </span>
                                @endif
                            </ul>
                            {{--<ul class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                                {{--<li class="text-prod"> tag: </li>--}}
                                {{--<li>--}}
                                    {{--<select class="large_imput"  name="tag">--}}
                                        {{--@foreach($tags as $tag)--}}
                                            {{--<option value="{{$tag->id}}">{{$tag->name}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                    {{--<input type="text" name="tag" value="">--}}
                                {{--</li>--}}
                                {{--@if ($errors->has('tag'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('tag') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</ul>`--}}
                            <ul>
                                <li class="text-prod">Sub - category: </li>
                                <li>
                                    <select class="large_imput" name="sub_cat">
                                        <option value="{{$product->subcat->id}}" >{{$product->subcat->name}}</option>
                                        @foreach($subcats as $subcat)

                                            @if($subcat->id==$product->subcat->id)
                                                @continue
                                            @endif


                                            <option value="{{$subcat->id}}">{{$subcat->name}}</option>
                                        @endforeach
                                    </select>
                                </li>
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </ul>
                            {{--<ul>--}}
                                {{--<li class="text-prod"> Sub - category: </li>--}}
                                {{--<li><input type="text" name="subcat" value=""></li>--}}
                                {{--<li>--}}
                                    {{--<select class="large_imput" name="category">--}}
                                        {{--@foreach($catgories as $catgory)--}}
                                            {{--<option value="{{$catgory->id}}">{{$catgory->name}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</li>--}}
                                {{--@if ($errors->has('subcat'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('subcat') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</ul>--}}
                            <ul>
                                <li class="text-prod">Name of product: </li>
                                <li><input type="text" name="name" value="{{$product->name}}"></li>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </ul>
                            <ul class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <li class="text-prod"> FABRIC ORIGIN: </li>
                                <li>
                                    <select class="large_imput" name="origin">
                                        <option value="{{$product->origin->id}}">{{$product->origin->name}}</option>

                                        @foreach($countries as $country)
                                            @if($country->id==$product->origin->id)
                                                @continue
                                            @endif
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    {{--<input type="text" name="tag" value="">--}}
                                </li>
                                @if ($errors->has('tag'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tag') }}</strong>
                                    </span>
                                @endif
                            </ul>
                            <ul class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <li class="text-prod"> Made in: </li>
                                <li>
                                    <select class="large_imput" name="producted">
                                        <option value="{{$product->producted->id}}">{{$product->producted->name}}</option>

                                    @foreach($countries as $country)
                                            @if($country->id==$product->producted->id)
                                                @continue
                                            @endif
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                            {{--<input type="text" name="tag" value="">--}}
                                </li>
                                @if ($errors->has('tag'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tag') }}</strong>
                                    </span>
                                @endif
                            </ul>

                            <ul>
                                <li class="text-prod">Price: </li>
                                <li><input type="text" name="price" value="{{$product->price}}"></li>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </ul>
{{--                            {{$colos_id = $product->colors->id }}--}}
{{--                            {{in_array(1 , $product->color()->select('id')->get())}}--}}


                            {{--@if(in_array(1 , $rre)--}}
                                {{--{{dd("kaaaaaaaaa")}}--}}
                                {{--@endif--}}

                            <ul class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <li class="text-prod"> Colors: </li>
                                <li>
                                    <select name="colors[]"  class="selectpicker" multiple data-max-options="100"  data-width="100%">
                                        @foreach(App\Model\Color::all() as $color)

                                            @if (in_array($color->id, $arrColors))
                                                <option value="{{$color->id}}" selected="selected">{{$color->name}}</option>
                                            @else
                                                <option value="{{$color->id}}" >{{$color->name}}</option>
                                            @endif
                                            {{--@endif--}}
                                        @endforeach
                                    </select>
                                    {{--<input type="text" name="tag" value="">--}}
                                </li>
                                @if ($errors->has('colors'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('colors') }}</strong>
                                    </span>
                                @endif
                            </ul>
                            <ul class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <li class="text-prod"> Sizes: </li>
                                <li>
                                    <select name="sizes[]"  class="selectpicker"  multiple data-max-options="100"  data-width="100%">
                                        @foreach(App\Model\Size::all() as $size)
                                            @if (in_array($size->id, $arrSizes))
                                                <option value="{{$size->id}}" selected="selected">{{$size->name}}</option>
                                            @else
                                        <option value="{{$size->id}}">{{$size->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    {{--<input type="text" name="tag" value="">--}}
                                </li>
                                @if ($errors->has('sizes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sizes') }}</strong>
                                    </span>
                                @endif
                            </ul>


                            <ul>
                                <li class="text-prod">Description: </li>
                                <li><textarea rows="4" name="description"  >
                                        {{$product->description}}
                                    </textarea>
                                </li>
                            </ul>
                            <input type="submit" id="update_product" value="UPDATE PRODUCT">
                            <p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p>
                        </form>
                    </div>
                </div>
                <div class="reg-right">
                    <img style="width: 300px; height: 380px;" src="{{$product->image->url}}">
                        {{--<h3>Completely Free Account</h3>--}}
                        {{--<div class="strip"></div>--}}
                        {{--<p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio--}}
                            {{--libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>--}}
                        {{--<h3 class="lorem">Lorem ipsum dolor.</h3>--}}
                        {{--<div class="strip"></div>--}}
                        {{--<p>Tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>--}}


                </div>
                <div class="show-products row">
                    @foreach($product->images as $image)
                    <div class="col-xs-4 col-sm-3 col-md-2 image " style="padding: 10px;">
                    <img src="{{$image->url}}" class="img-thumbnail" alt="Cinque Terre" style=" width :150px; height:210px " >
                    </div>
                    @endforeach

                </div>
                <div class="row filemanager"></div>
                  </div>
                <div class="clearfix"></div>




            </div>
        </div>
    </div>

    <script src="/assets/js/jquery/selectpiker.js"></script>
    <script>
        $('.selectpicker').selectpicker();
        $( "form" ).on( "submit", function( event ) {
            event.preventDefault();
            console.log( $( this ).serialize() );

        $.ajax({
            method: 'PUT',
            url: '{!! url( '/product/' . $product->id ) !!}',
            data : $( this ).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(response){
                if(response.success){
                    window.location.href  = '/galery/' + response.product_id
                }else{
                    alert(2);
//                    console.log()
                }



            }
        });
        });
    </script>

@endsection



