@extends('layouts.application')

@section('content')
    <div class="contact">
        <div class="container">
            <div class="dreamcrub">
                <ul class="breadcrumbs">
                    <li class="home">
                        <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                        <span>&gt;</span>
                    </li>
                    <li class="women">
                        MY PRODUCTS
                    </li>
                </ul>
                <ul class="previous">
                    <li><a href="index.html">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="contact-info">
                <h2>MY PRODUCTS</h2>
                <div class="container">
                    <div class="main-content">
                        <div class="products-grid">
                            @foreach($products as $product)
                                <div class="col-md-3 product simpleCart_shelfItem text-center">
                                    <button  data-id="{{ $product->id  }}" class="delete_product" href="/product/delete">delete </button>

                                    <a href="/product/{{$product->id}}/edit" >
                                        <img src="{{$product->image->url}} " style="width: 250px; height: 350px" alt="" /></a>
                                    <div class="mask">
                                        <a href="/product/{{$product->id}}/edit">Quick View</a>
                                    </div>
                                    <a href="/product/{{$product->id}}/edit">Sed ut perspiciatis</a>
                                    <p><a class="item_add" href="#"><i></i> <span class="item_price">{{$product->price}}</span></a></p>
                                </div>

                            @endforeach

                        </div>



                    </div>
                    {{ $products->nextPageUrl()  }}

                </div>
                <!---728x90--->
                <div style="text-align: center;"><script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-9153409599391170" data-ad-slot="6850850687" data-adsbygoogle-status="done"><ins id="aswift_0_expand" style="display:inline-table;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:728px;background-color:transparent"><ins id="aswift_0_anchor" style="display:block;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:728px;background-color:transparent"><iframe width="728" height="90" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" onload="var i=this.id,s=window.google_iframe_oncopy,H=s&amp;&amp;s.handlers,h=H&amp;&amp;H[i],w=this.contentWindow,d;try{d=w.document}catch(e){}if(h&amp;&amp;d&amp;&amp;(!d.body||!d.body.firstChild)){if(h.call){setTimeout(h,0)}else if(h.match){try{h=s.upd(h,i)}catch(e){}w.location.replace(h)}}" id="aswift_0" name="aswift_0" style="left:0;position:absolute;top:0;"></iframe></ins></ins></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script></div>
                <h2>FIND US HERE</h2>
            </div>
            <div class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6632.248000703498!2d151.265683!3d-33.7832959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12abc7edcbeb07%3A0x5017d681632bfc0!2sManly+Vale+NSW+2093%2C+Australia!5e0!3m2!1sen!2sin!4v1433329298259" style="border:0"></iframe>
            </div>
            <div class="contact-form">
                <div class="contact-info">
                    <!---728x90--->
                    <div style="text-align: center;"><script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-9153409599391170" data-ad-slot="6850850687" data-adsbygoogle-status="done">
                            <ins id="aswift_1_expand" style="display:inline-table;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:728px;background-color:transparent">
                                <ins id="aswift_1_anchor" style="display:block;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:728px;background-color:transparent">
                                    <iframe width="728" height="90" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" onload="var i=this.id,s=window.google_iframe_oncopy,H=s&amp;&amp;s.handlers,h=H&amp;&amp;H[i],w=this.contentWindow,d;try{d=w.document}catch(e){}if(h&amp;&amp;d&amp;&amp;(!d.body||!d.body.firstChild)){if(h.call){setTimeout(h,0)}else if(h.match){try{h=s.upd(h,i)}catch(e){}w.location.replace(h)}}" id="aswift_1" name="aswift_1" style="left:0;position:absolute;top:0;"></iframe>
                                </ins>
                            </ins>
                        </ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script></div>
                    <h3>CONTACT FORM</h3>
                </div>
                <form>
                    <div class="contact-left">
                        <input type="text" placeholder="Name" required="">
                        <input type="text" placeholder="E-mail" required="">
                        <input type="text" placeholder="Subject" required="">
                    </div>
                    <div class="contact-right">
                        <textarea placeholder="Message" required=""></textarea>
                    </div>
                    <div class="clearfix"></div>
                    <input type="submit" value="SUBMIT">
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.delete_product', function (event) {
                event.preventDefault();
              var id = $(this).data("id") ;
                $.ajax({
                    method: 'DELETE',
                    url: "/product/" + id,

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response){
                        if(response.success) {
                        location.reload();
                        }
                        else{
                            alert("it is not a your product");
                        }



                    }
                });
            });

        })
            </script>
    @endsection