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
                        Create Product
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
                            <h2>Create product</h2>

                        <form role="form" method="POST" action="{{ url('/product') }}">
                            {{ csrf_field() }}
                            {{--<ul class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">--}}
                                {{--<li class="text-prod"> Tag: </li>--}}
                                {{--<li>--}}
                                    {{--<select name="tags[]"  class="selectpicker" multiple data-max-options="100"  data-width="100%">--}}
                                        {{--@foreach(App\Model\Tag::all() as $tag)--}}
                                            {{--<option value="{{$tag->id}}">{{$tag->name}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</li>--}}
                                {{--@if ($errors->has('sizes'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('sizes') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</ul>--}}

                            <ul class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                                <li class="text-prod"> Tag: </li>
                                <li>
                                    <select name="tags[]"  class="selectpicker"  multiple data-max-options="100"  data-width="100%">
                                        @foreach(App\Model\Tag::all() as $tag)
                                                <option value="{{$tag->id}}" >{{$tag->name}}</option>

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
                                <li class="text-prod">Sub - category: </li>
                                <li>
                                    <select class="large_imput" name="sub_cat">
                                        @foreach($subcats as $subcat)
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
                            <ul>
                                <li class="text-prod">Name of product: </li>
                                <li><input type="text" name="name" value=""></li>
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
                                        @foreach($countries as $country)
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
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </li>
                                @if ($errors->has('tag'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tag') }}</strong>
                                    </span>
                                @endif
                            </ul>

                            <ul>
                                <li class="text-prod">Price: </li>
                                <li><input type="text" name="price" value=""></li>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </ul>
                            <ul class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <li class="text-prod"> Colors: </li>
                                <li>
                                    <select name="colors[]"  class="selectpicker" multiple data-max-options="100"  data-width="100%">
                                        @foreach(App\Model\Color::all() as $color)
                                            <option value="{{$color->id}}">{{$color->name}}</option>
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
                                    <select name="sizes[]"  class="selectpicker" multiple data-max-options="100"  data-width="100%">
                                        @foreach(App\Model\Size::all() as $size)
                                        <option value="{{$size->id}}">{{$size->name}}</option>
                                        @endforeach
                                    </select>
                                </li>
                                @if ($errors->has('sizes'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sizes') }}</strong>
                                    </span>
                                @endif
                            </ul>


                            <ul>
                                <li class="text-prod">Description: </li>
                                <li><textarea rows="4" name="description" >
                                    </textarea>
                                </li>
                            </ul>
                            <input type="submit" value="CREATE PRODUCT">
                            <p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p>
                        </form>
                    </div>
                </div>
                <div class="reg-right">
                        <h3>Completely Free Account</h3>
                        <div class="strip"></div>
                        <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio
                            libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
                        <h3 class="lorem">Lorem ipsum dolor.</h3>
                        <div class="strip"></div>
                        <p>Tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
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

    </script>

@endsection



