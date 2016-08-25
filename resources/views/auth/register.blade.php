@extends('layouts.application')

@section('content')

<div class="registration-form">
    <div class="container">
        <div class="dreamcrub">
            <ul class="breadcrumbs">
                <li class="home">
                    <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                    <span>&gt;</span>
                </li>
                <li class="women">
                    Registration
                </li>
            </ul>
            <ul class="previous">
                <li><a href="index.html">Back to Previous Page</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <!---728x90--->
        <div style="text-align: center;"><script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-9153409599391170" data-ad-slot="6850850687" data-adsbygoogle-status="done"><ins id="aswift_0_expand" style="display:inline-table;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:728px;background-color:transparent"><ins id="aswift_0_anchor" style="display:block;border:none;height:90px;margin:0;padding:0;position:relative;visibility:visible;width:728px;background-color:transparent"><iframe width="728" height="90" frameborder="0" marginwidth="0" marginheight="0" vspace="0" hspace="0" allowtransparency="true" scrolling="no" allowfullscreen="true" onload="var i=this.id,s=window.google_iframe_oncopy,H=s&amp;&amp;s.handlers,h=H&amp;&amp;H[i],w=this.contentWindow,d;try{d=w.document}catch(e){}if(h&amp;&amp;d&amp;&amp;(!d.body||!d.body.firstChild)){if(h.call){setTimeout(h,0)}else if(h.match){try{h=s.upd(h,i)}catch(e){}w.location.replace(h)}}" id="aswift_0" name="aswift_0" style="left:0;position:absolute;top:0;"></iframe></ins></ins></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script></div>
        <h2>Registration</h2>
        <div class="registration-grids">
            <div class="reg-form">
                <div class="reg">
                    <p>Welcome, please enter the following details to continue.</p>
                    <p>If you have previously registered with us, <a href="#">click here</a></p>
                        <form role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                        <ul class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <li class="text-info">First Name: </li>
                            <li><input type="text" name="first_name" value=""></li>
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </ul>
                        <ul>
                            <li class="text-info">Last Name: </li>
                            <li><input type="text" name="last_name" value=""></li>
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </ul>
                        <ul>
                            <li class="text-info">Email: </li>
                            <li><input type="text" name="email" value=""></li>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </ul>
                        <ul>
                            <li class="text-info">Password: </li>
                            <li><input type="password" name="password" value=""></li>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </ul>
                        <ul>
                            <li class="text-info">Re-enter Password:</li>
                            <li><input type="password" name="password_confirmation" value=""></li>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </ul>
                        <ul>
                            <li class="text-info">Mobile Number:</li>
                            <li><input type="text" name="contact_phone" value=""></li>
                            @if ($errors->has('contact_phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('contact_phone') }}</strong>
                                    </span>
                            @endif
                        </ul>
                        <input type="submit" value="REGISTER NOW">
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
            <div class="clearfix"></div>
        </div>
    </div>
</div>

    @endsection