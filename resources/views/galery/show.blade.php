@extends('layouts.application')

@section('content')

    <link href="/assets/css/dropzone.css" rel="stylesheet" type="text/css" media="all" />
    <script src="/assets/js/dropzone.js"></script>
    <script>
        var datam = jQuery.parseJSON('{!! $product->images->toJson() !!}');
        var head_image = jQuery.parseJSON('{!! $product->image->toJson() !!}')


    </script>
    <style>
        .dropzone .dz-default.dz-message {
            opacity: 1;
            -ms-filter: none;
            filter: none;
            -webkit-transition: opacity 0.3s ease-in-out;
            -moz-transition: opacity 0.3s ease-in-out;
            -o-transition: opacity 0.3s ease-in-out;
            -ms-transition: opacity 0.3s ease-in-out;
            transition: opacity 0.3s ease-in-out;
            background-image: url("/assets/images/download.png");
            background-repeat: no-repeat;
            background-position: 0 0;
            display: block;
            top: 50%;
            left: 50%;
        }
        #profile-image-container #upload-container .dz-message {
            text-align: center;
            width: 100%;
            height: 100%;
            background: transparent;
            margin: 0;
            top: 0;
            left: 0;
            padding-top: 145px;
        }
        #fileupload {
            border: 6px solid #666;
            border-radius: 22px;
            border-style: dashed;
            margin: 30px -10px;
            background-color: white;
        }
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
            <nav class="navbar navbar-inverse" style="background-color: #bfbfbe; border-color: #bfbfbe; ">
                <div class="container-fluid">
                    <div class="navbar-header" id="selectall" style="padding-left: 1pc"  >
                        {{--<a class="navbar-brand" href="#">WebSiteName</a>--}}
                        {{--<input type="checkbox" name="selectall_ck"  />--}}
                    {{--</div>--}}
                    {{--<div class="ckbox ckbox-default" id="selectall">--}}
                        <input type="checkbox" class="navbar-brand" name="selectall_ck" style="width: 18px; height: 45px;margin-right: 7px;" />
                        <label for="selectall_ck " style="color: cadetblue; font-size: 20px;" class="navbar-brand" > Select all </label>
                    </div>


                    <ul class="nav navbar-nav">
                        <li class="">  <a style="font-size: 15px; color: cadetblue;" id="deselectall" href="#" class="itemopt disabled">
                                <i style="font-size: 16px; margin-right: 6px;color: #333;" class="fa fa-times ">X</i>   Deselect all</a></li>
                        <li><a href="#" style="font-size: 15px; color: #4e3a61;">Delete images</a></li>
                    </ul>
                </div>
            </nav>

            <div style="text-align: center;">
                <h2>Create product</h2>
                <div class="contentpanel">



                <div class="col-xs-12 ">
                        <div class="head-product"></div>
                        <div class="show-products row">
                       </div>

                    <div class="col-xs-12 mb15 uploadImage">
                           <h3>Coose Images</h3>
                          <form method="PUT" action="/galery" accept-charset="UTF-8" class=" dropzone dz-clickable" id="fileupload" enctype="multipart/form-data">
                            {{ csrf_field() }}
                              <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="dz-default dz-message"><span>Drop files here to upload</span></div></form>
                         </div>
                    </div>
                </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>

        <script type="text/javascript">

            showImages(datam);

            function showImage(datam) {
                $('.show-products').append(
                        '<div  class="col-xs-6 col-sm-4 col-md-3 image img-thumbnail" style="margin: 20px">'
                        + '<div class="thmb">'
                        + '<div class="ckbox ckbox-default" style="position: absolute;top: 15px;left: 15px;/* display:block; */">'

                        + '<input class="checked_item" data-item-id="' + datam.id + '" name="checked_142" value="1" type="checkbox">'
                        + ' <label> </label>'
                        + '</div>'
                        + '<div class="btn-group fm-group" style="/* display:block; */position: absolute;top: 15px;right: 15px;/* display: none; */">'
                        + '<button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown" aria-expanded="false">'
                        + '<span class="caret"></span>'
                        + '</button>'
                        + '<ul class="dropdown-menu fm-menu" role="menu">'
                        + '<li><a href="' +  datam.url +  '" target="_blank"><i class="fa fa-download"></i> Edit</a></li>'
                        + '<li><a href="#" data-imagemain="' + datam.id + '" class="make-main"><i class="fa fa-pencil"></i> Make main image</a></li>'
                        + '<li><a href="#" class="delete-single" data-image="' + datam.id + '"><i class="fa fa-trash-o"></i> Delete</a></li>'
                        + '</ul>'
                        + '</div>'

                        + '<div class="thmb-prev" style="width: 100%;height: 150px;background-size: contain;background-position: center;background-color: lightgrey;background-repeat: no-repeat;'
                        + 'background-image: url(' + datam.url + ');"></div>'
                        + '</div>'
                        + '</div>'
                );
            }

            function showImages(datam) {


//                console.log(head_image.url);
                $('.head-product').append(
                        '<h3>' + 'Main image' + '</h3>' +
                        '<img style="width: 300px; height: 380px;" class="img-thumbnail"  src="' + head_image.url + '">'
                );
                $.each(datam, function (key, value) {
                    $('.show-products').append(
                            '<div  class="col-xs-6 col-sm-4 col-md-3 image img-thumbnail" style="margin: 20px">'
                            + '<div class="thmb">'
                            + '<div class="ckbox ckbox-default" style="position: absolute;top: 15px;left: 15px;/* display:block; */">'

                            + '<input class="checked_item" data-item-id="' + value.id + '" name="checked_142" value="1" type="checkbox">'
                            + ' <label> </label>'
                            + '</div>'
                            + '<div class="btn-group fm-group" style="/* display:block; */position: absolute;top: 15px;right: 15px;/* display: none; */">'
                            + '<button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown" aria-expanded="false">'
                            + '<span class="caret"></span>'
                            + '</button>'
                            + '<ul class="dropdown-menu fm-menu" role="menu">'
                            + '<li><a href="' +  value.url +  '" target="_blank"><i class="fa fa-download"></i> Edit</a></li>'
                            + '<li><a href="#" data-imagemain="' + value.id + '" class="make-main"><i class="fa fa-pencil"></i> Make main image</a></li>'
                            + '<li><a href="#" class="delete-single" data-image="' + value.id + '"><i class="fa fa-trash-o"></i> Delete</a></li>'
                            + '</ul>'
                            + '</div>'

                            + '<div class="thmb-prev" style="width: 100%;height: 150px;background-size: contain;background-position: center;background-color: lightgrey;background-repeat: no-repeat;'
                            + 'background-image: url(' + value.url + ');"></div>'
                            + '</div>'
                            + '</div>'
                    );


                });
            }

                jQuery(function(){


                Dropzone.autoDiscover = false;

                var myDropzone = new Dropzone("#fileupload", {

                    addRemoveLinks: true,
                    dictRemoveFile: 'Remove',
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(event, response){
                        var sub = response.substr(10);
                        response = JSON.parse(response);
                        showImage(response);

                    }
                });



                $(document).on('click', '.filemanager .ckbox', function(){
                    var inp = $(this).find('input');
                    if(inp.attr('checked')){
                        inp.attr('checked', false);
                    }else{
                        inp.attr('checked', true);
                    }
                    enable_itemopt(false);
                });

                $('#selectall').click(function(event){
                    event.preventDefault();

                    $('.image').each(function(){
                        $(this).find('input').attr('checked',true);
                    });


//                    enable_itemopt(true);
                });




                $('#deselectall').click(function(event){
                    event.preventDefault();
                    $('.image').each(function(){
                        $(this).find('input').attr('checked',false);
                        $(this).removeClass('checked');
                    });

                });


                    $(document).on('click', ' .make-main', function(event) {
                        event.preventDefault();

                        var item = $(this).data('imagemain');
                        $.ajax({
                            method: 'PUT',
                            url: '{!! url( '/' . $product->id . '/galery') !!}/' + item,

                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },

                            success: function(response){
                                location.reload();
                            }
                        });
                    });

                        $(document).on('click', ' .delete-single', function(event){
                        event.preventDefault();

                        var item = $(this).data('image');

                        $.ajax({
                            method: 'DELETE',
                            url: '{!! url( '/' . $product->id . '/galery') !!}/' + item,

                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },

                            success: function(response){
                                location.reload();



                            }
                        });
                    });

                $('#deleteall').click(function(event){
                    event.preventDefault();

                    deleteItems($('.checked_item:checked'));
                });
            });

            var photo_counter = 0;



        </script>



@endsection



