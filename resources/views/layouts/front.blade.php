<!DOCTYPE html>
<html lang="en">
<head lang="en">

    <base href="/public">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ $settings->name }}</title>

    <link rel="stylesheet" type="text/css" href="app/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="app/css/crumina-fonts.css">
    <link rel="stylesheet" type="text/css" href="app/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="app/css/grid.css">
    <link rel="stylesheet" type="text/css" href="app/css/styles.css">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="app/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="app/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="app/css/primary-menu.css">
    <link rel="stylesheet" type="text/css" href="app/css/magnific-popup.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="app/css/rtl.css">-->

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <style>
        .padded-50{
            padding: 40px;
        }
        .text-center{
            text-align: center;
        }
    </style>

</head>


<body class=" ">

<div class="content-wrapper">
    



 @include('inc.header')


 @yield('content')

<!-- End Subscribe Form -->






<div class="container-fluid bg-green-color">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="subscribe scrollme">
                    <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                        <h4 class="subscribe-title">Email Newsletters!</h4>
                        <form class="subscribe-form" method="post" action="{{ route('news_letter') }}">
                            @csrf
                            <input class="email input-standard-grey input-white" name="email" required="required" placeholder="Your Email Address" type="email">
                            <button type="submit" class="subscr-btn">subscribe
                                <span class="semicircle--right"></span>
                            </button>
                        </form>
                        <div class="sub-title">Sign up for new Seosignt content, updates, surveys & offers.</div>
    
                    </div>
    
                    <div class="images-block">
                        <img src="app/img/subscr-gear.png" alt="gear" class="gear">
                        <img src="app/img/subscr1.png" alt="mail" class="mail">
                        <img src="app/img/subscr-mailopen.png" alt="mail" class="mail-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>



<!-- Footer -->

@include('inc.footer')

<!-- End Footer -->

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6202406a67f71a05"></script>



@if(Session::has('news'))
<script>
    toastr.success("{{ Session::get('news') }}")
</script>
@endif

</body>
</html>
