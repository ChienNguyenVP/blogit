<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title') Lập trình website với Laravel || Chiến Nguyễn</title>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/font-awesome.min.css') }}">
        <!-- code codesnippet - text editor --------------------------------------------------------------->
      <link href="{{ asset('vendor/ckeditor/plugins/codesnippet/lib/highlight/styles/vs2015.css') }}" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/customer.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/loader.css') }}">
        {{-- add css --}}
        @yield('head')
    </head>
    <body>
        {{-- loader --}}
        <div class="container">
            <div class="row">
                <div id="loader">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="lading"></div>
                </div>
            </div>
        </div>
        {{-- end loader --}}

        {{-- configure facebook --}}
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1395641663878197';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        {{-- end configure facebook --}}
        <div class="wraper-body">
            <!-- HEADER -->
            <header>
                <div class="container-fluild">
                    @if(View::exists('blog.layouts.menu'))
                        @include('blog.layouts.menu')
                    @endif
                </div>
            </header>
            <!-- END HEADER -->
            <section class="content">
                <div class="container">
                    {{-- content --}}
                    @yield('content')
                    {{-- end content --}}
                    {{-- sidebar right --}}
                    @yield('sidebarRight')
                    {{-- end sidebar right --}}
                </div>
            </section>

            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="copyrights">
                                <p>
                                    © Copyright 2018 | Designed by <a href="#" style="color:#f35045;">Chiến Nguyễn</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <ul class="social-icons">
                                <li>
                                    <a href="#" ><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- len dau trang -->
            <a href="#0" class="cd-top cd-is-visible cd-fade-out" title="Lên đầu trang"></a>
        </div>
    </body>
    <!-- jquery -->
    <script type="text/javascript" src="{{ asset('blog_assets/js/jquery-3.2.1.min.js') }}"></script>
    <!-- bootstrap -->
    <script type="text/javascript" src="{{ asset('blog_assets/js/bootstrap.min.js') }}"></script>
    {{-- codesnippet --}}
    <script type="text/javascript" src="{{ asset('vendor/ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
    <!-- css custom -->
    <script type="text/javascript" src="{{ asset('blog_assets/js/customer.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $("#loader").fadeOut(1000);
            $('.wraper-body').fadeIn( 2000);

            // use hight light js
            hljs.initHighlightingOnLoad();
        });
    </script>
    {{-- add script  --}}
    @yield('script')
</html>